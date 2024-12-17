<?php
// session_start();
// session_regenerate_id(true);
if(isset($_SESSION['U_Email']) && isset($_SESSION['U_password'])) {
    redirect('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Madhu Hotel_Login</title>
<?php require ('includ/link.php'); ?>

<style>
  body {
     font-family: "Trirong", serif;
     font-size: 17px;
     background-color:rgb(210, 247, 247);
     }
  .bg-color{
        background-color:rgb(250, 243, 237);
     }
  input[type=email], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
  }

  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }
  .container {
    padding: 16px;
    width: 50%;
    margin-left: 25%;
    margin-top: 100px;
    background-color: white;

  }
 
  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
  }
  .input-container {
  margin-bottom: 15px;
  }

  .icon-input {
    position: relative;
  }

  .icon-input input {
    padding-left: 30px; /* Adjust this value to accommodate the icon */
  }

  .icon-input i {
    position: absolute;
    left: 5px;
    top: 50%;
    transform: translateY(-50%);
  }

</style>

</head>
<body>
<?php require ('includ/header.php'); ?>


<div class="container">
  <form action="login_check.php" method="post">
    <center><h2>LOGIN <span class="text-warning upcarse">FORM</h2></center>  

    <div class="input-container">
      <label for="uname"><b>UserEmail</b></label>
      <div class="icon-input">
        <i class="bi bi-envelope-at-fill"></i> 
        <input type="email" placeholder="Enter Email" name="u_email" required>
      </div>
    </div>
    
    <div class="input-container">
      <label for="psw"><b>Password</b></label>
      <div class="icon-input">
        <i class="bi bi-lock-fill"></i>
        <input type="password" placeholder="Enter Password" name="u_pass" required>
      </div>
    </div>
        
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label> 
    <span class="psw">Forgot <a href="user_forget.php">password?</a></span>
  </form>
</div>
  <?php require ('includ/footer.php'); ?>

</body>
</html>