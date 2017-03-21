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
	
	<script src="dist/js/wk_forecast.js"></script>
	
	<script>var $location = "<?php echo $_GET['location'] ?>";</script>

</head>

<body>

<div class="col-md-12">
	<h2 id="title">Yahoo! Weather - <?php echo $_GET['location']?></h2>
	<h3 id="current"></h3>
	<hr/>
</div>
<?if(isset($_GET['location'])):?>
<div class="col-md-12" id="content">
</div>
<?endif?>
<div id="template" style="display:none;">
	<table class="weather_template table" style="display:none;">
			<tr class="headerRow">
				<th>Date</th>
				<th></th>
				<th>Detail</th>
				<th>High</th>
				<th>Low</th>
			</tr>
			<tr class="template worksheet-row" style="display:none; white-space:nowrap;">
				<td class="date"></td>
				<td class="img"><img src=""></td>
				<td class="detail"></td>
				<td class="high_temp"></td>
				<td class="low_temp"></td>
			</tr>
	</table>
</div>

<div class="col-md-12" style="text-align:right;">
<hr/>
<a href="https://www.yahoo.com/?ilc=401" target="_blank"> <img src="https://poweredby.yahoo.com/white.png" width="134" height="29"/> </a></body>
</div>
</body>

</html>