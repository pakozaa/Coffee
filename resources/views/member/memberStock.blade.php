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
                <table class='table table-striped' style='width :100%;'>
                    <tr><th>รายการ</th><th>จำนวน</th><th>ประเภท</th><th>update</th></tr>
                @foreach ($item as $row)
                <form method='GET' action='{{route('updateStockM')}}'>
                    
                <tr>
                    <input type="text" name="user" value="{{$user}}" hidden>
                    <td><input readonly class='form-control-plaintext' type='text'value='{{$row->item}}' name='item' id='item' ></td>
                    <td><input class='form-control' type='number' name='qly' id='qly' min='0'value='{{$row->qly}}'></td>
                    <td><input readonly class='form-control-plaintext' type='text'value='{{$row->type}}' name='type' id='type' ></td>
                    <td><input type='submit' class='btn btn-outline-secondary' value='อัพเดท'></td>
                </tr>
                </form>
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