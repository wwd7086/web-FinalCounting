<?php
$name = $_GET['name'];
$place = $_GET['place'];
$from = $_GET['from'];
$to=$_GET['to'];

$con=mysqli_connect("127.0.0.1","FoodCounting","foodcounting","FoodCounting"); 
$query="select Food.name, Purchase.quantity
		from Food, People, Purchase 
		where Food.FID=Purchase.FID and People.PID=Purchase.PID
		and People.name='".$name."' and Food.place='".$place."'
		and date>='".$from."' and date<'".$to."'";

$result=mysqli_query($con, $query);
showResult($result);

function showResult($result)
	{
		echo "----------------------------------<br/>";
		while($row = mysqli_fetch_array($result))
  		{
  			$length=count($row);
  			for($i=0; $i<$length; $i++)
  			{
  				echo $row[$i]." ";
  			}
  			echo "<br/>";
  		}
  		echo "----------------------------------<br/>";
	}

?>
