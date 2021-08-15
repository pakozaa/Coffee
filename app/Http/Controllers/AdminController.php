<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    #########################################################################################################################
    function index(Request $request){
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function pushOrder(Request $request){
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
    return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function deleteOrder(Request $request){
        DB::table('order')->where('id_order',$request->id)->delete();        
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function cancelOrder(Request $request){
        DB::table('order')->delete();        
        $menu = DB::table('menu')->select('*')->get();
        $order = DB::table('order')->select('*')->get();
        $sum = DB::table('order')->get()->sum('item_price');
        return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }
    function successOrder(Request $request){
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
        return view('admin.admin', ['menu' => $menu,'order'=>$order,'sum'=>$sum,'user'=>$request->user]);
    }

    #########################################################################################################################
    function stock(Request $request){
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();
        $menu = DB::table('menu')->select('*')->get();
        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    function deleteMenu(Request $request){
        DB::table('menu')
        ->where('id_item',$request->item)
        ->delete(); 
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();  
        $menu = DB::table('menu')->select('*')->get();
        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
     
    function addstock(Request $request){
       
        DB::table('stock')->insert(
            ['id_stock'=>NULL,
            'item'=>$request->item,
            'qly'=>$request->qly,
            'type'=>$request->type
            ]
        );
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();
        $menu = DB::table('menu')->select('*')->get();

        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    function addMenu(Request $request){
       
        DB::table('menu')->insert(
            ['id_item'=>NULL,
            'item_img'=>$request->url,
            'item_name'=>$request->item,
            'item_type_hot'=>$request->hot,
            'item_type_ice'=>$request->ice,
            'item_type_frappe'=>$request->frappe,
            'item_price_hot'=>$request->hot_price,
            'item_price_ice'=>$request->ice_price,
            'item_price_frappe'=>$request->frappe_price,
            ]
        );
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();
        $menu = DB::table('menu')->select('*')->get();

        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    function updateStock(Request $request){
        DB::table('stock')
        ->where('item',$request->item)
        ->where('type',$request->type)
        ->update(['qly' =>$request->qly]);
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();  
        $menu = DB::table('menu')->select('*')->get();
        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    function deleteStock(Request $request){
        DB::table('stock')
        ->where('id_stock',$request->id)
        ->delete(); 
        $item = DB::table('stock')
        ->select('*')
        ->orderBy('item','asc')
        ->get();  
        $menu = DB::table('menu')->select('*')->get();
        return view('admin.stock',['user'=>$request->user,'item'=>$item,'menu'=>$menu]);
    }
    
    #########################################################################################################################
    
    function deletehistory(Request $request){
        DB::table('history')->where('id_order_history',$request->id)->delete();        
        $monthSelect=$request->monthSelect;
        $historyList = DB::table('history')->select('*')->get();
        $today=date("Y-m-d");
        $sumSaleMonth=array("");
        $monthAr = array('','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        if($request->monthSelect){
            $monthS=date("Y-$monthSelect-1");
            $nextmonthS = date('Y-m-d',strtotime($monthS . "+1 months"));
            $monthShow = DB::table('history')   
             ->where('datetime','>=',$monthS)
             ->where('datetime','<',$nextmonthS)
             ->get();
            }
        else{
            $monthS=date("Y-m-1");
            $nextmonthS = date('Y-m-d',strtotime($monthS . "+1 months"));
            $monthShow = DB::table('history')   
             ->where('datetime','>=',$monthS)
             ->where('datetime','<',$nextmonthS)
             ->get();
            }
        
        for ($i = 1; $i <= 12; $i++){
             $month=date("Y-$i-1");
             $nextmonth = date('Y-m-d',strtotime($month . "+1 months"));
             $monthHistory = DB::table('history')   
             ->where('datetime','>=',$month)
             ->where('datetime','<',$nextmonth)
             ->get()
             ->sum('price');
            array_push($sumSaleMonth,$monthHistory);
        }
        $tomorrow = date('Y-m-d',strtotime($today . "+1 days"));
        
        $sum = DB::table('history')
        ->where('datetime','>=',$today)
        ->where('datetime','<',$tomorrow)
        ->get()
        ->sum('price');
        $staff_sale = DB::table('history')
        ->select('staff',DB::raw('sum(price) as total'))   
        ->groupBy('staff')
        ->get();
        $todayHistory = DB::table('history')
        ->select("*")
        ->where('datetime','>=',$today)
        ->where('datetime','<',$tomorrow)
        ->get();
        return view('admin.history',['sum'=>$sum,'user'=>$request->user,'historyList'=>$historyList,'todayHistory'=>$todayHistory,'SumMonth'=>$sumSaleMonth,'monthAr'=> $monthAr,'today'=>$today,'monthShow'=>$monthShow]);
    }
    
    function history(Request $request){
        $monthSelect=$request->monthSelect;
        $historyList = DB::table('history')->select('*')->get();
        $today=date("Y-m-d");
        $sumSaleMonth=array("");
        $monthAr = array('','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        if($request->monthSelect){
            $monthS=date("Y-$monthSelect-1");
            $nextmonthS = date('Y-m-d',strtotime($monthS . "+1 months"));
            $monthShow = DB::table('history')   
             ->where('datetime','>=',$monthS)
             ->where('datetime','<',$nextmonthS)
             ->get();
            }
        else{
            $monthS=date("Y-m-1");
            $nextmonthS = date('Y-m-d',strtotime($monthS . "+1 months"));
            $monthShow = DB::table('history')   
             ->where('datetime','>=',$monthS)
             ->where('datetime','<',$nextmonthS)
             ->get();
            }
        
        for ($i = 1; $i <= 12; $i++){
             $month=date("Y-$i-1");
             $nextmonth = date('Y-m-d',strtotime($month . "+1 months"));
             $monthHistory = DB::table('history')   
             ->where('datetime','>=',$month)
             ->where('datetime','<',$nextmonth)
             ->get()
             ->sum('price');
            array_push($sumSaleMonth,$monthHistory);
        }
        $tomorrow = date('Y-m-d',strtotime($today . "+1 days"));
        
        $sum = DB::table('history')
        ->where('datetime','>=',$today)
        ->where('datetime','<',$tomorrow)
        ->get()
        ->sum('price');
        $staff_sale = DB::table('history')
        ->select('staff',DB::raw('sum(price) as total'))   
        ->groupBy('staff')
        ->get();
        $todayHistory = DB::table('history')
        ->select("*")
        ->where('datetime','>=',$today)
        ->where('datetime','<',$tomorrow)
        ->get();
        return view('admin.history',['sum'=>$sum,'user'=>$request->user,'historyList'=>$historyList,'todayHistory'=>$todayHistory,'SumMonth'=>$sumSaleMonth,'monthAr'=> $monthAr,'today'=>$today,'monthShow'=>$monthShow]);
    }
    ##################################################################################################################
    function employee(Request $request){
        $owner = DB::table('member')
        ->select('*')
        ->where('status','owner')
        ->get();
        $staff = DB::table('member')
        ->select('*')
        ->where('status','staff')
        ->get();
    
        return view('admin.employee',['user'=>$request->user,'owner'=>$owner,'staff'=>$staff]);
    }
    
    function editMember(Request $request){
        DB::table('member')
        ->where('id_user',$request->id)
        ->update(
            ['username'=>$request->username,
            'password'=>$request->password,
            'contect'=>$request->contect,
            'status'=>$request->status
        ]);
        $owner = DB::table('member')
        ->select('*')
        ->where('status','owner')
        ->get();
        $staff = DB::table('member')
        ->select('*')
        ->where('status','staff')
        ->get();
    
        return view('admin.employee',['user'=>$request->user,'owner'=>$owner,'staff'=>$staff]);
    }
    
    function deleteMember(Request $request){
        DB::table('member')
        ->where('id_user',$request->id)
        ->delete();
        $owner = DB::table('member')
        ->select('*')
        ->where('status','owner')
        ->get();
        $staff = DB::table('member')
        ->select('*')
        ->where('status','staff')
        ->get();
    
        return view('admin.employee',['user'=>$request->user,'owner'=>$owner,'staff'=>$staff]);
    }
    function addMember(Request $request){
        $contect = ($request->Contect1."<br>".$request->sex."<br>".$request->Contect2);
        DB::table('member')
        ->insert(
            ['id_user'=>NULL,
            'username'=>$request->username,
            'password'=>$request->password,
            'contect'=>$contect,
            'status'=>$request->status
        ]);
        $owner = DB::table('member')
        ->select('*')
        ->where('status','owner')
        ->get();
        $staff = DB::table('member')
        ->select('*')
        ->where('status','staff')
        ->get();
    
        return view('admin.employee',['user'=>$request->user,'owner'=>$owner,'staff'=>$staff]);
    }
    
}
