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

if (isset($_POST['add_employee'])) {
    $emp_no = $_POST['emp_no'];
    $emp_name = $_POST['emp_name'];
    $emp_desig = $_POST['emp_desig'];
    $emp_section = $_POST['emp_section'];
    $emp_phone = $_POST['emp_phone']; 
    $emp_email = $_POST['emp_email']; 

    $sql = "INSERT INTO employee_tbl (emp_no, emp_name, emp_desig, emp_section, emp_phone, emp_email)
            VALUES ('$emp_no', '$emp_name', '$emp_desig', '$emp_section', '$emp_phone', '$emp_email')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        echo "<script type='text/javascript'>
            alert('Data Upload Success!');
        </script>";
    } else {
        echo "Upload Failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>
    <style>
        label {
            display: block;
            margin-bottom: 8px;
            color: white;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.6);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px; 
            border: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            color: #000080;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body background="image123.jpg">
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h2> EMPLOYEE DETAILS</h2>

        <div>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label class="form-label">Employee No :</label>
                    <input type="text" name="emp_no" class="form-control" placeholder="Enter the Employee Number" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Employee Name :</label>
                    <input type="text" name="emp_name" class="form-control" placeholder="Enter the Employee Name" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Employee Designation:</label>
                    <input type="text" name="emp_desig" class="form-control" placeholder="Enter the Employee Designation" autocomplete="off" required>
                </div>
                <div class="mb-3">
    <label class="form-label">Employee Working Section:</label>
    <select name="emp_section" class="form-control" required>
        <option value="">Select Working Section</option>
        <option value="IT Section">IT Section</option>
        <option value="Audit Section">Audit Section</option>
        <option value="P&D">P&D</option>
    </select>
</div>

                <div class="mb-3">
                    <label class="form-label">Employee's Contact Number:</label>
                    <input type="text" name="emp_phone" class="form-control" placeholder="Enter the Employee Contact Number" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Employee's Email Address:</label>
                    <input type="email" name="emp_email" class="form-control" placeholder="Enter the Employee Email Address" autocomplete="off" required>
                </div>
                <button type="submit" name="add_employee" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <br><br>
    </div>
</body>

</html>
