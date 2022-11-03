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
					$tid=$_SESSION['passteacherid'];

					$tname=$_POST['bname'];

					$contact=$_POST['contact'];
					$_SESSION['Ccontact']=$contact;

					$subject=$_POST['sub'];
					$depart=$_POST['dept'];
					
					$filename=$tname."_".$contact."_".$tid.".svg";
					$saveAs=str_replace(' ', '', $filename);
					
					include("validatephone.php");



	if(isset($_SESSION['dberror'])){
		header("location:".$_SERVER['HTTP_REFERER']);
	}else{
				$sql="insert into teacher_data values('$tid','$tname','$contact','$subject','$depart',0)"; 
				try{
				$checkindb=mysqli_query($con,$sql);
					if(!$checkindb){
						$_SESSION['errorMsg']="true";
						throw new Exception(mysqli_error($con));
					
					}else{

						$_SESSION['issueSucess']="true";
					}
				}
				catch(Exception $e){
					$_SESSION['dberror']= $e->getMessage();
					header("location:".$_SERVER['HTTP_REFERER']);
					
				}	
			
							



					
			 }
}



?> 		

<html>
	<head>
		<title>Insert A Student</title>
	<script src="barcodescript.js"></script>
	<link rel="stylesheet" type="text/css" href="displaybarcode.css">
	<style type="text/css">
      @media print {
   p{
   	display: none;
   }

   
    
  }
</style>
	</head>
	<script>

function downloadSVGAsText() {

const svg = document.querySelector('svg');
// const b = btoa(decodeURI(encodeURIComponent(svg.outerHTML)));
const b = btoa(svg.outerHTML);

const a = document.createElement('a');
const e = new MouseEvent('click');
a.download = '<?php echo $saveAs; ?>';
a.href = 'data:image/svg+xml;base64,' + b;
a.dispatchEvent(e);
}
</script>

	<body>
	<div class="print-area">
	 <svg id="barcode"  onclick="downloadSVGAsText();window.print()"></svg>
		<script type="text/javascript">
				JsBarcode("#barcode",<?php echo("$tid") ?>);
		</script>

<p><b>CLICK ON THE BARCODE TO SAVE AND PRINT IT!!</b></p>							
						

								   
								      

	</div>

	</body>
</html>