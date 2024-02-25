<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'superuser') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

// Check if jobcard_id is set in the URL
if (isset($_GET['jobcard_id'])) {
    $jobcard_id = $_GET['jobcard_id'];

    // Fetch individual job card details
    $sql = "SELECT * FROM itm_complaint WHERE id = $jobcard_id";
    $result = mysqli_query($data, $sql);
    $info = mysqli_fetch_assoc($result);
} else {
    // Redirect if jobcard_id is not set
    header("location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Printable Individual Job Card</title>
    <style type="text/css">
        /* Add any additional styles for the printable version here */
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .jobcard-details {
            margin-top: 20px;
        }

        .details-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <center>
        <h2>Individual Job Card Details</h2>
    </center>

    <div class="jobcard-details">
        <label class="details-label">Complaint No:</label>
        <span><?php echo $info['complaintno']; ?></span>
        <br>

        <label class="details-label">Asset No:</label>
        <span><?php echo $info['assetno']; ?></span>
        <br>

        <label class="details-label">Complaint By:</label>
        <span><?php echo $info['userfullname']; ?></span>
        <br>

        <label class="details-label">Complaint Date & Time:</label>
        <span><?php echo $info['complaint_date']; ?></span>
        <br>

        <label class="details-label">Complaint Type:</label>
        <span><?php echo $info['complaint_type']; ?></span>
        <br>

        <label class="details-label">Complaint Description:</label>
        <span><?php echo $info['complaint_description']; ?></span>
        <br>

        <label class="details-label">Status:</label>
        <span><?php echo $info['status']; ?></span>
        <br>
        <label class="details-label">Cost:</label>
        <span><?php echo $info['cost']; ?></span>
    </div>

    <script>
        // Automatically trigger the print dialog on page load
        window.onload = function () {
            window.print();
        };
    </script>
</body>

</html>
