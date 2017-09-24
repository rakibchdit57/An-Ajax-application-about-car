<?php include "db.php";?>
<?php
if(isset($_POST['car_name']))
{
	$car_name=$_POST['car_name'];
	$query="INSERT INTO cars(car_name) VALUES('$car_name') ";
	$query_car_name=mysqli_query($connection,$query);
	if(!$query_car_name){
		die('QUARY FAILED'.mysqli_error($connection));
	}
	header("Location: index.php");
}

?>