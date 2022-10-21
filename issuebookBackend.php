<?php  
ini_set("display_errors", "on"); 
error_reporting(E_ALL); 
?> 
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
						$_SESSION['dberror']=("Not connected".mysqli_connect_error());
						header("location:issuebook.php");


					}



					if (isset($_SESSION['barcode'])){

						$barcode = $_SESSION['barcode'];

						$sql = "select * from borrowedbook_data where barcode='".$barcode."'";
						$checkindb=mysqli_query($con,$sql);
						// var_dump($checkindb);S
							if(mysqli_num_rows($checkindb)==1){
								$_SESSION['dberror']="Books already issued to another member please try another book";

							}else{
								$sid = $_SESSION['sid'];
								$query = "insert into borrowedbook_data values('$sid','$barcode')";
								// var_dump($query);
								
								try{

									$result = mysqli_query($con,$query);
									if(!$result){
										throw new Exception(mysqli_error($con));
									}
									else{
										$_SESSION['issueSucess']="true";
									}
								}catch(Exception $msg){
									$_SESSION['dberror']= $msg->getMessage();
								}			

							}


										
					}
					header("location:".$_SERVER['HTTP_REFERER']);

?>
