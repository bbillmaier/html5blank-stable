<?php  get_header(); 
	include 'api-keys/mskey.php';
	if($msKey != null){
		echo 'got the key';
	}


?>
<script>
	$( document ).ready(function() {
		//Get Surf info from magicseaweed
		$.ajax({
			dataType: "jsonp",
			url: "http://magicseaweed.com/api/<?php echo $msKey; ?>/forecast/?spot_id=350",
			success : function(data) {              
				console.log(data);
			},
			error : function(request,error)
			{
				console.log("Request: "+JSON.stringify(request));
			}
		});

		//Get Forecast from Weather Service
		var hourlyForcastURL = '';
		$.ajax({
			dataType: "json",
			url: "https://api.weather.gov/points/28.32,-80.6076",
			success : function(data) {              
				console.log(data);
				console.log(data['properties']['forecastHourly']);
				hourlyForcastURL = data['properties']['forecastHourly'];
				getHourlyForecast(hourlyForcastURL);
			},
			error : function(request,error)
			{
				console.log("Request: "+JSON.stringify(request));
			}
		});
		console.log(hourlyForcastURL);

		function getHourlyForecast(theUrl){
		$.ajax({
			dataType: "json",
			url: theUrl,
			success : function(data) {              
				console.log('THE Forecast');
				console.log(data);
				var forecastData = data;
				var periodsArray = data['properties']['periods'];
				var html = "";
				periodsArray.forEach(function(period){
					console.log(period);
					var number = period['number'];
					var startTime = period['startTime'];
					var temperature = period['temperature'];
					var shortForecast = period['shortForecast'];
					html += '<div class="hourly-forecast-block hb-'+number+'"><h2>'+ startTime +'</h2><img src="http://placehold.it/50x50"><h3>'+ temperature +' #8457</h3><h4>'+shortForecast+'</h4></div>';
				});
				$('#hourly-forecast-inner').html(html);
				console.log('------');
			},
			error : function(request,error)
			{
				console.log("Request: "+JSON.stringify(request));
			}
		});
		}

	});
</script>

<div id="hourly-forecast-cont">
	<div id="hourly-forecast-inner">
		
	</div>
</div>

<?php  get_footer(); ?>