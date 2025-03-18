

<?php  

require 'db.php';



session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}




$er="";
$ty="";

$sql1 = "SELECT * FROM `prop`";

$res = mysqli_query($conn,$sql1);

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["add"])){

$title = stripslashes(htmlspecialchars($_POST["title"]));

$country = stripslashes(htmlspecialchars($_POST["country"]));

$city = stripslashes(htmlspecialchars($_POST["city"]));

$area = stripslashes(htmlspecialchars($_POST["area"]));

$parking = stripslashes(htmlspecialchars($_POST["parking"]));

$price = stripslashes(htmlspecialchars($_POST["money"]));

$safety = stripslashes(htmlspecialchars($_POST["safety"]));

$contract = stripslashes(htmlspecialchars($_POST["contract"]));

$type = stripslashes(htmlspecialchars($_POST["type"]));

$payment = stripslashes(htmlspecialchars($_POST["payment"]));

$vi = htmlspecialchars($_POST["vi"]);

$content = stripslashes(htmlspecialchars($_POST["content"]));

$bdroom = stripslashes(htmlspecialchars($_POST["bdroom"]));

$btroom = stripslashes(htmlspecialchars($_POST["btroom"]));

$floor = stripslashes(htmlspecialchars($_POST["floor"]));

$rooms = stripslashes(htmlspecialchars($_POST["rooms"]));

$tf = "assets/images/prop/";
$td = $tf.basename($_FILES["im"]["name"]);

$t = 0;

if($_FILES["im"]["size"] == 0){

$er = "it is not a file";
$ty ="danger";

$t++;
}
$Ex = strtolower(pathinfo($td,PATHINFO_EXTENSION));


if($Ex != "jpg" && $Ex != "png" && $Ex != "jpeg"){

$er = "only jpg,png,jpeg are supported";
$ty="danger";
$t++;
}

if(file_exists($td)){
$er = "sorry a file with same name already exists";
$ty="danger";
$t++;
}

if($t == 0){

if(move_uploaded_file($_FILES["im"]["tmp_name"],$td)){



$sql2 = "INSERT INTO `prop`(`title`, `country`, `place`,`area`,`parking`,`money`,`payment`,`type`,`safety`,`contract`,`floor`,`rooms`,`bedroom`,`bathroom`,`content`,`scontent`,`vi`,`image`) VALUES ('$title','$country', '$city','$area','$parking','$price','$payment','$type','$safety','$contract','$floor','$rooms','$bdroom','$btroom','$content','$content','$vi', '$td')";
 
$ares = mysqli_query($conn,$sql2);

if($ares){

$er = "data saved"; 
$ty="success";

header('refresh:0');

}else{

$er = "sorry we are facing problems with database";
$ty="danger";


}


}
}





}


if(isset($_POST["delete"])){

$id = $_POST["id"];

$sql3 = "DELETE FROM `prop` WHERE id=$id";

$img = $_POST["img"];

unlink($img);

$dres = mysqli_query($conn,$sql3);

header('refresh:0');
if(!$dres){

$er = "sorry we are facing some problems with database";
$ty="danger";
}


}



if(isset($_POST["edit"])){
$id = $_POST["id1"];

$sql4 = "SELECT * FROM `prop` WHERE id = $id";

$u = mysqli_query($conn,$sql4);

$u1 = mysqli_fetch_assoc($u);
}


if(isset($_POST["up"])){

$title = stripslashes(htmlspecialchars($_POST["title"]));

$country = stripslashes(htmlspecialchars($_POST["country"]));

$city = stripslashes(htmlspecialchars($_POST["city"]));

$area = stripslashes(htmlspecialchars($_POST["area"]));

$parking = stripslashes(htmlspecialchars($_POST["parking"]));

$price = stripslashes(htmlspecialchars($_POST["price"]));

$safety = stripslashes(htmlspecialchars($_POST["safety"]));

$contract = stripslashes(htmlspecialchars($_POST["contract"]));

$type = stripslashes(htmlspecialchars($_POST["type"]));

$payment = stripslashes(htmlspecialchars($_POST["payment"]));

$vi = htmlspecialchars($_POST["vi"]);

$content = stripslashes(htmlspecialchars($_POST["content"]));

$bdroom = stripslashes(htmlspecialchars($_POST["bdroom"]));

$btroom = stripslashes(htmlspecialchars($_POST["btroom"]));

$floor = stripslashes(htmlspecialchars($_POST["floor"]));

$rooms = stripslashes(htmlspecialchars($_POST["rooms"]));


$id = $_POST["ide"];



$sql6 = "SELECT * FROM `prop` WHERE id = $id";
$u = mysqli_query($conn,$sql6);
$u2 = mysqli_fetch_assoc($u);


if($_FILES["im"]["size"] != 0) {


$t = 0;
$uim = "assets/images/prop/".basename($_FILES["im"]["name"]);

$Ex1 = strtolower(pathinfo($uim,PATHINFO_EXTENSION));


if($Ex1 != "jpg" && $Ex1 != "png" && $Ex1 != "jpeg"){

$er = "only jpg,png,jpeg are supported";
$ty="danger";

$t++;
}

if(file_exists($uim)){
$er="sorry a file with same name already exists";
$ty="danger";
$t++;
}

if($t == 0){

if(move_uploaded_file($_FILES["im"]["tmp_name"],$uim)){



$sql = "UPDATE prop SET title='$title',type='$type',safety='$safety',payment='$payment',money='$price',bedroom='$bdroom',bathroom='$btroom',rooms='$rooms',floor='$floor',area='$area',parking='$parking',vi='$vi',content='$content',scontent='$content',image='$uim',country='$country',place='$city' WHERE $id";
 
$ures = mysqli_query($conn,$sql);

if($ures){

$er = "saved"; 
$ty="success";
unlink($u2['image']);

header('refresh:0');

}else{

$er = "error with database";
$ty="danger";


}


}
}




}else{


$sq5 = "UPDATE prop SET title='$title',type='$type',safety='$safety',payment='$payment',money='$price',bedroom='$bdroom',bathroom='$btroom',rooms='$rooms',floor='$floor',area='$area',parking='$parking',vi='$vi',content='$content',scontent='$content',country='$country',place='$city' WHERE $id";
 
$ures = mysqli_query($conn,$sq5);

if($ures){

$er = "saved data"; 
$ty="success";

header('refresh:0');

}else{

$er = "error with database";
$ty="danger";


}



}




}




}

 ?>


<!doctype html>


 <html lang="en">


 <head> 

<meta charset="utf-8">

 <meta name="viewport" content="width=device-width, initial-scale=1">


<title>villa agency</title> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 </head> 


<body>

<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>

<?php require 'nav.php';?>

<br>
<!--

<div class="alert alert-<?php echo $ty; ?>" role="alert">
  <?php  echo $er; ?>

</div>-->

<script>

<?php 

if($er != ""){




?>
var er = "<?php echo $er ?>";
alert(er);


<?php  
}

 ?>

</script>




<div id="London" class="w3-container city">

<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


<div class="d-grid gap-2 col-6 mx-auto">

  <button class="btn btn-primary" type="submit" name="Add">Add new prop</button>
  

</div>

</form>
<br>

<!-- view of prop starts -->
<?php 

$num = mysqli_num_rows($res);
 for($i = 0;$i < $num;$i++){

$r = mysqli_fetch_assoc($res);
 ?>





<div class="card mx-auto p-2" style="width: 18rem;">




  <img src="<?php echo $r['image'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    
  
    
  <h2><?php echo $r['title'];?></h2>

<p><?php  echo $r['scontent']; ?> </p>



<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">
<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id">
<input type="name" value="<?php echo $r['image']; ?>" style="display: none;" name="img">
<button class="btn btn-danger btn-primary" type="submit" name="delete" >delete</button>
</div>

</form>

<br>

<form action="propup.php" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">

<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id1">

<button class="btn btn-warning btn-primary"  type="submit" name="edit">Edit</button>

</div>
</form>




</div>

  </div>
</div>

 <br>
<?php } ?>

</div>

<!-- view of prop ends -->

<div id="Paris" class="w3-container city" style="display:none">
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 


<button class="w3-button" onclick="openCity('Tokyo')">Tokyo</button>



</div>


<!-- edit of prop -->


<div id="Tokyo" class="w3-container city" style="display:none">



<div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    

<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST" enctype="multipart/form-data">
  

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="<?php  echo $u1["title"]; ?>">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Country</label>
    <input type="country" class="form-control" id="exampleInputPassword1" name="country" value="<?php echo $u1["country"]; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">City</label>
    <input type="city" class="form-control" id="exampleInputPassword1" name="city" value="<?php echo $u1["place"]; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Area (in sq-meters)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="area" value = "<?php echo $u1['area']; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">parking (in sq-meters)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="parking" value="<?php echo $u1['parking']; ?>">
  </div>

<!--
<div class="mb-3">

<label for="exampleInputPassword1" class="form-label">Password</label>
  
  

<select class="form-select" aria-label="Default select example">
  <option selected>select yes or no</option>
  <option value="yes">yes</option>
  <option value="no">no</option>
  
</select>

 </div>


-->



<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of floors (enter floor number if appartment)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="floor" value="<?php echo $u1['floor']; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="rooms" value="<?php  echo $u1['rooms']; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price (in dolars)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="price" value="<?php echo $u1['money']; ?>">
  </div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of bed rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="bdroom" value="<?php echo $u1['bedroom']; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of bath rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="btroom" value="<?php echo $u1['bathroom']; ?>">
  </div>



<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="content"><?php echo $u1['content']; ?></textarea>
  <label for="floatingTextarea2">Details</label>
</div>
<br>


<div class="mb-3">
  <label for="formFile" class="form-label">safety</label>

<select class="form-select" aria-label="Default select example" name="safety">
  
  <option value="yes" <?php if($u1['safety'] == "yes"){echo "selected";} ?>>Yes</option>
  <option value="no" <?php if($u1['safety'] == "no"){echo "selected";} ?>>No</option>
  
</select>

</div>


<div class="mb-3">
  <label for="formFile" class="form-label">contract ready</label>


<select class="form-select" aria-label="Default select example" name="contract">
  
  <option value="yes" <?php if($u1['contract'] == "yes"){echo "selected";} ?>>Yes</option>
  <option value="no" <?php if($u1['contract'] == "no"){echo "selected";} ?>>No</option>
  
</select>

</div>


<div class="mb-3">
  <label for="formFile" class="form-label">type</label>

<select class="form-select" aria-label="Default select example" name="type">
  
  <option value="appartment" <?php if($u1['type'] == "appartment"){echo "selected";} ?>>Appartment</option>
  <option value="penthouse" <?php if($u1['type'] == "penthouse"){echo "selected";} ?>>pent-house</option>
<option value="villa" <?php if($u1['type'] == "villa"){echo "selected";} ?>>villa</option>
  
</select>

</div>

<div class="mb-3">
  <label for="formFile" class="form-label">payment</label>

<select class="form-select" aria-label="Default select example" name="payment">
  
  <option value="Bank" <?php if($u1['payment'] == "Bank"){echo "selected";} ?>>Bank</option>
  <option value="cash" <?php if($u1['payment'] == "cash"){echo "selected";} ?>>cash</option>


  
</select>

</div>






<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">video link</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="vi" value="<?php echo $u1['vi']; ?>">
  </div>


<input type="text" value="<?php echo $u1['id']; ?>" style="display: none;" name="ide">

<img src="<?php echo $u1['image'];?>" class="card-img-top" alt="...">
<div class="mb-3">
  <label for="formFile" class="form-label">upload image</label>
  <input class="form-control" type="file" id="formFile" name="im">
</div>

  




  <button type="submit" class="btn btn-primary" name="up">Save</button>
</form>




</div>
</div>
</div>
  




</div>

<!-- end of edit of prop -->

<!-- add of prop -->


<div id="An" class="w3-container city" style="display:none">



  <div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    

<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST" enctype="multipart/form-data">
  

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
    
  </div>




  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Area (in sq-meters)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="area">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">parking (in sq-meters)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="parking">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">country</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="country">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">city</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="city">
  </div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of floors (enter floor number if appartment)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="floor">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="rooms">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Price (in dolars)</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="money">
  </div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of bed rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="bdroom">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">no of bath rooms</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="btroom">
  </div>




<!--
<div class="mb-3">

<label for="exampleInputPassword1" class="form-label">Password</label>
  
  

<select class="form-select" aria-label="Default select example">
  <option selected>select yes or no</option>
  <option value="yes">yes</option>
  <option value="no">no</option>
  
</select>

 </div>

-->

<br>

<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="content"></textarea>
  <label for="floatingTextarea2">Details</label>
</div>
<br>


<div class="mb-3">
  <label for="formFile" class="form-label">safety</label>

<select class="form-select" aria-label="Default select example" name="safety">
  
  <option value="yes" selected>Yes</option>
  <option value="no">No</option>
  
</select>

</div>


<div class="mb-3">
  <label for="formFile" class="form-label">contract ready</label>


<select class="form-select" aria-label="Default select example" name="contract">
  
  <option value="yes" selected>Yes</option>
  <option value="no">No</option>
  
</select>

</div>


<div class="mb-3">
  <label for="formFile" class="form-label">type</label>

<select class="form-select" aria-label="Default select example" name="type">
  
  <option value="appartment" selected>Appartment</option>
  <option value="penthouse">pent-house</option>
<option value="villa">villa</option>
  
</select>

</div>

<div class="mb-3">
  <label for="formFile" class="form-label">payment</label>

<select class="form-select" aria-label="Default select example" name="payment">
  
  <option value="appartment" selected>Bank</option>
  <option value="penthouse">cash</option>


  
</select>

</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">video link</label>

    <input type="text" class="form-control" id="exampleInputPassword1" name="vi">
  </div>




<div class="mb-3">
  <label for="formFile" class="form-label">upload image</label>
  <input class="form-control" type="file" id="formFile" name="im">
</div>

  




  <button type="submit" class="btn btn-primary" name="add">Save</button>
</form>




</div>
</div>
</div>
<!-- end of prop -->
</div>

<?php  

if($_SERVER["REQUEST_METHOD"]=="POST"){

if(isset($_POST["edit"])){

echo '<script>openCity("Tokyo"); </script>';

}



if(isset($_POST["Add"])){

echo '<script>openCity("An"); </script>';

}




}



 ?>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 


</body> 


</html>