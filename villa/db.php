<?php 
$server = "localhost";
$username = "root";
$password ="";
$database ="Villa";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){

echo "sorry database is not connected";

}


 ?>