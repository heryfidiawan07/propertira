@extends('layouts.user.app')

@section('content')
<div class="main-content">
	<section class="section">
		<div class="section-body mt-0">

			<div class="row">
				<div class="col-md-8">
					
					<h2 class="section-title">{{$blog->title}}</h2>
					{{-- <p class="section-lead">This page is just an example for you to create your own page.</p> --}}

					<div class="card p-3">
						<img src="{{ asset('storage/blog/img/'.$blog->image) }}" class="w-100">
						<hr>
						{!! $blog->content !!}
						<hr>
						<div class="d-inline-block">
						{!! str_replace(',', '</span><span class="bg-primary text-white px-2 py-1 w-25 mr-1">#', '<span class="bg-primary text-white px-2 py-1 w-25 mr-1">#'.$blog->tags.'</span>') !!}<br>
						</div>
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
