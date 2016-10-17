<?php
ob_start ();

if(!isset($_SESSION['ketquathi'])){
	header("location:login.php");
	return;
}
