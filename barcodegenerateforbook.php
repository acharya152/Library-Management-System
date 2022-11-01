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
	<title>Insert A Book</title>
	<!-- <link rel="stylesheet" type="text/css" href="./newFeature.css"> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
 <style type="text/css">
      @media print {
    #text {
      display:none;
    }
    #btn {
      display:none;
    }
    #dashboardpanel{
    	display: none;
    }
    label{
    	display: none;
    }
    input{
    	display: none;
    }
    button{
    	display: none;
    }

   
    
  }

 </style>
  <script type="text/javascript">
 	window.onload=function fun1(){
						document.getElementById("bid").focus();
						document.forms['form1'].reset();
				}
 </script>
 <script type="text/javascript">
				function fun2(){
						// document.getElementById("bid").focus();
				}


					</script>

 <link rel="stylesheet" type="text/css" href="barcodegeneratecss.css">

	
</head>
<body>
	<div id="dashbody"onclick="fun2()">
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


			<div id="input">
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
						// else{
						
						// to get total existing books in library  

						// $sql="select * from books_data"; 

						//   $checkindb=mysqli_query($con,$sql);
						//   $rows=mysqli_num_rows($checkindb)+1;
						//  }

						?> 
	<div  id="img1"> 
	<img src="1903162.png">
</div>			
<div id="form">

						<!-- <input type="text" id="text"> -->
						<form method="POST" action="insertnewbookbackend.php" name="form1">
						
						<label id="l1">Book ID:</label>
						<!-- <label id="text" ><?php echo ($rows);?></label><br> -->
						<input type="text" name="bid" id="bid" placeholder="Enter the book isbn number"required><br>

						<label id="l2">Book Name:</label>
						<input type="text" name="bname" id="bname" required><br>
						<label id="l3">Author Name:</label>
						<input type="text" name="autname" id="bname1" required><br>
						<label id="l4">No of Books:</label>
						<input type="text" name="noofbooks" id="bname2" required><br>
						<!-- <label>Date:</label>
						<input type="date" name="doinsert" id="date" required><br> -->
						<input type="Submit" name="Submit" id="sub">

					</form>

					
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
							echo "<p id='sucess'>*Book added Sucessfully.</p>";
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
		</div>
</body>
</html>