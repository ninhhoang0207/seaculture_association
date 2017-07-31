<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\NewsModel;
use App\NewsCategoryModel;
use App\Http\Controllers\AdminController\CategoryController;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;

class NewsController extends Controller
{
    
	public function list_news() {
		return view('admin.news.list');
	}

	public function get_news_data() {
		$data = NewsModel::select(['id','title','title_image','created_at']);
		return Datatables::of($data)
			->editColumn('created_at', function ($user) {
				return $user->created_at->format('d/m/Y');
			})
			->filterColumn('created_at', function ($query, $keyword) {
				$query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
			})
			->make(true);
	}

	public function get_detail(Request $request) {
		$id = $request->id;
		if (isset($id)) {
			$data = NewsModel::where('id',$id)->get(['id','title'])->first();
			return $data;
		} 
		return -1;
	}

	public function add( Request $request ) {
		$category_list = DB::table('categories')->get(['id','title']);
		return view('admin.news.add',compact('category_list'));
	}

	public function create(Request $request) {
		$data = $request->all();
		$file = $data['title_image'];
		$extension = $file->getClientOriginalExtension();
		$id = DB::getPdo()->lastInsertId()+1;
		$path = public_path().'/images/news/'.$id;
		$new_file_name = $id.'_'.time().".".$extension;
		$file->move($path,$new_file_name);
		DB::beginTransaction();
		try {
			$convert = new CategoryController;
			$title_slug = str_replace(' ', '-', strtolower($convert->convert_vi_to_en($data['title']))) ;
			$save = array(
				'title'			=>	$data['title'],
				'title_slug'	=>	$title_slug,
				'is_hot'		=>	isset($data['is_hot'])?1:0,
				'view_mode'		=>	$data['view_mode'],
				'content'		=>	$data['content'],
				'title_image'	=>	$new_file_name,
				'views'			=>	0,
				'content'		=>	$data['content'],
				'is_valid'		=>	Auth::user()->role?1:0,
				'created_by'	=>	Auth::user()->id,
				'created_at'	=>	Carbon::now(),
				'updated_at'	=>	Carbon::now(),
				);
			$news = DB::table('news')->insert($save);
			$id = DB::getPdo()->lastInsertId();
			foreach ($data['categories'] as $key => $value) {
				DB::table('news_category')->insert(['category_id'=>$value,'news_id'=>$id]);
			}
			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();
			if (file_exists($path."/".$new_file_name)) {
				unlink($path."/".$new_file_name);
			}
			throw $e;
    // something went wrong
		}
		Session::flash('success','Success');
		return Redirect::back();
	}

	public function delete($id = -1) {
		DB::beginTransaction();
		try {
			$images = NewsModel::where('id',$id)->get(['title_image'])->first();
			$delete_news = NewsModel::where('id',$id)->delete();
			$delete_news_category = NewsCategoryModel::where('news_id',$id)->delete();
			DB::commit();
			if (isset($images)) {
				if (file_exists(public_path('images/news/1/').$images)) {
					unlink(public_path('images/news/1/').$images);
				}
			}
		} catch(\Exception $e) {
			DB::rollback();
			return -1;
		}
			return 1;
	}
}
