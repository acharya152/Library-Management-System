<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
include("./unsetBookSessions.php");
 	
 	// include("StudentDetails.php");
 	// session_start();
	 	if(!isset($_SESSION['logged'])){
	 		header("Location:./loginform.php");
	 	}
 				else{

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
							$teacherid=$_POST['SearchId'];
							
							$sql="select * from teacher_data where tid='".$teacherid."'";
							$checkindb=mysqli_query($con,$sql);
						  if(mysqli_num_rows($checkindb)==1){
						  	$rows=mysqli_fetch_assoc($checkindb);
						  	
						  	$sName=$rows["Name"];
						  	$_SESSION['teachername']=$sName;
						  	$_SESSION['Teachercontact']=$rows["Contact"];
						  	$_SESSION['subject']=$rows["Subject"];
						  	$_SESSION['Teacherdepartment']=$rows["Department"];
							}
						}
					}
				}

 ?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insertrec.css">
	<title></title>
</head>
<body>
	<div id="dashbody">
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

		<div id="main_body">
			

			<div id="searchPanel">
				<label id="label1">Teacher ID:</label>
				<form method="POST" action="#" >
					
				
				<input type="text" name="SearchId" class="inpt1" placeholder="ENTER YOUR TEACHER ID" required >
				<input type="submit" value="Search" class="inpt2">
				<!-- Validate search data and clear session for invalid input -->

				</form>
			</div>

				
				<!-- unset session variables after viewing records -->
			<div id="studentdisplaybox">
							<div class="namediv">
							<label>Name:</label>
							<?php if(isset($_SESSION['teachername'])){

							echo	$_SESSION['teachername'];
;
							} ?>
							</div>
				<br>
							<div class="contactdiv">
							<label>Contact:</label>
							<?php if(isset($_SESSION['Teachercontact'])){

							echo	$_SESSION['Teachercontact'];
;
							} ?>
							</div>
				<br>
							<div class="yeardiv">
							<label>Subject:</label>
							<?php if(isset($_SESSION['subject'])){

							echo $_SESSION['subject'];
;
							} ?>
							</div>
				<br>
							<div class="deptdiv">
							<label>Department:</label>
							<?php if(isset($_SESSION['Teacherdepartment'])){

							echo		$_SESSION['Teacherdepartment'];
;
							} ?>
							</div>
				<br>
			</div>
			<div class="issuebutton">

				<a href="./issuebook.php" class="issuebtn">
									<b>Issue New Book</b>
								</a>
			</div>
			<div class="viewbutton">
				<a href="./borrowedbook.php" class="viewbtn">
									<b>Borrowed Books</b>
								</a>

			</div>
		</div>


	</div>
		
</body>
</html>