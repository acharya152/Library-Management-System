<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	// include("unsetBookSessions.php");
	// unset($_SESSION['tid']);
 	if(isset($_GET['bid'])){
		$addbid = $_GET['bid'];
	}
	if(isset($_GET['bid1'])){
		$removebid = $_GET['bid1'];
	}
	
	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bookrecord.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				
				


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

		<div id="main_body">
			

			<div id="searchPanel">
				<label id="label1">Book:</label>
				<form method="POST" action="bookrecord.php" >
					
				
				<input type="text" name="SearchId" class="inpt1" id="inpts1" placeholder="ENTER BOOK NAME OR AUTHOR NAME OR ISBN" required >
				<input type="submit" value="Search" class="inpt2">
				<!-- Validate search data and clear session for invalid input -->

				</form>

					<!-- to pass control to search box -->
					<script type="text/javascript">
				window.onload=function fun1(){
						document.getElementById("inpts1").focus();
				}


					</script>
			</div>
 <?php 
     $host="localhost";
     $user="root";
     $password="";
     $db="libraryms";
     $con=mysqli_connect($host,$user,$password,$db);
     if(isset ($_POST['SearchId'])){
     $_SESSION['bookrecord']=$_POST['SearchId'];
 }
     if(!$con){
     echo "Not connected".mysqli_connect_error();
     }
     else{
        // if(isset($_POST['SearchId'])){ 
        if(isset($_POST['SearchId'])){
       		$searchid=$_POST['SearchId'];
       	}
       	elseif(isset($_SESSION['cantdeletemsg']) && isset($_SESSION['bookrecord'])){
       		$searchid= $_SESSION['bookrecord'];
       	}elseif(isset($_GET['id'])){
       		$searchid=$_GET['id'];
       	}            
       	if(isset($searchid)){ 
            // $searchid=$_POST['SearchId'];
            $sql="select * from books_data where bname='$searchid'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                $rows = mysqli_num_rows($result);
                
            }else{ 
                $sql="select * from books_data where bid='$searchid'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    $rows = mysqli_num_rows($result);
           
                }else{
                    $sql="select * from books_data where autname='$searchid'";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        $rows = mysqli_num_rows($result);

                    }else{
                        $_SESSION['errorfornobook']=true;
                    }
                }
            }

           while($next=mysqli_fetch_assoc($result)){
			// var_dump($next);
			$bname=$next['bname'];
			$bid=$next['bid'];
			$autname=$next['autname'];

			$sql1="select * from books_inventory where bid=$bid";
			$query= mysqli_query($con,$sql1);

			$rows1= mysqli_fetch_assoc($query);
			$totalbook=$rows1["no_totalBooks"];
			$issuedbook=$rows1["no_issuedBooks"];

				
 ?>


			
			
<div id="studentdisplaybox">
								<div class="namediv">
								<label>ISBN:</label>
								<?php 
									echo($bid);
								?>
								
								</div>
					<br>
								<div class="contactdiv">
								<label>Book Name:</label>
								<?php 
									echo($bname);
								?>
								
								</div>
					<br>
								<div class="yeardiv">
								<label>Author Name:</label>
								<?php 
									echo($autname);
								?>
							</div>
							<br>
								<div class="yeardiv">
								<label>Total number of books:</label>
								<?php 
									echo($totalbook);
								?>
							</div>
							<br>
								<div class="yeardiv">
								<label> Number of books available:</label>
								<?php 
									echo($totalbook-$issuedbook);
								?>
							</div>
				<div  id="issuebutton" >

					<a  class="issuebtn" href="./bookrecord.php?id=<?php echo $_SESSION['bookrecord'];?>&bid=<?php echo ($bid)?>"  >
										<b>Add Books </b>
									</a>
				</div>
				<div  id="viewbutton">
					<a href="./confirmremoveallbook.php?bid=<?php echo ($bid)?>" class="viewbtn">
					
										<b>Remove Book</b>
									</a>

				</div>
				<div  id="genbutton">
					<a href="./barcodeforAllLibrarybooks.php?bid=<?php echo($bid)?>" class="viewbtn" target="_blank">
					
										<b>Generate Barcodes</b>
									</a>

				</div>
			
</div>


<?php 
 }
}

		   }

		   if(isset ($_SESSION['bookrecord'])){

		   }
        
?>
<div id="removeall">
		<form method="POST" action="addbooks.php?bid=<?php echo $addbid?>" >
		<input type="number" name="numbooks" id="getnum" placeholder="Enter number of books"><br>
		<button id="btn1" type="submit" >Add</button>
		<!-- <input type="submit" name="" value="Add" id="btn1"> -->
		</form>
	</div>
</div>
</div>
 <div id="displayErrorBox">
				* No such book found in the library. 
			</div>
			
<?php 
				if(isset($_SESSION['errorfornobook'])){
					echo "<script src='showErrorBox.js'></script>";
					unset($_SESSION['errorfornobook']);
				}
				if(isset($_GET['bid'])){
					echo "<script src='showplaceholder.js'></script>";
					unset($_SESSION['errorfornobook']);
				}
			?>
			<div id="displaycantdelete"> 
	* Can't remove book: Some books borrowed.
			</div>

<?php 
				if(isset($_SESSION['cantdelete']) || isset($_SESSION['cantdeletemsg'])){
					echo "<script src='showcantdelete.js'></script>";
					unset($_SESSION['cantdelete']);
					unset($_SESSION['cantdeletemsg']);

				}
			?>
			<div id="displaysuccess">
				*<?php echo $removebid?> Successfully removed from library. 
			</div>
			<?php 
				if(isset($_SESSION['successmsg']) ){
					// echo "hello";
					echo "<script src='showdeletesuccess.js'></script>";
					unset($_SESSION['successmsg']);
					

				}
			?>

</body>
</html>