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
	<title>DASHBOARD</title>
	<link rel="stylesheet" type="text/css" href="./newFeature.css">
	
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

								<div class="lgnout">	
								<a href="./logout.php">
										<b>Log Out</b>
								</a>
								</div>
			
		</div>

	
		<div id="addNewFeature">
            Feature Coming Soon!!
        </div>
		
	</div>
</body>
</html>
