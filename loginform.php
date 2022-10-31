



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login Page</title>
	<link rel="stylesheet" type="text/css" href="./loginformcss1.css">

<?php

$host="localhost";
$user="root";
$password="";
$db="libraryms";
$msg="";

$con=mysqli_connect($host,$user,$password,$db);
if(!$con){
echo "Not connected".mysqli_connect_error();
}
// if(isset($_SESSION['logged'])){
//   header("Location: ./dashboard.php");

// }
else{
if(isset($_POST['username'])){
  $usrname=$_POST['username'];
  $pass=$_POST['password'];

  $sql="select * from admin_data where Username='".$usrname."' AND Password='".$pass."' limit 1";

  $checkindb=mysqli_query($con,$sql);
  if(mysqli_num_rows($checkindb)==1){
    session_start();
    $_SESSION['logged']="true";
    $_SESSION['user']=$usrname;

    header("Location: ./dashboard.php");
    exit();
  }
  else{
    $msg="*INVALID USERNAME OR PASSWORD";      
  }

}

}
?>
</head>
<body>

<div id="maindiv">
  
<form method="POST" action="#">

  

  <div class="form" >

   <div class="div1"><?php echo($msg); ?></div>
   

    
      
    
    <div class="sign">
      
      <p>Login to MOCCA</p>
    </div>
    <div class="rectangle"></div>
    <div class="input">
 
      <input type="text" placeholder="example@mocca.com" name="username" required>
      <input class="pss" type="password" placeholder="•••••" name="password" required>
     
     
    
    
      
    <button type="submit" class="btn1">Login</button>
    </div>
  </div>
</div>  
</form>
</body>

</html>
