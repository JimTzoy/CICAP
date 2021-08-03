@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
  		<div class="col-md-12">
  			<div class="card">
  				<div class="card-header" style="text-align: center;">
  					<h1>Video tutorial para utilizar fichas</h1>
  				</div>
  				<div class="card-body">
  					<video autobuffer autoloop loop controls style="width: 100%;">
		  				<source src="img/video1.mp4">
		  				<source src="img/video1.mp4">
		  				<object type="video/ogg" data="img/video1.mp4" width="320" height="240">
		  					<param name="src" value="img/video1.mp4">
		  					<param name="autoplay" value="true">
		  					<param name="autoStart" value="0">
		  					<p><a href="img/video1.mp4">Download this video file.</a></p>
		  				</object>
		  			</video>
  				</div>
  			</div>
  			
  		</div>
  	
 	</div>
</div>
@endsection 
