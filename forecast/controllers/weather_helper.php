<?php

include ('Weather.php');

$post = $_POST['post'];

$weather = new Weather($post);

$forecast = $weather->forecast();

if($forecast)
	echo json_encode($forecast);
else
	echo false;