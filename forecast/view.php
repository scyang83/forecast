<?php


	require_once 'vendor/autoload.php';


	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;

	// create a log channel
	$log = new Logger('name');
	$log->pushHandler(new StreamHandler('weather.log', Logger::WARNING));
	$log->pushHandler(new StreamHandler('weather.log', Logger::NOTICE));



 //Other method without AJAX (See view.php how to render data with ajax)
 include('controllers/weather.php');
 $data = false;
 $current = date('F j, Y, g:i a');
 if(isset($_GET['location'])){
	 $weather = new Weather($_GET['location']);
	 $data = $weather->forecast();

	 $current = $data[0]->item->pubDate; 
	 $log->notice('Get Weather for '.$_GET['location'], (array) $data);
 }else{
	 
	 $log->error('Location does not specified.');
 }

?>


<!DOCTYPE>
<html lang="html">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Yahoo Weather API</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	
	
	<link rel="stylesheet" href="dist/css/style.css">
	
	<!-- Jvascript -->
	<script src="dist/js/jquery-3.1.0.min.js"></script>
	
	
	<script src="dist/js/bootstrap.min.js"></script>
	<!--<script src="dist/js/wk_forecast.js"></script>
	<script>var $location = "<?php //echo $_GET['location'] ?>";</script>-->

</head>

<body style='background-image: url("dist/img/<?php echo $_GET['location'].'.jpg'?>");'>

 
<div class="col-md-12">
	<h2 id="title">Yahoo! Weather - <?php echo $_GET['location']?></h2>
	<h3 id="current"><?php echo $current ?></h3>
	<hr/>
</div>


<div class="col-md-12" id="content">
	<?php if($data):?>
		<table id="weather" class="table">
				<tr class="headerRow">
					<th>Date</th>
					<th></th>
					<th>Detail</th>
					<th>High</th>
					<th>Low</th>
				</tr>
				<?php foreach($data as $v):?>
					<tr class="worksheet worksheet-row" style="white-space:nowrap;">
						<td class="date"><?php echo $v->item->forecast->date?></td>
						<td class="img"><img src="http://l.yimg.com/a/i/us/we/52/<?php echo $v->item->forecast->code.'.gif'?>"></td>
						<td class="detail"><?php echo $v->item->forecast->text ?></td>
						<td class="high_temp"><?php echo $v->item->forecast->high ?></td>
						<td class="low_temp"><?php echo $v->item->forecast->low ?></td>
					</tr>
				<?php endforeach;?>
		</table>
	<?php else:?>
		<h3>No Information Searched.</h3>
	<?php endif;?>
</div>



<div class="col-md-12" style="text-align:right;">
<hr/>
<a href="https://www.yahoo.com/?ilc=401" target="_blank"> <img src="https://poweredby.yahoo.com/white.png" width="134" height="29"/> </a></body>
</div>
</body>

</html>