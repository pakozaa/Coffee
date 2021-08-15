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
    <div class='container-fluid'>
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
                <h2>ยอดขายวันนี้ : {{$today}} รวม {{$sum}} บาท</h2>
                <table class='table table-striped'>
                    <tr>
                        <th>วันที่</th>
                        <th>รายการ</th>
                        <th>ประเภท</th>
                        <th>ราคา</th>
                        <th>พนักงานขาย</th>
                    </tr>
                @foreach ($todayHistory as $row)
                <tr>
                    <td>{{$row->datetime;}}</td>
                    <td>{{$row->list;}}</td>
                    <td>{{$row->type;}}</td>
                    <td>{{$row->price;}} บาท</td>
                    <td>{{$row->staff;}}</td>
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