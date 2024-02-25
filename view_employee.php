<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'employee') {
    header("location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";

$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle search query
$search = isset($_GET['search']) ? mysqli_real_escape_string($data, $_GET['search']) : '';

// Modify the SQL query to include the search condition
$sql = "SELECT * FROM employee_tbl";
if (!empty($search)) {
    $sql .= " WHERE emp_no LIKE '%$search%'";
}

$result = mysqli_query($data, $sql);

// Fetch all data and store it in an array
$employeeData = [];
while ($info = $result->fetch_assoc()) {
    $employeeData[] = $info;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>
    <style type="text/css">
        /* Your existing styles here */
        .table_th,
        .table_td {
            padding: 20px;
            font-size: 11px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #000080;
            /* Blue color for the heading */
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        /* Additional styles for buttons */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
        }

        /* Style for print button */
        .print-btn {
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .print-btn:hover {
            background-color: #006699;
        }
    </style>
</head>

<body background="image123.jpg">
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h2>ALL THE EMPLOYEE DETAILS</h2>
            <br>
        </center>
        <!-- Add search form -->
        <form method="get" action="">
            <label for="search">Search by Employee No:</label>
            <input type="text" name="search" id="search" value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>
        <br><br>

        <table border="1px" class="table">
            <tr>
                <th class="table_th">Employee No:</th>
                <th class="table_th">Employee Name:</th>
                <th class="table_th">Employee Designation:</th>
                <th class="table_th">Employee Working Section:</th>
                <th class="table_th">Employee Contact Number:</th>
                <th class="table_th">Employee Email:</th>
            </tr>
            <?php
            foreach ($employeeData as $info) {
                ?>
                <tr>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_no']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_name']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_desig']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_section']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_phone']); ?></td>
                    <td class="table_td"><?php echo htmlspecialchars($info['emp_email']); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br><br>

        <!-- Print button -->
        <form method="post" action="printable_emp.php" target="_blank">
            <input type="submit" class="print-btn" value="Print">
        </form>
    </div>
</body>

</html>
