
<!-- try input type date -->
<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");
 		// unsetting teacher student sessions
				 		
 	}
 	include("unsetTeacherStudentSessions.php");
include("unsetBookSessions.php");

 		?>				
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DASHBOARD</title>
	<link rel="stylesheet" type="text/css" href="./dashboardcsscurrent213.css">
	<script type="text/javascript" >
		
					function func1(){
						location.href="insertrec.php";


					}
					function func2(){
						location.href="comingSoon.php";
						// location.href="insertrecteacher.php";


					}
					function func3(){
						location.href="barcodegenerateforbook.php";
						// location.href="insertbook.html";


					}


					function func4(){
						location.href="insertnewstudent.php";
						// location.href="insertbook.html";


					}
					function func5(){
						location.href="insertnewteacher.php";
						// location.href="insertbook.html";


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
									<img src="./img_avatar.png" class="img1">
										<?php echo $_SESSION['user']?>
								</div>

								<div class="lgnout">	
								<a href="./logout.php">
										<b>Log Out</b>
								</a>
								</div>
			
		</div>

		<!-- <div id="sidepanel">
		
		</div> -->

		<div id="main_body">

			<div class="bookdetails">
				<div class="t1">
					<p>STUDENTS RECORD</p>
				</div>
				<!-- <div class="book3">
							<img src="book.png" class="bk3">
				</div> -->
				<div class="btn1" onclick="func1()" target="_blank">
							<p id="click">Click Here</p>
				</div>
					
				</div>

			<div class="feature2">
				<div class="t1">
					<p>TEACHERS RECORD</p>
				</div>
				<!-- <div class="book2">
							<img src="openbook.png" class="bk2">
				</div> -->
				<div class="btn1" onclick="func2()" target="_blank">
							<p id="click">Click Here</p>
				</div>
					
				</div>

			<div class="feature3">
				<div class="t1">
					<p> BOOKS RECORD </p>
				</div>
				<!-- <div class="book1">
							<img src="book.png" class="bk1">
				</div> -->
				
				<div class="btn1" onclick="func2()" target="_blank">
							<p id="click">Click Here</p>
				</div>
					
				</div>

			
		</div>
		
	<div id="main_body2">

			<div class="bookdetails">
				<div class="t1">
					<p>INSERT NEW STUDENT</p>
				</div>
				<!-- <div class="book3">
							<img src="write.png" class="bk3">
				</div> -->
				<div class="btn2" onclick="func4()" target="_blank" >
							<p id="click2">Click Here</p>
				</div>
					
				</div>

			<div class="feature2">
				<div class="t1">
					<p>INSERT NEW TEACHER</p>
				</div>
				<!-- <div class="book2">
							<img src="openbook.png" class="bk2">
				</div> -->
				<div class="btn2" onclick="func5()" target="_blank">
							<p id="click2">Click Here</p>
				</div>
					
				</div>

			<div class="feature3">
				<div class="t1">
					<p> INSERT NEW BOOKS </p>
				</div>
				<!-- <div class="book1">
							<img src="book.png" class="bk1">
				</div> -->
				
				<div class="btn2" onclick="func3()" target="_blank">
							<p id="click2">Click Here</p>
				</div>
					
				</div>

			
		</div>
		<!-- <div id="main_body3">

				
		</div> -->
		
	</div>
</body>
</html>
