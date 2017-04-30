<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

session_start();

use DB;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        
    }

    public function index() {
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('/admin-panel')->send();
        }
        $dashboard_content = view('admin.pages.dashboard_content');
        return view('admin.admin_master')
                        ->with('admin_content', $dashboard_content);
    }

    public function add_category() {
        $category_content = view('admin.pages.add_category');
        return view('admin.admin_master')->with('admin_content', $category_content);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->categroy_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Save Category Information Successfully');
        return Redirect::to('/add-category');
    }

    public function manage_category() {
        $category_info = DB::table('tbl_category')->get();
        $manage_content = view('admin.pages.manage_category')->with('all_category_info', $category_info);
        return view('admin.admin_master')->with('admin_content', $manage_content);
    }
    public  function unpublished_category($category_id)
    {
       DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
        return Redirect::to('/manage-category');
        
    }
     public  function published_category($category_id)
    {
       DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
        return Redirect::to('/manage-category');
        
    }
    public function delete_category($category_id)
    {
       DB::table('tbl_category')
               ->where('category_id',$category_id)
               ->delete(); 
         return Redirect::to('/manage-category');
        
    }
    public function edit_category($category_id)
    {
        $category_info = DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->get();
        $edit_content = view('admin.pages.edit_category')->with('all_category_info', $category_info);
        return view('admin.admin_master')->with('admin_content', $edit_content);
        
    }
    public function update_category(Request $request)
    {
       $data = array();
        $category_id=$request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->categroy_description;
        $data['publication_status'] = $request->publication_status;
        
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        
        Session::put('message', 'Update Category Information Successfully');
        return Redirect::to('/edit-category/'.$category_id);  
    }
    public  function add_blog()
    {
        $category_info = DB::table('tbl_category')
                ->where('publication_status',1)
                ->get();
        $blog_content = view('admin.pages.add_blog')
                ->with('category_info', $category_info);
        return view('admin.admin_master')
                ->with('admin_content', $blog_content); 
    }
public  function save_blog(Request $request)
{
    $data = array();
        $data['blog_title'] = $request->blog_title;
        $data['category_id'] = $request->category_id;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['publication_status'] = $request->publication_status;
        $data['author_name'] = $request->author_name;
        $image=$request->file('blog_image');
        if($image){
            $image_name=  str_random(20);
            $ext=  strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='blog_image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['blog_image']=$image_url;
                DB::table('tbl_blog')->insert($data);
                Session::put('message', 'Save blog Information Successfully');
                return Redirect::to('/add-blog');
            }
            
        }
      else{
                DB::table('tbl_blog')->insert($data);
                Session::put('message', 'Save blog Information Successfully');
                return Redirect::to('/add-blog');
      }
        
}
public function manage_blog()
{
     $blog_info = DB::table('tbl_blog')
                          ->get();
     $manage_content = view('admin.pages.manage_blog')
                         ->with('all_blog_info', $blog_info);
     return view('admin.admin_master')
                         ->with('admin_content', $manage_content);
}
    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('message', 'You are successfully logout');
        return Redirect::to('/admin-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
