<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit; // Always include exit after header to prevent further execution
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location: login.php");
    exit; // Always include exit after header to prevent further execution
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
    <title>Employee Dashboard</title>
    <?php include 'employee_css.php'; ?>
    <style>
        /* CSS styles here */
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
            color: white;
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

        /* Print button styles */
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

<body background="image123.jpg">
    <?php include 'employee_sidebar.php'; ?>
    <div class="content">
        <center>
            <h2>MY ASSET DETAILS</h2>
        </center>

        <table>
            <tr>
                <th>Asset Category</th>
                <th>Asset No</th>
                <th>Brand & Model</th>
                <th>Serial Number</th>
            </tr>
            <tr>
                <td>Monitor</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['monitor_brand_model']) ? $info['monitor_brand_model'] : ''; ?></td>
                <td><?php echo isset($info['monitor_serial_number']) ? $info['monitor_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td>System Unit</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['system_unit_brand_model']) ? $info['system_unit_brand_model'] : ''; ?></td>
                <td><?php echo isset($info['system_unit_serial_number']) ? $info['system_unit_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td>Laptop</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['laptop_brand_model']) ? $info['laptop_brand_model'] : ''; ?></td>
                <td><?php echo isset($info['laptop_serial_number']) ? $info['laptop_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td>Printer</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['printer_brand_model']) ? $info['printer_brand_model'] : ''; ?></td>
                <td><?php echo isset($info['printer_serial_number']) ? $info['printer_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td>Photocopy Machine</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['photocopy_machine_brand_model']) ? $info['photocopy_machine_brand_model'] : ''; ?></td>
                <td><?php echo isset($info['photocopy_machine_serial_number']) ? $info['photocopy_machine_serial_number'] : ''; ?></td>
            </tr>
            <tr>
                <td>UPS</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['ups_brand_model']) ? $info['ups_brand_model'] : ''; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Pendrive</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['pendrive_brand']) ? $info['pendrive_brand'] : ''; ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Calculator</td>
                <td><?php echo isset($info['asset_no']) ? $info['asset_no'] : ''; ?></td>
                <td><?php echo isset($info['calculator_brand']) ? $info['calculator_brand'] : ''; ?></td>
                <td></td>
            </tr>
        </table>
        <br><br>
        <!-- Print button for the entire page -->
        <form method="post" action="printable__individual_asset_details.php" target="_blank">
            <input type="submit" class="print-button" value="Print">
        </form>
    </div>
</body>

</html>
