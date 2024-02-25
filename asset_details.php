<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}
elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="itm_db";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM  user WHERE username='$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_assetdetails'])){

    
    $e_user = $_POST['user'];
    $e_section=$_POST['section'];
    $e_mbrandmmodel=$_POST['mbrandmmodel'];
    $e_msn=$_POST['msn'];
    $e_sbrandsmodel=$_POST['sbrandsmodel'];
    $e_ssn=$_POST['ssn'];
    $e_processor=$_POST['sprocessor'];
    $e_pbrandpmodel=$_POST['pbrandpmodel'];
    $e_psn=$_POST['psn'];
    $e_ptype=$_POST['ptype'];
    $e_phbrandphmodel=$_POST['phbrandphmodel'];
    $e_phsn=$_POST['phsn'];
    $e_ubrandumodel=$_POST['ubrandumodel'];
    $e_fbrandfmodel=$_POST['fbrandfmodel'];
  

    $sql2="UPDATE user SET phone='$e_phone',email='$e_email',password='$e_password' WHERE username='$name'";

    $result2=mysqli_query($data,$sql2);
    if($result2){
        header('location:asset_details.php');
    }
}




?>



<!DOCTYPE html
<html>
    <head>
        <meta charset="utf-8">
        <title>Employee Dashboard</title>
        <?php
        include'employee_css.php';
        
        
        
        ?>
        
    </head>

    <body background="image123.jpg">
        <?php
        include'employee_sidebar.php';
        
        
        ?>
         <style>
      
        

        label {
            display: block;
            margin-bottom: 8px;
            color: white;
            font-weight:bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.6);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            color: #000080; /* Blue color for the heading */
        }

    </style>
       
        <div class="content">
            <h2>MY ASSET DETAILS</h2>
            <form action="#" method="POST" >

    

    <div>
        <label for="user">User:</label>
        <input type="text" name="user" value="<?php echo isset($info['user']) ? $info['user'] : ''; ?>" required>
    </div>

    <div>
        <label for="section">Section:</label>
        <input type="text" name="section" value="<?php echo isset($info['section']) ? $info['section'] : ''; ?>" required>
    </div>

    <div>
        <label for="mbrandmmodel">Monitor Brand & Model:</label>
        <input type="text" name="mbrandmmodel" value="<?php echo isset($info['mbrandmmodel']) ? $info['mbrandmmodel'] : ''; ?>" required>
    </div>
    <div>
        <label for="msn">Monitor Serial Number:</label>
        <input type="text" name="msn" value="<?php echo isset($info['msn']) ? $info['msn'] : ''; ?>" required>
    </div>
    <div>
        <label for="sbrandsmodel">System Unit Brand & Model:</label>
        <input type="text" name="sbrandsmodel" value="<?php echo isset($info['sbrandsmodel']) ? $info['sbrandsmodel'] : ''; ?>" required>
    </div>
    <div>
        <label for="ssn">System Unit Serial Numbe:</label>
        <input type="text" name="ssn" value="<?php echo isset($info['ssn']) ? $info['ssn'] : ''; ?>" required>
    </div>
    <div>
        <label for="sprocessor">System Unit Processor:</label>
        <input type="text" name="sprocessor" value="<?php echo isset($info['sprocessor']) ? $info['sprocessor'] : ''; ?>" required>
    </div>
    <div>
        <label for="pbrandpmodel">Printer Brand & Model:</label>
        <input type="text" name="pbrandpmodel" value="<?php echo isset($info['pbrandpmodel']) ? $info['pbrandpmodel'] : ''; ?>" required>
    </div>
    <div>
        <label for="psn">Printer Serial Number:</label>
        <input type="text" name="psn" value="<?php echo isset($info['psn']) ? $info['psn'] : ''; ?>" required>
    </div>
    <div>
        <label for="ptype">Printer Type:</label>
        <input type="text" name="ptype" value="<?php echo isset($info['ptype']) ? $info['ptype'] : ''; ?>" required>
    </div>
    <div>
        <label for="phbrandphmode">Photocopy  Brand & Model:</label>
        <input type="text" name="phbrandphmode" value="<?php echo isset($info['phbrandphmode']) ? $info['phbrandphmode'] : ''; ?>" required>
    </div>
    <div>
        <label for="phsn">Photocopy Serial Number:</label>
        <input type="text" name="phsn" value="<?php echo isset($info['phsn']) ? $info['phsn'] : ''; ?>" required>
    </div>
    <div>
        <label for="ubrandumodel">UPS Brand & Model:</label>
        <input type="text" name="ubrandumodel" value="<?php echo isset($info['ubrandumodel']) ? $info['ubrandumodel'] : ''; ?>" required>
    </div>
    <div>
        <label for="fbrandfmodel">Finger Print Brand & Model:</label>
        <input type="text" name="fbrandfmodel" value="<?php echo isset($info['fbrandfmodel']) ? $info['fbrandfmodel'] : ''; ?>" required>
    </div>

    <div>
        <input type="submit" class="btn btn-primary" name="update_assetdetails" value="update">
    </div>

</form>

            

        </div>
        
</body>
    </html>