<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        aside {
            height: 100%;
            width: 170px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #20a2b3;
            padding-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f8f9fa;
            display: block;
            transition: 0.3s;
        }

        a:hover {
            background-color: #495057;
            color: #fff;
        }

        .logo {
            text-align: center;
            padding: 10px;
            color: #f8f9fa;
            font-size: 24px;
            text-decoration: none;
            display: block;
        }
    </style>
    <div class="logout">
                
                <br><br>
                <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
</head>
<body>

<aside>
    <div class="logo">
        <a href="#">ADMIN(IT) DASHBOARD</a>
    </div>
    <ul>
        <li>
            <a href="admin_profile.php">MY PROFILE</a>
        </li>
        <li>
            <a href="add_employee.php">USER CREATION</a>
        </li>
        <li>
            <a href="feedback.php">VIEW FEEDBACKS</a>
        </li>
        <li>
            <a href="view_jobcards.php">VIEW JOBCARDS</a>
        </li>
        <li>
            <a href="view_employee.php">VIEW ALL USERS DETAILS</a>
        </li>
        
    </ul>
</aside>

<div style="margin-left: 250px; padding: 20px;">
    
</div>


</body>
</html>
