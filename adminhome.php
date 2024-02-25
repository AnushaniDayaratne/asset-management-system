<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}

else if($_SESSION['usertype']=='superuser' )
{
    header("location:login.php");
}

?>




<!DOCTYPE html
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <?php
        
        include'admin_css.php';
        
        ?>
        <style>
        h2 {
            color: #000080; 
            font-weight:bold;
        }
        </style>

        
    </head>

    <body background="image123.jpg">
    <?php  

include'admin_sidebar.php';

?>
        <div class="content">
            <h2>ADMIN DASHBOARD </h2>
            

        </div>
        
</body>
    </html>