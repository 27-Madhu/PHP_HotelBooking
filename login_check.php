<?php
session_start();
if (isset($_POST['login'])) {
    $useremail = $_POST['u_email'];
    $userpassword = $_POST['u_pass'];
    $con = mysqli_connect("localhost", "root", "", "hbwebsite");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $useremail = mysqli_real_escape_string($con, $useremail);
    $userpassword = mysqli_real_escape_string($con, $userpassword);
    
    $query = "SELECT * FROM register WHERE U_Email='$useremail'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($userpassword == $row['U_password']) { // Check if password matches
            $_SESSION['u_email'] = $useremail;
            header('Location: index.php');
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
    mysqli_close($con);
}
?>
