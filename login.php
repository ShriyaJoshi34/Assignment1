<?php
include 'connect.php';
session_start();

$data = new Dbh;

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $name = stripslashes($name);
    $pass = stripslashes($pass);
    
    $conn=$data->connect();
    $name = mysqli_real_escape_string($conn,$name);
    $pass = mysqli_real_escape_string($conn,$pass);

    $logg = $data->login($name,$pass,$conn);

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>Documents</title>
</head>
<body>
    <div class="text-center">
    <div class="card">
    <div class="card-body" style="background-color:#9932CC	">
        <h1 style="margin-top:10px ; color: #E6E6FA ;font-family:Cursive">Movies !!</h1>
        </div></div><br><br>
        <h4 style="font-family:Cursive">Login Here!</h4>
        <div class="container">
            <div class="login-box">
            <form action="login.php" method="POST">
            <div class = "form-group" >
            <label style="font-size:25px;margin-top:50px ;font-family:Cursive">Username</label><br><br>
            <input  type="text" name="username" class="form-control"><br><br>
            </div>
            <div class = "form-group">
            <label style="font-size:25px;font-family:Cursive">Password</label><br><br>
            <input type="text" name="password" class="form-control"><br><br>
            </div>
            <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-info" style="font-family:Cursive">SUBMIT</button>
            </div>
            
            </form>
        </div>
        </div>

    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>