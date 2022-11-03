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

		 if(isset($_SESSION['sid'])){
			$studentid=$_SESSION['sid'];
			$sql="select * from student_data where sid='".$studentid."'";

		 }else{
			$studentid=$_SESSION['tid'];
			$sql="select * from teacher_data where tid='".$studentid."'";

		 }
		 $checkindb=mysqli_query($con,$sql);
	   if(mysqli_num_rows($checkindb)==1){
	
		   $rows=mysqli_fetch_assoc($checkindb);
		
		   $_SESSION['borrowCount']=$rows["borrowCount"];
		 // echo $_SESSION['borrowCount'];
	
		 }


	
	 if($_SESSION['borrowCount']>=9){
			$_SESSION['errorforborrowCount']="Can't issue new book:Borrow limit exceeded";
		if(isset($_SESSION['sid'])){
			header("Location:insertrec.php");
		}elseif(isset($_SESSION['tid'])){
		header("Location:insertrecteacher.php");

	}	
}else{


 					


					if (isset($_SESSION['barcode'])){

						$barcode = $_SESSION['barcode'];

						
							$sql1 = "select * from borrowedbook_data where barcode='".$barcode."'";
							$sql2 = "select * from teacherborrowedbook_data where barcode='".$barcode."'";
							$checkindb1=mysqli_query($con,$sql1);
							$checkindb2=mysqli_query($con,$sql2);

						// var_dump($checkindb);
							if((mysqli_num_rows($checkindb1)==1)||(mysqli_num_rows($checkindb2)==1)){
								$_SESSION['dberror']="Books already issued to another member please try another book";

							}else{
								//checking inventory for available books
								$sql4="select bid from books_barcode where barcode='$barcode'";
								$sql4query=mysqli_query($con,$sql4);
								$rowBID=mysqli_fetch_assoc($sql4query);

								$bid=$rowBID["bid"];

								$sql5 = "select no_totalBooks-no_issuedBooks as availableBooks from books_inventory where bid='$bid'";
								$sql4query=mysqli_query($con,$sql5);
								$rowNumBooks=mysqli_fetch_assoc($sql4query);
								$numBooks= $rowNumBooks["availableBooks"];

								// echo $numBooks;
								
								if($numBooks==0){
									$_SESSION['dberror']="No copies of selected book available to issue";

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



										$query = "insert into borrowedbook_data values('$sid','$barcode','$datetoday' ,'$duedate',0)";
										$queryBorrowCount ="update student_data set borrowCount=borrowCount+1 where sid=$sid";
									}elseif(isset($_SESSION['tid'])){
										$days=$_POST['timeframe'];
												$date =getdate();
										$datetoday = $date['year']."-".$date['mon']."-".$date['mday'];
		// echo($datetoday);
		
											$date1= date_create($datetoday);
											date_add($date1,date_interval_create_from_date_string($days));
											$duedate=date_format($date1,"Y-m-d");
										$sid = $_SESSION['tid'];
										$query = "insert into teacherborrowedbook_data values('$sid','$barcode','$datetoday' ,'$duedate',0)";
										$queryBorrowCount ="update student_data set borrowCount=borrowCount+1 where tid=$tid";
										
									}
								// var_dump($query);
								
								try{

									$result = mysqli_query($con,$query);
									echo$result;
									if(!$result){
										throw new Exception(mysqli_error($con));
									}
									else{
										$sql4="update books_inventory set no_issuedBooks=no_issuedBooks+1 where bid=$bid ";
										$query = mysqli_query($con,$sql4);
										
										echo $query;

										if(!$query){
											$_SESSION['dberror']= "couldnot update inventory";

										}else{

											$insert=mysqli_query($con,$queryBorrowCount);
											echo $insert;
											if(!$insert){
											$_SESSION['dberror']= "couldnot update borrowCount";

											}else{

												$_SESSION['issueSucess']="true";
											}
										}
									}
								}catch(Exception $msg){
									$_SESSION['dberror']= $msg->getMessage();
								}			

							}

						}
										
					}
				
			   

					// header("location:".$_SERVER['HTTP_REFERER']);
				}
?>
