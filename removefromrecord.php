<?php
session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}


					$host="localhost";
					$user="root";
					$password="";
					$db="libraryms";


					$con=mysqli_connect($host,$user,$password,$db);
					if(!$con){
					echo "Not connected".mysqli_connect_error();
					}
					else{

						if(isset($_SESSION['sid'])){
								$sid=$_SESSION['sid'];
									// echo "hello";
								
							$sql1 = "delete from student_data where sid='".$sid."'";
							// $checkindb=mysqli_query($con,$sql1);
						}

						elseif(isset($_SESSION['tid'])){
							$sid=$_SESSION['tid'];

								
							$sql1 = "delete from teacher_data where tid='".$sid."'";
							// echo"hello";
						}


						try{
								$checkindb=mysqli_query($con,$sql1);
								if(!$checkindb){
									throw new Exception(mysqli_error($con));
								}
								else{
										// $_SESSION['confirm']="true";
										$_SESSION['deleted']="true";
									}

						}catch(Exception $msg){
									$_SESSION['errorMsgfordelete']= $msg->getMessage();
									// echo ($_SESSION['errorMsgfordelete']);
						}



					}

					if(isset($_SESSION['sid'])){

					header("location:insertrec.php");
				
}

elseif(isset($_SESSION['tid'])){


	header("location:insertrecteacher.php");
}



?>