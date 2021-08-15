<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('/bootstrap.css') }}"  type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <p>{{$user}}</p>
                <a href="{{route('member',['user'=>$user])}}" class='list-group-item list-group-item-action'>หน้าร้าน</a>
                
                <a href="{{route('memberHistory',['user'=>$user])}}" class='list-group-item list-group-item-action'>ประวัติการขาย</a>
                <a href="{{route('memberStock',['user'=>$user])}}" class='list-group-item list-group-item-action'>สต็อกสินค้า</a>
                <a href="{{route('memberMember',['user'=>$user])}}" class='list-group-item list-group-item-action'>พนักงาน</a>
                <a href="{{route('index')}}" class='list-group-item list-group-item-action'>ออกจากระบบ</a>
            </div>
            <div class="col">
                @foreach ($menu as $row)
                    <div style='width:24%;border-style: ridge;  border-radius: 10px; display: inline-block;'>
                    <center>    
                    {{$row->item_name;}}
                    <div>
                    <img src="{{$row->item_img;}}" style='width:60%; height: 19  0px;  border-radius: 10px; ' >
                    
                    </div>
                    </br>
                    <div>
                        @if($row->item_type_hot==1)
                        <a href="{{route('PushOrderM',['name'=> $row->item_name,'price'=>$row->item_price_hot,'type'=>'ร้อน','user'=>$user])}}" class='btn btn-outline-secondary'>ร้อน {{$row->item_price_hot}} .-</a>
                        @endif
                        @if($row->item_type_ice==1)
                        <a href="{{route('PushOrderM',['name'=> $row->item_name,'price'=>$row->item_price_ice,'type'=>'เย็น','user'=>$user])}}" class='btn btn-outline-secondary'>เย็น {{$row->item_price_ice}} .-</a>
                        @endif
                        @if($row->item_type_frappe==1)
                        <a href="{{route('PushOrderM',['name'=> $row->item_name,'price'=>$row->item_price_frappe,'type'=>'ปั่น','user'=>$user])}}" class='btn btn-outline-secondary'>ปั่น {{$row->item_price_frappe}} .-</a>
                        @endif
                    </div>
                    </center>
                    </div>
                @endforeach
            </div>
            <div class="col-2">
                <div class="row">
                    <table style="width:100%;" class='table table-striped' >
                        <tr  align='center' >
                        
                            <th>ชื่อ</th>
                            <th>ประเภท</th>
                            <th>ราคา</th>
                            <th>ยกเลิก</th>  
                        </tr>
                        @foreach ($order as $row)
                            <tr>
                                <td>{{$row->item_name;}}</td>
                                <td>{{$row->item_type;}}</td>
                                <td>{{$row->item_price;}}</td>
                                <td><a href="{{route('deleteOrderM',['id'=>$row->id_order,'user'=>$user]);}}"class='btn btn-danger'>ลบรายการ</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                
                <div class="row" style="bottom: 0">
                    <table >
                        <tr><td align="center" width=50%>
                    @if($sum == 0)
                    
                        <a href=""class='btn btn-success disabled' style="width: 100%" >ยืนยันออเดอร์</a>
                    @else
                        <a href="{{route('successOrderM',['user'=>$user])}}"class='btn btn-success'  style="width: 100%">ยืนยันออเดอร์</a>
                    @endif
                        </td>
                        <td align="center" width=50%>
                        <a href="{{route('cancelOrderM',['user'=>$user])}}"class='btn btn-danger ' style="width: 100%">ลบออเดอร์</a>
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>
        
        <div class="footer">
            <br><p>Copyright@2021 by Pakodev</p>
        </div>
    </div>
    
    
    
</body>
</html>