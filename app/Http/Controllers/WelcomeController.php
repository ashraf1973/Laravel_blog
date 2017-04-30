<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $all_category_info = DB::table('tbl_category')
                ->where('publication_status', 1)
                ->get();
        $published_blog=DB::table('tbl_blog')
                 ->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
                ->where('tbl_blog.publication_status',1)
                ->select('tbl_blog.*', 'tbl_category.category_name')
                ->get();
        $home_content = view('pages.home')
                  ->with('all_blog', $published_blog);
        $category_content = view('pages.category')->with('all_category', $all_category_info);
        $recent_content = view('pages.recent');
        return view('master')
                        ->with('content', $home_content)
                        ->with('category', $category_content)
                        ->with('recent', $recent_content);
    }

    public function portfolio() {
        $portfolio_content = view('pages.portfolio');
        $recent_content = view('pages.recent');

        return view('master')
                        ->with('content', $portfolio_content)
                        ->with('recent', $recent_content);
    }

    public function services() {
        $all_category_info = DB::table('tbl_category')->where('publication_status', 1)->get();
        $service_content = view('pages.service');
        $category_content = view('pages.category')->with('all_category', $all_category_info);

        return view('master')
                        ->with('content', $service_content)
                        ->with('category', $category_content);
    }

    public function contact() {
        $all_category_info = DB::table('tbl_category')->where('publication_status', 1)->get();
        $contact_content = view('pages.contact');
        $category_content = view('pages.category')->with('all_category', $all_category_info);
        $recent_content = view('pages.recent');
        return view('master')
                        ->with('content', $contact_content)
                        ->with('category', $category_content)
                        ->with('recent', $recent_content);
    }
    public function blog_details($blog_id)
    {
       $blog_info=DB::table('tbl_blog')
               ->where('blog_id',$blog_id)
               ->first();
       $data=array();
       $data['hit_count']=$blog_info->hit_count+1;
       
       DB::table('tbl_blog')
               ->where('blog_id',$blog_id)
               ->update($data);


        $blog_info_by_id=DB::table('tbl_blog')
                ->join('tbl_category', 'tbl_blog.category_id', '=', 'tbl_category.category_id')
                ->where('tbl_blog.blog_id',$blog_id)
                ->select('tbl_blog.*', 'tbl_category.category_name')
                ->first();
         $all_category_info = DB::table('tbl_category')->where('publication_status', 1)->get();
        $category_content = view('pages.category')->with('all_category', $all_category_info);
        
         $blog_details=  view('pages.blog_details')
                ->with('blog_info',$blog_info_by_id);
         $recent_content = view('pages.recent');
    

        return view('master')
                 ->with('content', $blog_details)
                   ->with('recent', $recent_content)
                  ->with('category', $category_content);
    }

    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
