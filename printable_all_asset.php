<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'admin') {
    header("location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM itm_asset";
$result = mysqli_query($data, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Asset Details</title>
    <link rel="stylesheet" type="text/css" href="superuser_css.php">
    <style type="text/css">
        .table_th {
            padding: 20px;
            font-size: 11px;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .table_td {
            padding: 20px;
            font-size: 11px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #000080;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <div class="content">
        <center>
            <h2>ALL THE ASSET DETAILS</h2>
            <br>
        </center>
        <table border="2px" class="table">
            <tr>
                <th class="table_th">Asset No</th>
                <th class="table_th">Asset Owner Name</th>
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
                
                <!-- Add more table headers as needed -->
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="table_td"><?php echo htmlspecialchars($info['asset_no']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['asset_owner']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['asset_type']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['monitor_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['monitor_serial_number']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['system_unit_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['system_unit_serial_number']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['laptop_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['laptop_serial_number']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['printer_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['printer_serial_number']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['photocopy_machine_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['photocopy_machine_serial_number']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['ups_brand_model']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['pendrive_brand']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['pendrive_storage_size']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['calculator_brand']); ?></td>
                  
                    <!-- //Add more table data as needed -->
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script>
        // Optionally, you can include a script to trigger the print dialog on page load
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>

<?php
mysqli_close($data);
?>










