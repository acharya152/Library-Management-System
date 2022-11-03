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
	<link rel="stylesheet" type="text/css" href="updateteachercss.css">
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
	<img src="206897.png">
</div>			 
	<!-- <div id="register">			
<p id="register">REGISTER NEW STUDENT</p></div> -->

<div id="form">
	<!-- <input type="text" id="text"> -->
	<form method="POST" action="updateteacherdetailsbackend.php"  name="form1" >
						
	
	<!-- <input  type="text" name="bid" id="bid" value="<?php echo $studentid;?> "readonly ><br> -->
	<label>Teacher ID:</label>
	<label id="text" name="text1"><?php echo $_SESSION['tid'];?></label><br>
	<label>Teacher Name:</label>
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
						<label>Subject:</label>
						<input type="text" name="subj" id="bname3" value="<?php echo $_SESSION['Subject']; ?>" required><br>
						
						<!-- <input type="text" name="noofbooks" id="bname2" required><br> -->
						<!-- <label>Date:</label>
						<input type="date" name="doinsert" id="date" required><br> -->
						<input type="Submit" name="Submit" id="sub" value="Update">

					</form>
				</div>

					
						<!-- <div id="genbtn"><button onclick="fun2()" id="genbar">Generate Barcode</button><br></div> -->


<div id="displayErrorBox1">
					<?php 
						
						if(isset($_SESSION['dberror'])){
							echo "*".($_SESSION['dberror']);
						}
						?>
			</div>
						
			</div>
				
			<?php 
				
				if((isset($_SESSION['dberror'])) ){
					echo "<script src='showErrorBox1.js'></script>";
					unset($_SESSION['dberror']);

				}
			?>	

		
</body>
</html>