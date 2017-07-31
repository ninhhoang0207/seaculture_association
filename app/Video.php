<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

	/**
	 * @var string table
	 */
	protected $table = 'videos';

	/**
	 * @var array guarded column
	 */
	protected $fillable = array('title', 'title_slug', 'title_image', 'desciption', 'url','is_hot','is_valid', 'type', 'created_by', 'updated_by');
}
