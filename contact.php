
<?php
  $con = mysqli_connect("localhost", "root","","hbwebsite");
  $q= "SELECT *FROM change_connect";
  $sel=mysqli_query($con,$q);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madhu Hotel_Contact</title>
    <!-- link includ -->
    <?php require ('includ/link.php'); ?>
    <style>
        body {
        font-family: "Trirong", serif;
        font-size:20px;
        background-color:rgb(210, 247, 247);

        }
        .bg-color{

            background-color:rgb(250, 243, 237);
        }
        .custom-alert{
            position: fixed;
            top:100px;
            right: 25px;

        }



    </style>
    <!-- Style -->
</head>
<body>
    
  <!-- naverinclud -->
  <?php require ('includ/header.php'); ?>

  <div class="my-5 px-4">
  <h1 class="section-title text-center text-warning text-uppercase">___CONTAC US___</h1>
  </div> 

  <!-- container -->
  <div class="container">

    <!-- leftside -->
    <div class="row">
        <div class="col-lg-6 col-md-4  px-4 ">
        <?php
            while($a= mysqli_fetch_array($sel)){
        ?>
            <div class="bg-color rounded shadow p-4 ">
            
            <h3>Address</h3>
            <a href="https://maps.app.goo.gl/pQARg9LcHv9i113N8" class="d-inline-block text-dark text-decoration-none" target="_blanck"><i class="bi bi-geo-alt-fill"></i>
            <!-- Kashmir,Jammu Near to Raghunath mandir chowk Jammu city,  180001 -->
            <?php echo $a['address']; ?>
            </a>
            <h5 class=mt-4>Call Us</h5>
            <a href="tel: +91 95-8991308" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
                +91 <?php echo $a['number1'];?>
            </a><br>
            <a href="tel: +91 95-8991308" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i>
                +91 <?php echo $a['number2']; ?>
            </a>
            <h5 class="mt-4">Email</h5>
            <a href="mailto:gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
                <i class="bi bi-envelope me-2"></i><?php echo $a['email']; ?>
            </a>
            <?php
            }
            ?>
            <h5>Follow Us</h5>
            <a href="#" class="d-inline-block mb-3  text-dark fs-5 me-2">
            <i class="bi bi-twitter"></i>
            </a><br>
            <a href="#" class="d-inline-block mb-3  text-dark fs-5 me-2">
                <i class="bi bi-facebook"></i>
            </a><br>
            <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2" >
            <i class="bi bi-instagram"></i>
            </a>
            
        </div>
    </div>

    <!-- rigth -->
    <div class="col-lg-6 col-md-4 px-4 ">
        <div class="bg-color rounded shadow p-4 ">
            <form  method="POST">
                <h5 >Send a Message</h5>
            <div class="mt-3">
               <label for="exampleInput" class="form-label " style="font-weigth:500">Name</label>
               <input type="text" name="name" class="form-control" id="exampleInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label"  style="font-weigth:500">Email address</label>
               <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mt-3">
               <label for="exampleInput" class="form-label " style="font-weigth:500">Subject</label>
               <input type="text" name="subject" class="form-control" id="exampleInput" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Massage</label>
                  <textarea  name="massage" class="form-control"  rows="5" style="resize:none"></textarea>
            </div>
             <button type="submit" name="btn" class="btn text-white custom-bg shadow-none">Send</button>



            </form>
        </div>            
    </div>
   </div>

   <div class="loc mt-4">
   <iframe class="w-100  p-4 mb-lg-0 mb-3 bg-white rounded" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107421.56789648301!2d74.77756255343164!3d32.71464725578352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391e84bf169d3525%3A0xf233488eeb8fd8d!2sJammu!5e0!3m2!1sen!2sin!4v1710605815463!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

   </div>

  </div>

  <?php require ('admin/includ/essentionals.php'); ?>


<?php
    $con = new mysqli("localhost","root","","hbwebsite");

    if(isset($_POST['btn'])){

        $u_name= $_POST['name'];
        $u_email= $_POST['email'];
        $u_subject= $_POST['subject'];
        $u_massage= $_POST['massage'];

        $q= "INSERT INTO contact (name,email,subject,massage) VALUES ('$u_name', '$u_email','$u_subject','$u_massage')";
        
        if ($con->query($q) === TRUE) {
           alert('success','Mail send');
        } else {
            alert('error','serever down');
        }
    }

?>







  <!--Footer  includ -->
  <?php require ('includ/footer.php'); ?>
</body>
</html>

