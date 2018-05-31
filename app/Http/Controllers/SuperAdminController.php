<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function auth_check()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id == NULL)
        {
            return Redirect::to('/admin-panel')->send();
        }
        // echo "In Auth";
        // exit();
    }

    public function index()
    {
        $this->auth_check();
        $admin_main_content=view('admin.pages.admin_dashboard');
        return view('admin.admin_master')
                    ->with('admin_main_content',$admin_main_content);
    }

    public function add_category()
    {
        $this->auth_check();
        $add_category=view('admin.pages.add_category');
        return view('admin.admin_master')
                    ->with('admin_main_content',$add_category);
    }

    public function manage_category()
    {
        $this->auth_check();        
        $all_category=DB::table('tbl_category')
                                    ->get();
         
        $manage_category=view('admin.pages.manage_category')
                    ->with('all_category',$all_category);
        return view('admin.admin_master')
                    ->with('admin_main_content',$manage_category);
    }

    public function unpublished_category($category_id)
    {
        //echo $category_id;
        $data=array();
        $data['publication_status']=1;
        DB::table('tbl_category')
                //->set('publication_status',0)  //doesn't work
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }

    public function published_category($category_id)
    {
        //echo $category_id;
        $data=array();
        $data['publication_status']=0;
        DB::table('tbl_category')
                //->set('publication_status',0)  //doesn't work
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }

    public function delete_category($category_id)
    {
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();
        return Redirect::to('/manage-category');
    }
    public function archive_category()
    {
        $this->auth_check();
        $archive_category=view('admin.pages.archive_category');
        return view('admin.admin_master')
                    ->with('admin_main_content',$archive_category);
    }
    /*
    * For Save category
    */
    public function save_category(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        DB::table('tbl_category')
                ->insert($data);
        Session::put('message', "save category information successfully !!");
        return Redirect::back();
    }

    public function edit_category($category_id)
    {    
        $category_info=DB::table('tbl_category')
                            ->where('category_id',$category_id)
                            ->first();
         
        $edit_category=view('admin.pages.edit_category')
                    ->with('category_info',$category_info);
        return view('admin.admin_master')
                    ->with('admin_main_content',$edit_category);
    }

    public function update_category(Request $request,$category_id )
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        // echo '<pre>';
        // var_dump($data);
        // exit();

            DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }

    public function add_blog()
    {
        $this->auth_check();
        $all_published_category=DB::table('tbl_category')
                                ->where('publication_status',1)
                                ->get();
        $add_blog=view('admin.pages.add_blog')
                            ->with('all_published_category',$all_published_category);
        return view('admin.admin_master')
                    ->with('admin_main_content',$add_blog);
    }

    public function logout(){
        Session::put('admin_id','');
        Session::put('admin_name','');
        Session::put('message','You are successfully logout !');
        return Redirect::to('/admin-panel');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
