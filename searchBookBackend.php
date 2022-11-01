<?php 
 	session_start();
 	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}


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

            $_SESSION['result']=$result;
            var_dump($result);
        }
    }
    header("location:".$_SERVER['HTTP_REFERER']);
?>