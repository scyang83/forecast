<?php
/* 
* Load Yahoo Weather API 
* Referenced by https://developer.yahoo.com/weather/
*/

$post = $_POST['post'];

$base_url = 'http://query.yahooapis.com/v1/public/yql';

if($_POST['func'] == 'list'){
	

	$res = array();

	foreach($post as $k=>$v){
		$city = $v['city'].', '.$v['region'];
		
		$query = 'select item.forecast from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$city.'") and u=\'c\' limit 1';

		$query_url = $base_url . "?q=" . urlencode($query) . "&format=json";

		// Make call with cURL
		$session = curl_init($query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		// Convert JSON to PHP object
		$phpObj =  json_decode($json);
		
		$res[$city] = $phpObj->query->results->channel->item->forecast;
		
		
	}

	echo json_encode($res); 
	
}


if($_POST['func'] == 'detail'){

	$query = 'select item.pubDate, item.forecast from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$post.'") and u=\'c\' limit 5';

	$query_url = $base_url . "?q=" . urlencode($query) . "&format=json";

	// Make call with cURL
	$session = curl_init($query_url);
	curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
	$json = curl_exec($session);
	// Convert JSON to PHP object
	$phpObj =  json_decode($json);
	
	//echo $post;

	echo json_encode($phpObj->query->results->channel); 
}


