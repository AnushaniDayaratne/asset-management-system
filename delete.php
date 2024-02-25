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

if (isset($_GET['asset_id'])) {
    $asset_id = $_GET['asset_id'];

   
    $sql = "DELETE FROM  itm_asset WHERE id = '$asset_id'";

    $result = mysqli_query($data, $sql);

    if ($result) {
        $_SESSION['message']="Asset deleted Successfully";
        header("location: view_asset.php");
    } else {
        echo "Error deleting record: " . mysqli_error($data);
    }
}

mysqli_close($data);
?>
