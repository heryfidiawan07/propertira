@extends('layouts.admin.app')

@push('css')
{{-- <link rel="stylesheet" href="{{ asset('dropify/dist/css/dropify.min.css') }}"> --}}
@endpush

@section('content')
<section class="section">
    
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>@if($edit) EDIT @else CREATE @endif  ROLE</h5>
                        <form method="POST" action="@if($edit){{route('role.update', ['role' => $role->id])}}@else{{route('role.store')}}@endif" enctype="multipart/form-data">
                            @if($edit) @method('PUT') @endif
                            @csrf

                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="name" class="form-control form-control-sm" value="@if($edit){{$role->name}}@else{{old('name')}}@endif">
                            </div>
                            <div class="form-group">
                                <label>Permission <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</section>
@endsection

@push('js')
{{-- <script src="{{ asset('dropify/dist/js/dropify.min.js') }}"></script> --}}
@endpush