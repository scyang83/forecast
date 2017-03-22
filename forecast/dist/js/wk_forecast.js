$(document).ready(function() {
	console.log($location);
	$('body').css({'background-image': 'url("dist/img/'+$location+'.jpg")'});
	
	//Ajax requesting weather information of cities
	 $.post("controllers/Weather_helper.php", {'post':$location}, function(data){
				
			var formattedJson = $.parseJSON(data);
			console.log(formattedJson);

			var table = ($('table.weather_template').clone().removeClass('weather_template').attr('id', 'weather').show())[0];
			var rows = document.createDocumentFragment();
			
			var current = formattedJson[0]['item']['pubDate'];
			
			$('#current').html(current);
			
			for(var i in formattedJson){
				var row = $('table.weather_template tr.template').clone().removeClass('template').addClass('worksheet').show();
				
				row.find('td.date').html(formattedJson[i]['item']['forecast']['date']);
				row.find('td.img img').attr('src','http://l.yimg.com/a/i/us/we/52/'+formattedJson[i]['item']['forecast']['code']+'.gif');
				row.find('td.detail').html(formattedJson[i]['item']['forecast']['text']);
				row.find('td.high_temp').html(formattedJson[i]['item']['forecast']['high']);
				row.find('td.low_temp').html(formattedJson[i]['item']['forecast']['low']);
				
				rows.appendChild(row[0]);
			}
		
			
			
			table.appendChild(rows);
			$('#content').html(table);
	
	 });
	
});