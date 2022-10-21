<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");
 	}
?>

<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="libraryms";


	$con=mysqli_connect($host,$user,$password,$db);

	if(!$con){
		echo ("Not connected".mysqli_connect_error());
	}else{
		if(isset($_POST['fsname'])){
		$name=$_POST['fsname'];
		$num=$_POST['con'];
		$year=$_POST['year'];
		$depart=$_POST['dept'];
		$bname=$_POST['bnname'];
		$authname=$_POST['auname'];
		$bcode=$_POST['num'];
		$date=$_POST['dates'];
		$time=$_POST['times'];
		}
	}	

?>