<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "itm_db";


$data = new mysqli($host, $user, $password, $db);


if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}


$sql = "SELECT emp_no, emp_name, emp_desig,emp_section,emp_phone,emp_email FROM employee_tbl";
$result = $data->query($sql);


if ($result === false) {
    die("Error in the query: " . $data->error);
}


$employeeData = [];
while ($info = $result->fetch_assoc()) {
    $employeeData[] = $info;
}


$data->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Printable Employee Details</title>
    <style type="text/css">
       
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #000080;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>ALL THE EMPLOYEE DETAILS</h2>
    <table border="1px">
        <tr>
            <th>Employee No:</th>
            <th>Employee Name:</th>
            <th>Employee Designation:</th>
            <th>Employee Section:</th>
            <th>Employee Contact No:</th>
            <th>Employee Email Address:</th>
        </tr>
        <?php
        foreach ($employeeData as $info) {
            ?>
            <tr>
                <td><?php echo $info['emp_no']; ?></td>
                <td><?php echo $info['emp_name']; ?></td>
                <td><?php echo $info['emp_desig']; ?></td>
                <td><?php echo $info['emp_section']; ?></td>
                <td><?php echo $info['emp_phone']; ?></td>
                <td><?php echo $info['emp_email']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <script>
       
        window.onload = function () {
            window.print();
        };
    </script>
</body>

</html>
