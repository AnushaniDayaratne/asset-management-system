<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if (isset($_POST['send'])) {
    $data_name = mysqli_real_escape_string($data, $_POST['name']);
    $data_email = mysqli_real_escape_string($data, $_POST['email']);
    $data_comment = mysqli_real_escape_string($data, $_POST['comment']);

    // Use prepared statement to prevent- SQL injection
    $sql = "INSERT INTO feedback (name, email, comment) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($data, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $data_name, $data_email, $data_comment);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['message']="Your application sent data successfully";
            header("location:index.php");
        } else {
            echo "Apply Failed";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare statement failed";
    }
    
    mysqli_close($data);
}
?>
