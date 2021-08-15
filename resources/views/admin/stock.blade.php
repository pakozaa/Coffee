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
            <div class="col">
                <table class='table table-striped' style='width :100%;'>
                    <tr><th>รายการ</th><th>จำนวน</th><th>ประเภท</th><th>update</th><th>delete</th></tr>
                @foreach ($item as $row)
                <form method='GET' action='{{route('updateStock')}}'>
                    
                <tr>
                    <input type="text" name="user" value="{{$user}}" hidden>
                    <td><input readonly class='form-control-plaintext' type='text'value='{{$row->item}}' name='item' id='item' ></td>
                    <td><input class='form-control' type='number' name='qly' id='qly' min='0'value='{{$row->qly}}'></td>
                    <td><input readonly class='form-control-plaintext' type='text'value='{{$row->type}}' name='type' id='type' ></td>
                    <td><input type='submit' class='btn btn-outline-secondary' value='อัพเดท'></td>
                    <td><a href='{{route('deleteStock',['user'=>$user,'id'=>$row->id_stock])}}' class='btn btn-danger'>ลบ</a></td>
                </tr>
                </form>
                @endforeach
            </table>
            </div>
            <div class="col">
                <hr>
        <center>
            <h1>เพิ่มข้อมูลสต็อก</h1></center>
            <hr>
                <form action='{{route('addstock')}}' method='GET'>
                    <input type="text" name="user" value="{{$user}}" hidden>
                    <label>รายการ:</label></br>
                    <input type='text' placeholder="ชื่อรายการ" name='item' class="form-control"></br>
                    <label>จำนวน:</label></br>
                    <input type='number' placeholder="จำนวน"  name='qly'class="form-control"></br>
                    <label>ประเภท:</label></br>
                    <input type='text' placeholder='ถุง กระป๋อง etc' name='type' class="form-control">
                </br>
                    <input type='submit' value='เพิ่มข้อมูล'  style='float:right;' class='btn btn-success'  >
                </form>
                <br><br>
                
            </div>
        <div class="col">
            <hr>
        <center><h1>จัดการเมนูร้าน</h1></center>
            <hr>
                <h1>เพิ่มรายการสินค้าสำหรับขาย</h1>
                <form action='{{route('addMenu')}}' method='GET'>
                    <input type="text" name="user" value="{{$user}}" hidden>
                    <label>รูปภาพ:</label></br>
                    <input type='text' placeholder="url รูปภาพ" name='url'class="form-control"></br>
                    <label>ชื่อสินค้า:</label></br>
                    <input type='text' placeholder="ชื่อสินค้า" name='item' class="form-control"></br>
                    <div class='row'>
                    <div class='col'>         
                        <input type="hidden" name="hot" value="0" />
                        <input type="checkbox" name="hot" value="1"  class="form-check-input"/>
                        <label>ร้อน</label>
                        <label>ราคา</label>
                        <input type='number' placeholder='ราคาสินค้า'name='hot_price' class="form-control" value='0'>
                    </div>
                    <div class='col'>               
                        <input type="hidden" name="ice" value="0" />
                        <input type="checkbox" name="ice" value="1"  class="form-check-input"/>
                        <label>เย็น</label>
                        <label>ราคา</label>
                        <input type='number' placeholder='ราคาสินค้า' name='ice_price'class="form-control"  value='0'>
                    </div>
                    <div class='col'>
                        <input type="hidden" name="frappe" value="0" />
                        <input type="checkbox" name="frappe" value="1"  class="form-check-input"/>
                        <label>ปั่น</label>
                        <label>ราคา</label>
                        <input type='number' placeholder='ราคาสินค้า' name='frappe_price'class="form-control"  value='0'>
                    </div>
                </div>
            </br>
            <input type='submit'   style='float:right;' value='เพิ่มสินค้า' class='btn btn-success'>
                </form>
            <br><br><hr>
            <h1>ลบรายการสินค้าสำหรับขาย</h1>

                <form action='{{route('deleteMenu')}}' method='GET'>
                    <input type="text" name="user" value="{{$user}}" hidden>
                <label>รายการ:</label></br>
                <select name='item' class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                    
                <option selected>Choose...</option>
                @foreach ($menu as $row)
                <option value='{{$row->id_item}}'>{{$row->item_name}}</option>
                @endforeach
               
            </select>
        </br>
            <input type='submit' value='ลบสินค้า' style='float:right;' class='btn btn-danger' onclick='return confirm("ต้องการลบสินค้า ?")'>   
        </form>
        </div>
        </div>
        
        <div class="footer">
            <br><p>Copyright@2021 by Pakodev</p>
        </div>
    </div>    
</body>

</html>