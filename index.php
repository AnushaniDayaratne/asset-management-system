<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSGUARDIAN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .main_img,
        .service {
            animation: fadeIn 2s ease-in-out;
        }

        .feedback-container {
            animation: zoomIn 2s ease-in-out;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(0);
    session_start();
    session_destroy();

    if ($_SESSION['message']) {
        $message = $_SESSION['message'];

        echo "<script type='text/javascript'>
            alert('$message');
        </script>";
    }
    ?>

    <nav>
        <label class="logo">SYSGUARDIAN</label>
        <ul>
            <li><a href="">HOME</a></li>
            <li><a href="register.php">REGISTER</a></li>
            <li><a href="login.php" class="btn btn-success">LOGIN</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text">MAXIMIZING EFFICIENCY AND GROWTH</label>
        <img class="main_img" src="newback.jpg">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="service" src="q3.jpg">
                <h3>Asset Management</h3>
                <p>An Asset Management System (AMS) is a comprehensive software solution designed to efficiently track,
                    monitor, and manage an organization's assets throughout their lifecycle.
                    These assets can include physical items like equipment, machinery, vehicles, and IT hardware,
                    as well as intangible assets such as software licenses and intellectual property.</p>
            </div>
            <div class="col-md-4">
                <img class="service" src="q2.jpg">
                <h3>JobCard Management</h3>
                <p>An IT Issues Management System is a specialized software solution designed to streamline and enhance
                    the resolution process of technology-related problems within an organization.
                    This system serves as a centralized hub for reporting, tracking, and resolving IT issues efficiently.
                    Users can submit problem tickets, detailing the nature of the issue and its impact, initiating a systematic workflow.</p>
            </div>
            <div class="col-md-4">
                <img class="service" src="q4.jpg">
                <h3>IT Performance Management</h3>
                <p>An IT Performance Management System is a sophisticated tool designed to monitor, measure, and optimize
                    the performance of an organization's IT infrastructure.
                    This system employs a set of key performance indicators (KPIs) to assess various aspects of IT operations,
                    including network latency, system response times, server efficiency, and application performance.</p>
            </div>
        </div>
    </div>

    <div class="container feedback-container">
        <h2 class="text-center feedback-header">FEEDBACK</h2>

        <form action="data_check.php" method="POST">
            <div class="mb-3">
                <label class="label-text">Name</label>
                <input class="form-control input-deg" type="text" name="name" required>
            </div>
            <div class="mb-3">
                <label class="label-text">Email</label>
                <input class="form-control input-deg" type="email" name="email" required>
            </div>
            <div class="mb-3">
                <label class="label-text">Comment</label>
                <textarea class="form-control input-txt" name="comment" required></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="submit" type="submit" name="send">Send</button>
            </div>
        </form>
    </div>

    <footer>
        <h5 class="footer_txt">  Copyright and Copy: 2023 National water supply and drainage board. All rights reserved.</h5>
    </footer>
</body>

</html>
