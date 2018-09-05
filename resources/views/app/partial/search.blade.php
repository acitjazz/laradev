<div id="searchbox" class="collapse">
	<div class="search-header headerBox">
		<div class="container flexcenter">
			<a href="{{url('/')}}" class="logo">
				<img src="{{url('/')}}/images/logo.png" alt="Kratingdaeng">
			</a>
		  <a href="#searchbox" class="closeSearch" data-toggle="collapse" aria-expanded="false" aria-controls="searchbox"><i class="ion-close"></i></a>
		</div>
	</div>
	<div class="w700" id="popularTag">	
			  {!! Form::open(['method'=>'GET','url'=>'search/','class'=>'searchform','role'=>'search'])  !!}
			      <input type="text" name="search" value="" class="input-search" placeholder="Type to search...">
			      <button type="submit" class="btn-search" name="submit"><i class="ion-search"></i></button>
			  {!! Form::close() !!}
			<h2>Popular Tag</h2>
			<div class="popularTag">
				@foreach (getPopularTag(5) as $tag)
					<a href="{{url('/tag')}}/{{$tag->slug}}"><span class="red">#</span>{{$tag->name}}</a>
				@endforeach
			</div>
	</div>
</div> {{-- searchbox --}}