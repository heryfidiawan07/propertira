@extends('layouts.admin.app')

@section('content')
<section class="section">
    
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>CREATE PRODUCT</h5>
                        <form>
                            <div class="form-group">
                                <label>TItle</label>
                                <input type="text" name="title" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <input type="text" name="title" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" style="min-height: 300px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Promo</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Area</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Category</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" value="Save">
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
