<!-- forgot_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        /* Style for the logout button */
        .logout {
            text-align: right;
            margin-bottom: 10px;
        }

        .logout a {
            text-decoration: none;
        }
    </style>
</head>
<body style="background-image: url('image6.jpg');" class="body_deg">

<div class="container">
    <br><br>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>

    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Forgot Password</h2>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $currentPassword = $_POST['current_password'];
                        $newPassword = $_POST['new_password'];
                        $retypeNewPassword = $_POST['retype_new_password'];

                        // You should add appropriate validation here.
                        // For simplicity, let's assume the username is valid and the passwords match.

                        if ($newPassword != $retypeNewPassword) {
                            echo "New Password and Retyped Password do not match. Please try again.";
                        } else {
                            // Database connection details
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

                            // Update the user's password in the database
                            $updateQuery = "UPDATE user SET password = ? WHERE username = ? AND password = ?";
                            $stmt = $conn->prepare($updateQuery);
                            $stmt->bind_param("sss", $newPassword, $username, $currentPassword);
                            $stmt->execute();

                            if ($stmt->affected_rows > 0) {
                                echo "Password reset successful. Your new password is: $newPassword";
                            } else {
                                echo "Password reset failed. Please check your current password and try again.";
                            }

                            // Close the database connection
                            $stmt->close();
                            $conn->close();
                        }
                    }
                    ?>

                    <form action="forgot_password.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>

                        <div class="mb-3">
                            <label for="retype_new_password" class="form-label">Retype New Password</label>
                            <input type="password" class="form-control" name="retype_new_password" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
