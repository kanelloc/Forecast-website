@extends('layouts.default')

@section('content')
	<h3>Welcome to Forecast.</h3>
	<hr>

	<form method="POST" action="{{route('forecast.postSearch')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		
		<div class="form-group{{$errors->has('searchMap') ? ' has-error' : ''}}">
			<label for="searchMap">Search for the Location:</label>
			<input type="text" id="searchMap" class="form-control" name="searchMap">
			<!--Show error message -->
			@if($errors->has('searchMap'))
				<span class="help-block">{{'The location is required.'}}</span>
			@endif
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group{{$errors->has('lat') ? ' has-error' : ''}}">
					<label for="lat">lattitude:</label>
					<input type="text" id="lat" class="form-control" name="lat" readonly>
					<!--Show error message -->
					@if($errors->has('lat'))
						<span class="help-block">{{$errors->first('lat')}}</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group{{$errors->has('lng') ? ' has-error' : ''}}">
					<label for="lng">longtitude:</label>
					<input type="text" id="lng" class="form-control" name="lng" readonly>
					<!--Show error message -->
					@if($errors->has('lat'))
						<span class="help-block">{{$errors->first('lng')}}</span>
					@endif
				</div>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-btn fa-floppy-o">
				Weather Search
				</i>
			</button>
		</div>	
	</form>

	<label for="map">Enter Station's Location Manualy:</label>
	<div id="map"></div>
	<script>
		var initMap = function(){
			var map = new google.maps.Map(document.querySelector('#map'), {
				center: { lat: 38.24, lng: 21.73},
				zoom: 10
			});

			var marker = new google.maps.Marker({
			position: { lat:38.24, lng: 21.73},
			map:map,
			draggable: true
			});

			var input = document.getElementById('searchMap');
			var autocomplete = new google.maps.places.Autocomplete(input);

			autocomplete.addListener('place_changed', function() {
				var place = autocomplete.getPlace();
				if (place.geometry.viewport){
					map.fitBounds(place.geometry.viewport);
				}
				else
				{
					map.setCenter(place.geometry.location);
      				map.setZoom(15);
				}
				//-----------------------------------------
				marker.setPosition(place.geometry.location);
				marker.setVisible(true);
			});

			marker.addListener('position_changed', function(){
				var lat = marker.getPosition().lat();
				var lng = marker.getPosition().lng();
				$('#lat').val(lat);
				$('#lng').val(lng);
			});

		};
	</script>

@stop