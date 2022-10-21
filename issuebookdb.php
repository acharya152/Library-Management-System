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
						if(isset($_POST['SearchId'])){
								$barcode=$_POST['SearchId'];
								$_SESSION['barcode']=$barcode;

								$sql = "select bid from books_barcode where barcode='".$barcode."'";
								$checkindb=mysqli_query($con,$sql);

								if(mysqli_num_rows($checkindb)==1){
									$rows=mysqli_fetch_assoc($checkindb);
									$bookid = $rows["bid"];
									// $sName=$rows["bid"];
									// $_SESSION['bid']=$sName;
									// $_SESSION['bname']=$rows["bname"];
									// $_SESSION['autname']=$rows["autname"];
								  
								}else{
									$_SESSION['errorMsg']="true";
								}
								
								$sql="select * from books_data where bid='".$bookid."'";
								$checkindb=mysqli_query($con,$sql);

							if(mysqli_num_rows($checkindb)==1){
								$rows=mysqli_fetch_assoc($checkindb);
								
								$sName=$rows["bid"];
								$_SESSION['bid']=$sName;
								$_SESSION['bname']=$rows["bname"];
								$_SESSION['autname']=$rows["autname"];
						  	
							}else{
								$_SESSION['errorMsg']="true";
							}
						}
					}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?> 