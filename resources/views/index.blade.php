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
    <form action="{{route('login')}}" method="GET">
        <label for="username">Usarname</label>
        <input type="text" class="" name="username">
        <br>
        <label for="password">Password</label>
        <input type="password" class="" name="password">
        <br>
        <input type="submit" value="login" class="btn btn-success">
    </form>
</body>
</html>