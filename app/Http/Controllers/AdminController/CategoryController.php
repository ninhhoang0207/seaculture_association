<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
	public function add() {
		return view('admin.category.add');
	}

	public function create(Request $request) {
		$data = $request->all();
		dd($data);
	}

	public function list_categories() {

	}
}
