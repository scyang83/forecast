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
	
	<!-- Latest compiled JavaScript -->
	<script src="dist/js/bootstrap.min.js"></script>
	
	<script src="dist/js/weather.js"></script>
	
</head>

<body>
<div class="col-md-12">
<h2>Yahoo! Weather Forecast</h2>
<h3><?=date('F j, Y, g:i a');?>
<hr/>
</div>

<div class="col-md-12" id="content">
</div>
<div id="template" style="display:none;">
	<table class="weather_template table" style="display:none;">
			<tr class="headerRow">
				<th>City</th>
				<th></th>
				<th>Detail</th>
				<th>High</th>
				<th>Low</th>
			</tr>
			<tr class="template worksheet-row" style="display:none; white-space:nowrap;">
				<td class="city"></td>
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
</html>