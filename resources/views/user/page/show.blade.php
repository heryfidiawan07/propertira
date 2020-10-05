@extends('layouts.user.app')

@push('css')
<style>
.frame-profil {
	height: 150px;
	/* max-height: 600px; */
	width: 100%;
	background-color: hsla(200,40%,30%,.4);
	background-image:		
		url('https://78.media.tumblr.com/cae86e76225a25b17332dfc9cf8b1121/tumblr_p7n8kqHMuD1uy4lhuo1_540.png'), 
		url('https://78.media.tumblr.com/8cd0a12b7d9d5ba2c7d26f42c25de99f/tumblr_p7n8kqHMuD1uy4lhuo2_1280.png'),
		url('https://78.media.tumblr.com/5ecb41b654f4e8878f59445b948ede50/tumblr_p7n8on19cV1uy4lhuo1_1280.png'),
		url('https://78.media.tumblr.com/28bd9a2522fbf8981d680317ccbf4282/tumblr_p7n8kqHMuD1uy4lhuo3_1280.png');
	background-repeat: repeat-x;
	background-position: 
		0 20%,
		0 100%,
		0 50%,
		0 100%,
		0 0;
	background-size: 
		2500px,
		800px,
		500px 200px,
		1000px,
		400px 260px;
	animation: 50s para infinite linear;
}

@keyframes para {
100% {
	background-position: 
		-5000px 20%,
		-800px 95%,
		500px 50%,
		1000px 100%,
		400px 0;
	}
}
</style>
@endpush

@section('content')
<div class="main-content">
	<section class="section">
		<div class="section-body">

			<div class="row">
				<div class="col-md-8">
					
					<div class="frame-profil"></div>

					<h2 class="section-title">{{$page->title}}</h2>
					{{-- <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
					
					<div class="card p-3">
						{!! $page->content !!}
					</div>
				</div>
				<div class="col-md-4">
					@include('partials.search-sidebar')
                    <hr>
                    @include('partials.option-sidebar')
					@include('partials.blog-sidebar')
				</div>
			</div>

		</div>
	</section>
</div>
@endsection
