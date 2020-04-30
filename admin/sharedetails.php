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
  <title>Welcome to admin panel</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1>Hello admin</h1>
        </div>
    </div>

<?php
include('../dbcon.php');
$serial=$_REQUEST['dserialno'];
$qry="SELECT `uname` FROM `found_info` WHERE `dserialno`='$serial'";
$run=mysqli_query($con,$qry);
$num = mysqli_num_rows($run);
if($num < 0){  
    echo "Nothing Found";
    }
    else{
        $infodatafromfoundtable = mysqli_fetch_assoc($run);
        $str=$infodatafromfoundtable['uname'];
        $qry1="SELECT * FROM `info` WHERE `uname`='$str'";
        $run1=mysqli_query($con,$qry1);
        $infodata=mysqli_fetch_assoc($run1);
        ?>
            <div class="container pt-3 p-3 my-3 border">
                <div class="table-responsive">
                    <table class="table table-striped" >
                            <tr>
                                <th>User Name who found: </th>
                                <td align="center"><?php echo $infodata['uname'];?></td>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td align="center"><?php echo $infodata['Email'];?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number: </th>
                                <td align="center"><?php echo $infodata['MobileNumber'];?></td>
                            </tr>
                            <tr >
                                <th>Send SMS</th>
                                <td align="center"> <?php
                                     //Authorisation details.
                                     $username = "ranjeetgautam13032@gmail.com";
                                     $hash = "461885002e2a0298baf547d5be158bc31616ab0e7916e2ba5dbbb6193576eb04";
                                 
                                     // Config variables. Consult http://api.textlocal.in/docs for more info.
                                     $test = "0";
                                 
                                     // Data for text message. This is the text message data.
                                     $sender = "Lost-Found"; // This is who the message appears to be from.
                                     $no=$infodata['MobileNumber'];
                                     $numbers = "$no"; // A single number or a comma-seperated list of numbers
                                     $message = "We are very happy that your documents are matched by someone we are sharing details of founder person with you: ";
                                     // 612 chars or less
                                     // A single number or a comma-seperated list of numbers
                                     $message = urlencode($message);
                                     $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                                     $ch = curl_init('http://api.textlocal.in/send/?');
                                     curl_setopt($ch, CURLOPT_POST, true);
                                     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                     $result = curl_exec($ch); // This is the result from the API
                                     curl_close($ch);   
                                    ?>
                                                                
                                <button type="button" class="btn btn-primary">Send SMS</button></td>
                            </tr>
                    </table>
                </div>
            </div> 
        <?php
    }
?>
</body>
</html>