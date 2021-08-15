<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
</head>
<body> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <p>{{$user}}</p>
                <a href="{{route('admin',['user'=>$user])}}" class='list-group-item list-group-item-action active'>หน้าร้าน</a>
                <a href="{{route('AdminHistory',['user'=>$user])}}" class='list-group-item list-group-item-action'>ประวัติการขาย</a>
                <a href="{{route('AdminStock',['user'=>$user])}}" class='list-group-item list-group-item-action'>สต็อกสินค้า</a>
                <a href="{{route('AdminMember',['user'=>$user])}}" class='list-group-item list-group-item-action'>พนักงาน</a>
                <a href="#" class='list-group-item list-group-item-action'>ออกจากระบบ</a>
            </div>
            <div class='col'>
                <h1>เพิ่มพนักงาน</h1>
                <form action='addmember.php' method='GET'>
                            <label>สมาชิค:</label></br>
                            <input type='text' placeholder="username" name='username' class="form-control"></br>
                            <label>รหัสผ่าน:</label></br>
                            <input type='password' placeholder="password"  name='password'class="form-control"></br>
                            <label>ชื่อ-สกุล:</label></br>
                            <input type='text' placeholder='ชื่อ-สกุล' name='Contect1' class="form-control"></br>
                            <label>เพศ :</label>
                            <input type="radio" class='form-check-input' name="sex" value="ชาย">
                            <label for="ชาย">ชาย</label>    
                            <input type="radio" class='form-check-input'  name="sex" value="หญิง">
                            <label for="หญิง">หญิง</label>
                            </br>
                            </br>
                            <label>ตำแหน่่ง :</label>
                            <input type="radio" class='form-check-input' name="status" value="staff">
                            <label for="staff">staff</label>    
                            <input type="radio" class='form-check-input'  name="status" value="owner">
                            <label for="owner">owner</label></br>
                            </br>
                            <label>เบอร์ติดต่อ:</label></br>
                            <input type='text' placeholder='เบอ ร์โทร' name='Contect2' class="form-control"></br>
                            <input type='submit' value='เพิ่มข้อมูล'  style='float:right;' class='btn btn-success'  >
                </form>
                </div>
            <div class="col">
                <h1>ผู้จัดการ</h1>
                <table  class='table table-striped'>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='width:20%;'>USER_ID</th>
                        <th style='width:10%;'>Position</th>
                        <th>Contect</th>
                        <th style='width:10%;'>edit</th>
                        <th style='width:10%;'>delete</th>
                    </tr>
                    @foreach ($owner as $row)
                    <tr style='vertical-align: top; border-bottom: 1px solid #ddd;'>
                        <td >{{$row->username}}</td>
                        <td >{{$row->status}}</td>
                        <td >{!! $row->contect !!}</td>
                        <td><a href='{{$row->id_user}}' class='btn btn-warning '>edit</a>
                        <td><a href='{{$row->id_user}}' class='btn btn-danger'>delete</a></td>
                        </tr>
                    @endforeach
                </table>

                <table  class='table table-striped'>
                    <h1>พนักงาน</h1>
                    <tr style='border-bottom: 1px solid #ddd;'>
                        <th style='width:20%;'>USER_ID</th>
                        <th style='width:10%;'>Position</th>
                        <th>Contect</th>
                        <th style='width:10%;'>edit</th>
                        <th style='width:10%;'>delete</th>
                    </tr>
                    @foreach ($staff as $row)
                    <tr style='vertical-align: top; border-bottom: 1px solid #ddd;'>
                        <td >{{$row->username}}</td>
                        <td >{{$row->status}}</td>
                        <td >{!! $row->contect !!}</td>
                        <td><a href='{{$row->id_user}}' class='btn btn-warning '>edit</a>
                        <td><a href='{{$row->id_user}}' class='btn btn-danger'>delete</a></td>
                        </tr>
                    @endforeach
                </table>
               
            </div>

        </div>
    </div>
   
</body>
</html>