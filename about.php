<!-- about us -->
<?php
$con = mysqli_connect("localhost", "root", "", "hbwebsite");
$q = "select * from about_us";
$res = mysqli_query($con, $q);
?>

<?php
$con = mysqli_connect("localhost", "root", "", "hbwebsite");
$q = "select * from our_team";
$sel = mysqli_query($con, $q);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_About</title>
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


        .box:hover{
            border-top-color: rgb(89, 197, 230) !important;
            transform:scale(1.03);
            transition:all 0.3s;
        }
        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


    </style>
</head>
<body>

  <!-- naverinclud -->
  <?php require ('includ/header.php'); ?>

  <div class="my-5 px-4">
  <h1 class="section-title text-center text-warning text-uppercase">___ABOUT US___</h1>
  </div> 


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                <?php
                  while ($a = mysqli_fetch_array($res)) {
                  ?>
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-warning text-uppercase">About us_
                        </h6>

                        <h1 class="mb-4">Welcome to <span class="text-warning text-uppercase"><?php echo $a[1];?></span></h1>
                        <p class="mb-4"><?php echo $a[2];?></p>

                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="admin/images/about/<?php  echo $a[3];?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="admin/images/about/<?php  echo $a[4];?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="admin/images/about/<?php  echo $a[5];?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="admin/images/about/<?php  echo $a[6];?>">
                            </div>
                        </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
            </div>
        </div>
        <!-- About End -->


  <div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 p-4">
            <div class=" bg-color round shadow p-4 border-top border-4 text-center box">
                <img src="image/room5.jpg" alt="" width=70px;>
                <h4 class="mt-4">100+ ROOMS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 p-4">
            <div class=" bg-color round shadow p-4 border-top border-4 text-center box">
                <img src="image/customer1.jpg" alt="" width=70px;>
                <h4 class="mt-4">200+ CUSTOMER</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 p-4">
            <div class=" bg-color round shadow p-4 border-top border-4 text-center box">
                <img src="image/review.jpg" alt="" width=70px;>
                <h4 class="mt-4">150+ REVIEWS</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 p-4">
            <div class=" bg-color round shadow p-4 border-top border-4 text-center box">
                <img src="image/staffs.jpg" alt=""  width=70px;>
                <h4 class="mt-4">70+ STAFFS</h4>
            </div>
        </div>

    </div>
  </div>

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title text-center text-warning text-uppercase">___Our Team___</h5>
            <h1 class="mb-5">Explore Our <span class="text-warning text-uppercase">TEMS</span></h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-8 wow fadeInUp" data-wow-delay="0.1s"> <!-- Adjust column size as needed -->
                <div class="row g-4">
                    <?php
                    while ($row = mysqli_fetch_array($sel)) {
                    ?>
                    <div class="col-md-3"> <!-- Adjust column size for individual team members -->
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid " src="admin/images/ourteam/<?php echo $row['team_image']; ?>" alt=" Image" style="height:200px">
                            </div>
                            <div class="text-center p-4 bg-color">
                                <h5 class="fw-bold mb-0"><?php echo $row['team_name']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->






  <script>
    try {
          if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
          } else {
            document.documentElement.classList.remove('dark')
          }
        } catch (_) {}

  </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  
  



  <!--Footer  includ -->
  <?php require ('includ/footer.php'); ?>
    
    
</body>
</html>