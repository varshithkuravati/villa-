

<?php  

require 'db.php';

session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}




$er="";
$ty="";

$sql1 = "SELECT * FROM `banner`";

$res = mysqli_query($conn,$sql1);

if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["add"])){

$title = stripslashes(htmlspecialchars($_POST["title"]));

$country = stripslashes(htmlspecialchars($_POST["country"]));

$city = stripslashes(htmlspecialchars($_POST["city"]));












$sql2 = "INSERT INTO `banner`(`title`, `country`, `place`) VALUES ('$title','$country', '$city')";
 
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


if(isset($_POST["delete"])){

$id = $_POST["id"];

$sql3 = "DELETE FROM `banner` WHERE id=$id";



$dres = mysqli_query($conn,$sql3);

header('refresh:0');
if(!$dres){

$er = "sorry we are facing some problems with database";
$ty="danger";
}


}



if(isset($_POST["edit"])){
$id = $_POST["id1"];

$sql4 = "SELECT * FROM `banner` WHERE id = $id";

$u = mysqli_query($conn,$sql4);

$u1 = mysqli_fetch_assoc($u);
}


if(isset($_POST["up"])){

$title = $_POST["title"];
$country = $_POST["country"];
$city = $_POST["city"];
$id = $_POST["ide"];

$sql6 = "SELECT * FROM `banner` WHERE id = $id";
$u = mysqli_query($conn,$sql6);
$u2 = mysqli_fetch_assoc($u);



$sq5 = "UPDATE banner SET title='$title',country='$country',place='$city' WHERE id = $id";
 
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
    <label for="exampleInputPassword1" class="form-label">Country</label>
    <input type="country" class="form-control" id="exampleInputPassword1" name="country">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">City</label>
    <input type="city" class="form-control" id="exampleInputPassword1" name="city">
  </div>




  <button type="submit" class="btn btn-primary" name="add">Save</button>
</form>




</div>
</div>
</div>

</div>

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




<input type="text" value="<?php echo $u1['id']; ?>" style="display: none;" name="ide">



  




  <button type="submit" class="btn btn-primary" name="up">Save</button>
</form>




</div>
</div>
</div>
  




</div>



<div id="London" class="w3-container city">

<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


<div class="d-grid gap-2 col-6 mx-auto">

  <button class="btn btn-primary" type="submit" name="Add">Add new prop</button>
  

</div>

</form>
<br>


<?php 

$num = mysqli_num_rows($res);
 for($i = 0;$i < $num;$i++){

$r = mysqli_fetch_assoc($res);
 ?>





<div class="card mx-auto p-2" style="width: 18rem;">




    <div class="card-body">
    
  
    
  <h2><?php echo $r['title'];?></h2>




<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">
<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id">
<button class="btn btn-danger btn-primary" type="submit" name="delete" >delete</button>
</div>

</form>

<br>

<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">

<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id1">

<button class="btn btn-warning btn-primary"  type="submit" name="edit">Edit</button>

</div>
</form>






  </div>
</div>

 <br>
<?php } ?>

</div>


<div id="Paris" class="w3-container city" style="display:none">
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 


<button class="w3-button" onclick="openCity('Tokyo')">Tokyo</button>



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

function delete(){



}

 ?>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 


</body> 


</html>