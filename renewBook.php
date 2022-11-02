<?php 
	session_start();
	if(!isset($_SESSION['logged'])){
 		header("Location:./loginform.php");

    }
    // $_SESSION['confirm']=true;
    //  if(isset($_GET['barcode'])){
    //     $_SESSION['Rbarcode']=$_GET['barcode'];
    // }

$host="localhost";
$user="root";
$password="";
$db="libraryms";
$con=mysqli_connect($host,$user,$password,$db);
 

if(isset($_SESSION['sid'])){
    $sql = 'select * from borrowedbook_data where barcode="'.$_SESSION['Rbarcode'].'"';
}elseif(isset($_SESSION['tid'])){
  $sql = 'select * from teacherborrowedbook_data where barcode="'.$_SESSION['Rbarcode'].'"';
}
try{

    $result = mysqli_query($con,$sql);
    if(!$result){
        throw new Exception(mysqli_error($con));
    }
    $rows=mysqli_fetch_assoc($result);
    
    $due=$rows["duedate"];
    $renewcount = $rows["renewCount"];
    echo $renewcount;

    if($renewcount>1){           
        $_SESSION['error']="* Renew count exceeded for ".$_SESSION['Rbarcode'];
    }else{



    $duedate= date_create($due);
    
    date_add($duedate,date_interval_create_from_date_string("15 days"));
    $newdate=date_format($duedate,"Y-m-d");
    
if(isset($_SESSION['sid'])){
    if(isset($_GET['renewAll'])){   
        $sql = 'UPDATE borrowedbook_data SET duedate ="'.$newdate.'" WHERE  sid="'.$_SESSION['sid'].'"';
    }else{
         $sql = 'UPDATE borrowedbook_data SET duedate ="'.$newdate.'", renewCount=renewCount+1 WHERE  barcode="'.$_SESSION['Rbarcode'].'"';
    }
}elseif(isset($_SESSION['tid'])){
    if(isset($_GET['renewAll'])){   
        $sql = 'UPDATE teacherborrowedbook_data SET duedate ="'.$newdate.'" WHERE  sid="'.$_SESSION['tid'].'"';
    }else{
         $sql = 'UPDATE teacherborrowedbook_data SET duedate ="'.$newdate.'", renewCount=renewCount+1 WHERE  barcode="'.$_SESSION['Rbarcode'].'"';
    }
}
$result = mysqli_query($con,$sql);
if(!$result){
    throw new Exception(mysqli_error($con));
}
echo($result);
}
}catch(Exception $e){
    $_SESSION['error']= $e->getMessage();
}

// if(isset($_SESSION['renewAll'])){   
//     unset($_SESSION['renewAll']);
// }   
header("location:viewborrowedbooks.php");

?>

