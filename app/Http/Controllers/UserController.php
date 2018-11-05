<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\libraries\phpmail\Mail;
use Validator;
use app\libraries\MaterialDesign\MDAvatars;



/**
 * 用户控制器
 */
class UserController extends Controller
{

	/**
	 * 登录
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function login(Request $request)
	{

		$user = User::where('username', $request->name)
			->orWhere('email', $request->name)
			->first();
		if (!$user) {
			return ['code' => 2, 'msg' => '用户不存在'];
		}

		if ($request->password == decrypt($user->password)) {
			session(['user' => $user]);
			return ['code' => 0, 'msg' => '登录成功'];
		}

		return ['code' => 1, 'msg' => '用户名或密码错误'];
	}

	/**
	 * 发送验证码
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function send(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'email' => 'required|email|unique:users,email|max:60',
		]);

		if ($validator->fails()) {
			return ['code' => 1, 'msg' => $validator->errors()->first('email')];
		}


		$code = mt_rand(100000, 999999);
		$content = view('mail.template', ['code' => $code])->render();

		$mail = new Mail(config('mail.username'), config('mail.password'), '萌音云笔记');
		if ($mail->send($request->email, '【萌音云笔记】验证码', $content)) {
			User::create([
				'email' => $request->email,
				'token' => $code
			]);
			return ['code' => 0, 'msg' => '验证码发送成功！'];
		}

		return ['code' => 1, 'msg' => '验证码发送失败！'];
	}

	/**
	 * 注册
	 * @return [type] [description]
	 */
	public function reg(Request $request)
	{
		$res = User::where('token', $request->code)
			->where('email', $request->email)
			->where('created_at', '>', time() - 1800)
			->first();
		if (!$res) {
			return ['code' => 1, 'msg' => '验证码错误！'];
		}

		$photo = md5(uniqid(rand())) . '.png';
		$Avatar = new MDAvatars($request->email);
		// $Avatar->Output2Browser(100);
		$Avatar->Save('images/avatars/' . $photo, 100);
		$Avatar->Free();
		$password = $request->code . getRandomString(6);
		User::where('email', $request->email)
			->where('token', $request->code)
			->update([
				'status' => '1',
				'token' => 0,
				'password' => encrypt($password),
				'ip' => get_client_ip(),
				'photo' => 'avatars/' . $photo
			]);

		return ['code' => 0, 'msg' => "注册成功，你的初始密码为：{$password}"];
	}

	/**
	 * 重置密码
	 * @return [type] [description]
	 */
	public function reset(Request $request)
	{
		$res = User::where('token', $request->code)
			->where('email', $request->email)
			->where('created_at', '>', time() - 1800)
			->first();
		if (!$res) {
			return ['code' => 1, 'msg' => '验证码错误！'];
		}

		$password = $request->code . getRandomString(6);
		User::where('email', $request->email)
			->where('token', $request->code)
			->update([
				'status' => '1',
				'token' => 0,
				'password' => bcrypt($password)
			]);

		return ['code' => 0, 'msg' => "密码已被重置：{$password}"];
	}

	/**
	 * 重置密码邮件
	 * @return [type] [description]
	 */
	public function reset_send(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|max:60',
		]);

		if ($validator->fails()) {
			return ['code' => 1, 'msg' => $validator->errors()->first('email')];
		}

		$res = User::where('email', $request->email)->first();
		if (!$res) {
			return ['code' => 1, 'msg' => '用户不存在！'];
		}

		$code = mt_rand(100000, 999999);
		$content = view('mail.template', ['code' => $code])->render();

		$mail = new Mail(config('mail.username'), config('mail.password'), '萌音云笔记');
		if ($mail->send($request->email, '【萌音云笔记】重置密码', $content)) {
			User::where('email', $request->email)
				->update(['token' => $code]);
			return ['code' => 0, 'msg' => '验证码发送成功！'];
		}

		return ['code' => 2, 'msg' => '验证码发送失败！'];
	}

	/**
	 * 用户主页
	 */
	public function users(Request $request)
	{
		$info = [];
		if (!$request->id) {
			return redirect('users/1');
		}

		$info = User::where('id', $request->id)->first();
		return view('users', ['info' => $info, 'id' => $request->id]);
	}

	/**
	 * 注销
	 *
	 * @return void
	 */
	public function logout(Request $request)
	{
		$request->session()->flush();
		return redirect('/web');
	}

	/**
	 * 删除背景
	 *
	 * @return void
	 */
	public function del()
	{
		$user = User::where('id', session('user.id'))->first();
		@unlink('./images/' . $user->cover);
		$user->cover = '';
		$user->save();
		session(['user' => $user]);
	}

	/**
	 * 修改个人资料
	 *
	 * @return void
	 */
	public function userset(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'alpha_dash|max:6',
			'password' => 'max:10',
			'sign' => 'max:20'
		]);

		if ($validator->fails()) {
			$errors = $validator->errors();
			foreach ($errors->all() as $message) {
				return ['code' => 1, 'msg' => $message];
			}
		}

		$data = [
			'username' => $request->name == '' ? '' : $request->name,
			'sign' => $request->sign == '' ? '' : $request->sign
		];
		if ($request->password != '') {
			$data['password'] = encrypt($request->password);
		}

		User::where('id', session('user.id'))->update($data);
		$user = User::where('id', session('user.id'))->first();
		session(['user' => $user]);
		return ['code' => 0, 'mag' => '成功'];
	}


	/**
	 * 用户背景上传
	 *
	 * @return void
	 */
	public function cover(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'file' => 'required|image',
		]);

		if ($validator->fails()) {
			return ['code' => 1, 'msg' => $validator->errors()->first('file')];
		}

		$file = $request->file('file');

		if (!$file->isValid()) {
			return ['code' => 1, 'msg' => '上传文件有误'];
		}

		if (!in_array(strtolower($file->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
			return ['code' => 1, 'msg' => '上传文件后缀不允许'];
		}

		$path = $file->store('cover');
		$user = User::where('id', session('user.id'))->first();
		@unlink('./images/' . $user->cover);
		$user->cover = $path;
		$user->save();

		session(['user' => $user]);
		return ['code' => 0, 'msg' => '成功'];
	}

	/**
	 * 用户头像上传
	 *
	 * @return void
	 */
	public function avatar(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'file' => 'required|image',
		]);

		if ($validator->fails()) {
			return ['code' => 1, 'msg' => $validator->errors()->first('file')];
		}

		$file = $request->file('file');

		if (!$file->isValid()) {
			return ['code' => 1, 'msg' => '上传文件有误'];
		}

		if (!in_array(strtolower($file->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png'])) {
			return ['code' => 1, 'msg' => '上传文件后缀不允许'];
		}

		$path = $file->store('avatars');
		$user = User::where('id', session('user.id'))->first();
		@unlink('./images/' . $user->photo);
		$user->photo = $path;
		$user->save();

		session(['user' => $user]);
		return ['code' => 0, 'msg' => '成功'];
	}
}
