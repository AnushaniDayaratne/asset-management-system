<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

$loggedInUser = $_SESSION['username']; // Use a different variable for fetching data

$sql = "SELECT * FROM itm_complaint WHERE userfullname='$loggedInUser'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Printable Employee Jobcard</title>
    <style>
        /* Your existing CSS styles */
       

       
    </style>
</head>

<body>
    <div class="content">
        <center>
            <h2>MY COMPLAINT DETAILS</h2>
        </center>

        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table>
                <tr>
                    <th>Complaint No</th>
                    <th>Asset No</th>
                    <th>Complaint By</th>
                    <th>Complaint Date and Time</th>
                    <th>Complaint Type</th>
                    <th>Complaint Description</th>
                    <th>Status</th>
                    <th>Cost</th>
                </tr>

                <?php while ($info = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo isset($info['complaintno']) ? $info['complaintno'] : ''; ?></td>
                        <td><?php echo isset($info['assetno']) ? $info['assetno'] : ''; ?></td>
                        <td><?php echo isset($info['userfullname']) ? $info['userfullname'] : ''; ?></td>
                        <td><?php echo isset($info['complaint_date']) ? $info['complaint_date'] : ''; ?></td>
                        <td><?php echo isset($info['complaint_type']) ? $info['complaint_type'] : ''; ?></td>
                        <td><?php echo isset($info['complaint_description']) ? $info['complaint_description'] : ''; ?></td>
                        <td><?php echo isset($info['status']) ? $info['status'] : ''; ?></td>
                        <td><?php echo isset($info['cost']) ? $info['cost'] : ''; ?></td>
                    </tr>
                <?php endwhile; ?>

            </table>
        <?php else : ?>
            <p>No job card details found for the user.</p>
        <?php endif; ?>

        <script>
            // Optionally, you can include a script to trigger the print dialog on page load
            window.onload = function () {
                window.print();
            };
        </script>
    </div>
</body>

</html>
