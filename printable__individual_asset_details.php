<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

$asset_owner = $_SESSION['username'];

$sql = "SELECT * FROM itm_asset WHERE asset_owner='$asset_owner'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Printable Employee Asset</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        label {
            color: black;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #000080;
            /* Blue color for the heading */
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="content">
        <center>
            <h2>MY ASSET DETAILS</h2>
        </center>

        <table>
        <tr>
                <td><label for="asset_no">Asset No:</label></td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="asset_type">Asset Type:</label></td>
                <td><?php echo isset($info['asset_type']) ? $info['asset_type'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="monitor_brand_model">Monitor Brand & Model:</label></td>
                <td><?php echo isset($info['monitor_brand_model']) ? $info['monitor_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="monitor_serial_number">Monitor Serial Number:</label></td>
                <td><?php echo isset($info['monitor_serial_number']) ? $info['monitor_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="system_unit_brand_model">System Unit Brand & Model:</label></td>
                <td><?php echo isset($info['system_unit_brand_model']) ? $info['system_unit_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="system_unit_serial_number">System Unit Serial Number:</label></td>
                <td><?php echo isset($info['system_unit_serial_number']) ? $info['system_unit_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="laptop_brand_model">Laptop Brand & Model:</label></td>
                <td><?php echo isset($info['laptop_brand_model']) ? $info['laptop_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="laptop_serial_number">Laptop Serial Number:</label></td>
                <td><?php echo isset($info['laptop_serial_number']) ? $info['laptop_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="printer_brand_model">Printer Brand & Model:</label></td>
                <td><?php echo isset($info['printer_brand_model']) ? $info['printer_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="printer_serial_number">Printer Serial Number:</label></td>
                <td><?php echo isset($info['printer_serial_number']) ? $info['printer_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="photocopy_machine_brand_model">Photocopy Machine Brand & Model:</label></td>
                <td><?php echo isset($info['photocopy_machine_brand_model']) ? $info['photocopy_machine_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="photocopy_machine_serial_number">Photocopy Machine Serial Number:</label></td>
                <td><?php echo isset($info['photocopy_machine_serial_number']) ? $info['photocopy_machine_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="ups_brand_model">UPS Brand & Model:</label></td>
                <td><?php echo isset($info['ups_brand_model']) ? $info['ups_brand_model'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="pendrive_brand">Pendrive Brand:</label></td>
                <td><?php echo isset($info['pendrive_brand']) ? $info['pendrive_brand'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="pendrive_storage_size">Pendrive Storage Size:</label></td>
                <td><?php echo isset($info['pendrive_storage_size']) ? $info['pendrive_storage_size'] : ''; ?></td>
            </tr>
            <tr>
                <td><label for="calculator_brand">Calculator Brand:</label></td>
                <td><?php echo isset($info['calculator_brand']) ? $info['calculator_brand'] : ''; ?></td>
            </tr>
        </table>
        <script>
        // Optionally, you can include a script to trigger the print dialog on page load
        window.onload = function () {
            window.print();
        };
    </script>
    </div>
</body>

</html>