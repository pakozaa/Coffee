<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
</head>
<body>
    <p>{{$user}}</p>
    <a href="{{route('admin',['user'=>$user])}}" class='list-group-item list-group-item-action active'>หน้าร้าน</a>
    <a href="{{route('AdminHistory',['user'=>$user])}}" class='list-group-item list-group-item-action'>ประวัติการขาย</a>
    <a href="{{route('AdminStock',['user'=>$user])}}" class='list-group-item list-group-item-action'>สต็อกสินค้า</a>
    <a href="{{route('AdminMember',['user'=>$user])}}" class='list-group-item list-group-item-action'>พนักงาน</a>
    <a href="#" class='list-group-item list-group-item-action'>ออกจากระบบ</a>
</body>
</html>