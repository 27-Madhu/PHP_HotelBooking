
<?php
  $con = mysqli_connect("localhost", "root","","hbwebsite");
  $q= "SELECT *FROM facilities";
  $sel=mysqli_query($con,$q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_FACILITIES</title>
    <!-- link includ -->
    <?php require ('includ/link.php'); ?>

    <!-- Style -->
    <style>
        body {
        font-family: "Trirong", serif;
        font-size: 17px;
        background-color:rgb(210, 247, 247);

        }
        .bg-color{

            background-color:rgb(250, 243, 237);
        }
        
        .pop:hover{
            border-top-color: rgb(89, 197, 230) !important;
            transform:scale(1.03);
            transition:all 0.3s;
        }

    </style>
</head>
<body > 
  <!-- naverinclud -->
  <?php require ('includ/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold text-center">OUR FACILITIES</h2>
    <div class="h-line bg-dark"></div>
  </div> 
  <div class="container">
    <div class="row">
    <?php
      while($a= mysqli_fetch_array($sel)){
        ?>
          
        <div class="col-lg-4 col-md-4 mb-5 px-4 ">
            <div class="bg-color rounded shadow p-4 border-top border-4 border-dark pop">
                <div class="d-flex algin-item-center mb-2">
                    <img src="admin/images/facilities/<?php echo $a['1']; ?>" width="40px">
                    <h5 class="m-0 ms-3"><?php echo $a['2']; ?></h5>
                </div>
                <p class="mb-4 "><?php echo $a['3']; ?></p>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
  </div>
  

  <!--Footer  includ -->
  <?php require ('includ/footer.php'); ?>
    
    
</body>
</html>