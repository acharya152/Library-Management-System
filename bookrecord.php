<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
	// include("unsetBookSessions.php");
	// unset($_SESSION['tid']);
 	
	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="insertrec.css">
	<title></title>
	<!-- to set focus on searchpanel despite clicking anywhere on the screen -->
		<script type="text/javascript">
				function fun2(){
						document.getElementById("inpts1").focus();
				}


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
					
				
				<input type="text" name="SearchId" class="inpt1" id="inpts1" placeholder="ENTER BOOK NAME,AUTHOR NAME OR ISBN" required >
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
     if(!$con){
     echo "Not connected".mysqli_connect_error();
     }
     else{
        if(isset($_POST['SearchId'])){            
            $searchid=$_POST['SearchId'];
            $sql="select * from books_data where bname='$searchid'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                $rows = mysqli_num_rows($result);
                $book = mysqli_fetch_assoc($result);
            }else{ 
                $sql="select * from books_data where bid='$searchid'";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0){
                    $rows = mysqli_num_rows($result);
                    $book = mysqli_fetch_assoc($result);
                }else{
                    $sql="select * from books_data where autname='$searchid'";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        $rows = mysqli_num_rows($result);
                        $book = mysqli_fetch_assoc($result);
                    }else{
                        echo"no books found";
                    }
                }
            }
           while()
        }
    }
?>

			<div id="displayErrorBox">
				*Please enter a valid StudentID
			</div>
<div>

