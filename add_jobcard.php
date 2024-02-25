<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'admin') {
    header("location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

// Check the connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$complaintno = ''; // Initialize $complaintno

if (isset($_POST['add_jobcard'])) {
    // Generating a unique complaint number using a combination of static text and timestamp
    $complaintno = 'COM' . date('YmdHis');
    $assetno = mysqli_real_escape_string($data, $_POST['assetno']);
    $userfullname = mysqli_real_escape_string($data, $_POST['userfullname']);
    $complaint_date = mysqli_real_escape_string($data, $_POST['complaint_date']);
    $complaint_type = mysqli_real_escape_string($data, $_POST['complaint_type']);
    $complaint_description = mysqli_real_escape_string($data, $_POST['complaint_description']);

    $sql = "INSERT INTO itm_complaint (complaintno, assetno, userfullname, complaint_date, complaint_type, complaint_description)
            VALUES ('$complaintno', '$assetno', '$userfullname', '$complaint_date', '$complaint_type', '$complaint_description')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script type='text/javascript'>        
            alert('Data Upload Success!');
            window.location.href = 'my_jobcard_details.php';
        </script>";
        exit();
    } else {
        echo "Upload Failed";
    }
}

mysqli_close($data); // Close the database connection
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Dashboard</title>
    <?php include 'employee_css.php'; ?>
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

        .content {
            display: flex;
        }

        .form-container {
            width: 70%;
            padding: 20px;
        }

        .image-container {
            width: 30%;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 500px;
            padding-bottom: 50px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body background="image123.jpg">
    <?php include 'employee_sidebar.php'; ?>
    <div class="content">
        <div class="form-container">
            <h2>COMPLAINT DETAILS</h2>
            <div>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Complaint No:</label>
                        <input type="text" name="complaintno" class="form-control" value="<?php echo $complaintno; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asset No:</label>
                        <input type="text" name="assetno" class="form-control" placeholder="Enter the asset number" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complaint By:</label>
                        <input type="text" name="userfullname" class="form-control" placeholder="Enter the full name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complaint Date and Time:</label>
                        <input type="datetime-local" name="complaint_date" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="complaint_type">Complaint Type:</label>
                        <select id="complaint_type" name="complaint_type" class="form-control" required>
                            <option value="" disabled selected>Select Your Complaint Type</option>
                            <option value="hardware">HARDWARE</option>
                            <option value="network">NETWORK</option>
                            <option value="software">SOFTWARE</option>
                            <option value="other">OTHER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Complaint Description:</label>
                        <input type="text" name="complaint_description" class="form-control" placeholder="Describe your complaint" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="add_jobcard" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="image-container">
            <img src="comp.png" alt="Right Side Image">
        </div>
    </div>
</body>

</html>
