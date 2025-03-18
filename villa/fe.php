


<?php  

require 'db.php';


session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}



$er="";
$ty="";
$bdsql = "SELECT * FROM `fe`";

$res = mysqli_query($conn,$bdsql);


if($_SERVER["REQUEST_METHOD"] == "POST"){





if(isset($_POST["edit"])){


$sql4 = "SELECT * FROM `prop`";

$ue = mysqli_query($conn,$sql4);



}


if(isset($_POST["up"])){



$id = htmlspecialchars($_POST["id"]);

$id1 = htmlspecialchars($_POST["id1"]);

$sql = "UPDATE fe SET id1='$id1' WHERE id='$id'";
 
$ures = mysqli_query($conn,$sql);

if($ures){

$er = "saved"; 
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


<title>Bootstrap demo</title> 

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


<br>


<?php 


$nubd = mysqli_num_rows($res);



$rbd = mysqli_fetch_assoc($res);
$id6 = $rbd['id1'];
$spbd = "SELECT * FROM `prop` WHERE id = $id6";


$resbd = mysqli_query($conn,$spbd);

$r = mysqli_fetch_assoc($resbd);

?>


<h2 style="text-align: center;"><?php  echo " featured properties"; ?></h2>
<br>


<div class="card mx-auto p-2" style="width: 18rem;">

<div class="card-body">


<table class="table">
  
  <tbody>
    <tr>
      
      <td>Total Flat Space</td>
<td> <span><?php echo $r['area'];?></span> </td>
      
    </tr>
    <tr>
      
      <td>
      <?php if($r['type'] == "appartment"){
echo "floor number";

}else{

echo "no of floors";

} ?>

</td>
<td><span><?php echo $r['floor']; ?></span></td>
      

      
    </tr>
 
<tr>
<td>Number of rooms </td>
<td><span><?php echo $r['rooms']; ?></span> </td>

</tr>


    

<tr>
<td>Parking Available </td>
<td><span><?php  if($r['parking'] > 0){
echo "Yes";
}else{echo "No";}
 ?></span> </td> 

</tr>



<tr>
<td>payment process </td>
<td><span><?php echo $r['payment']; ?></span> </td>
 
</tr>



  
  </tbody>
</table>

  <img src="<?php echo $r['image'];?>" class="card-img-top" alt="...">
  
    
  
    
  <h2><?php echo $r['title'];?></h2>




<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

<div class="d-grid gap-2 col-6 mx-auto">


<button class="btn btn-warning btn-primary"  type="submit" name="edit">change</button>

</div>
</form>




</div>

  
</div>
 <br>



</div>








<div id="Tokyo" class="w3-container city" style="display:none">



<div class="container mx-auto p-2" style="width: 300px;">


    


  <?php 
  
  $nume = mysqli_num_rows($ue);
  
  for($j = 0;$j<$nume;$j++){
  
  $u1 = mysqli_fetch_assoc($ue); ?>



<div class="card" style="width 18rem;">
  <div class="card-body">
    




<table class="table">
  
  <tbody>
    <tr>
      
      <td>Total Flat Space</td>
<td> <span><?php echo $u1['area'];?></span> </td>
      
    </tr>
    <tr>
      
      <td><?php if($u1['type'] == "appartment"){
echo "floor number";

}else{

echo "no of floors";

} ?></td>
<td><span><?php echo $u1['floor']; ?></span></td>
      

      
    </tr>
 
<tr>
<td>Number of rooms </td>
<td><span><?php echo $u1['rooms']; ?></span> </td>

</tr>


    <tr>

<tr>
<td>Parking Available </td>
<td><span><?php  if($u1['parking'] > 0){
echo "Yes";
}else{echo "No";}
 ?></span> </td> 

</tr>



<tr>
<td>payment process </td>
<td><span><?php echo $u1['payment']; ?></span> </td>
 
</tr>



  
  </tbody>
</table>

  <img src="<?php echo $u1['image'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    
  
    
  <h2><?php echo $u1['title'];?></h2>










<form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST" >


<input type="number" value="<?php echo $u1['id']; ?>" name="id1" style="display: none;">

<input type="number" value="<?php echo $id6; ?>" name="id" style="display: none;">


  <button type="submit" class="btn btn-primary" name="up">set as best deal</button>
</form>




</div>
</div>

<?php }
?>








</div>



  




</div>




<div id="An" class="w3-container city" style="display:none">



  <div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    



</div>
</div>
</div>

</div>


<?php  

if($_SERVER["REQUEST_METHOD"]=="POST"){


if(isset($_POST["edit"])){

echo '<script>openCity("Tokyo"); </script>';

}

if(isset($_POST["Add"])){

echo '<script>openCity("Paris"); </script>';

}




}



 ?>







 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 


</body> 


</html>