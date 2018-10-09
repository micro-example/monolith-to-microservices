<?php

	function get_items()
	{
		$str='';
		GLOBAL $items; 
		GLOBAL $rates;
		foreach( $rates as $index => $rate )
		{
			$str.='<input type="checkbox" value="'.$rate.'" name="item[]" />'.$items[$index].'&nbsp;&nbsp;&nbsp;'.$rate.'<br/>';		
		}
		return $str;	
	}
	function calc_total($sel_items)
	{
		$total=0;
		foreach($sel_items as $price)
		{
			$total= $total + $price;
		}
		return $total;
	}
	if(isset($_POST['buy']))
	{	
		$sel_items=array();
		$items=$_POST['item'];
		foreach($items as $item)
			$sel_items[]=$item;	
		Print_r($sel_items);
		$total=calc_total($sel_items);
		echo $total;
		$url = "http://127.0.0.1:8081/payment/".$total;
		
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);
		GLOBAL $t1;
		$t1 = $response;
		echo $response;
	} 
	$t1="";
	$url = "http://127.0.0.1:8081/get";
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
#	Print_r($response)
	$itemrate=explode(":",$response);
	$items=explode(",",$itemrate[0]);
	$rates=explode(",",$itemrate[1]);
#	var_dump($items)
?>
<!DOCTYPE html>
<html>
	<head>
		<title>MicroService Demo</title>
	</head>
	<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<?php echo get_items(); ?>
	<br/>
	<input type="submit" Value="Buy" name="buy" onclick="showInput()"/>
	</form>	
	</body>
</html>
