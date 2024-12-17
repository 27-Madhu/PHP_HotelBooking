<?php
$con = mysqli_connect("localhost", "root", "", "hbwebsite");

if (isset($_POST['btn'])) {
    $name = $_POST['u_name'];
    $email = $_POST['u_email'];
    $phone = $_POST['u_number'];
    $pincode = $_POST['u_pincode'];
    $address = $_POST['u_address'];
    $password = $_POST['u_password'];
    $user_img = uniqid() . $_FILES['u_img']['name'];

    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $phone = mysqli_real_escape_string($con, $phone);
    $pincode = mysqli_real_escape_string($con, $pincode);
    $address = mysqli_real_escape_string($con, $address);
    $password = mysqli_real_escape_string($con, $password);
    $user_img = mysqli_real_escape_string($con, $user_img);

    $q = "INSERT INTO register (U_Name, U_Email, U_Number, U_Pincode, U_Address, U_Id_img, U_password)
          VALUES ('$name', '$email', '$phone', '$pincode', '$address', '$user_img', '$password')";

    if (mysqli_query($con, $q)) {
        if (!is_dir("image/user_img")) {
            mkdir("image/user_img");
        }
        move_uploaded_file($_FILES['u_img']['tmp_name'], "image/user_img/" . $user_img);
        header("Location: index.php");
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Madhu Hotel_FACILITIES</title>
<!-- link includ -->
<?php require ('includ/link.php'); ?>
<style>
      .error {
          color: red;
      }

        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color:rgb(210, 247, 247);

        }

      .form-group {
        display: inline-block;
        width: 48%; /* Adjust as needed */
        margin-right: 2%; /* Adjust as needed */
      }

      .form-group:last-child {
        margin-right: 0;
      }


      .container {
        padding: 16px;
        background-color: white;
        width: 50%;
        margin-left: 25%;
      }

      input[type=text], input[type=password] ,input[type=email],input[type=file],input[type=number]{
        width: 90%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
      }

      input[type=text]:focus, input[type=password] ,input[type=email],input[type=file],input[type=number]:focus {
        background-color: #ddd;
        outline: none;
      }

      hr {
        margin-bottom: 25px;
      }

      .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }

      .registerbtn:hover {
        opacity: 1;
      }

      a {
        color: dodgerblue;
      }

      .signin {
        background-color: #f1f1f1;
        text-align: center;
      }
</style>
</head>
<body>

<?php require ('includ/header.php'); ?>
       
       <form action="dababse_register.php" method="post" id="register" enctype="multipart/form-data">
         <div class="container">
           <center><h1>Register</h1></center> 
           <p>Note: Your details must match with your ID (Aadhar card, passport, etc.) that will be required during check-in.</p>
           <hr>
           <div class="d-flex">
             <div class="form-group">
               <label for="name" class="form-label">Name</label>
               <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="u_name">
             </div>
     
             <div class="form-group">
               <label for="email" class="form-label">Email address</label>
               <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="u_email">
             </div>
           </div>
           
           <div class="d-flex">
             <div class="form-group">
               <label for="number" class="form-label">Phone Number</label>
               <input type="number" class="form-control" id="number" aria-describedby="numberHelp" name="u_number">
             </div>
             <div class="form-group">
               <label for="pin" class="form-label">Pincode</label>
               <input type="number" class="form-control" id="pin" aria-describedby="pinHelp" name="u_pincode">
             </div>
           </div>
     
           <div class="d-flex">
             <div class="form-group">
               <label for="textarea" class="form-label">Address</label>
               <input type="text" class="form-control" id="textarea"  name="u_address">
             </div>
             <div class="form-group">
               <label for="file" class="form-label">ID Image (Aadhar, PAN) card</label>
               <input type="file" class="form-control" id="file" aria-describedby="fileHelp" name="u_img">
             </div>
           </div>
     
           <div class="d-flex">
             <div class="form-group">
               <label for="pass" class="form-label">Password</label>
               <input type="password" class="form-control" id="pass" aria-describedby="passHelp" name="u_password">
             </div>
             
             <div class="form-group">
               <label for="con-pass" class="form-label">Confirm password</label>
               <input type="password" class="form-control" id="con-pass" aria-describedby="conPassHelp">
             </div>
           </div>
     
           <hr>
     
           <button type="submit" name="btn" class="registerbtn">Register</button>
         </div>
         
         <div class="container signin">
           <p>Already have an account? <a href="login.php">Sign in</a>.</p>
         </div>
       </form>
     
     
       <!--Footer  includ -->
       <?php require ('includ/footer.php'); ?>
     
<!-- HTML content -->
</body>
</html>
