<?php
    if(isset($_POST['signup'])){
        include('dbcon.php');
        $username=$_POST['uname'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $mobilenumber=$_POST['mobilenumber'];
        $qry="INSERT INTO `info`(`uname`, `Email`, `MobileNumber`, `password`) VALUES ('$username','$email','$mobilenumber','$password')";
        $run=mysqli_query($con,$qry);
        if($run==true){
            $qry1="SELECT `uname` FROM `info` WHERE `Email`='$email' AND `password`='$password'";
            $run1=mysqli_query($con,$qry1);
            $data = mysqli_fetch_assoc($run1);
            ?>
            <script>
                alert('Sign up Succesfully')
            </script>
            <?php
            session_start();
            $_SESSION['username']=$data['uname'];
            header('location:user/welcome.php');
        }
    }
?>