@extends('layouts.user.app')

@section('content')
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    @for ($i = 0; $i < 5; $i++)
                        @include('partials.property-index')
                    @endfor
                </div>
                <div class="col-md-4">
                    @include('partials.search-sidebar')

                    <hr>

                    @include('partials.option-sidebar')
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
