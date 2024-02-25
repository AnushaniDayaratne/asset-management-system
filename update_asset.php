<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'employee') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

$id = mysqli_real_escape_string($data, $_GET['asset_id']);

$sql = "SELECT * FROM itm_asset WHERE id='$id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update_asset'])) {
    $asset_no = mysqli_real_escape_string($data, $_POST['asset_no']);
    $asset_owner = mysqli_real_escape_string($data, $_POST['asset_owner']);
    $asset_type = mysqli_real_escape_string($data, $_POST['asset_type']);
    $monitor_brand_model = mysqli_real_escape_string($data, $_POST['monitor_brand_model']);
    $monitor_serial_number = mysqli_real_escape_string($data, $_POST['monitor_serial_number']);
    $system_unit_brand_model = mysqli_real_escape_string($data, $_POST['system_unit_brand_model']);
    $system_unit_serial_number = mysqli_real_escape_string($data, $_POST['system_unit_serial_number']);
    $laptop_brand_model = mysqli_real_escape_string($data, $_POST['laptop_brand_model']);
    $laptop_serial_number = mysqli_real_escape_string($data, $_POST['laptop_serial_number']);
    $printer_brand_model = mysqli_real_escape_string($data, $_POST['printer_brand_model']);
    $printer_serial_number = mysqli_real_escape_string($data, $_POST['printer_serial_number']);
    $photocopy_machine_brand_model = mysqli_real_escape_string($data, $_POST['photocopy_machine_brand_model']);
    $photocopy_machine_serial_number = mysqli_real_escape_string($data, $_POST['photocopy_machine_serial_number']);
    $ups_brand_model = mysqli_real_escape_string($data, $_POST['ups_brand_model']);
    $pendrive_brand = mysqli_real_escape_string($data, $_POST['pendrive_brand']);
    $pendrive_storage_size = mysqli_real_escape_string($data, $_POST['pendrive_storage_size']);
    $calculator_brand = mysqli_real_escape_string($data, $_POST['calculator_brand']);

    $query = "UPDATE itm_asset SET  
        asset_no='$asset_no',
        asset_owner='$asset_owner', 
        asset_type='$asset_type',
        monitor_brand_model='$monitor_brand_model',
        monitor_serial_number='$monitor_serial_number',
        system_unit_brand_model='$system_unit_brand_model',
        system_unit_serial_number='$system_unit_serial_number',
        laptop_brand_model='$laptop_brand_model',
        laptop_serial_number='$laptop_serial_number',
        printer_brand_model='$printer_brand_model',
        printer_serial_number='$printer_serial_number',
        photocopy_machine_brand_model='$photocopy_machine_brand_model',
        photocopy_machine_serial_number='$photocopy_machine_serial_number',
        ups_brand_model='$ups_brand_model',
        pendrive_brand='$pendrive_brand',
        pendrive_storage_size='$pendrive_storage_size',
        calculator_brand='$calculator_brand'
        WHERE id='$id'";

    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header("location:view_asset.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SuperUser Dashboard</title>
    <?php include 'superuser_css.php'; ?>
    <style>
        h2 {
            color: #000080;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        label {
            color: white;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body background="image123.jpg">
    <?php include 'superuser_sidebar.php'; ?>
    <div class="content">
        <h2>UPDATE ASSET DETAILS</h2>
        <div>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label class="form-label">Asset No :</label>
                    <input type="text" name="asset_no" class="form-control" placeholder="Please Enter the Asset No" value="<?php echo $info['asset_no']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Asset Owner :</label>
                    <input type="text" name="asset_owner" class="form-control" placeholder="Please Enter the Asset Owner's Name" value="<?php echo $info['asset_owner']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Asset Type:</label>
                    <input type="text" name="asset_type" class="form-control" placeholder="Please Enter the Asset Type" value="<?php echo $info['asset_type']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Monitor Brand & Model:</label>
                    <input type="text" name="monitor_brand_model" class="form-control" placeholder="Please Enter the Monitor Brand and Model" value="<?php echo $info['monitor_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Monitor Serial Number:</label>
                    <input type="text" name="monitor_serial_number" class="form-control" placeholder="Please Enter the Monitor Serial Number" value="<?php echo $info['monitor_serial_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">System Unit Brand & Model:</label>
                    <input type="text" name="system_unit_brand_model" class="form-control" placeholder="Please Enter the System Unit Brand and Model" value="<?php echo $info['system_unit_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">System Unit Serial Number:</label>
                    <input type="text" name="system_unit_serial_number" class="form-control" placeholder="Please Enter the System Unit Serial Number" value="<?php echo $info['system_unit_serial_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Laptop Brand & Model:</label>
                    <input type="text" name="laptop_brand_model" class="form-control" placeholder="Please Enter the Laptop Brand and Model" value="<?php echo $info['laptop_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Laptop Serial Number:</label>
                    <input type="text" name="laptop_serial_number" class="form-control" placeholder="Please Enter the Laptop Serial Number" value="<?php echo $info['laptop_serial_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Printer Brand & Model:</label>
                    <input type="text" name="printer_brand_model" class="form-control" placeholder="Please Enter the Printer Brand and Model" value="<?php echo $info['printer_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Printer Serial Number:</label>
                    <input type="text" name="printer_serial_number" class="form-control" placeholder="Please Enter the Printer Serial Number" value="<?php echo $info['printer_serial_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Photocopy Machine Brand & Model:</label>
                    <input type="text" name="photocopy_machine_brand_model" class="form-control" placeholder="Please Enter the Photocopy Machine Brand and Model" value="<?php echo $info['photocopy_machine_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Photocopy Machine Serial Number:</label>
                    <input type="text" name="photocopy_machine_serial_number" class="form-control" placeholder="Please Enter the Photocopy Machine Serial Number" value="<?php echo $info['photocopy_machine_serial_number']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">UPS Brand & Model:</label>
                    <input type="text" name="ups_brand_model" class="form-control" placeholder="Please Enter the UPS Brand and Model" value="<?php echo $info['ups_brand_model']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pendrive Brand:</label>
                    <input type="text" name="pendrive_brand" class="form-control" placeholder="Please Enter the Pendrive Brand" value="<?php echo $info['pendrive_brand']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pendrive Storage Size:</label>
                    <input type="text" name="pendrive_storage_size" class="form-control" placeholder="Please Enter the Pendrive Storage Size" value="<?php echo $info['pendrive_storage_size']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Calculator Brand:</label>
                    <input type="text" name="calculator_brand" class="form-control" placeholder="Please Enter the Calculator Brand" value="<?php echo $info['calculator_brand']; ?>">
                </div>
                <button type="submit" name="update_asset" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
