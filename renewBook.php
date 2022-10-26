<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
     if(isset($_GET['barcode'])){
        $_SESSION['Rbarcode']=$_GET['barcode'];
    }

$host="localhost";
$user="root";
$password="";
$db="libraryms";
$con=mysqli_connect($host,$user,$password,$db);
 

if(isset($_SESSION['sid'])){
    $sql = 'select * from borrowedbook_data where barcode="'.$_SESSION['Rbarcode'].'"';
}elseif(isset($_SESSION['tid'])){
  $sql = 'select * from teacherborrowedbook_data where barcode="'.$_SESSION['Rbarcode'].'"';
}
try{

    $result = mysqli_query($con,$sql);
    if(!$result){
        throw new Exception(mysqli_error($con));
    }
    $rows=mysqli_fetch_assoc($result);
    
    $due=$rows["duedate"];
    $duedate= date_create($due);
    
    date_add($duedate,date_interval_create_from_date_string("15 days"));
    $newdate=date_format($duedate,"Y-m-d");
    
if(isset($_SESSION['sid'])){
    $sql = 'UPDATE borrowedbook_data SET duedate ="'.$newdate.'" WHERE  barcode="'.$_SESSION['Rbarcode'].'"';
}elseif(isset($_SESSION['tid'])){
    $sql = 'UPDATE teacherborrowedbook_data SET duedate ="'.$newdate.'" WHERE  barcode="'.$_SESSION['Rbarcode'].'"';
}
$result = mysqli_query($con,$sql);
if(!$result){
    throw new Exception(mysqli_error($con));
}
echo($result);
}catch(Exception $e){
    echo $e->getMessage();
}
header("location:".$_SERVER['HTTP_REFERER']);

?>

