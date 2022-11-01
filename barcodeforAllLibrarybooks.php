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
						
$bid=$_GET['bid'];
// $bid=1004;

$con=mysqli_connect($host,$user,$password,$db);
		if(!$con){
		echo "Not connected".mysqli_connect_error();
				}

?>



<html>
<head>
<script src="barcodescript.js"></script>
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

$sql="select barcode from books_barcode where bid='$bid'";
$query=mysqli_query($con,$sql);
$i=1;
if($query){
    while($rows=mysqli_fetch_assoc($query)){
        $barcode = $rows['barcode'];
        $svgID = "dispBar".$i;
        // JsBarcode("#barcode", text);

           echo('<svg id="'.$svgID.'"  onclick="'.'window.print()"></svg>');

          // echo $barcode;
          echo ('<script> JsBarcode("#'.$svgID.'",'.$barcode.');</script>');
          $i++;
    }
}
?>
</div>

</body>
</html>


                    }
                }