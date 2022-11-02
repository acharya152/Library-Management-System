<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	// include("unsetBookSessions.php");
	// unset($_SESSION['tid']);
 	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="updateStudentcss.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				function fun2(){
						// document.getElementById("inpts1").focus();
				}


					</script>
</head>
<body>
	<div id="dashbody" >
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

		<div id="mainbox">
		<div id="addNewFeature">


			<div id="input" >
				<?php 
						$host="localhost";
						$user="root";
						$password="";
						$db="libraryms";
						

						$con=mysqli_connect($host,$user,$password,$db);
						if(!$con){
						echo "Not connected".mysqli_connect_error();
						}
						// if(isset($_SESSION['logged'])){
						//   header("Location: ./dashboard.php");

						// }
						else{
						
						
						 }

						?> 
			<div  id="img1"> 
	<img src="icon1.png">
</div>			 
	<!-- <div id="register">			
<p id="register">REGISTER NEW STUDENT</p></div> -->

<div id="form">
	<!-- <input type="text" id="text"> -->
	<form method="POST" action="updateStudentDetailsBackend.php"  name="form1" >
						
	
	<!-- <input  type="text" name="bid" id="bid" value="<?php echo $studentid;?> "readonly ><br> -->
	<label>Student ID:</label>
	<label id="text" name="text1"><?php echo $_SESSION['sid'];?></label><br>
	<label>Student Name:</label>
	<input type="text" name="bname" id="bname" value="<?php echo $_SESSION['studentname']; ?>" required><br>
						<label>Contact:</label>
						<input type="text" name="contact" id="bname1" value="<?php echo $_SESSION['contact']; ?>" required><br>
						<label>Department:</label>
						<!-- <input type="text" name="dept" id="bname2" required><br> -->
						<select id="bname2" name="dept" required>
							<option selected value="<?php echo $_SESSION['department']; ?>" ><?php echo $_SESSION['department']; ?></option>
							<!-- <option value="" disabled>Choose Department</option> -->
							<option value="Computer">Computer</option>
							<option value="IT">IT</option>
							<option value="Civil">Civil</option>
					</select>
						<label>Semester:</label>
						<select id="bname2" name="year" required>
							<!-- <option selected disabled>Choose year and semester</option> -->
							<!-- <option value="" selected disabled>Choose semester</option> -->
							<option selected value="<?php echo $_SESSION['year']; ?>" ><?php echo $_SESSION['year']; ?> -semester</option>
							<option value=" 1">1st semester</option>
							<option value=" 2">2nd semester</option>
							<option value=" 3">3rd semester</option>
							<option value=" 4">4th semester</option>
							<option value=" 5">5th semester</option>
							<option value=" 6">6th semester</option>
							<option value=" 7">7th semester</option>
							<option value=" 8">8th semester</option>

						</select>
						<!-- <input type="text" name="noofbooks" id="bname2" required><br> -->
						<!-- <label>Date:</label>
						<input type="date" name="doinsert" id="date" required><br> -->
						<input type="Submit" name="Submit" id="sub" value="Update">

					</form>
				</div>

					
						<!-- <div id="genbtn"><button onclick="fun2()" id="genbar">Generate Barcode</button><br></div> -->



						
			</div>

		
</body>
</html>