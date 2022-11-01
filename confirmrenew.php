<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");
 	}
	if( !(isset($_SESSION['sid']) || isset($_SESSION['tid']))){
		header("location:dashboard.php");
	}

	if(isset($_SESSION['confirm'])){
		unset($_SESSION['confirm']);
		header("location:".$_SERVER['HTTP_REFERER']);
	}

 		?>	


 		<?php 
 		$barcode=$_GET['barcode'];

 		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<style type="text/css">
		
		body{
			background-image: url(blur2.jpg);
			background-size: cover;
		}
		#mainbox{
			background-color:#dde8ed;
			z-index: 2;
			height: 30vh;
			width: 30vw;
			position: absolute;
			top: 35vh;
			left: 35vw;
			border-radius: 20px;
			border: 8px solid yellowgreen;

		}
		#text{
			color: #414e66;
			font-size: 5vh;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
			font-weight: bold;
			text-align: center;
			position:relative;
			top: 3vh
		}
		#yes{
			background-color: yellowgreen;
			height: 9vh;
			width: 9vw;
			border-radius: 20px;
			text-align: center;
			/*padding-top: 2vh;*/
			color: white;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
			font-size: 6vh;
			position: absolute;
			top: 15vh;
			left: 3vw;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;


		}
		#no{
			background-color: indianred;
			height: 9vh;
			width: 9vw;
			border-radius: 20px;
			text-align: center;
			/*padding-top: 2vh;*/
			color: white;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
			font-size: 5vh;
			position: absolute;
			top: 15vh;
			right: 3vw ;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;


		}
	</style>

	<script type="text/javascript">
		

				function func1(){
						window.location.href="renewBook.php?barcode=<?php echo ($barcode)?>";
				}

				function func2(){
						window.location.href="viewborrowedbooks.php";
				}
				// function func3(){
				// 		window.location.href="insertrecteacher.php";
				// }
	</script>
</head>
<body>
				<div id="mainbox">
					
						<div id="text">
								Confirm Renew?
						</div>

						<div id="yes" onclick="func1()">
							Yes
								
						</div>
						<div id="no" onclick="func2()">
							Cancel
								
						</div>
				</div>
</body>
</html>