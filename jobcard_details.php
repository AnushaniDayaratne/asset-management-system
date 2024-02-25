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


if(isset($_POST['update_profile'])){

    $e_phone = $_POST['phone'];
    $e_email = $_POST['email'];
    $e_password = $_POST['password'];

    $sql2="UPDATE user SET phone='$e_phone',email='$e_email',password='$e_password' WHERE username='$name'";

    $result2=mysqli_query($data,$sql2);
    if($result2){
        header('location:employee_profile.php');
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
            color: #000080; 
        }

    </style>
       
        <div class="content">
            <h2>MY PROFILE</h2>
            <form action="#" method="POST" >

    

    <div>
        <label for="userfullname">User Full Name:</label>
        <input type="text" name="userfullname" value="<?php echo isset($info['userfullname']) ? $info['userfullname'] : ''; ?>" required>
    </div>

    <div>
        <label for="branchsection">Branch and Section:</label>
        <input type="text" name="branchsection" value="<?php echo isset($info['branchsection']) ? $info['branchsection'] : ''; ?>" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" required>
    </div>
    <div>
        <label for="complaintdate">Complaint Date and Time:</label>
        <input type="datetime-local" name="complaintdate" value="<?php echo isset($info['complaintdate']) ? $info['complaintdate'] : ''; ?>" required>
    </div>
    <div>
        <label for="complaint">Complaint:</label>
        <input type="text" name="complaint" value="<?php echo isset($info['complaint']) ? $info['complaint'] : ''; ?>" required>
    </div>

    <div>
        <input type="submit" class="btn btn-primary" name="update_profile" value="update">
    </div>

</form>

            

        </div>
        
</body>
    </html>