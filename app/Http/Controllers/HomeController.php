<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Content;
use App\Http\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Models\User;

/**
 * 首页控制器
 */
class HomeController extends Controller
{

	/**
	 * web
	 * @return [type] [description]
	 */
	public function web(Request $request)
	{
		if ($request->id) {
			$res = Content::where('id', $request->id)->first();
			preg_match('!upload/(.*?)("|\))!', $res->content, $match);
			return view('read', ['res' => $res, 'img' => $match]);
		}
		$Contents = Content::orderBy('created_at', 'desc')->get()->take(20);
		return view('web', [
			'Contents' => $Contents
		]);
	}

	/**
	 * 普通笔记
	 * @return [type] [description]
	 */
	public function note(Request $request)
	{

		$this->establish();

		if ($request->id) {

			$content = Content::where('id', $request->id)
				->where('user_id', session('user.id'))
				->first();

			if (!$content) {
				return redirect('/note');
			}

			return view('note', ['content' => $content]);
		}

		$FolderInfo = User::find(session('user.id'))->folders->take(1);

		$res = Content::create([
			'user_id' => session('user.id'),
			'folder_id' => $FolderInfo[0]->id,
			'title' => '新建笔记',
			'content' => '',
			'type' => 1
		]);

		return redirect('/note/' . $res->id);
	}

	/**
	 * markdown笔记
	 * @return [type] [description]
	 */
	public function markdown(Request $request)
	{

		$this->establish();

		if ($request->id) {

			$content = Content::where('id', $request->id)
				->where('user_id', session('user.id'))
				->first();

			if ($content) {
				return view('markdown', ['content' => $content]);
			}

		}

		$FolderInfo = User::find(session('user.id'))->folders->take(1);

		$res = Content::create([
			'user_id' => session('user.id'),
			'folder_id' => $FolderInfo[0]->id,
			'title' => '新建Markdown笔记',
			'content' => '',
			'type' => 0
		]);

		return redirect('/markdown/' . $res->id);
	}

	/***
	 * 创建文件夹
	 */
	private function establish()
	{
		$folder = Folder::where('user_id', session('user.id'))->first();
		if (!$folder) {
			Folder::create([
				'name' => '默认文件夹',
				'user_id' => session('user.id')
			]);
		}
	}

}