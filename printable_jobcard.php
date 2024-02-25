<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'superuser') {
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

$sql = "SELECT * FROM itm_complaint";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Printable Jobcard Details</title>
    <?php include 'admin_css.php'; ?>
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
            <h2>ALL THE JOBCARD DETAILS</h2>
            <br>
        </center>
        <table border="2px" class="table">
            <tr>
                <th class="table_th">Complaint No</th>
                <th class="table_th">Asset No</th>
                <th class="table_th">Complaint By</th>
                <th class="table_th">Complaint Date & Time</th>
                <th class="table_th">Complaint Type</th>
                <th class="table_th">Complaint Description</th>
                <th class="table_th">Status</th>
                <th class="table_th">Cost</th>
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="table_td"><?php echo htmlspecialchars($info['complaintno']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['assetno']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['userfullname']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['complaint_date']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['complaint_type']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['complaint_description']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['status']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['cost']); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <script>
        //  you can include a script to trigger the print dialog on page load
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>

<?php
mysqli_close($data);
?>
