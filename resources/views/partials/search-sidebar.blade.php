<form method="GET" action="{{route('property.search')}}">
    <input type="text" name="minimum" class="form-control form-control-sm mt-2 rupiah" placeholder="Harga Minimum" value="@if(!empty($request)){{$request['minimum']}}@endif">
    <input type="text" name="maximum" class="form-control form-control-sm mt-2 rupiah" placeholder="Harga Maximum" value="@if(!empty($request)){{$request['maximum']}}@endif">
    <button type="submit" class="btn btn-primary btn-sm w-100 mt-2">Cari...</button>
</form>