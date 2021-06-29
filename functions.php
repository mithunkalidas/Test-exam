<?php
function nex($working,$ord)
{
	$n=count($working);
	$flag=0;
	while($flag==0)
	{
		
		for($i=0;$i<$n;$i++)
		{
			$times = strtotime($ord);
			$day = date('l', $times);
			if($day==$working[$i])
			{
				echo "Order will be placed on ".$ord;
				$flag=1;
				break;
			}
		}
		$ord=strftime("%Y-%m-%d", strtotime("$ord +1 day"));
	}	
}
function getShippingDate($orderDate, $oderTime) 
{
	$times = strtotime($orderDate);
	$day = date('l', $times);
	$working=array("Thursday","Friday");
	if($day==$working[0])
	{
		if($oderTime<=11)
		{
			echo "Order will be placed on ".$orderDate;
		}
		else
		{
			$orderDate = strftime("%Y-%m-%d", strtotime("$orderDate  +1 day"));;
			nex($working,$orderDate);
		}
	}
	elseif($day==$working[1])
	{
		if($oderTime<=11)
		{
			echo "Order will be placed on ".$orderDate;
		}
		else
		{
			$orderDate = strftime("%Y-%m-%d", strtotime("$orderDate  +1 day"));;
			nex($working,$orderDate);
		}
	}
	else
	{
		nex($working,$orderDate);
	}	
}
$date=date('2021/06/19');
$time=date("1");
getShippingDate($date,$time);

?>





