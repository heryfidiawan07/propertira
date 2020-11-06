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
                                @foreach($menus as $menu)
                                    <div class="bg-light mb-2 p-2">
                                        <div class="form-check d-block">
                                            <input name="menus[]" class="form-check-input menus" type="checkbox" id="{{$menu->name}}" value="{{$menu->id}}">
                                            <label class="form-check-label font-weight-bold text-capitalize text-dark" for="{{$menu->name}}">{{$menu->name}}</label>
                                        </div>
                                        @error('menus')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-check form-check-inline">
                                            <input name="{{$menu->id}}[]" class="form-check-input actions create {{$menu->name}}" data-menu="{{$menu->name}}" type="checkbox" id="create_{{$menu->name}}" value="create">
                                            <label class="form-check-label text-primary" for="create_{{$menu->name}}">create</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="{{$menu->id}}[]" class="form-check-input actions read {{$menu->name}}" data-menu="{{$menu->name}}" type="checkbox" id="read_{{$menu->name}}" value="read">
                                            <label class="form-check-label text-info" for="read_{{$menu->name}}">read</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="{{$menu->id}}[]" class="form-check-input actions update {{$menu->name}}" data-menu="{{$menu->name}}" type="checkbox" id="update_{{$menu->name}}" value="update">
                                            <label class="form-check-label text-warning" for="update_{{$menu->name}}">update</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input name="{{$menu->id}}[]" class="form-check-input actions delete {{$menu->name}}" data-menu="{{$menu->name}}" type="checkbox" id="delete_{{$menu->name}}" value="delete">
                                            <label class="form-check-label text-danger" for="delete_{{$menu->name}}">delete</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm px-3" value="Save">
                            </div>
                        </form>
                        {{-- End Form --}}
                        {{-- <?php var_dump($role->permissions()); ?> --}}
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
<script>
$('.actions').prop('disabled',true);

$(document).on('click', '.menus', function() {
    let name = $(this).attr('id');
    if ($(this).is(':checked')) {
        $('.'+name).prop({'disabled':false, 'checked':true});
    }else {
        $('.'+name).prop({'disabled':true, 'checked':false});
    }
});

$(document).on('click', '.actions', function() {
    let name = $(this).attr('data-menu');
    if ($('.'+name+':checkbox:checked').length == 0) {
        $('#'+name).prop('checked',false);
        $('.'+name).prop('disabled',true);
    }
});
</script>
@endpush