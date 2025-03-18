
<?php  

require 'db.php';

$sqlf = "SELECT * FROM fe";
$resf = mysqli_query($conn,$sqlf);
$fe = mysqli_fetch_assoc($resf);
$idf = $fe['id1'];
$sqlf1 = "SELECT * FROM prop WHERE id = $idf";
$resf1 = mysqli_query($conn,$sqlf1);
$fe1 = mysqli_fetch_assoc($resf1);



$sqll = "SELECT * FROM links";
$resl = mysqli_query($conn,$sqll);
$numl = mysqli_num_rows($resl);
//$li = mysqli_fetch_assoc($resl);


$sqlc = "SELECT * FROM card";
$resc = mysqli_query($conn,$sqlc);
$numc = mysqli_num_rows($resc);


$sqlb = "SELECT * FROM bd";
$resb = mysqli_query($conn,$sqlb);
$numb = mysqli_num_rows($resb);
$bs = mysqli_fetch_assoc($resb);
$id = $bs['id1'];
$sqlb1 = "SELECT * FROM prop WHERE id = $id";
$resb1 = mysqli_query($conn,$sqlb1);



$sqlp = "SELECT * FROM prop";
$resp = mysqli_query($conn,$sqlp);


$sqlba = "SELECT * FROM banner";
$resba = mysqli_query($conn,$sqlba);
$numba = mysqli_num_rows($resba);

 ?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>villa Agency</title>

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
                      <li><a href="index.php" class="active">Home</a></li>
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

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
    
    <?php for($i = 0;$i < $numba;$i++){
    
         $bn = mysqli_fetch_assoc($resba);
    ?>
    
      <div class="item item-<?php echo $i+1;?>">
        <div class="header-text">
          <span class="category"><?php echo $bn['place']; ?>, <em><?php echo $bn['country']; ?></em></span>
          <h2>Hurry!<br>Get the Best for you</h2>
        </div>
      </div>
      
     <?php }?>
      
      
      
      
      
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="<?php echo $fe1['image'];?>" alt="">
            <a href="property-details.php?id=<?php echo $fe1['id']; ?>"><img src="assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2><?php echo $fe1['title']; ?></h2>
          </div>
          
          
         
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4><?php echo $fe1['area'];?> m²<br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span><?php if($fe1['contract'] == "yes"){echo "Contract ready";}else{echo "it will be ready soon";}?></span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment Process<br><span><?php echo $fe1['payment'];?></span></h4>
              </li>
              <li>
                <img src="assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span><?php if($fe1['safety'] == "yes"){echo "24/7 safety control";}else{ echo "we are trying to provide safety 24/7";}?></span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video View</h6>
            <h2>Get Closer View & Different Feeling</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="assets/images/video-frame.jpg" alt="">
            <a href="<?php $fe1['vi'];?>" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
  
  
  
  
  
  
    <div class="container">
    
    <div class="accordion" id="accordionExample">
    
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    Why is Villa Agency the best ?
    </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    Get <strong>the best villa</strong> Please tell your friends about it.</div>
    </div>
    </div>
    
    <?php for($i = 0;$i < $numl;$i++){
    
    $li = mysqli_fetch_assoc($resl);

    ?>
    
    <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $li['id']; ?>">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $li['id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $li['id']; ?>">
    <?php echo $li['ques']; ?>
    </button>
    </h2>
    <div id="collapse<?php echo $li['id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $li['id']; ?>" data-bs-parent="#accordionExample">
    <div class="accordion-body">
     
     <?php echo $li['matter'];?>
     </div>
    </div>
    </div>
    
    <?php
    
    }?>
    
   
    
    
    
    
    
    
    </div>
    
    
    </div>
    
    
    
    <br>
    <br>
    <div class="container">
    
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
            
            
            
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">Buildings<br>Finished Now</p>
                </div>
              </div>
              
              
              <?php for($i = 0;$i < $numc;$i++){ 
                     
                     $ca = mysqli_fetch_assoc($resc);
              ?>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="<?php echo $ca['number']; ?>" data-speed="1000"></h2>
                  <p class="count-text "> <?php echo $ca['title']; ?> </p>
                </div>
              </div>
              
              <?php }?>
              
              
              
              
              
            </div>
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

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Properties</h6>
            <h2>We Provide The Best Property You Like</h2>
          </div>
        </div>
      </div>
      <div class="row">
      
        
        
        <?php for($i = 0;$i<5;$i++){
                
                $pr = mysqli_fetch_assoc($resp);
        ?>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.php?id=<?php echo $pr['id']; ?>"><img src="<?php echo $pr['image']; ?>" alt=""></a>
            <span class="category">Luxury <?php echo $pr['type']; ?></span>
            <h6>$<?php echo $pr['money']; ?></h6>
            <h4><a href="property-details.html"><?php echo $pr['title']; ?></a></h4>
            <ul>
              <li>Bedrooms: <span><?php echo $pr['bedroom']; ?></span></li>
              <li>Bathrooms: <span><?php echo $pr['bathroom']; ?></span></li>
              <li>Area: <span><?php echo $pr['area']; ?> m²</span></li>
              <li>Floor: <span><?php if($pr['type'] == "appartment"){echo $pr['floor']." th"; }else{echo $pr['floor'];}?></span></li>
              <li>Parking: <span><?php echo $pr['parking']; ?> m²</span></li>
            </ul>
            <div class="main-button">
            <form action ="property-details.php?id=<?php echo $pr['id']; ?>" method="POST">
              <input type="number" value="<?php echo $pr['id'];?>" name="id" style="display: none;">
              <a href="property-details.php?id=<?php echo $pr['id']; ?>" type="submit" name="sp"><button type="submit" name="sp" style="display: none;"></button> Schedule a visit</a>
              
            </form>
            </div>
          </div>
        </div>
        
        <?php } ?>
        
        
        
        
        
        
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contact Us</h6>
            <h2>Get In Touch With Our Agents</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6>info@villa.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
  
        
        
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-8">
        <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved. 
           Backend work done by k.varshith
        
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