<?php
session_start();
if($_GET['logout']==1 AND $_SESSION['id']){
	session_destroy();
	$messg='You have been logged out';
}
include("connection.php");
if(isset($_POST["signup"])){
	if($_POST["email"]){
		$email = $_POST["email"];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$emailError ='Invalid email address';
			//header("Location:login.php");
		}
	} else {
		$emailError ='Email address is required';
		//header("Location:login.php?emailError=1");
	}
	if($_POST["password"]){
		$password = $_POST["password"];
		if(strlen($password) < 8 AND !preg_match('/[A-Z]/', $password)){
		$passwordError ='Password must be at least 8 characters including at least one capital letter';
		} else{
			$query="SELECT * FROM diary WHERE email LIKE '".mysqli_real_escape_string($link,$_POST["email"])."'";
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			if ($results){
				$emailError='That email is already registered. Do you want to log in?';
			} else {
				$query = "INSERT INTO `diary` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
				mysqli_query($link, $query);
				$success="You have been signed up!";
				$_SESSION['id']= mysqli_insert_id($link);	
				header("Location:main.php");
			}		
		}
	} else {
		$passwordError ='Password is required.';
	} 	
}
if($_POST["login"]){
	if(!$_POST["email"]){
		$emailError ='Email address is required';
	}
	if($_POST["password"]){
			$query = "SELECT * FROM diary WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'AND password='".md5(md5($_POST['email']).$_POST['password']). "'LIMIT 1";
			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if($row){
			$_SESSION['id']=$row['id'];
			header("Location:main.php");  
			} else {
			$messg = "We could not find a user with that email and password. Please try again.";	
			}
	} else {
		$passwordError ='Password is required.';
	} 	
}
?>