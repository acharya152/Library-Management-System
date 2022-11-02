<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

 	}

$host="localhost";
$user="root";
$password="";
$db="libraryms";
// echo $_SESSION['Rbarcode'];
$con=mysqli_connect($host,$user,$password,$db);
if(!$con){
    echo "Not connected".mysqli_connect_error();
}


if (isset($_SESSION['sid'])){
    $sid=$_SESSION['sid'];
    if(isset($_SESSION['removeAll'])){
        // echo $_SESSION['sid'];
        $sql = "DELETE from borrowedbook_data where sid=".$_SESSION['sid'];
    }else{
        $sql = "DELETE from borrowedbook_data where barcode=".$_SESSION['Rbarcode'];

    }
}elseif (isset($_SESSION['tid'])){
    $tid=$_SESSION['tid'];
    if(isset($_SESSION['removeAll'])){
        $sql = "DELETE from teacherborrowedbook_data where tid=".$_SESSION['tid'];
    }else{
        $sql = "DELETE from teacherborrowedbook_data where barcode=".$_SESSION['Rbarcode'];

    }
}
if(isset($_SESSION['removeAll'])){
    if (isset($_SESSION['sid'])){
        $sql1="select barcode from borrowedbook_data where sid =$sid";
    }elseif (isset($_SESSION['tid'])){
        $sql1="select barcode from teacherborrowedbook_data where tid =$tid";
    }
    $qurey1=mysqli_query($con,$sql1);
    while($rows=mysqli_fetch_assoc($qurey1)){
        $barcode=$rows["barcode"];
        $sql4="select bid from books_barcode where barcode='$barcode'";
        $sql4query=mysqli_query($con,$sql4);
		$rowBID=mysqli_fetch_assoc($sql4query);
        $bid=$rowBID["bid"];
        $sql4="update books_inventory set no_issuedBooks=no_issuedBooks-1 where bid=$bid ";
		$query = mysqli_query($con,$sql4);
    }
}else{
    $sql4="select bid from books_barcode where barcode=".$_SESSION['Rbarcode'];
    $sql4query=mysqli_query($con,$sql4);
    $rowBID=mysqli_fetch_assoc($sql4query);
    $bid=$rowBID["bid"];
    $sql4="update books_inventory set no_issuedBooks=no_issuedBooks-1 where bid=$bid ";
    $query = mysqli_query($con,$sql4);

}
    try{
        $result = mysqli_query($con,$sql);
        if(!$result){
            throw new Exception(mysqli_error($con));
        }else{
         //sucessmessage not rerquired?  
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
    // echo $sql;
    					unset($_SESSION['Rbarcode']);
                        unset($_SESSION['removeAll']);
                    header("location:".$_SERVER['HTTP_REFERER']);
    
    
        

// if (isset($_SESSION['sid'])){
// try{
    
//     $sql = "DELETE from borrowedbook_data where barcode=".$_SESSION['Rbarcode'];
    
    
//     $result = mysqli_query($con,$sql);
//     if(!$result){
//         throw new Exception(mysqli_error($con));
//     }
// }catch(Exception $e){
//     echo $e->getMessage();
// }
// // echo $sql;
// 					unset($_SESSION['Rbarcode']);

//                 header("location:".$_SERVER['HTTP_REFERER']);


//     }

// elseif (isset($_SESSION['tid'])){
// try{
    
//     $sql = "DELETE from teacherborrowedbook_data where barcode=".$_SESSION['Rbarcode'];
    
    
//     $result = mysqli_query($con,$sql);
//     if(!$result){
//         throw new Exception(mysqli_error($con));
//     }
// }catch(Exception $e){
//     echo $e->getMessage();
// }
// // echo $sql;
//                     unset($_SESSION['Rbarcode']);

//                 header("location:".$_SERVER['HTTP_REFERER']);


//     }
 ?>