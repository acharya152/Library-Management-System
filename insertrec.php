<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	include("unsetBookSessions.php");
	// unset($_SESSION['tid']);
 	
	
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

			<div id="displayErrorBoxfordelete">
				*The student you are trying to remove has books issued. 
			</div>
			<div id="displayErrorBoxforBorrowCount">
				*<?php echo($_SESSION['errorforborrowCount']);?>
		</div>

			

			<div id="displayErrorBoxforremoveddata">
				*Student removed successfully.
			</div>
			<div id="success">
				*Updated details successfully.
			</div>
			<?php 
				if(isset($_SESSION['deleted'])){
					echo "<script src='showerrorboxforstudentremoved.js'></script>";
					include("unsetTeacherStudentSessions.php");
				}
			?>
				<!-- unset session variables after viewing records -->

			<?php 
				if(isset($_SESSION['errorMsg'])){
					echo "<script src='showErrorBox.js'></script>";
					include("unsetTeacherStudentSessions.php");
				}
			?>
			<?php 
				if(isset($_SESSION['errorforborrowCount'])){
					echo "<script src='showerrorboxforborrowCount.js'></script>";
					unset($_SESSION['errorforborrowCount']);

					// include("unsetTeacherStudentSessions.php");
				}
			?>
			<?php 
				if(isset($_SESSION['errorMsgfordelete'])){
					echo "<script src='showerrorboxfornotdeleted.js'></script>";
					unset($_SESSION['errorMsgfordelete']);
					// include("unsetTeacherStudentSessions.php");
				}
			?>

				<?php 
				if(isset($_SESSION['success'])){

					echo "<script src='showsuccessbox.js'></script>";
					unset($_SESSION['success']);
					// include("unsetTeacherStudentSessions.php");
				}
			?>






			
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
							<label>Semester:</label>
							<?php if(isset($_SESSION['year'])){

							echo $_SESSION['year']."-Sem";
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
							<div class="borrowdiv">
							<label>Borrow Count:</label>
							<label id="borrowCount">

								<?php if(isset($_SESSION['borrowCount'])){
									
									echo $_SESSION['borrowCount'];
									if($_SESSION['borrowCount']==9){
										echo "<script src='showcolor.js'></script>";
										
									}
								} ?>
							</label>
							</div>
				<br>
			</div>

			<div id="changebutton">
				
						<a href="./updateStudentDetails.php" class="viewbtn">
				<!-- <a href="./borrowedbook.php" class="viewbtn"> -->
									<b>Update Details<b>
								</a>
			</div>
			<!-- <div id="changebutton2">
				
						<a href="./updateStudentDetails.php" class="viewbtn">
				<a href="./borrowedbook.php" class="viewbtn">
									<b>Update C</b>
								</a>
			</div> -->


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
			<div  id="removebutton">
				<a href="./confirmremove.php" class="viewbtn">
				<!-- <a href="./borrowedbook.php" class="viewbtn"> -->
									<b>Remove Student</b>
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