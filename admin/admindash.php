<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to admin panel</title>
</head>
<body>
    <div class="container">
        <h1>Hello admin</h1>
        <form action="#" method="post">
            <input type="submit" name="match" value="Match data">
        </form>
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
            while($data = mysqli_fetch_assoc($run)){ // use fetch_assoc 
               ?>
                <table border="1" style="width:50%; margin-top:20px;"  align="center" >
                    <tr>
                    <th colspan="3">Lost-Found Details</th>
                    </tr>
                    <tr>
                        <td rowspan="5"  align="center"><img src="../lost_img/<?php echo $data['img']; ?>" style="max-height:150px;max-width=120px;"/></td>
                        <th>User Name</th>
                        <td  align="center"><?php echo $data['uname']; ?></td>
                    </tr>
                    <tr>
                        
                        <th>Doc Name</th>
                        <td  align="center"><?php echo $data['dname']; ?></td>
                    </tr>
                    <tr>
                        
                        <th>Serial No</th>
                        <td  align="center"><?php echo $data['dserialno']; ?></td>
                    </tr>
                    <tr>
                        
                        <th>Description</th>
                        <td  align="center"><?php echo $data['descrp']; ?></td>
                    </tr>
                    <tr>
                        
                        <th>Image Name</th>
                        <td  align="center"><?php echo $data['img']; ?></td>
                    </tr>
               
                </table>
               <?php
            }
        }
    }
?>
</body>
</html>