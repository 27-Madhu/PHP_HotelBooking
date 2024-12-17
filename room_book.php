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

// Process form submission
if(isset($_POST['btn'])){
    // Sanitize inputs to prevent SQL injection
    $u_name = mysqli_real_escape_string($con, $_POST['u_name']);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $check_in = mysqli_real_escape_string($con, $_POST['check_in']);
    $check_out = mysqli_real_escape_string($con, $_POST['check_out']);
    $email = $_SESSION['u_email']; // Get email from session

    // Prepare and bind SQL statement using prepared statements
    $stmt = $con->prepare("INSERT INTO booking_info (name, phone_num, address, check_in, check_out, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $u_name, $phone_number, $address, $check_in, $check_out, $email);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Redirect to confirmation page with room details
        header("Location: confirmation.php?room_image={$_POST['room_image']}&room_amout={$_POST['room_amout']}&room_title={$_POST['room_title']}");
        exit();
    } else {
        echo '<script>alert("Booking Failed. Please try again.");</script>';
    }

    // Close statement
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_ROOMS</title>
    <!-- link includ -->
    <?php require ('includ/link.php'); ?>
    <!-- Style -->
    <style>
        body {
            font-family: "Trirong", serif;
            font-size:20px;
            background-color:rgb(210, 247, 247);
        }
        
        .bg-color{
            background-color:rgb(250, 243, 237);
        }
        
        .row {
            height: 500px;
            margin-left: 5%;
            
        }
        h1{
          margin-left: 7%;

        }
        .btn1{
          border-radius:5px;
          margin: 50px 130px;
          padding: 10px;
        }
        
    </style>
    <!-- Script for displaying alerts -->
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <!-- naverinclud -->
    <?php require ('includ/header.php'); ?>
    <h1 class="mt-4 ">CONFORM <span class="text-warning text-uppercase">BOOKING</span></h1>

    <div class="d-flex">
        <div class=" row col-lg-6 col-md-4 mb-4 px-4">
            <div class=" card bg-white rounded shadow border border-4 border-white pop">
                <img src="admin/images/main_room/<?php echo $_GET['room_image']; ?>" class="mt-3" alt="Room Image" style="height: 300px;">
                <h2> <?php echo $_GET['room_title']; ?></h2>
                <h4>₹ <?php echo $_GET['room_amout']; ?></h4>
            </div>
        </div>

        <div class=" row  col-lg-4 col-md-4  mb-4 px-4 rounded shadow border border-4 border-white pop bg-light">
            <form action="room_book.php" method="post">
                <div class=" row1 ">
                    <h3 class="mt-4 ">BOOKING DETAILS</h3>
                    <div class="d-flex">
                        <div class="form-group me-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="u_name" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="number" class="form-control " id="phone_number"  name="phone_number" required>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control " id="address"  name="address"  rows="1" required></textarea>
                    </div>
                    

                    <div class="d-flex mt-4">
                        <div class="form-group me-4">
                            <label for="check_in" class="form-label ">Check_In </label>
                            <input type="date" name="check_in" id="check_in" required>
                        </div>
                    
                        <div class="form-group me-4">
                            <label for="check_out" class="form-label ">Check_Out </label>
                            <input type="date" name="check_out" id="check_out" required>
                        </div>
                    </div>
                    <!-- Hidden inputs for passing room details -->
                    <input type="hidden" name="room_image" value="<?php echo $_GET['room_image']; ?>">
                    <input type="hidden" name="room_amout" value="<?php echo $_GET['room_amout']; ?>">
                    <input type="hidden" name="room_title" value="<?php echo $_GET['room_title']; ?>">
                    <input type="hidden" name="email" value="<?php echo $_SESSION['u_email']; ?>">
                    <button type="submit" name="btn" class="btn btn1 text-white bg-warning  shadow-none">Booking Conform</button>
                </div>
            </form>
        </div>
    </div>

    <!--Footer includ -->
    <?php require ('includ/footer.php'); ?>
</body>
</html>
