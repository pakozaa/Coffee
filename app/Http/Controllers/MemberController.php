<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
    function index(Request $request){
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function pushOrderM(Request $request){
        DB::table('order')->insert(
            ['id_order'=>NULL,
            'item_name'=>$request->name,
            'item_type'=>$request->type,
            'item_price'=>$request->price,
            ]
        );
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
    return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function deleteOrderM(Request $request){
        DB::table('order')->where('id_order',$request->id)->delete();        
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function cancelOrderM(Request $request){
        DB::table('order')->delete();        
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function successOrderM(Request $request){
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        date_default_timezone_set("Asia/Bangkok");  
        $date= date("Y-m-d h:i:s");
        $user=$request->user;
        
        foreach($order as $row){
            $list = $row->item_name;
            $type = $row->item_type;
            $price= $row->item_price;
            DB::table('history')->insert(
                [
                'id_order_history'=>NULL,
                'list'=>$list,
                'type'=>$type,
                'price'=>$price,
                'staff'=>$user,
                'datetime'=>$date,
                ]
            );
        }
        DB::table('order')->delete();     
        $sum = DB::table('order')->get()->sum('item_price');        
        $order = DB::table('order')->select('*')->get();
        return view('member.member', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function memberHistory(Request $request){}
    
    function memberMember(Request $request){}
    
    function memberStock(Request $request){
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();
        $menu = DB::table('menu')->select('*')->get();
        return view('member.memberStock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    
    function updateStockM(Request $request){
        DB::table('stock')
        ->where('item',$request->item)
        ->where('type',$request->type)
        ->update(['qly' =>$request->qly]);
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();  
        $menu = DB::table('menu')->select('*')->get();
        return view('member.memberStock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    

}
