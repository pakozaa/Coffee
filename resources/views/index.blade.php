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
        <center>
        <div class="row" style="top:50%;width:50%;">            
                <h1>BEAR SO COFFEE SHOP</h1>
                <form action="{{route('login')}}" method="GET">
                    <label for="username">Usarname</label>
                    <br>
                    <input type="text" name="username" class="form-control"  >
                    <br>
                    <label for="password">Password</label>
                    <br>
                    <input type="password"  name="password" class="form-control">
                    <br>
                    <input type="submit" value="login" class="btn btn-success" style="width: 100%">
                </form>
         
          
        </div>
        <br>
        <p>admin[ID: pako1101 Password: pako1102]</p>
            
        <p>staff[ID: staff01 Password: 1234]</p>
        </center>
        
        <div class="footer">
            <br><p>Copyright@2021 by Pakodev</p>
        </div>
    </div>
</body>
</html>