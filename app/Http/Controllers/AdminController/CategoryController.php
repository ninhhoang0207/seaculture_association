<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryModel;
use Redirect;
use Session;

class CategoryController extends Controller
{
    //
	public function add() {
		$list = CategoryModel::where('parent_id',0)->get(['id','title']);
		return view('admin.category.add',compact('list'));
	}

	public function create(Request $request) {
		$data = $request->all();
		$save = array();
		if (isset($data['title'])) {
			$title_slug = strtolower(str_replace(' ', '-', $this->convert_vi_to_en($data['title'])));
			$save = array(
				'title'			=>	$data['title'],
				'title_slug'	=>	$title_slug,
				'parent_id'		=>	$data['category_list'],
				);
		}
		$create = CategoryModel::create($save);
		Session::flash('message','Success!');
		return Redirect::back();
	}

	// private $data = array(
	// 	[1	=> 0],
	// 	[2	=> 0],
	// 	[3	=>	0],
	// 	[4	=>	1],
	// 	[5	=>	2],
	// 	[6	=>	1],
	// 	[7	=>	2],
	// 	[8	=>	4],
	// 	[9	=>	4],
	// 	);

	// public function list_categories() {
	// 	$data = $this->data;
	// 	$index = 0;
	// 	$string = '';
	// 	dd($this->draw(0,$this->data,''));
	// 	return view('admin.category.list');
	// }

	// private function draw($index, $data, $string) {
	// 	if ($index < count($data)) {
	// 		for ($i=0; $i < count($data)-1; $i++) {
	// 			foreach ($data[$index] as $key => $value) {
	// 				$index_id = $key;
	// 			}
	// 			foreach ($data[$i] as $key => $value) {
	// 				$temp_id = $key;
	// 				$temp_partent = $value;
	// 			}
	// 			if ($index_id == $temp_partent) {
	// 				$string .= $this->draw($i,$data,$string);
	// 			}	
	// 		}
	// 	}
	// 	$string .= $index;
	// 	return $this->draw($index+1,$data,$string);
	// }

	public function convert_vi_to_en($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
		$str = preg_replace("/(đ)/", "d", $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
		$str = preg_replace("/(Đ)/", "D", $str);
		return $str;
	}
}
