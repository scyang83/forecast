$(document).ready(function() {
	var json = [  {city: 'Vancouver', region: 'BC', country : 'Canada'},  
				  {city: 'Honolulu', region: 'HI', country: 'United States'},   
				  {city: 'San Diego', region: 'CA', country : 'United States' },   
				  {city: 'Havana', region: 'CH', country: 'Cuba'} ] ;
	
	 //Ajax requesting weather information of cities
	 $.post("controllers/weather_helper.php", {'post':json}, function(data){
			console.log(data);
			if(data){
				var formattedJson = $.parseJSON(data);
				console.log(formattedJson);
				
				//clone table from template
				var table = ($('table.weather_template').clone().removeClass('weather_template').attr('id', 'weather').show())[0];
				var rows = document.createDocumentFragment();
				
				//Generate Table content
				for(var i in formattedJson){
					var row = $('table.weather_template tr.template').clone().removeClass('template').addClass('worksheet').show();
					
					row.find('td.city').html('<a href="view.php?location='+i+'">'+i+'</a>');
					row.find('td.img img').attr('src','http://l.yimg.com/a/i/us/we/52/'+formattedJson[i]['code']+'.gif');
					row.find('td.detail').html(formattedJson[i]['text']);
					row.find('td.high_temp').html(formattedJson[i]['high']);
					row.find('td.low_temp').html(formattedJson[i]['low']);
					
					rows.appendChild(row[0]);
				}
			
				
				
				table.appendChild(rows);
				$('#content').html(table);
			}else{
				$('#content').html('No information searched.');
				
			}
			
	 });
});