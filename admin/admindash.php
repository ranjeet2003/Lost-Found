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
        <div class="d-flex justify-content-center">
            <form action="#" method="post">
                <button type="submit" class="btn btn-primary" name="match">Match Data</button>
            </form>
        </div>
        
    </div>

<?php
    if(isset($_POST['match'])){
        include('../dbcon.php');
        $qry="SELECT * FROM lost_info a WHERE a.dserialno in(select dserialno from found_info )";
        $run=mysqli_query($con,$qry);
        $num = mysqli_num_rows($run);
        if($num < 0){  
           echo "Nothing Found";
        }
        else{
            while($data = mysqli_fetch_assoc($run)){ 
               ?>
                    <div class="container pt-3 p-3 my-3 border">
                        <div class="table-responsive">
                            <table class="table table-striped" >
                                <tr>
                                <th colspan="3">Lost_info table's Details</th>
                                </tr>
                                <tr>
                                    <td rowspan="5"  align="center"><div class="media-body"><img src="../lost_img/<?php echo $data['img']; ?>" class="d-flex mr-3 img-thumbnail align-self-center"/></div></td>
                                    <th>User Name who lost</th>
                                    <td  align="center"><?php echo $data['uname']; ?></td>
                                </tr>
                                <tr>
                                    
                                    <th>Doc Name who lost</th>
                                    <td  align="center"><?php echo $data['dname']; ?></td>
                                </tr>
                                <tr>
                                    
                                    <th>Serial No. of lost doc.</th>
                                    <td  align="center"><?php echo $data['dserialno']; ?></td>
                                </tr>
                                <tr>
                                    
                                    <th>Description who lost</th>
                                    <td  align="center"><?php echo $data['descrp']; ?></td>
                                </tr>
                                <tr>
                                    
                                    <th>Image Name who los</th>
                                    <td  align="center"><?php echo $data['img']; ?></td>
                                </tr>
                                <tr>

                                    <th>Contact Founder Person</th>
                                    <td align="center"><a href="Sharedetails.php?dserialno=<?php echo $data['dserialno']; ?>"><button type="button" class="btn btn-primary">Contact Details</button></a></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>    
               <?php
            }
        }
    }
?>
</body>
</html>