<?php
session_start();
if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	// elseif(!isset($_SESSION['sid'])){
	// 	header("Location:insertrec.php");
	// }
	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="issuebookto.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				// function fun2(){
				// 		document.getElementById("inpts1").focus();
				// }
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
		<div id="showSelectedStudent">
		<?php if(isset($_SESSION['sid'])){?>
			<a href="insertrec.php">
				Member: 
					<?php echo $_SESSION['sid']."_ ".$_SESSION['studentname'];?>
			</a>
		<?php
			}else{
		?>
			<a href="insertrecteacher.php">
				Member: 
					<?php echo $_SESSION['tid']."_ ".$_SESSION['studentname'];?>
			</a>
		<?php } ?>
		</div>
		<div id="main_body">
			

			<div id="searchPanel">

				<!-- <label id="label1">Book ID:</label>
				<form method="POST" action="#" >
				<input type="text" name="SearchId" class="inpt1" placeholder="ENTER YOUR BOOK ID" required >
				<input type="submit" value="Search" class="inpt2"> -->

				<label id="label1">BARCODE ID:</label>
				<form method="POST" action="issuebookdb.php" >
				<input type="text" name="SearchId" class="inpt1" id="inpts1" placeholder="ENTER YOUR BOOK BARCODE" required >
				<input type="submit" value="Search" class="inpt2">
				<!-- Validate search data and clear session for invalid input -->

				</form>
							//pass control to search field directly
							<script type="text/javascript">
										window.onload=function fun1(){
												document.getElementById("inpts1").focus();
										}
							</script>


		
			</div>

			
				<!-- unset session variables after viewing records -->
				<!-- no of books available -->
				<!-- dont issue books without entering sid -->

				<div id="displayErrorBox">
					<?php 
						if(isset($_SESSION['errorMsg'])){
							
							echo("*Please enter a valid BookID");
						}
						elseif(isset($_SESSION['dberror'])){
							echo($_SESSION['dberror']);
						}else{
							echo "<p id='sucess'>Bid ".$_SESSION['barcode']." Sucessfully Issued to ".$_SESSION['studentname']."</p>";
						}
				?>
			</div>
			<?php 
				if((isset($_SESSION['errorMsg'])) || (isset($_SESSION['dberror'])) || (isset($_SESSION['issueSucess']))){
					echo "<script src='showErrorBox.js'></script>";
					include("unsetBookSessions.php");
					unset($_SESSION['errorMsg']);
					unset($_SESSION['dberror']);
					unset($_SESSION['issueSucess']);
				}
			?>	
			<div id="bookdisplaybox">
							<div class="namediv">
							<label>Barcode:</label>
							<?php if(isset($_SESSION['bid'])){

							echo	$_SESSION['barcode'];
;
							} ?>
							</div>
				<br>
							<div class="contactdiv">
							<label>Book Name:</label>
							<?php if(isset($_SESSION['bname'])){

							echo $_SESSION['bname'];
;
							} ?>
							</div>
				<br>
							<div class="yeardiv">
							<label>Author:</label>
							<?php if(isset($_SESSION['autname'])){

							echo	$_SESSION['autname'];
;
							} ?>
							</div>
<form method="POST" action="issuebookBackend.php">
							<div class="yeardiv2">
								<label>Borrow period:</label>

								<select  id="time" name="timeframe" required>
									<option value="" selected disabled>Select suitable time frame</option>
									<option value="15 days">15 Days</option>
									<option value="8 months">8 Months</option>

								</select>
							</div>
				<br>
							<!-- <div class="deptdiv">
							<label>Department:</label>
							<?php if(isset($_SESSION['department'])){

							$dept=$_SESSION['department'];
							echo $dept;
							} ?>
							</div> -->
				<br>
				
			</div>
			<input type="submit" name="" value="Issue Book" id="issuebutton">
			<!-- <div id="issuebutton">

				<a href="./issuebookBackend.php" id="issuebtn">
									<b>Issue Book</b>
								</a>
			</div> -->
</form>
			<?php
					if(!isset($_SESSION['bid'])){
						echo "<script src='hideBookDisplayBox.js'></script>";

					}

				?>
			<!-- <div class="viewbutton">
				<a href="./borrowedbook.php" class="viewbtn">
									<b>Borrowed Books</b>
								</a>

			</div> -->
		</div>


	</div>
		
</body>
</html>