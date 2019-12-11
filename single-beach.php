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
				hourlyForcastURL = data['properties']['foecastHourly'];
			},
			error : function(request,error)
			{
				console.log("Request: "+JSON.stringify(request));
			}
		});
		console.log(hourlyForcastURL);



	});
</script>

<div id="hourly-forecast-cont">
	<div id="hourly-forecast-inner">
		<div class="hourly-forecast-block hb-1">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-2">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-3">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-4">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-5">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-6">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-7">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
		<div class="hourly-forecast-block hb-8">
			<img src="http://placehold.it/50x50">
			<h3>75 &#8457</h3>
		</div>
	</div>
</div>

<?php  get_footer(); ?>