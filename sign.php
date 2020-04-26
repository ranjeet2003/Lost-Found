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
            ?>
            <script>
                alert('Sign up Succesfully')
            </script>
            <?php
            header('location:user/welcome.php');
        }
    }
?>