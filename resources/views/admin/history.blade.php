<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
</head>
<body>     
    <div class='container-fluid'>
        <div class="row">
            <div class="col-2">
                <p>{{$user}}</p>
                <a href="{{route('admin',['user'=>$user])}}" class='list-group-item list-group-item-action active'>หน้าร้าน</a>
                <a href="{{route('AdminHistory',['user'=>$user])}}" class='list-group-item list-group-item-action'>ประวัติการขาย</a>
                <a href="{{route('AdminStock',['user'=>$user])}}" class='list-group-item list-group-item-action'>สต็อกสินค้า</a>
                <a href="{{route('AdminMember',['user'=>$user])}}" class='list-group-item list-group-item-action'>พนักงาน</a>
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
                        <th>ลบข้อมูล</th>
                    </tr>
                @foreach ($todayHistory as $row)
                <tr>
                    <td>{{$row->datetime;}}</td>
                    <td>{{$row->list;}}</td>
                    <td>{{$row->type;}}</td>
                    <td>{{$row->price;}} บาท</td>
                    <td>{{$row->staff;}}</td>
                    <td><a href="{{route('deletehistory',['id'=>$row->id_order_history,'user'=>$user]);}}"class='btn btn-danger'>ลบข้อมูล</a></td>
                </tr>
                @endforeach
                </table>
                
            </div>
            <div class="col">
                
                <form action="{{route('AdminHistory',['user'=>$user])}}" method="GET">
                    <h2><label>ยอดขายรายเดือน </label>
                    <label> กรุณาเลือกเดือนที่ต้องการ : </label>
                    <input type="text" name="user"  value="{{$user}}" hidden>
                    <select name="monthSelect" id="monthSelect" class="btn btn-secondary dropdown-toggle">
                        <option value="">This Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March	</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                    <input type="submit" value="ยืนยัน" class="btn btn-success "></h2>
                </form>
                <table class='table table-striped'>
                    <tr align="center">
                        <th>วันที่</th>
                        <th>รายการ</th>
                        <th>ประเภท</th>
                        <th>ราคา</th>
                        <th>พนักงานขาย</th>
                        <th>ลบข้อมูล</th>
                    </tr>
                @foreach ($monthShow as $row)
                <tr align="center">
                    <td>{{$row->datetime;}}</td>
                    <td>{{$row->list;}}</td>
                    <td>{{$row->type;}}</td>
                    <td>{{$row->price;}} บาท</td>
                    <td>{{$row->staff;}}</td>
                    <td><a href="{{route('deletehistory',['id'=>$row->id_order_history,'user'=>$user]);}}"class='btn btn-danger'>ลบข้อมูล</a></td>
                </tr>
                @endforeach
                </table>
                
            </div>
            <div class="col-1">
                <h2>ยอดรายปี</h2>
                <table class='table table-striped'>
                    <tr><th>เดือน</th><th colspan="2">ยอดขาย</th></tr>
                    @for ($i = 1; $i <= 12; $i++)
                        <tr>
                            <td>{{$monthAr[$i]}}</td>
                            <td>{{$SumMonth[$i]}}</td>
                            <td>บาท</td>
                        <tr>
    
                    @endfor
                    </table>
    
            </div>
        </div>
    </div>
    
</body>
</html>