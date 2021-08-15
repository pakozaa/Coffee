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
                <h1>ผู้จัดการ</h1>
                <table  class='table table-striped'>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='width:20%;'>USER_ID</th>
                        <th style='width:10%;'>Position</th>
                        <th>Contect</th>
                    </tr>
                    @foreach ($owner as $row)
                    <tr style='vertical-align: top; border-bottom: 1px solid #ddd;'>
                        <td>{{$row->username}}</td>
                        <td>{{$row->status}}</td>
                        <td>{!! $row->contect !!}</td>
                     
                    </tr>
                    @endforeach
                </table>

                <table  class='table table-striped'>
                    <h1>พนักงาน</h1>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='width:20%;'>USER_ID</th>
                        <th style='width:10%;'>Position</th>
                        <th>Contect</th>
                     
                    </tr>
                    @foreach ($staff as $row)
                    <tr style='vertical-align: top; border-bottom: 1px solid #ddd;'>
                        <td >{{$row->username}}</td>
                        <td >{{$row->status}}</td>
                        <td >{!! $row->contect !!}</td>
                       
                   
                        </tr>
                    @endforeach
                </table>
               
            </div>
        </div>
        
        <div class="footer">
            <br><p>Copyright@2021 by Pakodev</p>
        </div>
    </div>
</body>
</html>