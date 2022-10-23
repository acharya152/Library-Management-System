<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	// include("barcodegenerateforbook.php");
 	
$host="localhost";
$user="root";
$password="";
$db="libraryms";
						

$con=mysqli_connect($host,$user,$password,$db);
		if(!$con){
		echo "Not connected".mysqli_connect_error();
				}
						
		else{
					// echo"hello";
					$bid=$_POST['bid'];
					$bname=$_POST['bname'];
					$authname=$_POST['autname'];
					$no=$_POST['noofbooks'];
				$sql="insert into books_data values('$bid','$bname','$authname')"; 
				$sql2 = "insert into books_inventory values('$bid','$no')";


				
				
				try{
				$checkindb=mysqli_query($con,$sql);
					if(!$checkindb){
						$_SESSION['errorMsg']="true";
						throw new Exception(mysqli_error($con));
					
					}else{

						$_SESSION['issueSucess']="true";
						$checkindb1=mysqli_query($con,$sql2);
					}
				}
				catch(Exception $e){
					$_SESSION['dberror']= $e->getMessage();
					header("location:".$_SERVER['HTTP_REFERER']);
					
				}	
			
							
							//generate barcode


					
			 }




?> 		

<html>
	<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="displaybarcode.css">
	</head>

	<body>
	<div class="print-area">
								    <!-- <svg id="barcode"  onclick="window.print()"></svg> -->
									<script>
	// JsBarcode("#barcode", "123");
	</script>

								    <!-- <button id="btn" onclick="fun2()">Generate Barcode</button> -->
								      
<?php

	if(isset($_SESSION['issueSucess'])){


	for($i=1;$i<=$no;$i++){

	$barcode = $bid.$i;
	$svgID = "dispBar".$i;
	$sql3 = "insert into books_barcode values('$bid','$barcode')";
	$checkindb=mysqli_query($con,$sql3);
	// JsBarcode("#barcode", text);

								echo('<svg id="'.$svgID.'"  onclick="'.'window.print()"></svg>');

								// echo $barcode;
								echo ('<script> JsBarcode("#'.$svgID.'",'.$barcode.');</script>');
										
							}
	}
?>
	</div>

	</body>
</html>