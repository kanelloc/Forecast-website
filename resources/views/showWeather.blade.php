@extends('layouts.default')

@section('content')
	<div class="hero" data-bg-image="public/img/banner.png">
				<div class="container">
				</div>
			</div>
	<div class="forecast-table">
				<div class="newcontainer">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">Today</div>
								<div class="date">{{$convertedTime}}</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location">{{$name}}</div>
								<div class="degree">
									<div class="num">{{$temperature_celsius}}<sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="{{ URL::to('/') }}/img/icons/{{$obj->currently->icon}}.svg" alt="" width=90>
									</div>	
								</div>
								<span><img src="{{ URL::to('/') }}/img/icons/icon-umberella.png" alt="">{{$rain_prob}}%</span>
								<span><img src="{{ URL::to('/') }}/img/icons/icon-wind.png" alt="">{{$wind_speed}}</span>
								
							</div>
						</div>
						@foreach($weeklyArray as $week)
							<div class="forecast">
								<div class="forecast-header">
									<div class="day">{{date("D", $week['time'])}}</div>
								</div> <!-- .forecast-header -->
								<div class="forecast-content">
									<div class="forecast-icon">
										<img src="{{ URL::to('/') }}/img/icons/{{$week['icon']}}.svg" alt="" width=48>
									</div>
									<div class="degree">{{number_format((($week['temperatureMax']-32)/1.7000), 1)}}<sup>o</sup>C</div>
									<small>{{number_format((($week['temperatureMin']-32)/1.7000), 1)}}<sup>o</sup></small>
								</div>
							</div>	
						@endforeach
					</div>
				</div>
			</div>
	
@stop