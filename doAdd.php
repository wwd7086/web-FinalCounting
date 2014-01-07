<?php
//connect to db
$con=mysqli_connect("127.0.0.1","FoodCounting","foodcounting","FoodCounting"); 

//prepare the item
$presult=mysqli_query($con,"select PID from People 
							where name='".$_POST['name']."'");
$pid=mysqli_fetch_array($presult)['PID'];
$fresult=mysqli_query($con,"select FID from Food 
							where name='".$_POST['food']."' and place='".$_POST['place']."'");
$fid=mysqli_fetch_array($fresult)['FID'];
$quantity=$_POST['quantity'];
$date=$_POST['date'];

//insert the item
if(mysqli_query($con, "insert into Purchase values('$fid','$pid','$date',$quantity)"))
{	
	echo "<a href=\"index.html\">insert success go back to overview</a>";	
}
else
{
	echo "<a href=\"add.html\">insert fail go back to add</a>";
}

?>

