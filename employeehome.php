<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}
elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
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
        <style>
        
        h2 {
            color: #000080; 
            font-weight:bold;
        }

        </style>
        
    </head>

    <body background="image123.jpg">
        <?php
        include'employee_sidebar.php';
        
        
        ?>
       
        <div class="content">
            <h2>EMPLOYEE DASHBOARD</h2>
            

        </div>
        
</body>
    </html>