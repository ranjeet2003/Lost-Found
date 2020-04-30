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
</body>
</html>
<?php
    if(isset($_POST['match'])){
        include('../dbcon.php');
        $qry="SELECT a.uname,a.dserial FROM lost_info a WHERE a.dserialno in(select dserialno from found_info )";
        $run=mysqli_query($con,$qry);
        $num = mysqli_num_rows($run);
        if($num > 0){  
            while($row = mysqli_fetch_assoc($run)){ // use fetch_assoc 
                $data[] = array('name' => $row['uname'], 'doc_serial_no' => $row['dserial']);
                echo $data['name'];
                echo $data['dserialno'];
            }  
        }
    }
?>