

<?php 

require 'db.php';


if($_SERVER["REQUEST_METHOD"] == "GET"){

$id = htmlspecialchars($_GET["id"]);
$sqlp = "SELECT * FROM prop WHERE id = $id";
$resp = mysqli_query($conn,$sqlp);
if(!$resp){header("location: index.php");}
$pr = mysqli_fetch_assoc($resp);


$sqlb = "SELECT * FROM bd";
$resb = mysqli_query($conn,$sqlb);
$numb = mysqli_num_rows($resb);
$bs = mysqli_fetch_assoc($resb);
$id = $bs['id1'];
$sqlb1 = "SELECT * FROM prop WHERE id = $id";
$resb1 = mysqli_query($conn,$sqlb1);


}else{

header("location: index.php");
}
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Villa Agency - Property Detail Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> info@company.com</li>
            <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <h1>Villa</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="properties.php">Properties</a></li>
                       <li><a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="index.php">Home</a>  /  Single Property</span>
          <h3>Single Property</h3>
        </div>
      </div>
    </div>
  </div>





  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="<?php echo $pr['image'];?>" alt="">
          </div>
          <div class="main-content">
            <span class="category"><?php echo $pr['type']; ?></span>
            <h4><?php echo $pr['title']; ?></h4>
             <h6>$ <?php echo $pr['money']; ?></h6><br>
            <p><?php echo $pr['content']; ?> </p>
              <br>
              
         </div> 
          
          
        </div>
        <br>
        <br>
        <hr>
        <div class="col-lg-5">
        <form action="fn.php" method="POST">
          <h3> Fill the form to shedule a visit</h3>
        <br>
        <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Mobile Number</label>
        <input type="number" name="number" class="form-control" id="number" placeholder="Enter you number">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter you email">
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">select Date to visit</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Enter date">
        </div>
        <input name="id" value="<?php echo $pr['id']; ?>" style="display: none;">
        <button type="submit" name="sp" class="btn btn-primary">submit</button>
        </form>
        </div>
        <br>
        <br>
        <br>
        <hr>
        
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4><?php echo $pr['area']; ?> m²<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span><?php if($pr['contract'] == "yes"){echo "Contract ready";}else{echo "it will be ready soon";}?></span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span><?php echo $pr['payment']; ?></span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span><?php if($pr['safety'] == "yes"){echo "24/7 safety control";}else{ echo "we are trying to provide safety 24/7";}?></span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

  <div class="section best-deal">
  <div class="container">
  <div class="row">
  <div class="col-lg-4">
  <div class="section-heading">
  <h6>| Best Deal</h6>
  <h2>Find Your Best Deal Right Now!</h2>
  </div>
  </div>
  <div class="col-lg-12">
  <div class="tabs-content">
  <div class="row">
  <div class="nav-wrapper ">
  <ul class="nav nav-tabs" role="tablist">
  <li class="nav-item" role="presentation">
  <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Appartment</button>
  </li>
  <li class="nav-item" role="presentation">
  <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Villa House</button>
  
  </li>
  <li class="nav-item" role="presentation">
  <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab" data-bs-target="#penthouse" type="button" role="tab" aria-controls="penthouse" aria-selected="false">Penthouse</button>
  </li>
  
  
  </ul>
  
  </div>        
  
  <div class="tab-content" id="myTabContent">
  
  <?php $bs1 = mysqli_fetch_assoc($resb1); ?>
  <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
  <div class="row">
  <div class="col-lg-3">
  <div class="info-table">
  <ul>
  <li>Total Flat Space <span><?php echo $bs1['area']; ?> m²</span></li>
  <li>Floor number <span><?php echo $bs1['floor']; ?>th</span></li>
  <li>Number of rooms <span><?php echo $bs1['rooms']; ?></span></li>
  <li>Parking Available <span><?php if($bs1['parking'] > 0){echo "Yes"; }else{ echo "No";}?></span></li>
  <li>Payment Process <span><?php echo $bs1['payment']; ?></span></li>
  </ul>
  </div>
  </div>
  <div class="col-lg-6">
  <img src="<?php echo $bs1['image']; ?>" alt="">
  </div>
  <div class="col-lg-3">
  <h4>Extra Info About Property</h4>
  <p><?php echo $bs1['scontent']; ?></p>
  <div class="icon-button">
  <a href="property-details.php?id=<?php echo $bs1['id']; ?>"><i class="fa fa-calendar"></i> Schedule a visit</a>
  </div>
  </div>
  </div>
  </div>
  
  <?php  for($i = 0;$i < 2;$i++){ 
  
  $bs = mysqli_fetch_assoc($resb);
  $id = $bs['id1'];
  $sqlb1 = "SELECT * FROM prop WHERE id = $id";
  $resb1 = mysqli_query($conn,$sqlb1);
  
  $bs1 = mysqli_fetch_assoc($resb1);
  ?>
  
  <div class="tab-pane fade" id="<?php echo $bs1['type'];?>" role="tabpanel" aria-labelledby="<?php echo $bs1['type']; ?>-tab">
  <div class="row">
  <div class="col-lg-3">
  <div class="info-table">
  <ul>
  <li>Total Flat Space <span><?php echo $bs1['area']; ?> m²</span></li>
  <li>No of floors<span><?php echo $bs1['floor']; ?></span></li>
  <li>Number of rooms <span><?php echo $bs1['rooms']; ?></span></li>
  <li>Parking Available <span><?php if($bs1['parking'] > 0){echo "Yes"; }else{ echo "No";}?></span></li>
  <li>Payment Process <span><?php echo $bs1['payment']; ?></span></li>
  </ul>
  </div>
  </div>
  <div class="col-lg-6">
  <img src="<?php echo $bs1['image']; ?>" alt="">
  </div>
  <div class="col-lg-3">
  <h4>Detail Info About Villa</h4>
  <p><?php echo $bs1['scontent']; ?></p>
  <div class="icon-button">
  <a href="property-details.php?id=<?php echo $bs1['id']; ?>"><i class="fa fa-calendar"></i> Schedule a visit</a>
  </div>
  </div>
  </div>
  </div>
  
  <?php } ?>
  
  <!--testing started -->
  
  
  
  
  <!--testing ends -->
  
  
  
  
  
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <footer class="footer-no-gap">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved. 
         backend work by k.varshith
        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>