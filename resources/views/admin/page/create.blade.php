@extends('layouts.admin.app')

@section('content')
<section class="section">
    
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5>CREATE PAGE</h5>
                        <form>
                            <div class="form-group">
                                <label>Menu</label>
                                <select class="form-control form-control-sm">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>TItle</label>
                                <input type="text" name="title" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" style="min-height: 300px;"></textarea>
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
