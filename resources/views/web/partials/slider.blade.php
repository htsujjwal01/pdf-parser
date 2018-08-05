<div class="row row-fluid">
	<div class="nocontainer">
		<div class="col-sm-12">
			<div class="noo-countdown">
				<ul class="full-background">
				@if(isset($slider->image))
					@foreach($slider->image as $image)
						<li style="background-image: url('{{ getFullImageUrl($image) }}' )"></li>
					@endforeach
				@else
					<li style="background-image: url('{{ asset('images/blog14.jpg') }}' )"></li>
					<li style="background-image: url('{{ asset('images/blog17.jpg') }}' )"></li>
					<li style="background-image: url('{{ asset('images/blog10.jpg') }}' )"></li>

				@endif
				</ul>

				<div class="overlay_parallax"></div>
				
				<div class="noo-countdown-content">
					<div class="container">
						<h2>{{ $slider->title or "NO slider is set"}}</h2>
						<p>{{ $slider->tagline1 or "No tageline1 is set" }}<br>
						{{ $slider->tagline2 or "No tageline2 is set"}}</p>
						@if(! is_null($slider->date) )
		 					<div id="defaultCountdown" data-countdown="{{ isset($slider->date) ? $slider->date->format('Y/m/d h:m:s') : null }}"></div>
						@endif
						<div class="noo-countdown-footer">
							<a href="{{ $slider->url or '#'}}" data-text="discover now"><span>discover now</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@section('js')
	
	<script type="text/javascript">
			

		
	</script>

@append
