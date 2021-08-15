<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function index(){
        return view('index');
    }
    function login(Request $request){
        $username=$request->username;
        $password=$request->password;
        $member_count=DB::table('member')->select('*')
        ->where('username',$username)
        ->where('password',$password)
        ->count();
        if($member_count!=0){ 
            $member=DB::table('member')->select('*')
            ->where('username',$username)
            ->where('password',$password)
            ->get();
            foreach ($member as $row){
                
                if($row->status=="owner"){
                    
                    $menu = DB::table('menu')->select('*')->get();
                    $order = DB::table('order')->select('*')->get();
                    $sum = DB::table('order')->get()->sum('item_price');
                    return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$row->username]);
                }
                else if($row->status=="staff"){
                    $menu = DB::table('menu')->select('*')->get();
                    $order = DB::table('order')->select('*')->get();
                    $sum = DB::table('order')->get()->sum('item_price');
                    return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$row->username]);
                  
                }
                else{
                    return(view('index'));
                }
            }
        }
        else{
            return(view('index'));
        }
    }
}
