<?php
error_reporting(0);
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

$sql="SELECT * FROM itm_asset";

$result=mysqli_query($data,$sql);






?>



<!DOCTYPE html
<html>
    <head>
        <meta charset="utf-8">
        <title>SuperUser Dashboard</title>
        <?php
        include'superuser_css.php';
        
        
        
        ?>
        <style type="text/css">
          .table_th{
            padding: 20px;
            font-size:11px;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

          
          }
          .table_td{
            padding: 20px;
            font-size:11px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

            

          }
          h2 {
            color: #000080; /* Blue color for the heading */
            font-weight:bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }
        .print-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .print-button:hover {
            background-color: #45a049;
        }
        



        </style>
        
    </head>

    <body background="image123.jpg" >
        <?php
        include'superuser_sidebar.php';
        
        ?>
        
        <div class="content">
            <center>
            <h2>ALL THE ASSET DETAILS</h2>
            <br><br>
            <br>
            <form method="post" action="printable_all_asset.php" target="_blank">
                <input type="submit" class="print-button" value="Print Entire Table">
            </form>
           
            <?php
            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);
            
            
            ?>
        </center>
            <table border="1px" class="table">
             <tr>
                <th class="table_th">Asset No</th>
                <th class="table_th">Asset Owner</th>
                <th class="table_th">Asset Type</th>
                <th class="table_th">Monitor Brand & Model</th>
                <th class="table_th">Monitor Serial Number</th>
                <th class="table_th">System Unit Brand & Model</th>
                <th class="table_th">System Unit Serial Number</th>
                <th class="table_th">Laptop Brand & Model</th>
                <th class="table_th">Laptop Serial Number</th>
                <th class="table_th">Printer Brand & Model</th>
                <th class="table_th">Printer Serial Number</th>
                <th class="table_th">Photocopy Machine Brand & Model</th>
                <th class="table_th">Photocopy Machine Serial Number</th>
                <th class="table_th">UPS Brand & Model</th>
                <th class="table_th">Pendrive Brand</th>
                <th class="table_th">Pendrive Storage Size</th>
                <th class="table_th">Calculator Brand</th>
                <th class="table_th">Action</th>
                 <th class="table_th">Action</th>
                 <th class="table_th">Action</th>
                
                 
               



             </tr>
             <?php
            
            while($info=$result->fetch_assoc())
            {
            
            
            
            ?>



            <tr>
              <td class="table_td">
              <?php echo "{$info['asset_no']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['asset_owner']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['asset_type']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['monitor_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['monitor_serial_number']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['system_unit_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['system_unit_serial_number']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['laptop_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['laptop_serial_number']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['printer_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['printer_serial_number']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['photocopy_machine_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['photocopy_machine_serial_number']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['ups_brand_model']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['pendrive_brand']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['pendrive_storage_size']}";?>
              </td>
              <td class="table_td">
              <?php echo "{$info['calculator_brand']}";?>
              </td>
              
              <td class="table_td">
              <?php echo "<a onClick=\" javascript:return confirm('Are you sure to delete this');\" class='btn btn-danger'href='delete.php ?asset_id={$info['id']}'>DELETE</a>";?>
              </td>
              <td class="table_td">
    <?php echo "<a class='btn btn-primary' href='update_asset.php?asset_id=" . $info['id'] . "'>Update</a>"; ?>
</td>
<td class="table_td">
                        <a class="print-button" href="printable_employee_asset.php?asset_id=<?php echo $info['id']; ?>" target="_blank">Print</a>
                    </td>








            </tr>
            <?php

            }
            
            ?>




            </table>

            

        </div>
        
</body>
    </html>