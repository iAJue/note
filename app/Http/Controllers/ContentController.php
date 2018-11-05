<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Content;
use Illuminate\Support\Facades\Validator;

/**
 * 内容管理i
 */
class ContentController extends Controller
{

	/**
	 * 保存笔记
	 *
	 * @param Request $request
	 * @return void
	 */
	public function save(Request $request)
	{
		$content = Content::where('id', $request->id)
			->where('user_id', session('user.id'))
			->update([
				'content' => $request->content == '' ? '' : $request->content,
				'title' => $request->title == '' ? '' : $request->title
			]);

		if ($content) {
			return ['code' => 0, 'msg' => '保存成功'];
		}
		return ['code' => 1, 'msg' => '保存失败'];

	}

	/**
	 * 笔记图片上传
	 *
	 * @return void
	 */
	public function upload(Request $request)
	{
		$validator = Validator::make($request->all(), [
			$request->guid ? 'editormd-image-file' : 'upload_file' => 'required|image',
		]);

		if ($validator->fails()) {
			return ['success' => false, 'msg' => $validator->errors()->first('file'), 'file_path' => ''];
		}

		$file = $request->file($request->guid ? 'editormd-image-file' : 'upload_file');

		if (!$file->isValid()) {
			return ['success' => false, 'msg' => '上传文件有误', 'file_path' => ''];
		}

		if (!in_array(strtolower($file->extension()), ['jpeg', 'jpg', 'gif', 'gpeg', 'png', 'webp'])) {
			return ['success' => false, 'msg' => '上传图片后缀不允许', 'file_path' => ''];
		}

		$path = $file->store('upload');
		if ($request->guid) {
			return ['success' => 1, 'message' => '', 'url' => '/images/' . $path];
		}
		return ['success' => true, 'msg' => '', 'file_path' => '/images/' . $path];
	}

}