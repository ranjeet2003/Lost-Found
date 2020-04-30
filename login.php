<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="assets/css/Article-List.css">
  <link rel="stylesheet" href="assets/css/Footer-Dark.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="assets/css/Loading-Page-Animation-Style.css">
  <link rel="stylesheet" href="assets/css/Logo.css">
  <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
  <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/Team-Clean.css">
  <link rel="stylesheet" href="assets/css/Testimonials.css">
    
     <link rel="stylesheet" href="assets/assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets1/css/login-form-1.css">
    <link rel="stylesheet" href="assets/assets1/css/login-form.css">
    <link rel="stylesheet" href="assets/assets1/css/styles.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Lost-Found</title>
</head>
<body >
  <div class="d-inline float-none">
      <nav class="navbar navbar-light navbar-expand-md">
          <div class="container-fluid"><a class="navbar-brand" href="#" id="brand-logo"> </a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse"
                  id="navcol-1">
                  <ul class="nav navbar-nav ml-auto"></ul>
              </div>
          </div>
      </nav>
      <nav class="navbar navbar-dark navbar-expand bg-dark navigation-clean-button" data-bs-hover-animate="pulse" style="border-radius:42px;/*width:993px;*/height:66px;">
          <div class="container"><a class="navbar-brand text-dark bg-light" href="#" data-bs-hover-animate="flash" style="border-radius:16px;">Lost or found</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
              <div
                  class="collapse navbar-collapse" data-bs-hover-animate="pulse" id="navcol-1">
                  <ul class="nav navbar-nav justify-content-center align-self-center m-auto">
                  </ul><span class="navbar-text actions"><a href="signup.php"class="btn btn-light action-button">Sign Up</a></span></div>
              </div>
       </nav>
  </div>
<div class="container full-height">
        <div class="row flex center v-center full-height">
            <div class="col-8 col-sm-4">
                <div class="form-box">
                    <form method="post">
                        <fieldset>
                            <legend>Sign in</legend><img id="avatar" class="avatar round" src="assets/assets1/img/avatar.png">
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                            <input class="form-control" type="password" id="password" name="password" placeholder="password" required>
                            <button class="btn btn-primary btn-block" type="submit" name="login">LOGIN</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <script src="assets/assets1/js/jquery.min.js"></script>
    <script src="assets/assets1/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
<?php
    include('dbcon.php');
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $qry="SELECT * FROM `info` WHERE `Email`='$email' AND `password`='$password'";
        $run=mysqli_query($con,$qry);
        $qry1="SELECT `uname` FROM `info` WHERE `Email`='$email' AND `password`='$password'";
        $row=mysqli_num_rows($run);
        $run1=mysqli_query($con,$qry1);
        $data = mysqli_fetch_assoc($run1);
        //$row1=mysqli_num_rows($run1);
        if($row<1){
            ?>
            <script>
                alert('Username or Password is incorrect !');
                window.open('login.php','_self');
            </script>

            <?php
        }
        else{
            session_start();
            $_SESSION['username']=$data['uname'];

            header('location:user/welcome.php');
        }
    }
?>