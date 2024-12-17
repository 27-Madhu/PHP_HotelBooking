<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['u_email'])) {
    header("Location: login.php");
    exit(); // Stop executing the script
}

// Establish database connection
$con = mysqli_connect("localhost", "root", "", "hbwebsite");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking Details</title>
    <!-- link includ -->
    <?php require('includ/link.php'); ?>
    <!-- Style -->
    <style>
        body {
            font-family: "Trirong", serif;
            font-size: 20px;
            background-color: rgb(210, 247, 247);
        }

        .bg-color {
            background-color: rgb(250, 243, 237);
        }

        .row {
            height: 500px;
            margin-left: 5%;
        }

        h1 {
            margin-left: 7%;
        }

        .btn1 {
            border-radius: 5px;
            margin: 50px 130px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- nav includ -->
    <?php require('includ/header.php'); ?>
    <h1 class="mt-4">User Booking Details</h1>
<div class="d-flex">

    <div class="card  col-lg-8">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Email</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $email = $_SESSION['u_email'];
                            $query = "SELECT * FROM booking_info WHERE email = '$email'";
                            
                            $result = mysqli_query($con, $query);
                            if (!$result) {
                                die("Query failed: " . mysqli_error($con));
                            }
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['phone_num'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['check_in'] . "</td>";
                                echo "<td>" . $row['check_out'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="card col-lg-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Room Image</th>
                            <th scope="col">Room Title</th>
                            <th scope="col">Room Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $email = $_SESSION[''];
                        $query = "SELECT * FROM main_room WHERE sr_no = '$email'";
                        $result = mysqli_query($con, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($con));
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>"; // Start a new row
                            echo "<td><img src='admin/images/main_room/" . $row['room_image'] . "' height='100'></td>";
                            echo "<td>" . $row['room_title'] . "</td>";
                            echo "<td>" . $row['room_amount'] . "</td>";
                            echo "</tr>"; // End the row
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
</div>

    <!--Footer includ -->
    <?php require('includ/footer.php'); ?>
</body>
</html>
