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

							
						
						var_dump($_POST);	// unset($_SESSION['errorMsg']);
	$tid=$_SESSION['tid'];

	$name=$_POST['bname'];
	$contact=$_POST['contact'];
	$dept=$_POST['dept'];

	$subj=$_POST['subj'];

							// $studentid=$_POST['SearchId'];
	// $sql="UPDATE student_data SET Name='$studentname',Contact=$studentcontact WHERE sid =$studentid";
	$sql="UPDATE teacher_data SET Name='$name',Contact=$contact,Subject='$subj',Department='$dept' WHERE tid =$tid";
	$checkindb=mysqli_query($con,$sql);
		if(!$checkindb){
						  		// $_SESSION['errorMsg']="*Not Updated.";
						echo mysqli_error($con);
						  	}
						  			
							else{
								$_SESSION['success']="*Updated Successfully.";
							}
						}
					}
				
				
					header("location:insertrecteacherBackend.php?tid=$tid");
 ?> 