
<?php  

require 'db.php';


session_name("login");
session_start();

if($_SESSION["usern"] != "admin"){

header("location: login.php");

}



$er="";
$ty="";
$bdsql = "SELECT * FROM `bd`";

$res = mysqli_query($conn,$bdsql);


if($_SERVER["REQUEST_METHOD"] == "POST"){





if(isset($_POST["edit"])){
$type =htmlspecialchars($_POST["type"]);
$id =htmlspecialchars($_POST["id"]);
$sql4 = "SELECT * FROM `prop` WHERE type = '$type'";

$ue = mysqli_query($conn,$sql4);



}


if(isset($_POST["up"])){



$id = htmlspecialchars($_POST["id"]);

$id1 = htmlspecialchars($_POST["id1"]);

$sql = "UPDATE bd SET id1='$id1' WHERE id='$id'";
 
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


<title>villa agency</title> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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





<br>



<?php 


$nubd = mysqli_num_rows($res);

for($i = 0;$i<$nubd;$i++){

$rbd = mysqli_fetch_assoc($res);
$id6 = $rbd['id1'];
$spbd = "SELECT * FROM `prop` WHERE id = $id6";


$resbd = mysqli_query($conn,$spbd);

$r = mysqli_fetch_assoc($resbd);

?>


<h2 style="text-align: center;"><?php  echo $r['type']." category"; ?></h2>
<br>


<div class="card mx-auto p-2" style="width: 18rem;">




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
  <div class="card-body">
    
  
    
  <h2><?php echo $r['title'];?></h2>





<div class="d-grid gap-2 col-6 mx-auto">
<form action="bdu.php" method="POST">

<input type="name" value="<?php echo $rbd['type']; ?>" style="display: none;" name="type">
<input type="number" value="<?php echo $rbd['id']; ?>" style="display: none;" name="id">



<button class="btn btn-warning btn-primary"  type="submit" name="edit">change</button>
</form>
</div>





</div>

  
</div>
 <br>


<?php 


}

 ?>
</div>


<div id="Paris" class="w3-container city" style="display:none">
  <h2>Paris</h2>
  <p>Paris is the capital of France.</p> 


<button class="w3-button" onclick="openCity('Tokyo')">Tokyo</button>



</div>










<div id="Tokyo" class="w3-container city" style="">



<div class="container mx-auto p-2" style="width: 300px;" id="cha">


    


  




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

<script>

function run(type,id){
var t = "bdc";

jQuery.ajax({

url:'fn1.php',
type:'POST',
data:'flag='+t+'&type='+type+'&id='+id,
success:function(result){
    
    document.getElementById("London").style.display="none";
    document.getElementById("Tokyo").innerHTML = result;
    document.getElementById("Tokyo").style.display="block";
}




});

}

</script>

</body> 


</html>