<?php  

require 'db.php';
session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}




$er="";
$ty="";

$sql1 = "SELECT * FROM `card`";

$res = mysqli_query($conn,$sql1);

if($_SERVER["REQUEST_METHOD"] == "POST"){






if(isset($_POST["edit"])){
$id = $_POST["id1"];

$sql4 = "SELECT * FROM `card` WHERE id = $id";

$u = mysqli_query($conn,$sql4);

$u1 = mysqli_fetch_assoc($u);
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


<?php 
session_name('error');
session_start();

$er = $_SESSION['var'];

if($er != ""){
?>

<script>


var er = "<?php echo $er;?>";
alert(er);
</script>

<?php
}
$_SESSION['var'] = "";
?>

<!--

<nav class="navbar bg-dark bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Admin panel</span>
  </div>
</nav>
-->

<?php require 'nav.php';?>


<br>


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
    
  
    
  <h3><?php echo $r['title'];?></h3>


<p><?php echo $r['number']; ?></p>

<form action="fn.php" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">
<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id">
<button class="btn btn-danger btn-primary" type="submit" name="cdelete" >delete</button>
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





<div id="Tokyo" class="w3-container city" style="display:none">



<div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    

<form action ="fn.php" method = "POST">
  

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php  echo $u1["title"]; ?>">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">value</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="number" value="<?php echo $u1["number"]; ?>">
  </div>



<input type="number" value="<?php echo $u1['id']; ?>" style="display: none;" name="id">





  <button type="submit" class="btn btn-primary" name="cup">Save</button>
</form>




</div>
</div>
</div>
  




</div>


<div id="An" class="w3-container city" style="display:none">



  <div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    

<form action ="fn.php" method = "POST">
  

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">number</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="number">
  </div>





  <button type="submit" class="btn btn-primary" name="cadd">Save</button>
</form>




</div>
</div>
</div>

</div>







<div id="Paris" class="w3-container city" style="display:none">
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 


<button class="w3-button" onclick="openCity('Tokyo')">Tokyo</button>



</div>














<?php  

if($_SERVER["REQUEST_METHOD"]=="POST"){

if(isset($_POST["edit"])){

echo "<script>openCity('Tokyo');
 </script>";

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