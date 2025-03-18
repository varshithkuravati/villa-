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


header('Location: bd.php');

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

<div class="w3-container city">



<div class="container mx-auto p-2" style="width: 300px;" id="cha">

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

<input type="number" value="<?php echo $id; ?>" name="id" style="display: none;">


  <button type="submit" class="btn btn-primary" name="up">set as best deal</button>
</form>


</div>

</div>
</div>

<?php }
?>
    


  




</div>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body> 


</html>