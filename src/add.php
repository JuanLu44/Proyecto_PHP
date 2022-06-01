<?php 
session_start(); 


if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}
	
include_once("views/header.php");

//including the database connection file
include_once("config.php");

if(isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['price'])) {
	// Saneamos los parámetros que recibimos del formulario
	
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli-> real_escape_string($_POST['price']);
	
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = $mysqli->query("INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
} else {
	include_once("views/add.php");
}

include_once("views/footer.php");
?>

