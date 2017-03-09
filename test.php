<?php
$host="localhost";
$user="root";
$password="";
$con=mysqli_connect($host,$user,$password,"test");
if($con){
	$sql = "SELECT * FROM users";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "username: ".$row["USERNAME"].", password: ".$row["PASSWORD"].", type: ".$row["TYPE"]."<br>";
		}
	}
	else{
		echo "0 results";
	}





}
else{
	echo'not connected';
}
?>