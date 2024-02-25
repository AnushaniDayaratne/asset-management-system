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

$userfullname = $_SESSION['username'];

$sql = "SELECT * FROM itm_complaint WHERE userfullname='$userfullname'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Dashboard</title>
    <?php include 'employee_css.php'; ?>
    <style>
        /*  CSS styles here */
        h2 {
            color: #000080;
            /* Blue color for the heading */
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .content {
            padding: 20px;
        }
        .complaint-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .complaint-table th, .complaint-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .complaint-table th {
            background-color: #f2f2f2;
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
<body background="image123.jpg">
    <?php include 'employee_sidebar.php'; ?>
    <div class="content">
        <h2>MY COMPLAINT DETAILS</h2>
        <table class="complaint-table">
            <tr>
                <th>Complaint No</th>
                <th>Asset No</th>
                <th>Complaint Description</th>
                <th>Status</th>
                <th>Cost</th>
            </tr>
            <?php while ($info = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $info['complaintno']; ?></td>
                    <td><?php echo $info['assetno']; ?></td>
                    <td><?php echo $info['complaint_description']; ?></td>
                    <td><?php echo $info['status']; ?></td>
                    <td><?php echo $info['cost']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <br><br>
        <!-- Print button for the entire page -->
        <form method="post" action="printable_employee_jobcard.php" target="_blank">
            <input type="submit" class="print-button" value="Print">
        </form>
    </div>
</body>
</html>
