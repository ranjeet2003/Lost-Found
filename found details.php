<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style type="text/css">
    #main{
      background-color: #333;
      width: 620px;
      height: 430px;
      border-radius: 30px;
    }

    h1{
      color: white;
      background-color: black;
      border-top-right-radius: 30px;
      border-top-left-radius: 30px;
    }
    h3{
      color: white;
    background-color: black;
    border-bottom-right-radius: 30px;
    border-bottom-left-radius: 30px;

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
    <title>Found Details</title>
  </head>

  <body id="back"  background="back.jpg" >
    <center>
      <div id="main">


      <h1> please Enter Details what you found</h1>

          <h3>Please provide what you found so that we can return it to the right person .</h3>



      <form class="" action="index.html" method="post" enctype="multipart/form-data" onSubmit="alert('Our team thanks you for helping someone !')">
          <input type="text" name="uname" class="text" placeholder="Username"><br><hr><br>
          <input type="tel" name="MobileNumber" class="text" placeholder="Mobile Number"><br><hr><br>
          <input type="file" name="file" value="upload"id=""><br><hr><br>

          <textarea name="desc" class ="text" rows="5" cols="22" placeholder="Please provide some description about what you lost."></textarea><br><hr>
          <input type="submit" value="Upload" id="sub">
      </form>
      </div>
  </body>
</html>
