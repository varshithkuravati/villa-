<?php 
require 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$resp ="";
$usern = stripslashes(htmlspecialchars($_POST["usern"]));

$pass = stripslashes(htmlspecialchars($_POST["pass"]));



$t = 0;

if("admin" == $usern){

if("admin" == $pass){

session_name("login");
session_start();

$_SESSION["usern"] = $usern;
$t++;

echo '<script>window.location.href="we.php";</script>';



}else{

$resp = "wrong password";
$type ="danger";

}

}


if($t == 0){

$resp = "user not found";
$type ="danger";

}





if($t != 0){

header("Location:admin.php");

}


}


 ?>


<!doctype html>

 <html lang="en"> 

<head> 

<meta charset="utf-8"> 

<meta name="viewport" content="width=device-width, initial-scale=1"> 

<title>login page</title> 

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 </head> 

<body>

 




<br>
<div class="alert alert-<?php echo $type; ?>" role="alert">
  <?php  echo $resp; ?>

</div>


<div class="container mx-auto p-2" style="width: 300px;">

<div class="card" style="width 18rem;">
  <div class="card-body">
    

<form method="POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usern">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="name" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>




  </div>
</div>


</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 

</body> 


</html>