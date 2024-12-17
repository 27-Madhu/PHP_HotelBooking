<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations!</title>
    <!-- link includ -->
    <?php require('includ/link.php'); ?>
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
        
        .container {
            margin: 100px auto;
            text-align: center;
            width: 50%;
        }
        
        h1 {
            font-size: 36px;
            color: #4CAF50;
        }
        
        p {
            font-size: 24px;
        }
        
        .btn {
            padding: 10px 20px;
            font-size: 20px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- naverinclud -->
    <?php require('includ/header.php'); ?>
    
    <div class="container">
        <h1>Congratulations! Your Booking is Confirmed!</h1>
        <p>Thank you for choosing us. Your booking details are:</p>
        <div class="card bg-white rounded shadow border border-4 border-white pop">
            <img src="admin/images/main_room/<?php echo $_GET['room_image']; ?>" class="mt-3" alt="Room Image" style="height: 300px;">
            <h2><?php echo $_GET['room_title']; ?></h2>
            <h4>₹ <?php echo $_GET['room_amout']; ?></h4>
        </div>

        <a href="index.php" class="btn">Back to Home</a>
    </div>

    <!--Footer includ -->
    <?php require('includ/footer.php'); ?>
</body>
</html>
