@extends('layouts.user.app')

@section('content')
<div class="main-content">
	<section class="section">
		<div class="section-body mt-0">

			<div class="row">
				<div class="col-md-8">
					<h2 class="section-title">This is Example Blog</h2>
					{{-- <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
					<div class="card p-3">
						<img src="https://static-id.lamudi.com/static/media/bm9uZS9ub25l/2x2x2x380x244/f36d6ef7fec519.jpg" class="w-100" height="100">
						@for($i=0; $i<15; $i++)
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							<br>
							<br>
						@endfor
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
