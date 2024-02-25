<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}
elseif($_SESSION['usertype']=='employee'){
    header("location:login.php");
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
        <style>

        h2 {
            color: #000080; 
            font-weight:bold;
        }

        </style>
        
    </head>

    <body background="image123.jpg">
        <?php
        include'superuser_sidebar.php';
        
        ?>
        
        <div class="content">
            <h2>SUPER USER DASHBOARD</h2>
            

        </div>
        
</body>
    </html>