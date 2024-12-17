<?php
require('includ/essentionals.php'); 
require('includ/da_config.php'); 

adminLogin();    

// Establish database connection
$con = mysqli_connect("localhost", "root", "", "hbwebsite");
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// For marking as read
if(isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    // Mark one by one data
    if(isset($frm_data['seen'])) {
        $q = "UPDATE `booking_info` SET `seen` = 1 WHERE `sr_no` = ?";

        $stmt = mysqli_prepare($con, $q);
        mysqli_stmt_bind_param($stmt, "i", $frm_data['seen']);
        
        if(mysqli_stmt_execute($stmt)) {
            alert('success', 'Marked as read');
        } else {
            alert('error', 'Operation failed');
        }
    }
}

// For delete
if(isset($_GET['del'])) {
    $frm_data = filteration($_GET);
    
    // Delete all data
    if(isset($frm_data['del']) && $frm_data['del'] == 'all') {
        $q = "DELETE FROM `booking_info`";
        
        $stmt = mysqli_prepare($con, $q);
        
        if(mysqli_stmt_execute($stmt)) {
            alert('success', 'Deleted all data');
        } else {
            alert('error', 'Operation failed');
        }
    } 
    // Delete one by one data 
    else {
        $q = "DELETE FROM `booking_info` WHERE `sr_no` = ?";
        
        $stmt = mysqli_prepare($con, $q);
        mysqli_stmt_bind_param($stmt, "i", $frm_data['del']);
        
        if(mysqli_stmt_execute($stmt)) {
            alert('success', 'Data Deleted');
        } else {
            alert('error', 'Operation failed');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-User massage</title>
    <?php require('includ/link.php');?>
    <style>
        .custom-alert{
            position: fixed;
            top:80px;
            right: 25px;

        }

    </style>
</head>
<body class="bg-light">
    
  <!-- includheader file -->
  <?php require('includ/hearder.php') ?>
  
    <div class="container-fluid main-contant">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Booking Details</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm "><i class="bi bi-archive me-2"></i>Delete all</a>
                        </div>
                        
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead class="sticky-top">
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone_num</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Check_In</th>
                                    <th scope="col">Check_Out</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q = "SELECT booking_info.*, register.U_Email FROM booking_info LEFT JOIN register ON booking_info.email = register.U_Email ORDER BY booking_info.sr_no DESC";
                                $data = mysqli_query($con, $q);

                                if (!$data) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                $i = 1;
                                while($row = mysqli_fetch_assoc($data)){
                                    $seen='';
                                    if($row['seen'] != 1) {
                                        $seen = "<a href='?seen={$row['sr_no']}' class='btn btn-sm rounded-pill btn-primary me-2'>Mark as read</a>";
                                    }
                                    $seen.= "<a href='?del={$row['sr_no']}' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                    echo <<<query
                                    <tr>
                                        <td>$i</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['phone_num']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['check_in']}</td>
                                        <td>{$row['check_out']}</td>
                                        <td>{$row['date']}</td>
                                        <td>$seen</td>
                                        <td>{$row['U_Email']}</td>
                                    </tr>
                                    query; // Moved to the start of the line
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php require('includ/script.php'); ?>
</body>
</html>
