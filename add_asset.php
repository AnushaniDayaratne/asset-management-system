<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_asset'])) {
    $asset_no=$_POST['asset_no'];
    $asset_owner = $_POST['asset_owner'];
    $asset_type = implode(", ", $_POST['asset_type']);

    // Fields for COMPUTER/PC
    $monitor_brand_model = $_POST['monitor_brand_model'];
    $monitor_serial_number = $_POST['monitor_serial_number'];
    $system_unit_brand_model = $_POST['system_unit_brand_model'];
    $system_unit_serial_number = $_POST['system_unit_serial_number'];

    // Fields for LAPTOP
    $laptop_brand_model = $_POST['laptop_brand_model'];
    $laptop_serial_number = $_POST['laptop_serial_number'];

    // Fields for PRINTER
    $printer_brand_model = $_POST['printer_brand_model'];
    $printer_serial_number = $_POST['printer_serial_number'];

    // Fields for PHOTOCOPY MACHINE
    $photocopy_machine_brand_model = $_POST['photocopy_machine_brand_model'];
    $photocopy_machine_serial_number = $_POST['photocopy_machine_serial_number'];

    // Fields for UPS
    $ups_brand_model = $_POST['ups_brand_model'];

    // Fields for PENDRIVE
    $pendrive_brand = $_POST['pendrive_brand'];
    $pendrive_storage_size = $_POST['pendrive_storage_size'];

    // Fields for CALCULATOR
    $calculator_brand = $_POST['calculator_brand'];

    $sql = "INSERT INTO itm_asset(asset_no,asset_owner, asset_type, monitor_brand_model, monitor_serial_number, system_unit_brand_model, system_unit_serial_number, 
            laptop_brand_model, laptop_serial_number, printer_brand_model, printer_serial_number, 
            photocopy_machine_brand_model, photocopy_machine_serial_number, ups_brand_model, 
            pendrive_brand, pendrive_storage_size, calculator_brand)
       VALUES('$asset_no','$asset_owner', '$asset_type', '$monitor_brand_model', '$monitor_serial_number', 
            '$system_unit_brand_model', '$system_unit_serial_number', '$laptop_brand_model', 
            '$laptop_serial_number', '$printer_brand_model', '$printer_serial_number', 
            '$photocopy_machine_brand_model', '$photocopy_machine_serial_number', '$ups_brand_model', 
            '$pendrive_brand', '$pendrive_storage_size', '$calculator_brand')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script type='text/javascript'>
        
        alert('Data Upload Success!');
        
        </script>";
    } else {
        echo "Upload Failed";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SuperUser Dashboard</title>
    <?php
    include 'superuser_css.php';
    ?>
    <style>
         h1 {
            color: #000080;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h6 {
            color: #000080;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        label {
            color: white;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h5{
            color: white;
            
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        
        .content {
            display: flex;
        }

        .form-container {
            width: 70%;
            padding: 20px;
        }
    </style>
</head>

<body background="image123.jpg">
    <?php
    include 'superuser_sidebar.php';
    ?>
    <div class="content">
        <div class="form-container">
            <h1>ASSET DETAILS</h1>
            <div>
                <form action="#" method="POST">
                <div class="mb-3">
                        <label class="form-label">Asset No:</label>
                        <input type="text" name="asset_no" class="form-control" placeholder="Enter Asset Number" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asset Owner Name:</label>
                        <input type="text" name="asset_owner" class="form-control" placeholder="Enter Asset Owner Name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asset Type:</label><h6>(Select Your Relevant Asset Types)</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="COMPUTER/PC">
                            <label class="form-check-label">Computer/PC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="LAPTOP">
                            <label class="form-check-label">Laptop</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="PRINTER">
                            <label class="form-check-label">Printer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="PHOTOCOPY MACHINE">
                            <label class="form-check-label">Photocopy Machine</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="UPS">
                            <label class="form-check-label">UPS</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="PENDRIVE">
                            <label class="form-check-label">Pendrive</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="asset_type[]" value="CALCULATOR">
                            <label class="form-check-label">Calculator</label>
                        </div>
                    </div>
                    <h6>(Fill the details related to the asset types you have selected)</h5>
                    <h5> 1.COMPUTER/PC</h5>
                    <div class="mb-3">
                        <label class="form-label">Monitor Brand & Model:</label>
                        <input type="text" name="monitor_brand_model" class="form-control" placeholder="Enter Monitor Brand and Model" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monitor Serial Number:</label>
                        <input type="text" name="monitor_serial_number" class="form-control" placeholder="Enter Monitor Serial Number" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">System Unit Brand & Model:</label>
                        <input type="text" name="system_unit_brand_model" class="form-control" placeholder="Enter System Unit Brand and Model" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">System Unit Serial Number:</label>
                        <input type="text" name="system_unit_serial_number" class="form-control" placeholder="Enter System Unit Serial Number" autocomplete="off">
                    </div>
                    <h5> 2.LAPTOP </h5>
                    <div class="mb-3">
                        <label class="form-label">Laptop Brand & Model:</label>
                        <input type="text" name="laptop_brand_model" class="form-control" placeholder="Enter Laptop Brand and Model" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Laptop Serial Number:</label>
                        <input type="text" name="laptop_serial_number" class="form-control" placeholder="Enter Laptop Serial Number" autocomplete="off">
                    </div>
                    <h5>3.PRINTER </h5>
                    <div class="mb-3">
                        <label class="form-label">Printer Brand & Model:</label>
                        <input type="text" name="printer_brand_model" class="form-control" placeholder="Enter Printer Brand and Model" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Printer Serial Number:</label>
                        <input type="text" name="printer_serial_number" class="form-control" placeholder="Enter Printer Serial Number" autocomplete="off">
                    </div>
                    <h5>4.PHOTOCOPY MACHINE</h5>
                    <div class="mb-3">
                        <label class="form-label">Photocopy Machine Brand & Model:</label>
                        <input type="text" name="photocopy_machine_brand_model" class="form-control" placeholder="Enter Photocopy Machine Brand and Model" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Photocopy Machine Serial Number:</label>
                        <input type="text" name="photocopy_machine_serial_number" class="form-control" placeholder="Enter Photocopy Machine Serial Number" autocomplete="off">
                    </div>
                    <h5>5.UPS</h5>
                    <div class="mb-3">
                        <label class="form-label">UPS Brand & Model:</label>
                        <input type="text" name="ups_brand_model" class="form-control" placeholder="Enter UPS Brand and Model" autocomplete="off">
                    </div>
                    <h5>6.PENDRIVE</h5>
                    <div class="mb-3">
                        <label class="form-label">Pendrive Brand:</label>
                        <input type="text" name="pendrive_brand" class="form-control" placeholder="Enter Pendrive Brand" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendrive Storage Size:</label>
                        <input type="text" name="pendrive_storage_size" class="form-control" placeholder="Enter Pendrive Storage Size" autocomplete="off">
                    </div>
                    <h5>7.CALCULATOR </h5>
                    <div class="mb-3">
                        <label class="form-label">Calculator Brand:</label>
                        <input type="text" name="calculator_brand" class="form-control" placeholder="Enter Calculator Brand" autocomplete="off">
                    </div>
                    <button type="submit" name="add_asset" class="btn btn-primary">Add Asset</button>
                </form>
            </div>
        </div>
      
    </div>
</body>

</html>
