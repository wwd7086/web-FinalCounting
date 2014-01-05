<?php
	////connect to db
	$con=mysqli_connect("127.0.0.1","FoodCounting","foodcounting","FoodCounting"); 

	////init
	$rsYear=$_REQUEST["year"];
	$rsMonth=$_REQUEST["month"];

	$reYear=$rsYear;
	$reMonth=$rsMonth+1;

	//special condition
	if($rsMonth==12)
	{
		$reMonth=1; 
		$reYear++;
	}

	//init start and end date
	$rsDate="'".$rsYear."-".$rsMonth."-1"."'";
	$reDate="'".$reYear."-".$reMonth."-1"."'";

	////query db and build xml
	$date="0000-00-00";
	$people=0;
	$place="";
	$cost=0;

	//create the xml
	$xml=new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><lists></lists>');

	//query date
	$qDate="select distinct date 
			from Purchase where date>=".$rsDate."and date<".$reDate.
			"order by date desc";

	$dResult=mysqli_query($con, $qDate);
	// showResult($dResult);

	while ($dRow = mysqli_fetch_array($dResult))
	{	
		$date=$dRow[0];
		//query people
		$qPeople="select distinct PID
				  from Purchase where date='".$date."'";
		$pResult=mysqli_query($con, $qPeople);
		// showResult($pResult);

		while ($pRow = mysqli_fetch_array($pResult)) 
		{
			$people=$pRow[0];
			//query place
			$qPlace="select distinct place
					 from Purchase, Food
					 where Purchase.FID=Food.FID 
					 and date='".$date."' and PID=".$people;
			$plResult=mysqli_query($con,$qPlace);
			// showResult($plResult);

			while ($plRow=mysqli_fetch_array($plResult)) 
			{
				$place=$plRow[0];
				//query foods
				$qFood="select Food.name, Purchase.quantity, Food.price
						from Purchase, Food
						where Purchase.FID=Food.FID
						and date='".$date."' and PID=".$people.
						" and place='".$place."'";
				$fResult=mysqli_query($con, $qFood);
				// showResult($fResult);

				//build xml
				$list=$xml->addChild('list');
				$ldate=$list->addChild('date');
				$parts=explode("-", $date);
				$ldate->addChild('year', $parts[0]);
				$ldate->addChild('month', $parts[1]);
				$ldate->addChild('day', $parts[2]);
				$list->addChild('people',$people);
				$list->addChild('place',$place);
				$items=$list->addChild('items');

				while($fRow=mysqli_fetch_array($fResult))
				{
					$item=$items->addChild('item');
					$item->addChild('name',$fRow[0]);
					$item->addChild('quantity',$fRow[1]);
					$cost=$cost+($fRow[1]*$fRow[2]);
				}

				$list->addChild('cost',$cost);
				$cost=0;
			}
		}
	}

	Header('Content-type: text/xml');
	echo $xml->asXML();

	//for debug use
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
	//build xml
?>