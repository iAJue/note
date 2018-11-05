<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
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

	public function folders()
	{
		return $this->hasMany(Folder::class);
	}


}
