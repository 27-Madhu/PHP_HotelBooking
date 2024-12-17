<?php
require("db.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token)
{
    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mkumari706@rku.ac.in';
        $mail->Password   = 'madhu@38';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('mkumari706@rku.ac.in', 'madhu');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset link from madhu';
        $mail->Body    = "We got a request from you to reset your password! Click the link below: <br>
        <a href='http://localhost/hotel/updatepassword.php?u_email=$email&reset_token=$reset_token'>Reset Password</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if(isset($_POST['pwdrst']))
{
    $query = "SELECT * FROM register WHERE u_email = '{$_POST['u_email']}'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata');
            $date = date("Y-m-d");
            $query = "UPDATE `register` SET `resettoken` = '$reset_token', `resettokenexpire`='$date' WHERE `U_Email`= '{$_POST['u_email']}'";
            if(mysqli_query($con,$query) && sendMail($_POST['u_email'] ,$reset_token))
            {
                echo "<script>
                alert('Password reset link sent to email');
                window.location.href='index.php';
                </script>";
            }
            else{
                echo "<script>
                alert('Password reset failed');
                window.location.href='index.php';
                </script>";
            }
        }
        else{
            echo "<script>
            alert('Server down, please try again later!');
            window.location.href='index.php';
            </script>";
        }
    }
    else{
        echo "<script>
        alert('Cannot run query');
        window.location.href='index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User_profile</title>
<?php require ('includ/link.php'); ?>

<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 input.parsley-success,
 select.parsley-success,
 textarea.parsley-success {
   color: #468847;
   background-color: #DFF0D8;
   border: 1px solid #D6E9C6;
 }

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.9em;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
  color:#ff0000;
 }
.error
{
  color: red;
  font-weight: 700;
} 
.input-container {
  margin-bottom: 15px;
}

.icon-input {
  position: relative;
}

.icon-input input {
  padding-left: 30px; 
  padding-top: 7px;
  padding-bottom: 7px;

  width: 90%;
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
    <div class="table-responsive">  
    <h3 align="center" class="mt-3">FORGOT <span class="text-warning "> PASSWORD</h3><br/>
    <div class="box">
     <form id="validate_form" method="post" >  

     <div class="input-container">
        <label for="uname" class="mb-2"><b>Enter Your Email</b></label>
        <div class="icon-input">
          <i class="bi bi-envelope-at-fill"></i> 
          <input type="email" placeholder="Enter Email" name="u_email" required>
        </div>
      </div>
      
      <br>
      <div class="form-group">
        <input type="submit" id="login" name="pwdrst" value="Send Password Reset Link" class="btn btn-success" />
      </div>
       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
     </div>
   </div>  
  </div>

  <?php require ('includ/footer.php'); ?>
</body>
</html>
