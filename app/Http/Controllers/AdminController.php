<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
//use db;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function auth_status()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id != NULL)
        {
            return Redirect::to('/dashboard')->send();
        }
    }

    public function index()
    {
        $this->auth_status();
        return view('admin.admin_login');
    }

    public function adminLoginCheck(Request $request)
    {
        $email_address=$request -> email_address;
        $admin_password=$request -> admin_password;
        $admin_info = DB:: table('tbl_admin')
                     ->select ('*')
                     ->where ('email_address',$email_address)
                     ->where ('admin_password',md5($admin_password))
                     ->first();

        // echo '<pre>';
        // print_r($admin_info);
        // exit();
        if($admin_info){
            Session::put('admin_id', $admin_info->admin_id);
            Session::put('admin_name', $admin_info->admin_name);
            return Redirect::to ('/dashboard');
        }
        else{

             Session::put('exception', 'User ID or Password Invalid');            
             return Redirect::to ('/admin-panel');
        }
        //return view('admin.admin_master');


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
