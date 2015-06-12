@extends('app')
@section('content')
	<h1>Repos</h1>
	<div class="row">
		
	<pre>
		{{-- {{var_dump($repos[0])}} --}}
	</pre>
	@foreach($repos as $repo)
	<div class="col-sm-6 col-md-4">
	<!-- normal -->
	    <div class="ih-item square effect4 repo" ><a href="{{$repo['html_url']}}">
	        <div class="img repo_image"><img src="{{$repo['owner']['avatar_url']}}" alt="img"></div>
	        <div class="mask1"></div>
	        <div class="mask2"></div>
	        <div class="info">
	          <h3>{{$repo['full_name']}}</h3>
	          <div class="repo_details">
	          	@if(strlen($repo['description']) > 600)
	          	<div>{{substr($repo['description'],0,600)}}...</div>
	          	@else
	          	<div>{{$repo['description']}}</div>
	          	@endif
	          	<div class="col-xs-6">
	          		<i class="fa fa-code-fork"></i>
	          		<div class="fork_count">{{number_format($repo['forks_count'],0)}}</div>
	          	</div>
	          	<div class="col-xs-6">
	          		<i class="fa fa-star-o"></i>
	          		<div class="star_count">{{number_format($repo['watchers'],0)}}</div>
	          	</div>
	          </div>
	        </div></a></div>
	    <!-- end normal -->
	</div>
	@endforeach
	</div>
@stop