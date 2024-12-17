<?php
session_start();

// Check if the user is not logged in, redirect to login page

// Check if the "Book Now" button is clicked
if(isset($_POST['book_now'])) {
    // Redirect to room_book.php
    header("Location: room_book.php");
    exit();
}

// Establish database connection
$con = mysqli_connect("localhost", "root", "", "hbwebsite");

// Retrieve values from the URL
$adults = isset($_GET['adults']) ? $_GET['adults'] : null;
$children = isset($_GET['children']) ? $_GET['children'] : null;

// Construct SQL query to filter rooms based on the number of adults and children
if ($adults !== null && $children !== null) {
    $q = "SELECT * FROM main_room WHERE guest_adult = $adults AND guest_childern = $children";
} else {
    // If adults and children are not set, show all rooms
    $q = "SELECT * FROM main_room";
}
$rest = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_ROOMS</title>
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
    </style>
</head>
<body>
<!-- naverinclud -->
<?php require('includ/header.php'); ?>

<div class="container-xxl py-5 ">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Explore Our <span class="text-warning text-uppercase">Rooms</span></h1>
        </div>
        <div class="row">
            <?php
            while ($a = mysqli_fetch_array($rest)) {
                ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp  mt-4" data-wow-delay="0.1s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img src="admin/images/main_room/<?php echo $a['room_image']; ?>" style="height:270px;"
                                 class="card-img-top" alt="image">
                            <small
                                class="position-absolute start-0 top-100 translate-middle-y bg-warning text-white rounded py-1 px-3 ms-4"><?php echo $a['room_amout']; ?></small>

                        </div>
                        <div class="p-4 bg-color">
                            <div class="d-flex justify-content-between mb-3">
                                <h2 class="mb-0"><?php echo $a['room_title']; ?></h2>
                                <div class="ps-2">
                                    <span class="badge rounded-pill bg-ligth">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <h5 class="me-4">Features</h5>
                                <small
                                    class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fet1']; ?></small>
                                <small
                                    class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fet2']; ?></small>
                                <small><?php echo $a['room_fet3']; ?></small>
                            </div>
                            <div class="d-flex mb-3">
                                <h5 class="me-4">Facilities</h5>
                                <small
                                    class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fac1']; ?></small>
                                <small
                                    class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fac2']; ?></small>
                                    <small
                                    class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fac3']; ?></small>
                                <small><?php echo $a['room_fac4']; ?></small>
                            </div>
                            <div class="d-flex mb-3">
                                <h5 class="me-4">Guest</h5>
                                <small
                                    class="border-end me-3 pe-3 border-dark">Adult <?php echo $a['guest_adult']; ?></small>
                                <small>Children <?php echo $a['guest_childern']; ?></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <form method="POST" >
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" name="book_now"
                                    href="room_book.php?room_image=<?php echo $a['room_image']; ?>&room_amout=<?php echo $a['room_amout']; ?>&room_title=<?php echo urlencode($a['room_title']); ?>">Book
                                        Now</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
        <!-- room details end -->

    </div>
</div>

<!--Footer  includ -->
<?php require('includ/footer.php'); ?>


</body>
</html>
