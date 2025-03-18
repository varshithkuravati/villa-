

<?php 
require 'db.php';



if($_SERVER["REQUEST_METHOD"] == "POST"){


if($_POST["flag"] == "fec"){

fec($conn);
}





}


?>





<?php

function fec(&$conn){


$sql4 = "SELECT * FROM `prop`";

$ue = mysqli_query($conn,$sql4);


  
  
  $nume = mysqli_num_rows($ue);
  
  
  
  ?>
  <div class="container">
  
  <?php
  
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










<form action ="fe1.php" method = "POST" >


<input type="number" value="<?php echo $u1['id']; ?>" name="id1" style="display: none;">

<input type="number" value="<?php echo $id6; ?>" name="id" style="display: none;">


  <button type="submit" class="btn btn-primary" name="up">set as best deal</button>
</form>




</div>

</div>
</div>
<br>
<?php }

?>
</div>
<?php


}
?>


<!-- another function-->

