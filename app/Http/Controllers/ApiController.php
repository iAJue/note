<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Folder;
use App\Http\Models\Content;

/**
 * Api控制器
 */
class ApiController extends Controller
{

	/**
	 * 新建文件夹
	 * @return [type] [description]
	 */
	public function newly(Request $request)
	{
		Folder::create(['name' => $request->name, 'user_id' => session('user.id')]);
	}


	/**
	 * 重命名文件夹
	 *
	 * @return void
	 */
	public function rename(Request $request)
	{
		Folder::where('id', $request->id)->where('user_id', session('user.id'))->update(['name' => $request->name]);
	}

	/**
	 * 删除文件夹
	 *
	 * @return void
	 */
	public function del(Request $request)
	{
		if (Content::where('folder_id', $request->id)->first()) {
			return ['code' => 1, 'msg' => '当前文件夹下有笔记，不能被删除！'];
		}
		Folder::where('id', $request->id)->where('user_id', session('user.id'))->delete();
	}

	/**
	 * 删除笔记
	 *
	 * @return void
	 */
	public function delete(Request $request)
	{
		Content::where('id', $request->id)->where('user_id', session('user.id'))->delete();
	}

}