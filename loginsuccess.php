<?php
	$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"test");
$username = $_POST["username"];
$password = $_POST["password"];
session_start();

if($con){
	$sql = "SELECT USERNAME, TYPE FROM USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	if($count == 1){
		//session_register($username);
		//$_SESSION['login_user'] = $username;
		echo "Welcome ".$row["USERNAME"].", you are authorized as: ".$row["TYPE"];
	}	


}
else{
	echo'not connected';
}
?>