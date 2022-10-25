<?php
session_start();
if(!isset($_SESSION['logged'])){
     header("Location:./loginform.php");

 }
        if(isset($_GET['barcode'])){
            $_SESSION['Rbarcode']=$_GET['barcode'];
        }
?>

<?php
$host="localhost";
$user="root";
$password="";
$db="libraryms";

$con=mysqli_connect($host,$user,$password,$db);
//code for error handling later



$sql = 'select * from borrowedbook_data where barcode="'.$_SESSION['Rbarcode'].'"';
$result = mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($result);

$due=$rows["duedate"];
$duedate= date_create($due);
// var_dump( $duedate);

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
                    // echo "".$fineamount;
                    $_SESSION['fineAmount']=$fineamount;

                    header("location:".$_SERVER['HTTP_REFERER']);
?>