<?php
session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");

}

else if($_SESSION['usertype']=='superuser' )
{
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="itm_db";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT*from feedback";

$result=mysqli_query($data,$sql);
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
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        </style>
        
        
    </head>

    <body background="image123.jpg">
        <?php  

        include'admin_sidebar.php';
        
        ?>
        <div class="content">
            <center>
            <h2> RECEIVED FEEDBACKS </h2>
            <br><br>

            <table table border="1px" class="table">
            <tr>
            <th style="padding:20px;font-size:12px;">Name</th>
            <th style="padding:20px;font-size:12px;">Email</th>
            <th style="padding:20px;font-size:12px;">Comment</th>


            </tr>
            <?php
            
            while($info=$result->fetch_assoc())
            {
            
            
            
            ?>

            <tr>
<td style="padding:15px;font-size:12px;">
<?php echo "{$info['name']}";?>
</td>
<td style="padding:15px;font-size:12px;">
<?php echo "{$info['email']}";?>
</td>
<td style="padding:15px;font-size:12px;">
<?php echo "{$info['comment']}";?>
</td>


            </tr>
            <?php
            
            }
            
            ?>
</table>
</center>         

        </div>
        
</body>
    </html>