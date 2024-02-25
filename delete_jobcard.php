<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['jobcard_id'])) {
    $jobcard_id = $_GET['jobcard_id'];

    $sql = "DELETE FROM itm_complaint WHERE id = '$jobcard_id'";

    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message'] = "Jobcard deleted Successfully";
        header("location: view_jobcards.php");
    } else {
        echo "Error deleting record: " . mysqli_error($data);
    }
}

mysqli_close($data);
?>
