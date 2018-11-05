<?php

namespace App\Http\Models;

use App\Http\Models\Folder;
use Illuminate\Database\Eloquent\Model;


class Content extends Model
{

	/**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * 模型的数据字段的保存格式。
	 *
	 * @var string
	 */
	protected $dateFormat = 'U';

	public function folder()
	{
		return $this->belongsTo(Folder::class);
	}


	public function User()
	{
		return $this->belongsTo(User::class);
	}

}
