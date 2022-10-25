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

						
							$sql1 = "select * from borrowedbook_data where barcode='".$barcode."'";
							$sql2 = "select * from teacherborrowedbook_data where barcode='".$barcode."'";
							$checkindb1=mysqli_query($con,$sql1);
							$checkindb2=mysqli_query($con,$sql2);

						// var_dump($checkindb);S
							if((mysqli_num_rows($checkindb1)==1)||(mysqli_num_rows($checkindb2)==1)){
								$_SESSION['dberror']="Books already issued to another member please try another book";

							}else{
							//checking if issuing to teacher or student
									if(isset($_SESSION['sid'])){

										$days=$_POST['timeframe'];
										$sid = $_SESSION['sid'];
										$date =getdate();
										$datetoday = $date['year']."-".$date['mon']."-".$date['mday'];
		// echo($datetoday);
		
											$date1= date_create($datetoday);
											date_add($date1,date_interval_create_from_date_string($days));
											$duedate=date_format($date1,"Y-m-d");



										$query = "insert into borrowedbook_data values('$sid','$barcode','$datetoday' ,'$duedate')";
									}elseif(isset($_SESSION['tid'])){
										$days=$_POST['timeframe'];
												$date =getdate();
										$datetoday = $date['year']."-".$date['mon']."-".$date['mday'];
		// echo($datetoday);
		
											$date1= date_create($datetoday);
											date_add($date1,date_interval_create_from_date_string($days));
											$duedate=date_format($date1,"Y-m-d");
										$sid = $_SESSION['tid'];
										$query = "insert into teacherborrowedbook_data values('$sid','$barcode','$datetoday' ,'$duedate')";

									}
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
