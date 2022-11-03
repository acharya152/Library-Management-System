<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}
    // $_SESSION['confirm']=true;
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
// echo $bid;
// $bid = 1001;
$checksql ="select * from books_data where bid=$bid";
try{

    $result=mysqli_query($con,$checksql);
    if(!$result){
        throw new Exception(mysqli_error($con));
}

elseif(mysqli_num_rows($result)==1){


//sql to remove all book copies
$sql = "delete from books_barcode where bid='$bid'";
// echo $sql;
try{
    $query=mysqli_query($con,$sql);
    // echo $query;
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
                $_SESSION['cantdelete']=true;

                throw new Exception(mysqli_error($con));
                // echo "hello";
        }

        else{
                    // $_SESSION['confirm']=true;

                    $_SESSION['successmsg']=true;
                    // echo     $_SESSION['successmsg'];     
        }
    }
}
}catch(Exception $e){
    // echo "hello";
    echo $e->getMessage();
    $_SESSION['cantdeletemsg']=$e->getMessage();
    // echo "hi";
} 
}
}catch(Exception $e){
    // echo "hello";
    echo $e->getMessage();
    $_SESSION['cantdeletemsg']=$e->getMessage();
    // echo "hello";
//  header("location:bookrecord.php");

} finally{
    // echo "hello1";
    if((!isset($_SESSION['successmsg'])) && (!isset($_SESSION['cantdeletemsg']))){
        $_SESSION['errorfornobook']=true;
    }

    header("location:bookrecord.php?bid1=".$bid);
    // header("location:bookrecord.php");

}
?>