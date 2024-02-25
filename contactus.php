<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = new mysqli($host, $user, $password, $db);

if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($data, $_POST["name"]);
    $email = mysqli_real_escape_string($data, $_POST["email"]);
    $message = mysqli_real_escape_string($data, $_POST["message"]);

    // Basic form validation
    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If there are no validation errors, insert data into the database
    if (empty($errors)) {
        $stmt = $data->prepare("INSERT INTO contact_us (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success_message = "Thank you for your message!";
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$data->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="contactus.css">
</head>
<body background="image123.jpg">
    <br><br>
    <br><br>
    <div class="container">
        <h1>CONTACT US</h1>

        <?php
        // Display errors if there are any
        if (!empty($errors)) {
            echo "<div style='color: red;'>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            echo "</div>";
        }

        // Display success message if exists
        if (isset($success_message)) {
            echo "<div style='color: green;'>{$success_message}</div>";
        }
        ?>

        <form action="contactus.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
