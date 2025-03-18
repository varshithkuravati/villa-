<?php  

require 'db.php';

session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}



$er="";
$ty="";

$sql1 = "SELECT * FROM `links`";

$res = mysqli_query($conn,$sql1);

if($_SERVER["REQUEST_METHOD"] == "POST"){






if(isset($_POST["edit"])){
$id = $_POST["id1"];

$sql4 = "SELECT * FROM `links` WHERE id = $id";

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
    
  
    
  <h3><?php echo $r['ques'];?></h3>


<p><?php echo $r['matter']; ?></p>

<form action="fn.php" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">
<input type="name" value="<?php echo $r['id']; ?>" style="display: none;" name="id">
<button class="btn btn-danger btn-primary" type="submit" name="ldelete" >delete</button>
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
    <label for="exampleInputEmail1" class="form-label">quesction</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ques" value="<?php  echo $u1["ques"]; ?>">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">matter</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="matter" value="<?php echo $u1["matter"]; ?>">
  </div>



<input type="number" value="<?php echo $u1['id']; ?>" style="display: none;" name="id">





  <button type="submit" class="btn btn-primary" name="lup">Save</button>
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
    <label for="exampleInputEmail1" class="form-label">quection</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ques">
    
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">matter</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="matter">
  </div>





  <button type="submit" class="btn btn-primary" name="ladd">Save</button>
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