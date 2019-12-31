<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style type="text/css">
    #main{
      background-color: #333;
      width: 600px;
      height: 350px;
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
    <title>Signup here</title>
  </head>
  <body id="back"  background="back.jpg">
    <center>
      <div id="main">


      <h1>SignUp</h1>
    <form class="" action="" method="post">
      <input type="text" name="uname" class="text" placeholder="Username"><br><hr><br>
      <input type="email" name="Email" class="text" placeholder="Email"><br><hr><br>
      <input type="tel" name="MobileNumber" class="text" placeholder="Mobile Number"><br><hr><br>
      <input type="password" name="password" class="text" placeholder="password"><br><hr><br>
      <input type="submit" name="submit" value="SignUp"id="sub">

    </form>
      </div>
  </body>
</html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="lost&founddetails";
$conn=mysqli_connect($servername,$username,$password,$dbname);
error_reporting(0);

mysqli_query($conn,$query);
if ($_POST['submit'])
{
  $un=$_POST['uname'];
  $em=$_POST['Email'];
  $mn=$_POST['MobileNumber'];
  $pw=$_POST['password'];
  if ($un!="" && $em!="" && $mn!="" && $pw!="")
   {
    $query="INSERT INTO INFO VALUES('$un','$em','$mn','$pw')";
    $data=mysqli_query($conn,$query);
    if($data)
    {
      echo"thanks for signin";
    }
  }
  else {
    echo "All fields are required";
  }
}


 ?>
