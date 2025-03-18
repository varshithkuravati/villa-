
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



$sql = "UPDATE prop SET title='$title',type='$type',safety='$safety',payment='$payment',money='$price',bedroom='$bdroom',bathroom='$btroom',rooms='$rooms',floor='$floor',area='$area',parking='$parking',vi='$vi',content='$content',scontent='$content',image='$uim',country='$country',place='$city' WHERE id = $id";
 
$ures = mysqli_query($conn,$sql);

if($ures){

$er = "saved"; 
$ty="success";
unlink($u2['image']);

header("location: admin.php");

}else{

$er = "error with database";
$ty="danger";


}


}
}




}else{


$sq5 = "UPDATE prop SET title='$title',type='$type',safety='$safety',payment='$payment',money='$price',bedroom='$bdroom',bathroom='$btroom',rooms='$rooms',floor='$floor',area='$area',parking='$parking',vi='$vi',content='$content',scontent='$content',country='$country',place='$city' WHERE id = $id";
 
$ures = mysqli_query($conn,$sq5);

if($ures){

$er = "saved data"; 
$ty="success";

header("location: admin.php");

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
 
<?php require 'nav.php';?>

<br>
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
  
</body>

</html>
