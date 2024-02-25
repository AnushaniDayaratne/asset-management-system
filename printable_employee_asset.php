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

// Check if asset_id is set in the URL
if (isset($_GET['asset_id'])) {
    $asset_id = $_GET['asset_id']; 

    // Fetch individual asset details
    $sql = "SELECT * FROM itm_asset WHERE id = $asset_id";
    $result = mysqli_query($data, $sql);
    
    if ($result) {
        $info = mysqli_fetch_assoc($result);
    } else {
        // Handle query error, for example, redirect to an error page
        header("location: error.php");
        exit();
    }
} else {
    // Redirect if asset_id is not set
    header("location: superuser_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Printable Individual Employee Asset Details</title>
    <style type="text/css">
        /* Add any additional styles for the printable version here */
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .asset-details {
            margin-top: 20px;
        }

        .details-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <center>
            <h2>MY ASSET DETAILS</h2>
        </center>

        <div class="asset-details">
            <label class="details-label">Asset No:</label>
            <span><?php echo $info['asset_no']; ?></span>
            <br>
            <label class="details-label">Asset Owner Name:</label>
        <span><?php echo $info['asset_owner']; ?></span>
        <br>

        <label class="details-label">Asset Type:</label>
        <span><?php echo $info['asset_type']; ?></span>
        <br>

        <label class="details-label">Monitor Brand & Model:</label>
        <span><?php echo $info['monitor_brand_model']; ?></span>
        <br>

        <label class="details-label">Monitor Serial Number:</label>
        <span><?php echo $info['monitor_serial_number']; ?></span>
        <br>

        <label class="details-label">System Unit Brand & Model:</label>
        <span><?php echo $info['system_unit_brand_model']; ?></span>
        <br>

        <label class="details-label">System Unit Serial Number:</label>
        <span><?php echo $info['system_unit_serial_number']; ?></span>
        <br>
        <label class="details-label">Laptop Brand & Model:</label>
        <span><?php echo $info['laptop_brand_model']; ?></span>
        <br>
        <label class="details-label">Laptop Serial Number:</label>
        <span><?php echo $info['laptop_serial_number']; ?></span>
        <br>
        <label class="details-label">Printer Brand & Model:</label>
        <span><?php echo $info['printer_brand_model']; ?></span>
        <br>
        <label class="details-label">Printer Serial Number:</label>
        <span><?php echo $info['printer_serial_number']; ?></span>
        <br>
        <label class="details-label">Photocopy Machine Brand & Model:</label>
        <span><?php echo $info['photocopy_machine_brand_model']; ?></span>
        <br>
        <label class="details-label">Photocopy Machine Serial Number:</label>
        <span><?php echo $info['photocopy_machine_serial_number']; ?></span>
        <br>
        <label class="details-label">UPS Brand & Model:</label>
        <span><?php echo $info['ups_brand_model']; ?></span>
        <br>
        <label class="details-label">Pendrive Brand:</label>
        <span><?php echo $info['pendrive_brand']; ?></span>
        <br>
        <label class="details-label">Pendrive Storage Size:</label>
        <span><?php echo $info['pendrive_storage_size']; ?></span>
        <br>
        <label class="details-label">Calculator Brand:</label>
        <span><?php echo $info['calculator_brand']; ?></span>
    </div>

            <!-- Add other asset details here following the same structure -->

        </div>

        <script>
            // Optionally, you can include a script to trigger the print dialog on page load
            window.onload = function() {
                window.print();
            };
        </script>
    </div>
</body>

</html>





