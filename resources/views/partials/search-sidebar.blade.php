
{{-- @if(!empty($request)){{$request['option']}}@endif  --}}

<form method="GET" action="{{route('product.search')}}">
    <input type="text" name="maximum" class="form-control form-control-sm mt-2" placeholder="Harga Maximum" value="@if(!empty($request)){{$request['maximum']}}@endif">
    <input type="text" name="minimum" class="form-control form-control-sm mt-2" placeholder="Harga Minimum" value="@if(!empty($request)){{$request['minimum']}}@endif">
    <select name="option" class="form-control form-control-sm mt-2">
        <option value="test">Tets</option>
        <option value="test">Tets</option>
    </select>
    <button type="submit" class="btn btn-primary btn-sm w-100 mt-2">Cari...</button>
</form>