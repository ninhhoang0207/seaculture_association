<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    //
	// public function list() {
	// 	echo "string";
	// }

	public function add( Request $request ) {
		return view('admin.news.add');
	}
}
