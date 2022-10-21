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
						if(isset($_POST['SearchId'])){

							
							// unset($_SESSION['errorMsg']);
							
							$studentid=$_POST['SearchId'];
							$sql="select * from student_data where sid='".$studentid."'";
							$checkindb=mysqli_query($con,$sql);
						  if(mysqli_num_rows($checkindb)==1){

						  	$rows=mysqli_fetch_assoc($checkindb);
						  	$sName=$rows["Name"];
						  	$_SESSION['sid']=$studentid;
						  	$_SESSION['studentname']=$sName;
						  	$_SESSION['contact']=$rows["Contact"];
						  	$_SESSION['year']=$rows["Year"];
						  	$_SESSION['department']=$rows["Depart"];
							}
							else{
								$_SESSION['errorMsg']="true";
							}
						}
					}
				
					header("location:".$_SERVER['HTTP_REFERER']);
 ?> 