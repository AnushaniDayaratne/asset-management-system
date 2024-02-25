<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'employee') {
    header("location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

$id = mysqli_real_escape_string($data, $_GET['jobcard_id']); // Sanitize input

$sql = "SELECT * FROM itm_complaint  WHERE id='$id'";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Error retrieving job card: " . mysqli_error($data));
}

$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_jobcard'])) {
    $complaintno = mysqli_real_escape_string($data, $_POST['complaintno']);
    $assetno = mysqli_real_escape_string($data, $_POST['assetno']);
    $userfullname = mysqli_real_escape_string($data, $_POST['userfullname']);
    $complaint_date = mysqli_real_escape_string($data, $_POST['complaint_date']);
    $complaint_type = mysqli_real_escape_string($data, $_POST['complaint_type']);
    $complaint_description = mysqli_real_escape_string($data, $_POST['complaint_description']);
    $status = mysqli_real_escape_string($data, $_POST['status']);
    $cost = mysqli_real_escape_string($data, $_POST['cost']);

    $query = "UPDATE itm_complaint SET  
          complaintno='$complaintno',
          assetno='$assetno', 
          userfullname='$userfullname',
          complaint_date='$complaint_date',
          complaint_type='$complaint_type',
          complaint_description='$complaint_description',
          cost='$cost',
          status='$status'
          WHERE id='$id'";

    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header("location: view_jobcards.php");
        exit();
    } else {
        echo "Error updating job card: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>
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
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h2>UPDATE JOBCARD DETAILS</h2>

        <div>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label class="form-label"> Complaint No:</label>
                    <input type="text" name="complaintno" class="form-control" placeholder="Enter the complaint number" value="<?= htmlspecialchars($info['complaintno']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Asset No:</label>
                    <input type="text" name="assetno" class="form-control" placeholder="Enter the asset number" value="<?= htmlspecialchars($info['assetno']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Complaint By:</label>
                    <input type="text" name="userfullname" class="form-control" placeholder="Enter the full name" value="<?= htmlspecialchars($info['userfullname']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Complaint Date and Time:</label>
                    <input type="datetime-local" name="complaint_date" class="form-control" value="<?= htmlspecialchars($info['complaint_date']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Complaint Type:</label>
                    <input type="text" name="complaint_type" class="form-control" placeholder="Enter the complaint type" value="<?= htmlspecialchars($info['complaint_type']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Complaint Description:</label>
                    <input type="text" name="complaint_description" class="form-control" placeholder="Enter the complaint" value="<?= htmlspecialchars($info['complaint_description']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <input type="text" name="status" class="form-control" placeholder="Enter the status" value="<?= htmlspecialchars($info['status']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cost:</label>
                    <input type="text" name="cost" class="form-control" placeholder="Enter the cost" value="<?= htmlspecialchars($info['cost']); ?>">
                </div>
                <button type="submit" name="update_jobcard" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>

</html>
