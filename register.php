<?php
// Assuming you have a MySQL database set up

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['username'], $_POST['phone'], $_POST['email'], $_POST['password'], $_POST['usertype'], $_POST['confirm_password'])) {

    // Retrieve data from the form
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password and confirm password
    if ($password !== $confirm_password) {
        echo "<script>alert('Error: Passwords do not match');</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (username, phone, email, password, usertype) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $phone, $email, $password, $usertype);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!');</script>";
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close the connection
        $stmt->close();
    }
} else {
    // Handle the case where form data is not set
    echo "<script>alert('Error: Form data not set.');</script>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration Form</title>
    <style>
        body {
            background: url('image6.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            width: 300px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #000080;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>


</head>



    <div class="container">
        <form action="register.php" method="post">
            <h2>REGISTRATION</h2>

            <label for="username">USERNAME:</label>
            <input type="text" id="username" name="username" required>

            <label for="phone">CONTACT NO:</label>
            <input type="number" id="phone" name="phone" required>

            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">CONFIRM PASSWORD:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <label for="usertype">USER TYPE:</label>
            <select id="usertype" name="usertype" required>
                <option value="" disabled selected>SELECT YOUR USER TYPE</option>
                <option value="admin">ADMIN</option>
                <option value="superuser">SUPER USER</option>
                <option value="employee">EMPLOYEE</option>
                <!-- Add more options as needed -->
            </select>

            <button type="submit">REGISTER</button>
        </form>
    </div>

</body>

</html>
