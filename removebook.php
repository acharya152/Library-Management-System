<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}

$host="localhost";
$user="root";
$password="";
$db="libraryms";
// echo $_SESSION['Rbarcode'];
$con=mysqli_connect($host,$user,$password,$db);
if(!$con){
    echo "Not connected".mysqli_connect_error();
}
try{
    
    $sql = "DELETE from borrowedbook_data where barcode=".$_SESSION['Rbarcode'];
    
    
    $result = mysqli_query($con,$sql);
    if(!$result){
        throw new Exception(mysqli_error($con));
    }
}catch(Exception $e){
    echo $e->getMessage();
}
// echo $sql;
					unset($_SESSION['Rbarcode']);

                header("location:".$_SERVER['HTTP_REFERER']);
 ?>