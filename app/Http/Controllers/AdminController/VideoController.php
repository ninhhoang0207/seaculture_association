<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Video;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use Input;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        return view('admin.video.index');
    }

    public function get_video_data() {
        $data = Video::select(['id','title','created_at']);
        // $data = Video::all();
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
            $data = Video::where('id',$id)->get(['id','title'])->first();
            return $data;
        } 
        return -1;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $video= Input::file('url');
        $filename = $video->getClientOriginalName();
        $path = public_path().'/videos/';
        return $file->move($path, $filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function delete($id = -1) {
    //     DB::beginTransaction();
    //     try {
    //         $video = Video::where('id',$id)->get(['title'])->first();
    //         $delete_video = Video::where('id',$id)->delete();
    //         // $delete_news_category = NewsCategoryModel::where('news_id',$id)->delete();
    //         DB::commit();
    //         if (isset($images)) {
    //             if (file_exists(public_path('images/news/1/').$images)) {
    //                 unlink(public_path('images/news/1/').$images);
    //             }
    //         }
    //     } catch(\Exception $e) {
    //         DB::rollback();
    //         return -1;
    //     }
    //         return 1;
    // }
}
