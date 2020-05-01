<?php
   session_start();
   if(isset($_SESSION['adminname'])){
       echo "";
   }
  else{
      header('location:adminlogin.php');
  }
?>
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
$qry2="SELECT `uname` FROM `lost_info` WHERE `dserialno`='$serial'";
$run=mysqli_query($con,$qry);
$num = mysqli_num_rows($run);
$run2=mysqli_query($con,$qry2);
$infodatafromlosttable=mysqli_fetch_assoc($run2);
$unamefromlosttable=$infodatafromlosttable['uname'];
$qry3="SELECT * FROM `info` WHERE `uname`='$unamefromlosttable'";
$run3=mysqli_query($con,$qry3);
$infooflooserperson=mysqli_fetch_assoc($run3);
$mn=$infooflooserperson['MobileNumber'];
$name=$infooflooserperson['uname'];
$mail=$infooflooserperson['Email'];
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
                                <td align="center">
                                    <form action="#" method="post">
                                        <button type="submit" class="btn btn-primary" name="sms">Send SMS </button>
                                    </form>
                                </td>
                            </tr>
                    </table>
                    <?php
                        if(isset($_POST['sms'])){
                              //Authorisation details.
                              $apiKey = urlencode('HMwol0j80So-7QuZqqkvjD2Z2LSq5XqR0PSZUhZMbM');
	
                              // Message details
                              $lno="91".$mn;
                              $fno="91".$infodata['MobileNumber'];
                              $numbers = array($lno,$fno);
                              $sender = urlencode('TXTLCL');
                              $msg="We are happy that your uploaded document details are found by user :".$name.", Email :".$mail.
                              " and mobile number is :".$mn.". Which was lost by username: ".$infodata['uname'].", Email :".$infodata['Email']." and contact no is:".$infodata['MobileNumber']." We request you to contact the mentioned details. Thanks, Team Lost-Found";
                              $message = rawurlencode($msg);
                           
                              $numbers = implode(',', $numbers);
                           
                              // Prepare data for POST request
                              $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                           
                              // Send the POST request with cURL
                              $ch = curl_init('https://api.textlocal.in/send/');
                              curl_setopt($ch, CURLOPT_POST, true);
                              curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                              $response = curl_exec($ch);
                              curl_close($ch);
                              
                              // Process your response here
                              echo $response;
                              
                              header('location:admindash.php');
                        }
                    ?>
                </div>
            </div> 
        <?php
    }
?>
</body>
</html>