<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");
 		// unsetting teacher student sessions
				 		
	 	}
	 	?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert A Student</title>
	<!-- <link rel="stylesheet" type="text/css" href="./newFeature.css"> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
 <style type="text/css">
      @media print {
   p{
   	display: none;
   }

   
    
  }

 </style>
 <script type="text/javascript">
 	window.onload=function fun1(){
						document.getElementById("bid").focus();
				}
 </script>

 <link rel="stylesheet" type="text/css" href="insertstudentcss.css">

	
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

	
		<div id="addNewFeature">


			<div id="input" >
						 
	<div id="register">			
<p id="register">REGISTER NEW STUDENT</p></div>
<div id="form"><br>
						<!-- <input type="text" id="text"> -->
						<form method="POST" action="insertnewstudentbackend.php" >
						
						<label>Student ID:</label>
						<!-- <label id="text" ><?php echo ($rows);?></label><br> -->
						<input type="text" name="bid" id="bid" required><br>
						<label>Student Name:</label>
						<input type="text" name="bname" id="bname" required><br>
						<label>Contact:</label>
						<input type="text" name="contact" id="bname1" required><br>
						<label>Department:</label>
						<!-- <input type="text" name="dept" id="bname2" required><br> -->
						<select id="bname2" name="dept" >
							<option selected disabled>Choose Department</option>
							<option value="computer">Computer</option>
							<option value="it">IT</option>
							<option value="civil">Civil</option>
					</select>
						<label>Year:</label>
						<select id="bname2" name="year" >
							<option selected disabled>Choose year and semester</option>
							<option value="1st year/ 1st semester">1st year/ 1st semester</option>
							<option value="1st year/ 2nd semester">1st year/ 2nd semester</option>
							<option value="2nd year/ 3rd semester">2nd year/ 3rd semester</option>
							<option value="2nd year/ 4th semester">2nd year/ 4th semester</option>
							<option value="3rd year/ 5th semester">3rd year/ 5th semester</option>
							<option value="3rd year/ 6th semester">3rd year/ 6th semester</option>
							<option value="4th year/ 7th semester">4th year/ 7th semester</option>
							<option value="4th year/ 8th semester">4th year/ 8th semester</option>

						</select>
						<!-- <input type="text" name="noofbooks" id="bname2" required><br> -->
						<!-- <label>Date:</label>
						<input type="date" name="doinsert" id="date" required><br> -->
						<input type="Submit" name="Submit" id="sub">

					</form>
				</div>

					
						<!-- <div id="genbtn"><button onclick="fun2()" id="genbar">Generate Barcode</button><br></div> -->



						
			</div>
						<!-- <div class="content">
								    
								<div class="print-area">
								    <svg id="barcode"  onclick="window.print()"></svg>
								  </div>
								     <script>
								      function fun2() {


								  let text = document.getElementById("text").textContent;
								  JsBarcode("#barcode", text);

								        
								      }
								   
								  </script>
								  </div> -->

								
            
        </div>
		<div id="displayErrorBox">
					<?php 
						
						if(isset($_SESSION['dberror'])){
							echo "*".($_SESSION['dberror']);
						}else{
							echo "<p id='sucess'>*Student added Sucessfully.</p>";

						}
				?>
			</div>
			<?php 
				if((isset($_SESSION['dberror'])) || (isset($_SESSION['issueSucess']))){
					echo "<script src='showErrorBox.js'></script>";
					unset($_SESSION['dberror']);
					unset($_SESSION['issueSucess']);
				}
			?>	
</body>
</html>