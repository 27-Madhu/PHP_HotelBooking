<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "hbwebsite");
    $q = "SELECT * FROM register";
    $rest = mysqli_query($con, $q);

    $user_name = "";
    $user_email = "";

    if (isset($_SESSION['u_email'])) {
        $user_email = $_SESSION['u_email'];
    }

    if (!empty($user_email)) {
        $query = "SELECT U_Name FROM register WHERE U_Email='$user_email'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row['U_Name'];
    }



?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <!-- Include CSS -->
    <?php require('includ/link.php'); ?>
    <style>

        body{
        background-color:rgb(210, 247, 247);
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        }
        .card{
        width:100%;
        height: 600px;
        margin-left: 90%;
        border-radius:8px;
        /* margin:5px; */
        }
        .card-title{
            margin-top: 50px;
        }
        .card-img-top{
        width: 35%;
        margin-left: 1%;
        height: 150px;
        border-radius:50%;
        }
        .card-img-top{
        margin-top: 10px;
        }
        h5{
        margin-left: 3%;
        }
        .name{
        border:1px solid black;
        border-radius:4px;
        padding: 8px;
        display: flex;
        align-items: center;
        }
        .name:hover{ 
        background-color:LightGray;

        }
        .email{
        border:1px solid black;
        border-radius:4px;
        padding: 8px;
        display: flex;
        align-items: center;
        }
        .email:hover{ 
        background-color:LightGray;

        }


        .icon {
        margin-right: 10px; 
        }
        .btn{
        border:1px solid black;
        border-radius:4px;
        padding: 8px;
        display: flex;
        align-items: center;

        }
        .btn:hover{ 
        background-color:DodgerBlue;

        } */


    </style>
</head>
<body>
<?php require('includ/header.php'); ?>

    <!-- Sidebar -->
    <div class="col-lg-4 border-secondary dashbord-menu sticky-side mt-4">
        <div class="card me-4">
            <div class="card-body ">
                    <center><h2 class="mt-4 me-2">Your <span class="text-warning ">Profile Details</span></h2></center>
            <div class="d-flex">
                <img src="image/user5.jpg" class="card-img-top" alt="...">
                <h5 class="card-title "><span class=" text-uppercase"><?php echo $user_name; ?></h5>
            </div>
            <?php if(!empty($user_name)): ?>
                    <p class="name"><i class="bi bi-person icon me-2"></i>Your Name &nbsp;&nbsp; <span class=" text-uppercase"><?php echo $user_name; ?></p>
                <?php endif; ?>
                <?php if(!empty($user_email)): ?>
                    <p class="email"><i class="bi bi-envelope-arrow-down-fill icon me-2"></i>Your Email &nbsp;&nbsp; <?php echo $user_email; ?></p>
                <?php endif; ?>
                <!-- <div class="email"><i class="bi bi-pen-fill icon me-2"></i> Edit Your Profile</div> -->
                <a href="user_booking_details.php" class="btn  mt-2"><i class="bi bi-file-check-fill me-2"></i>Check Your Booking Details</a>
                <a href="user_logout.php" class="btn  mt-2"> <i class="bi bi-box-arrow-right icon "></i>Logout</a>
            </div>
        </div>

    </div>

<!-- Footer -->
<?php require('includ/footer.php'); ?>
</body></html>
