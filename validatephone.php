<?php
// session_start();
// 	if(!isset($_SESSION['logged'])){
//  		header("Location:./loginform.php");

//  	}

if(!preg_match('/^[9][0-9]{9}$/',$_SESSION['Ccontact'])) {

$_SESSION['dberror']= "Invalid Phone Number";
}
unset($_SESSION['Ccontact']);
?>