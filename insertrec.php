<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	include("unsetBookSessions.php");
	unset($_SESSION['tid']);
 	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insertrec.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				function fun2(){
						document.getElementById("inpts1").focus();
				}


					</script>
</head>
<body>
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

		<div id="main_body">
			

			<div id="searchPanel">
				<label id="label1">Student ID:</label>
				<form method="POST" action="insertrecBackend.php" >
					
				
				<input type="text" name="SearchId" class="inpt1" id="inpts1" placeholder="ENTER YOUR STUDENT ID" required >
				<input type="submit" value="Search" class="inpt2">
				<!-- Validate search data and clear session for invalid input -->

				</form>

					<!-- to pass control to search box -->
					<script type="text/javascript">
				window.onload=function fun1(){
						document.getElementById("inpts1").focus();
				}


					</script>
			</div>

			<div id="displayErrorBox">
				*Please enter a valid StudentID
			</div>
			<?php 
				if(isset($_SESSION['errorMsg'])){
					echo "<script src='showErrorBox.js'></script>";
					include("unsetTeacherStudentSessions.php");
				}
			?>

			
				<!-- unset session variables after viewing records -->




			
			<div id="studentdisplaybox">
							<div class="namediv">
							<label>Name:</label>
							<label>
								
							<?php if(isset($_SESSION['studentname'])){

							echo $_SESSION['studentname'];
;

							} ?>
							</label>
							
							</div>
				<br>
							<div class="contactdiv">
							<label>Contact:</label>
							<?php if(isset($_SESSION['contact'])){

							echo $_SESSION['contact'];
;
							} ?>
							</div>
				<br>
							<div class="yeardiv">
							<label>Year:</label>
							<?php if(isset($_SESSION['year'])){

							echo $_SESSION['year'];
;
							} ?>
							</div>
				<br>
							<div class="deptdiv">
							<label>Department:</label>
							<?php if(isset($_SESSION['department'])){

							echo $_SESSION['department'];
;
							} ?>
							</div>
				<br>
			</div>


			<div  id="issuebutton">

				<a href="./issuebook.php" class="issuebtn">
									<b>Issue New Book</b>
								</a>
			</div>
			<div  id="viewbutton">
				<a href="./viewborrowedbooks.php" class="viewbtn">
				<!-- <a href="./borrowedbook.php" class="viewbtn"> -->
									<b>Borrowed Books</b>
								</a>

			</div>
			<?php
					if(!isset($_SESSION['sid'])){
						echo "<script src='hideStudentDisplayBox.js'></script>";

					}

				?>
		</div>


	</div>
		
</body>
</html>