<section id="banner" class="container-fluid">
	<div class="bannerslick">
		@foreach ($camera->cities as $city)
		 @foreach($city->getMedia('cities')->take(4) as $image)
			<div class="banner-item skew" data-city="{{$city->name}}" data-description="{!!$city->description!!}" data-url="{{url('/')}}/{{lang()}}/{{$camera->slug}}/{{$city->slug}}">
				<div class="resetSkew fullheightmax">
					<a href="{{url('/')}}/{{lang()}}/{{$camera->slug}}/{{$city->slug}}">
						<img class="img-slide fullheightmax" src="{{ url('/') }}/media/{{$image->id}}/conversions/large.jpg" alt="">
					</a>
				</div>
			</div>
         @endforeach
		@endforeach
	</div>
	<div class="city-content skew slidewidth">
		<div class="headline resetSkew">
			<h1 id="city-title" class="anim">{{$camera->cached_city()->name}}</h1>
			<div id="city-description" class="city-desc anim">
				<p>@lang('content.descity')</p>
			</div>
			<a id="city-url" href="{{url('/')}}/{{lang()}}/{{$camera->slug}}/{{$camera->cached_city()->slug}}" class="btn btn-red anim">@lang('content.explore')</a>
		</div>
	</div>
	<div class="next-city skew slidewidth">
		<a href="#" class="nexslide"></a>
		<div class="navslide resetSkew">
			<div class="navigator">
				{{-- @foreach ($camera->cities as $city)
					@if ($loop->first)
						<a id="data-slide-0" href="#" class="current" data-go="0">{{$city->name}}</a>/
					@else
						<a id="data-slide-1" href="#" data-go="1">{{$city->name}}</a>
					@endif
		        @endforeach --}}
			</div>
		</div>
	</div>
</section>