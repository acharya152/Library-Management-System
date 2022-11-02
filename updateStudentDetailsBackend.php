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
						if(isset($_POST['bname'])){

							
							// unset($_SESSION['errorMsg']);
							$studentid=$_SESSION['sid'];

							$studentname=$_POST['bname'];
							$studentcontact=$_POST['contact'];
							$studentdept=$_POST['dept'];
							$studentyear=$_POST['year'];

							// $studentid=$_POST['SearchId'];
							$sql="UPDATE student_data SET Name='$studentname',Contact=$studentcontact,Year=$studentyear,Depart='$studentdept' WHERE sid =$studentid";
							$checkindb=mysqli_query($con,$sql);
						  if(!$checkindb){
						  		$_SESSION['errorMsg']="*Not Updated.";
						  	}
						  			
							else{
								$_SESSION['success']="*Updated Successfully.";
							}
						}
					}
				
				
					header("location:insertrecBackend.php");
 ?> 