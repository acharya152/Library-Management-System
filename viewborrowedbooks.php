<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	 if(!((isset($_SESSION['sid'])) ||  (isset($_SESSION['tid'])))){
		header("Location:dashboard.php");
	}


$host="localhost";
$user="root";
$password="";
$db="libraryms";

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="viewborrowedbookscss.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				function fun2(){
						document.getElementById("inpts1").focus();
				}
				function fun3(){
					//removeall
					location.href="./calculateFineAllBook.php";

				}

					</script>
</head>
<body>

<div id="showSelectedStudent">
		<?php if(isset($_SESSION['sid'])){?>
			<a href="insertrecBackend.php?sid=<?php echo($_SESSION['sid']);?>">
				Member: 
					<?php echo $_SESSION['sid']."_ ".$_SESSION['studentname'];?>
			</a>
		<?php
			}else{
		?>
			<a href="insertrecteacherBackend.php?tid=<?php echo($_SESSION['tid']);?>">
				Member: 
					<?php echo $_SESSION['tid']."_ ".$_SESSION['studentname'];?>
			</a>
		<?php } ?>
		</div>

	<div id="dashbody" onclick="fun2()">
		<div id="dashboardpanel">
							<div class="logo">
									<img src="MOCCA4.png">
			
							</div>	

							<div class="admnname">
									<img src="./img_avatar.png">
										<?php echo $_SESSION['user']?>
							</div>
							<div class="dshboard">
								<a href="./dashboard.php">
									<b>Dashboard</b>
								</a>
							</div>

							<div class="lgnout">	
								<a href="./logout.php">
									<b>Log Out</b>
								</a>
							</div>
			
		</div>
		<div id="empty">
 		
 </div>

		<div id="main_body">
			<?php						
				// echo($_SESSION['tid']);
				$con=mysqli_connect($host,$user,$password,$db);
				if(!$con){
					echo "Not connected".mysqli_connect_error();
				}

				
				

				

					if(isset($_SESSION['sid'])){
					$count=0;

						// echo "hello";
						$sql1 = 'select * from borrowedbook_data where sid="'.$_SESSION['sid'].'"';
						$result1 = mysqli_query($con,$sql1);
						$numbooks1 = mysqli_num_rows($result1);
				// 		if(($numbooks1==0))
				// 		{
				// 	$_SESSION['dberror']= "no books issued";
				// }
				while($rows=mysqli_fetch_assoc($result1)){
					$barcode = $rows["barcode"];
					// echo ($barcode);
					$duedate=$rows["duedate"];
					$renew=$rows["renewCount"];

//hello
					

					$datet =getdate();
					if($datet['mday']<10 ||$datet['mon']<10  ){
					$datetoday = $datet['year']."-0".$datet['mon']."-0".$datet['mday'];
					}else{
					$datetoday = $datet['year']."-".$datet['mon']."-".$datet['mday'];
											
					}
					// $datetoday = "2022-10-12";
					// echo $datetoday;
					// echo '';
					// echo $duedate;
					// var_dump($datetoday);
   // var_dump($duedate);
					

					if($datetoday>$duedate){
						// echo (date_diff($datetoday,$duedate));

						$count+=1;
						// echo $count;

					}

					
					// $duedate=$rows["issuedate"];


					
					$sql3 = 'select bid from books_barcode where barcode="'.$barcode.'"';
					$db = mysqli_query($con,$sql3);
					$dbrows = mysqli_fetch_assoc($db);
					$bid = $dbrows["bid"];

					$sql4 = 'select * from books_data where bid="'.$bid.'"';
					$db1 = mysqli_query($con,$sql4);
					$dbrows1 = mysqli_fetch_assoc($db1);
					$bname=$dbrows1["bname"];
					$aname=$dbrows1["autname"];






		
	
 ?>
 

			<div id="studentdisplaybox">
							<div class="namediv">
							<label>Book ID:</label>
							<?php 
								echo($barcode);
							 ?>
							
							</div>
				<br>
							<div class="contactdiv">
							<label>Book Name:</label>
							<?php 
								echo($bname);
							 ?>
							
							</div>
				<br>
							<div class="yeardiv">
							<label>Author Name:</label>
							<?php 
								echo($aname);
							 ?>
							
							</div>
							<div class="yeardiv2">
							<label>Due date:</label>
							<?php 
								echo($duedate);
							 ?>
							
							</div>
							<div id="yeardiv3">
							<label>Renew Count:</label>
							<?php 
								echo($renew);
								
							 ?>
							
							</div>
			<div  id="issuebutton">

				<a href="./confirmrenew.php?barcode=<?php echo($barcode)?>" class="issuebtn" >
									<b>Renew</b>
								</a>
			</div>
			<div  id="viewbutton">
				<a href="./calculatefine.php?barcode=<?php echo($barcode)?>" class="viewbtn">
				
									<b>Remove</b>
								</a>

			</div>
			
				
				
			</div>

	<?php 
			}
		}



	elseif(isset($_SESSION['tid'])){
		$count=0;
		$sql2 = 'select * from teacherborrowedbook_data where tid="'.$_SESSION['tid'].'"';

				
				$result2 = mysqli_query($con,$sql2);


				
				$numbooks2 = mysqli_num_rows($result2);
				// if(($numbooks2==0)){
				// 	$_SESSION['dberror']= "no books issued";
				// }
	

while($rows=mysqli_fetch_assoc($result2)){
					$barcode = $rows["barcode"];
					$duedate=$rows["duedate"];
					$renew=$rows["renewCount"];


					

					$datet =getdate();
					if($datet['mday']<10){
						$datetoday = $datet['year']."-".$datet['mon']."-0".$datet['mday'];
						}else{
						$datetoday = $datet['year']."-".$datet['mon']."-".$datet['mday'];
													
						}
					
					

					if($datetoday>$duedate){
						$count+=1;

					}

					
					// $duedate=$rows["issuedate"];


					
					$sql3 = 'select bid from books_barcode where barcode="'.$barcode.'"';
					$db = mysqli_query($con,$sql3);
					$dbrows = mysqli_fetch_assoc($db);
					$bid = $dbrows["bid"];

					$sql4 = 'select * from books_data where bid="'.$bid.'"';
					$db1 = mysqli_query($con,$sql4);
					$dbrows1 = mysqli_fetch_assoc($db1);
					$bname=$dbrows1["bname"];
					$aname=$dbrows1["autname"];



	


	?>




		<div id="studentdisplaybox">
							<div class="namediv">
							<label>Book ID:</label>
							<?php 
								echo($barcode);
							 ?>
							
							</div>
				<br>
							<div class="contactdiv">
							<label>Book Name:</label>
							<?php 
								echo($bname);
							 ?>
							
							</div>
				<br>
							<div class="yeardiv">
							<label>Author Name:</label>
							<?php 
								echo($aname);
							 ?>
							
							</div>
							<div class="yeardiv2">
							<label>Due date:</label>
							<?php 
								echo($duedate);
							 ?>
							
							</div>
							<div id="yeardiv3">
							<label>Renew Count:</label>
							<?php 
								echo($renew);
								
							 ?>
							
							</div>
			<div  id="issuebutton">

				<a href="./confirmrenew.php?barcode=<?php echo($barcode)?>" class="issuebtn">
									<b>Renew</b>
								</a>
			</div>
			<div  id="viewbutton">
				<a href="./calculatefine.php?barcode=<?php echo($barcode)?>" class="viewbtn">
				
									<b>Remove</b>
								</a>

			</div>
				
				
			</div>

<?php
	}
}
	?>


	
	</div>


	<div id="removeall">

		<label>No of books issued:</label><br>
		<label id="num"><?php  
		 if(isset($_SESSION['tid'])){
			echo($numbooks2);
		} 
		elseif(isset($_SESSION['sid'])){
			echo($numbooks1);
		}

		 ?>
		 	
		 </label><br><br>
		<label>No of overdue books:</label><br>
		<label id="num"><?php echo($count)?></label><br><br>
		<button id="btn1" onclick="fun3()">Remove All </button>
	</div>
	<div id="fine">

		<label>Fine Amount:</label><br>
		<label id="num"><?php echo ($_SESSION['fineAmount']) ?></label><br><br>
		<form action="removebook.php">
			<input type="checkbox" name="" required><label> Fine amount received<br><br></label>
		<input type="submit" value="Confirm Remove" id="btn3">
		</form>

	</div>

	<?php
				if(isset($_SESSION['fineAmount'])){
					echo "<script src='showFineBox.js'></script>";
					//unset barcode
					unset($_SESSION['fineAmount']);

			//style error and sucess message message
				// }elseif(isset($_SESSION['dberror'])){
				// 	echo $_SESSION['dberror'];
				// 	unset($_SESSION['dberror']);
				}
			?>

<div id="displayErrorBox">
					<?php 
						if(isset($_SESSION['error'])){
							
							echo($_SESSION['error']);
						}
						elseif(isset($_SESSION['dberror'])){
							echo($_SESSION['dberror']);
						}
				?>
			</div>
			<?php 
				if((isset($_SESSION['error'])) || (isset($_SESSION['dberror']))){ 
					echo "<script src='showErrorBox.js'></script>";
					// include("unsetBookSessions.php");
					unset($_SESSION['error']);
					unset($_SESSION['dberror']);
				}
			?>	

		
</body>
</html>