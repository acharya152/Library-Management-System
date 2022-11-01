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

//getting bid from url
$bid = $_GET['bid'];
// $bid = 1001;


//sql to remove all book copies
$sql = "delete from books_barcode where bid='$bid'";
try{
    $query=mysqli_query($con,$sql);
    if(!$query){
        throw new Exception(mysqli_error($con));
    }
    else{
        $sql="delete from books_inventory where bid='$bid'";
        $query =mysqli_query($con,$sql);
        if(!$query){
            throw new Exception(mysqli_error($con));
        }else{
            $sql="delete from books_data where bid='$bid'";
            $query =mysqli_query($con,$sql);
            if(!$query){
                throw new Exception(mysqli_error($con));
        }
    }
}
}catch(Exception $e){
    echo $e->getMessage();
}


?>