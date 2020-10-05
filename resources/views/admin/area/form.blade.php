@extends('layouts.admin.app')

@section('content')
<section class="section">
    
    <div class="section-body mt-3">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>@if($edit) EDIT @else CREATE @endif  AREA</h5>
                        <form method="POST" action="@if($edit){{route('area.update', ['area' => $area->slug])}}@else{{route('area.store')}}@endif">
                            @if($edit) @method('PUT') @endif
                            @csrf

                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="name" class="form-control form-control-sm" value="@if($edit){{$area->name}}@else{{old('name')}}@endif">
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
