<?php
session_start();
if(!isset($_SESSION['logged'])){
     header("Location:./loginform.php");

 }
 ?>
 <?php
$host="localhost";
$user="root";
$password="";
$db="libraryms";

$con=mysqli_connect($host,$user,$password,$db);
//code for error handling later

if(isset($_SESSION['sid'])){
    $sql = 'select * from borrowedbook_data where sid="'.$_SESSION['sid'].'"';
}elseif (isset($_SESSION['tid'])) {
    $sql = 'select * from teacherborrowedbook_data where tid="'.$_SESSION['tid'].'"';
}

$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){

    $totalfine=0;
    while($rows=mysqli_fetch_assoc($result)){
        $due=$rows["duedate"];
        $duedate= date_create($due);
        
        $datet =getdate();
    $today = $datet['year']."-".$datet['mon']."-".$datet['mday'];
    // echo $today;
    $datetoday = date_create($today);
    
    if($datetoday>$duedate){
        
        
        $interval=date_diff($datetoday,$duedate);
        $overdue= $interval->days;
        // echo " ".$overdue;
        $fineamount=$overdue*12;
        
        
    }else{
        $fineamount=0;
    }

    $totalfine+=$fineamount;
}

$_SESSION['fineAmount']=$totalfine;
$_SESSION['removeAll']=true;
}else{
    $_SESSION['dberror']="No books available to remove";
}
header("location:".$_SERVER['HTTP_REFERER']);
?>

