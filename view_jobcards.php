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

$sql = "SELECT * FROM itm_complaint";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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
    <?php include 'admin_sidebar.php'; ?>
    <div class="content">
        <center>
            <h2>ALL THE COMPLAINT DETAILS</h2>
            <br>
            <form method="post" action="printable_jobcard.php" target="_blank">
                <input type="submit" class="print-button" value="Print Entire Table">
            </form>
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
                <th class="table_th">Action</th>
                <th class="table_th">Action</th>
                <th class="table_th">Action</th>
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['complaintno']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['assetno']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['userfullname']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['complaint_date']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['complaint_type']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['complaint_description']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['status']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['cost']}"; ?></td>
                    <td class="table_td">
                        <?php echo "<a class='btn btn-primary' href='update_jobcard.php?jobcard_id=" . $info['id'] . "'>Update</a>"; ?>
                    </td>
                    <td class="table_td">
                        <?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this');\" class='btn btn-danger' href='delete_jobcard.php?jobcard_id={$info['id']}'>DELETE</a>"; ?>
                    </td>
                    <td class="table_td">
                        <a class="print-button" href="printable_individual_jobcard.php?jobcard_id=<?php echo $info['id']; ?>" target="_blank">Print</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
