<?php  

include 'db.php';

$er="";
$ty="";



if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["ladd"])){

$ques = stripslashes(htmlspecialchars($_POST["ques"]));

$matter = stripslashes(htmlspecialchars($_POST["matter"]));

la($er,$conn,$ques,$matter);



}


if(isset($_POST["ldelete"])){

$id = $_POST["id"];

ld($er,$conn,$id);

}





if(isset($_POST["lup"])){

$ques = $_POST["ques"];
$matter = $_POST["matter"];
$id = $_POST["id"];


lu($er,$conn,$ques,$matter,$id);
}


if(isset($_POST["cadd"])){

$title = stripslashes(htmlspecialchars($_POST["title"]));

$number = stripslashes(htmlspecialchars($_POST["number"]));

ca($er,$conn,$title,$number);



}
if(isset($_POST["cdelete"])){

$id = $_POST["id"];

cd($er,$conn,$id);

}


if(isset($_POST["cup"])){

$title = $_POST["title"];
$number = $_POST["number"];
$id = $_POST["id"];


cu($er,$conn,$title,$number,$id);
}


if(isset($_POST["sp"])){

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["date"];
$number = $_POST["number"];
sp($conn,$id,$name,$email,$number,$date);

}

if(isset($_POST["codelete"])){
$id = $_POST["id"];
cod($conn,$id);

}

if(isset($_POST["coup"])){
$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];

coup($conn,$name,$email,$number,$id);
}


}

 
 
 
 function la(&$er,&$conn,&$ques,&$matter){
 
 $sql2 = "INSERT INTO `links`(`ques`, `matter`) VALUES ('$ques','$matter')";
 
 $ares = mysqli_query($conn,$sql2);
 
 
 if($ares){
 
$er = "data saved"; 
$ty="success";


 
 
 }else{
 
 $er = "sorry we are facing problems with database";
 $ty="danger";
 
 
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: links.php");
 }
 
 function ld(&$er,&$conn,&$id){
 
 $sql3 = "DELETE FROM `links` WHERE id=$id";
 
 
 
 $dres = mysqli_query($conn,$sql3);
 
 
 if(!$dres){
 
$er = "sorry we are facing some problems with database";
$ty="danger";
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: links.php");
 }
 
 function lu(&$er,&$conn,&$ques,&$matter,&$id){
 
 $sql = "UPDATE links SET ques='$ques',matter='$matter' WHERE id = $id";
 
 $ures = mysqli_query($conn,$sql);
 
 if($ures){
 
 $er = "saved"; 
 $ty="success";
 
 
 
 
 }else{
 
 $er = "error with database";
 $ty="danger";
 
 
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: links.php");
 
 }
 
 
 function ca(&$er,&$conn,&$title,&$number){
 
 $sql2 = "INSERT INTO `card`(`title`, `number`) VALUES ('$title','$number')";
 
 $ares = mysqli_query($conn,$sql2);
 
 
 if($ares){
 
 $er = "data saved"; 
 $ty="success";
 
 
 
 
 }else{
 
 $er = "sorry we are facing problems with database";
 $ty="danger";
 
 
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: card.php");
 }
 
 function cd(&$er,&$conn,&$id){
 
 $sql3 = "DELETE FROM `card` WHERE id=$id";
 
 
 
 $dres = mysqli_query($conn,$sql3);
 
 
 if(!$dres){
 
 $er = "sorry we are facing some problems with database";
 $ty="danger";
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: card.php");
 }
 
 function cu(&$er,&$conn,&$title,&$number,&$id){
 
 $sql = "UPDATE card SET title='$title',number='$number' WHERE id = $id";
 
 $ures = mysqli_query($conn,$sql);
 
 if($ures){
 
 $er = "saved"; 
 $ty="success";
 
 
 
 
 }else{
 
 $er = "error with database";
 $ty="danger";
 
 
 }
 session_name('error');
 session_start();
 $_SESSION['var'] = $er;
 
 header("location: card.php");
 
 }
 
 function sp(&$conn,&$id,&$name,&$email,&$number,&$date){
 
 
 $sql = "INSERT INTO `contact`(`name`, `email`,`number`,`date`,`id1`) VALUES ('$name','$email','$number','$date','$id')";
 
 $cfres = mysqli_query($conn,$sql);
 
 if($cfres){
 header("location: index.php");
 }
 }
 
 
 function cod(&$conn,&$id){
 
 $sql = "DELETE FROM `contact` WHERE id=$id";
 $cores = mysqli_query($conn,$sql);
 if(cores){
 header("location: po.php");
 }
 }
 
 function coup(&$conn,&$name,&$email,&$number,&$id){
 $sql = "UPDATE contact SET name='$name',number='$number',email='$email' WHERE id = $id";
 $cores = mysqli_query($conn,$sql);
 if($cores){
 header("location: po.php");
 }
 
 }
 
 ?>
 
 


<?php ?>
 