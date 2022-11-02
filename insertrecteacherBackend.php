<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
 	// include("StudentDetails.php");
 	// session_start();
	 	// if(!isset($_SESSION['logged'])){
	 	// 	header("Location:./loginform.php");
	 	// }
 		// 		else{

					$host="localhost";
					$user="root";
					$password="";
					$db="libraryms";


					$con=mysqli_connect($host,$user,$password,$db);
					if(!$con){
					echo "Not connected".mysqli_connect_error();
					}
					else{
						if(isset($_GET['sid'])){
							$studentid=$_GET['sid'];
						}
						else{
						$studentid=$_POST['SearchId'];
							
						}
							$sql="select * from teacher_data where tid='".$studentid."'";
							$checkindb=mysqli_query($con,$sql);
						  if(mysqli_num_rows($checkindb)==1){

						  	$rows=mysqli_fetch_assoc($checkindb);
						  	$sName=$rows["Name"];
						  	$_SESSION['tid']=$studentid;
						  	$_SESSION['studentname']=$sName;
						  	$_SESSION['contact']=$rows["Contact"];
						  	$_SESSION['Subject']=$rows["Subject"];
						  	$_SESSION['department']=$rows["Department"];
							}
							else{
								$_SESSION['errorMsg']="true";
							}
						}
					
				
					header("location:".$_SERVER['HTTP_REFERER']);
 ?> 