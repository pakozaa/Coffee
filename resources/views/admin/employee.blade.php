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
                <a href="{{route('admin',['user'=>$user])}}" class='list-group-item list-group-item-action active'>หน้าร้าน</a>
                <a href="{{route('AdminHistory',['user'=>$user])}}" class='list-group-item list-group-item-action'>ประวัติการขาย</a>
                <a href="{{route('AdminStock',['user'=>$user])}}" class='list-group-item list-group-item-action'>สต็อกสินค้า</a>
                <a href="{{route('AdminMember',['user'=>$user])}}" class='list-group-item list-group-item-action'>พนักงาน</a>
                <a href="{{route('index')}}" class='list-group-item list-group-item-action'>ออกจากระบบ</a>
            </div>
            <div class='col'>
                <h1>เพิ่มพนักงาน</h1>
                <form action='{{route('addMember')}}' method='GET'>
                    
                             <input type="text" name="user" value="{{$user}}" hidden>
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
                <br><br>
                <div id="editmember" style="display: none;">
                    <h1>แก้ไขข้อมูลพนักงาน</h1>
                    <form action='{{route('editMember')}}' method='GET'>
                        <input type="text" name="id" id='id' hidden>
                        <input type="text" name="user" id='user' hidden>
                        <label>สมาชิค:</label></br>
                        <input type='text' placeholder="username" name='username' id="username"class="form-control"></br>
                        <label>รหัสผ่าน:</label></br>
                        <input type='password' placeholder="password"  name='password' id="password" class="form-control"></br>
                        <label>ข้อมูลติดต่อ</label></br>
                        <input type='text' placeholder='ชื่อ-สกุล' name='contect' id="contect" class="form-control"></br>
                        <label>ตำแหน่ง:</label></br>
                        <input type='text' placeholder='เบอ ร์โทร' name='status' id='status' class="form-control"></br>
                        <input type='submit' value='ยืนยันแก้ไข'  style='float:right;' class='btn btn-success'  >
            </form>
                </div>
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
                        <td>{{$row->username}}</td>
                        <td>{{$row->status}}</td>
                        <td>{!! $row->contect !!}</td>
                        <td>
                            <a onclick="editfunction('{{$row->id_user}}','{{$user}}','{{$row->username}}','{{$row->password}}','{{$row->status}}','{{$row->contect}}')" class='btn btn-warning '>edit</a>
                        </td>
                        <td><a href='{{route('deleteMember',['id'=>$row->id_user,'user'=>$user])}}' class='btn btn-danger'>delete</a></td>
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
                        <script>
                            function editfunction(id,user,username,password,status,contect){
                                document.getElementById("id").value = id;      
                                document.getElementById("user").value = user;              
                                document.getElementById("username").value = username;
                                document.getElementById("password").value = password;                                
                                document.getElementById("status").value = status;
                                document.getElementById("contect").value = contect;                                
                                document.getElementById("editmember").style.display = "block";
                            }
                        </script>
                        <td>
                            <a onclick="editfunction('{{$row->id_user}}','{{$user}}','{{$row->username}}','{{$row->password}}','{{$row->status}}','{{$row->contect}}')"  class='btn btn-warning '>edit</a>
                        </td> 
                        <td><a href='{{route('deleteMember',['id'=>$row->id_user,'user'=>$user])}}' class='btn btn-danger'>delete</a></td>
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