<!-- carousel Image -->
<?php
  $con = mysqli_connect("localhost", "root", "", "hbwebsite");
  $q = "select * from carousel";
  $result = mysqli_query($con, $q);
  $count = mysqli_num_rows($result);
?>

<!-- about us -->
<?php
  $con = mysqli_connect("localhost", "root", "", "hbwebsite");
  $q = "select * from about_us";
  $res = mysqli_query($con, $q);
?>

<!-- index_room_detailes -->
<?php
  $con = mysqli_connect("localhost", "root", "", "hbwebsite");
  $q = "SELECT * from room_index";
  $rest = mysqli_query($con, $q);
?>

<!-- gallery detailes -->
<?php
  $con = mysqli_connect("localhost", "root", "", "hbwebsite");
  $q = "SELECT * FROM gallery";
  $select = mysqli_query($con, $q);
?>

<!-- Testmonial detailes -->
<?php
  $con = mysqli_connect("localhost", "root", "", "hbwebsite");
  $q = "SELECT * FROM testimonials";
  $sql = mysqli_query($con, $q);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_HOME</title>
    <!-- link includ -->
    <?php require ('includ/link.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Style -->
    <style>
        body {
        font-family: "Trirong", serif;
        font-size:20px;
        background-color:rgb(210, 247, 247);
        }
        .availability-form{
          margin-top:-50px ;
          z-index:2;
          position: relative;
        }
        @media screen and (max-width:575px){
          .availability-form{
          margin-top:25px ;
          padding: 0px 35px;
        }
        }
        .pop:hover{
            transform:scale(1.03);
            transition:all 0.3s;
        }
        .bg-color{

          background-color:rgb(250, 243, 237);
        }
        .text {
          font-size: 50px;
            font-family: sans-serif;
            color: white;
            width: 70%;
            border-radius: 10px;
            position: absolute;
            top:60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        

    </style>
    
</head>
<body >
  <!-- navbar includ -->
  <?php require ('includ/header.php'); ?>
  

  <!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
      <?php
        for ($i = 0; $i < $count; $i++) {
      ?>

        <div data-target="#demo" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 1) {echo "active";  } ?>"></div>
      <?php
        }
      ?>

    <div class="carousel-inner">
    <?php
        $i = 1;
        while ($img1 = mysqli_fetch_array($result)) {
        ?>
            <div class="carousel-item <?php if ($i == 1) {
                                            echo "active";
                                        } ?>">
                <img src="admin/images/slider/<?php echo $img1[1]; ?>" class="d-block w-100" alt="image" >

            </div>
        <?php
            $i++;
        }
        ?>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <!-- check availability-->
  <div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-color shadow p-4 rounded">
            <form action="rooms.php" method="GET">
                <div class="row align-items-end">
                    <div class="col-lg-3">
                        <label for="checkin" class="form-label" style="font-weight:500;">Check-in</label>
                        <input type="date" name="checkin" class="form-control" id="checkin" aria-describedby="numberHelp">
                    </div>
                    <div class="col-lg-3">
                        <label for="checkout" class="form-label" style="font-weight:500;">Check-Out</label>
                        <input type="date" name="checkout" class="form-control" id="checkout" aria-describedby="numberHelp">
                    </div>
                    <div class="col-lg-3">
                        <label for="adults" class="form-label" style="font-weight:500;">Adults</label>
                        <select name="adults" class="form-select" aria-label="Select number of adults">
                            <option selected>Select number of adults</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="children" class="form-label" style="font-weight:500;">Children</label>
                        <select name="children" class="form-select" aria-label="Select number of children">
                            <option selected>Select number of children</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none bg-warning">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
  <hr>

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
                  <p class="mb-4"><?php echo $a[2];?></
                  <a class="btn btn-warning py-3 px-5 mt-2" href="about.php">Explore More</a>
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


<!-- rooms details start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Explore Our <span class="text-warning text-uppercase">Rooms</span></h1>
        </div>
        <div class="row">
            <?php
            while ($a = mysqli_fetch_array($rest)) {
            ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="room-item shadow rounded overflow-hidden">
                    <div class="position-relative">
                        <img src="admin/images/room/<?php echo $a['room_image']; ?>" style="height:270px;" class="card-img-top" alt="image">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-warning text-white rounded py-1 px-3 ms-4"><?php echo $a['room_amout']; ?></small>
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
                            <small class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fet1']; ?></small>
                            <small class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fet2']; ?></small>
                            <small><?php echo $a['room_fet3']; ?></small>
                        </div>
                        <div class="d-flex mb-3">
                            <h5 class="me-4">Facilities</h5>
                            <small class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fac1']; ?></small>
                            <small class="border-end me-3 pe-3 border-dark"><?php echo $a['room_fac2']; ?></small>
                            <small><?php echo $a['room_fac3']; ?></small>
                        </div>
                        <div class="d-flex mb-3">
                            <h5 class="me-4">Guest</h5>
                            <small class="border-end me-3 pe-3 border-dark">Adult <?php echo $a['guest_adult']; ?></small>
                            <small>Children <?php echo $a['guest_childern']; ?></small>
                        </div>
                        <!-- <div class="d-flex justify-content-between">
                            <a class="btn btn-sm btn-warning rounded py-2 px-4" href="#">View Detail</a>
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Book Now</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!-- room details end -->
        <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
        </div>
    </div>
</div>



  <hr>

  <!-- OUR FACILITIES -->
  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="mb-5">Explore Our <span class="text-warning   text-uppercase">FACILITIES</span></h1>
  </div>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5" >
      
      <div class="col-lg-2 col-md-2 bg-color text-center bg-ligth rounded shadow py-4 my-3">
        <img src="image/wi-fi.jpg" alt="" width="80px">
        <h4 class="mt-4">wi-fi</h4>
      </div>
      <div class="col-lg-2 col-md-2 bg-color text-center bg-ligth rounded shadow py-4 my-3">
        <img src="image/ac.jpg" alt="" width="80px">
        <h4 class="mt-4">Room AC</h4>
      </div>
      <div class="col-lg-2 col-md-2 bg-color text-center bg-ligth rounded shadow py-4 my-3">
        <img src="image/heater.jpg" alt="" width="80px">
        <h4 class="mt-4">Room Heater</h4>
      </div>
      <div class="col-lg-2 col-md-2 bg-color text-center bg-ligth rounded shadow py-4 my-3">
        <img src="image/telivision.jpg" alt="" width="80px">
        <h4 class="mt-4">Telivision</h4>
      </div>
      <div class="col-lg-12 text-center mt-5">
            <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
        </div>
      
    </div>

  </div>
  <hr>


  <!-- galary -->
<div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="mb-5">Explore Our <span class="text-warning text-uppercase">GALLERY</span></h1>
</div>
<div class="container mt-4">
    <div class="row">
        <?php
        while ($row1 = mysqli_fetch_array($select)) {
        ?>
            <div class="col-lg-4 col-md-4 mb-5 px-4">
                <div class="bg-white rounded shadow border border-4 border-white pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="admin/images/gallery/<?php echo $row1['image_name']; ?>" alt="image" width="100%" height="250px">
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div> 
</div>

   
  <hr>
  

  <!--  TESTIMONIALS -->
  <!-- Use Swiper Js -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

  <div class="swiper-container ">
    <swiper-container class="SwiperTestimonials" pagination="true" effect="coverflow" grab-cursor="true" centered-slides="true"
    slides-per-view="auto" coverflow-effect-rotate="50" coverflow-effect-stretch="0" coverflow-effect-depth="100"
    coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">

      <!-- <div class="swiper-slide bg-color p-4" style="width:50%">
        <?php
          while($row2 =mysqli_fetch_array($sql)){
        ?>

          <div class="profile p-4 d-flex">
          <img src="admin/images/testimonials/<?php echo $row2['image']; ?>" alt="" style="width: 100px; border-radius: 50%;">
            <h4 class="m-0 ms-4 mt-4"><?php echo $row2['name']; ?></h4>

            <div class="rating mt-4" style="position: fixed; right: 20px; top: 20px;">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
            </div>

          </div>
          <p><?php echo $row2['description'];?></p>
        <?php
          }
        ?>
      </div> -->
      

      <div class="swiper-slide bg-color p-4" style="width:50%">
        <div class="profile p-4 d-flex">
        <img src="image/user1.jpg" alt="" style="width: 100px; border-radius: 50%;">
          <h4 class="m-0 ms-2 mt-4">Alka Soni</h4>

          <div class="rating mt-4" style="position: fixed; right: 20px; top: 20px;">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
          </div>

        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi veniam dignissimos alias facilis, dolor dicta distinctio      
          consequatur assumenda aliquid quaerat .
        </p>
        
      </div>
      
      <div class="swiper-slide bg-color p-4" style="width:50%">
        <div class="profile p-4 d-flex">
        <img src="image/user3.jpg" alt="" style="width: 100px; border-radius: 50%;">
          <h4 class="m-0 ms-2 mt-4">Rani Soni</h4>

          <div class="rating mt-4" style="position: fixed; right: 20px; top: 20px;">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
          </div>

        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi veniam dignissimos alias facilis, dolor dicta distinctio      
          consequatur assumenda aliquid quaerat .
        </p>
        
      </div>

      <div class="swiper-slide bg-color p-4" style="width:50%">
        <div class="profile p-4 d-flex">
        <img src="image/about.jpg" alt="" style="width: 100px; border-radius: 50%;">
          <h4 class="m-0 ms-2 mt-4">Madhu Soni</h4>

          <div class="rating mt-4" style="position: fixed; right: 20px; top: 20px;">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
          </div>

        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi veniam dignissimos alias facilis, dolor dicta distinctio      
          consequatur assumenda aliquid quaerat .
        </p>
        
      </div>

      <div class="swiper-slide bg-color p-4" style="width:50%">
        <div class="profile p-4 d-flex">
        <img src="image/user1.jpg" alt="" style="width: 100px; border-radius: 50%;">
          <h4 class="m-0 ms-2 mt-4">Khushboo Gupta</h4>

          <div class="rating mt-4" style="position: fixed; right: 20px; top: 20px;">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
          </div>

        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi veniam dignissimos alias facilis, dolor dicta distinctio      
          consequatur assumenda aliquid quaerat .
        </p>
        
      </div>

    </swiper-container>
    
  
  </div>

  



<hr>
  <!-- CONTACT US -->

  <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
    <h1 class="mb-5"> Our <span class="text-warning   text-uppercase">CONTACT  </span></h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 shadow bg-color ">
          <iframe class="w-100  p-4 mb-lg-0 mb-3 bg-white rounded" height="320" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107421.56789648301!2d74.77756255343164!3d32.71464725578352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391e84bf169d3525%3A0xf233488eeb8fd8d!2sJammu!5e0!3m2!1sen!2sin!4v1710605815463!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="col-lg-4 col-md-4 ">
        <div class="bg-color shadow p-4 rounded mb-4 ">
          <h5>Call Us</h5>
          <a href="tel: +91 95-8991308" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
            +91 95-8991308</a><br>
            <a href="tel: +91 95-8991308" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
              +91 95-8991308
            </a>
        </div>
        <div class="bg-color shadow p-4 rounded mb-4">
          <h5>Follow Us</h5>
          <a href="#" class="d-inline-block mb-3 ">
            <span class=" badge bg-ligth text-dark fs-6 p-2"><i class="bi bi-twitter"></i>
              Twiter
            </span>
          </a><br>
          <a href="#" class="d-inline-block mb-3 ">
            <span class=" badge bg-ligth text-dark fs-6 p-2"><i class="bi bi-facebook"></i>
              Facebook
            </span>
          </a><br>
          <a href="#" class="d-inline-block mb-3 ">
            <span class=" badge bg-ligth text-dark fs-6 "><i class="bi bi-instagram"></i>
              Instagram
            </span>
          </a><br>
        </div>



      </div>


    </div>
  </div>
  
  <!--Footer  includ -->
  <?php require ('includ/footer.php'); ?>

  

 <!-- Use Script for swiper js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <script>
     try {
      if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
      } else {
        document.documentElement.classList.remove('dark')
      }
    } catch (_) {}  
  </script> 



    
</body>
</html>