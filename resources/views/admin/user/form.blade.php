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
                        <h5>@if($edit) EDIT @else CREATE @endif  USER</h5>
                        <form method="POST" action="@if($edit){{route('user.update', ['user' => $user->username])}}@else{{route('user.store')}}@endif" enctype="multipart/form-data">
                            @if($edit) @method('PUT') @endif
                            @csrf

                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="name" class="form-control form-control-sm" value="@if($edit){{$user->name}}@else{{old('name')}}@endif">
                            </div>
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="username" class="form-control form-control-sm" value="@if($edit){{$user->username}}@else{{old('username')}}@endif">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="email" name="email" class="form-control form-control-sm" value="@if($edit){{$user->email}}@else{{old('email')}}@endif">
                            </div>
                            @if(! $edit)
                                <div class="form-group">
                                    <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="password" name="password" class="form-control form-control-sm" value="">
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="d-block">Status</label>
                                <select name="status" class="form-control form-control-sm">
                                    @if($edit)
                                        @if($user->status == 'inactive')
                                            <option value="inactive">Inactive</option>
                                        @endif
                                    @endif
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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