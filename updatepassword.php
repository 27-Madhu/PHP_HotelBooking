<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing:border-box;
            text-decoration:none;
            font-family: optional;
        }
        form{

            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background-color:rgb(210, 247, 247);
            width: 450px;
            height: 250px;
            border-radius:5px;
            padding: 40px 45px 50px 45px;



        }
        form h3{
            margin-bottom:20px ;
            
        }
        form input{
            width: 100%;
            margin-bottom: 20px;
            background-color:transparent;
            border:none;
            border-radius:0;
            padding: 5px 0;
            font-size:20px;
            outline:none;

        }
        form button{
            font-weight:550;
            font-style:15px;
            color:white;
            background-color:#30475e;
            padding: 4px 10px ;



        }
    </style>
</head>
<body>

<?php
require("db.php");

if(isset($_GET['u_email']) && isset($_GET['reset_token']))
{
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");

    // Escape user inputs to prevent SQL injection
    $u_email = mysqli_real_escape_string($con, $_GET['u_email']);
    $reset_token = mysqli_real_escape_string($con, $_GET['reset_token']);

    $query = "SELECT * FROM `register` WHERE `U_Email` = '$u_email' AND `resettoken` = '$reset_token' AND `resettokenexpire` = '$date' ";
    $result = mysqli_query($con, $query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            echo"
            <form method='post'>
                <h3>Create New Password</h3>
                <input type='password' name='password' placeholder='New Password' required>
                <input type='hidden' name='u_email' value='$u_email'>
                <button type='submit' name='updatepassword'>Update</button>
            </form>
            ";
        }
        else
        {
            echo "<script>
            alert('Invalid or expired Link');
            window.location.href='index.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
        alert('Server down! Try again later');
        window.location.href='index.php';
        </script>";
    }
}
?>


<?php
if(isset($_POST['updatepassword']))
{
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $u_email = mysqli_real_escape_string($con, $_POST['u_email']);
    $update = "UPDATE `register` SET `U_password`='$pass', `resettoken`=NULL ,`resettokenexpire`=NULL WHERE `U_Email`='$u_email'";
    
    if(mysqli_query($con, $update))
    {
        echo "<script>
        alert('Password Updated successfully');
        window.location.href='index.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Server down! Try again later');
        window.location.href='index.php';
        </script>";
    }
}

?>










</body>
</html>
