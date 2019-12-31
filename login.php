<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style type="text/css">
    #main{
      background-color: #333;
      width: 600px;
      height: 300px;
      border-radius: 30px;
    }
    h1{
      color: white;
      background-color: black;
      border-top-right-radius: 30px;
      border-top-left-radius: 30px;
    }
    .text{
      background-color: #333;
      color: white;
      width: 250px;
      font-weight: bold;
      font-size: 20px;
      border: none;
    }
    .text:focus{
      outline:none;
    }
    hr{
      width: 250px;
      margin-top: 0px !important;
    }
    #sub{
      width: 250px;
      height: 30px;
      background-color: #5f5;
      border: none;
    }
    #back{

      background-image: <image src="back.jpg">
    }
    </style>

    <meta charset="utf-8">
    <title></title>

  </head>
  <body id="back" background="back.jpg">
    <center>
    <div id="main">

<h1>Login</h1>
<form class="" action="#" method="POST">
  <input type="text" name="uname" class="text" placeholder="Username"><br><hr><br>
  <input type="password" name="password" class="text" placeholder="password"><br><hr><br>
  <input type="submit" value="Login"id="sub">
</form>
</div>
  </body>
</html>
<?php
$uname=$_POST['uname'];
$password=$_POST['password'];

$servername="localhost";
$username="root";
$password="";
$dbname="lost&founddetails";
$conn=mysqli_connect($servername,$username,$password,$dbname);
error_reporting(0);
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/



$query="select * from 'info' where username='$uname' AND password='$password'";
$res=mysqli_query($conn,$query);
//$count=mysqli_num_rows($res);
if($res)
{ if(mysqli_num_rows($res)>0)
  {

    $_SESSION['username']=$uname;
      $_SESSION['password']=$password;
      header("location:index.html");

  }
  //echo "Login succesfull";

}
else
 {
  echo "<div class='alert alert-warning'><strong>warning!</strong>login not succesfull...</div>";
//  header("refresh:2;url=login.php")  ;
}
 ?>
