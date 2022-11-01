<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");
 		// unsetting teacher student sessions
				 		
	 	}
         $host="localhost";
         $user="root";
         $password="";
         $db="libraryms";
         

         $con=mysqli_connect($host,$user,$password,$db);
         if(!$con){
         echo "Not connected".mysqli_connect_error();
         }

    
        //getting bid from url
        // $bid=$_GET['bid'];
        $bid=1001;


        //getting books data from bid
        $sql = "select * from books_data where bid=$bid";
        $query=mysqli_query($con,$sql);
        $bookrow = mysqli_fetch_assoc($query);
        $bname=$bookrow['bname'];
        $autname=$bookrow['autname'];

        //getting last barcode for book
        $sql="select MAX(barcode) from books_barcode where bid='$bid'";
        $result=mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $lastbarcode = $row['MAX(barcode)'];

        //num of books to add
        $booksnum = $_POST['numbooks'];
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
        //update barcode table
$error='';
            for($i=1;$i<=$booksnum;$i++){        
                $barcode = $lastbarcode.$i;
                $svgID = "dispBar".$i;
                $sql3 = "insert into books_barcode values('$bid','$barcode')";
                $checkindb=mysqli_query($con,$sql3);
                if($checkindb){
                    // JsBarcode("#barcode", text); 
                    echo('<svg id="'.$svgID.'"  onclick="'.'window.print()"></svg>');
                    // echo $barcode;
                    echo ('<script> JsBarcode("#'.$svgID.'",'.$barcode.');</script>');
                }else{
                    $error = true;
                    break;
                }
            }
        //update inventory table
        if(!$error){

            $sql="UPDATE books_inventory SET no_totalBooks =no_totalBooks+$booksnum  WHERE bid =$bid";
            $query=mysqli_query($con,$sql);

        }


        header("location:".$_SERVER['HTTP_REFERER']);
?>
</div>

</body>
</html>