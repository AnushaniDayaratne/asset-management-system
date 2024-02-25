<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}
elseif($_SESSION['usertype']=='employee'){
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
        header('location:superuser_profile.php');
    }
}




?>



<!DOCTYPE html
<html>
    <head>
        <meta charset="utf-8">
        <title>SuperUser Dashboard</title>
        <?php
        include'superuser_css.php';
        
        
        
        ?>
        
    </head>

    <body background="image123.jpg">
        <?php
        include'superuser_sidebar.php';
        
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
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="text" name="password" value="<?php echo isset($info['password']) ? $info['password'] : ''; ?>" required>
    </div>

    <div>
        <input type="submit" class="btn btn-primary" name="update_profile" value="update">
    </div>

</form>

            

        </div>
        
</body>
    </html>