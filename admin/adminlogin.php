<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="../assets/css/Article-List.css">
  <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="../assets/css/Loading-Page-Animation-Style.css">
  <link rel="stylesheet" href="../assets/css/Logo.css">
  <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
  <link rel="stylesheet" href="../assets/css/Pretty-Footer.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/Team-Clean.css">
  <link rel="stylesheet" href="../assets/css/Testimonials.css">
    
     <link rel="stylesheet" href="../assets/assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/assets1/css/login-form-1.css">
    <link rel="stylesheet" href="../assets/assets1/css/login-form.css">
    <link rel="stylesheet" href="../assets/assets1/css/styles.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Lost-Found</title>
</head>
<body>
<div class="container full-height">
        <div class="row flex center v-center full-height">
            <div class="col-8 col-sm-4">
                <div class="form-box">
                    <form method="post">
                        <fieldset>
                            <legend>Sign in</legend><img id="avatar" class="avatar round" src="../assets/assets1/img/avatar.png">
                            <input class="form-control" type="text" id="uname" name="uname" placeholder="Admin Username" required>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Admin Password" required>
                            <button class="btn btn-primary btn-block" type="submit" name="login">LOGIN </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/assets1/js/jquery.min.js"></script>
    <script src="../assets/assets1/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
   
    if(isset($_POST['login'])){
        include('../dbcon.php');
        $username=$_POST['uname'];
        $password=$_POST['password'];
        $qry="SELECT * FROM `admin` WHERE `name`='$username' AND `password`='$password'";
        $run=mysqli_query($con,$qry);
        $data = mysqli_fetch_assoc($run);
        $row=mysqli_num_rows($run);
        if($row<1){
            ?>
            <script>
                alert('Username or Password is incorrect !');
                window.open('adminlogin.php','_self');
            </script>
            <?php
        }
        else{
            session_start();
            $_SESSION['adminname']=$data['name'];
            header('location:admindash.php');
        }
    }
?>