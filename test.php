<?php
$host="web0.site.uottawa.ca:15432";
$user="sgian032";
$password="***REMOVED***";
$con=mysqli_connect($host,$user,$password,"foobox");
if($con){
	$sql = "SELECT * FROM User_Account";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "username: ".$row["password"].", password: ".$row["password"].", type: ".$row["category"]."<br>";
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
