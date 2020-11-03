@extends('layouts.admin.app')

@section('content')
<section class="section">

    <div class="section-body">
        <div class="row">
            <div class="col">
                <h2 class="section-title">All {{ucfirst(Request::segment(2))}}</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
            </div>
            <div class="col">
                <a href="{{route('role.create')}}" class="btn btn-primary btn-sm float-right mt-5">Create Role</a>
            </div>
        </div>

        @include('partials.flash-message')

        <div class="row">
            <div class="card p-3 col-md-12">
                <div class="table-responsive scrollbar-custom">
                    <table class="table table-hover w-100" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <td>Name</td>
                                <td>Permission</td>
                                <td>Created</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('js')
<script>
const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('role.index')}}",
    columns: [
        {
            data: 'DT_RowIndex', name: 'id'
        },
        {
            data: 'name', name: 'name'
        },
        {
            data: 'permission', name: 'permission'
        },
        {
            data: 'created_at', name: 'created_at'
        },
        {
            data: 'edit', name: 'edit'
        },
        {
            data: 'delete', name: 'delete'
        }
    ],
    columnDefs: [
        {
            'targets': [2,4,5],
            'orderable': false,
        },
        {
            "targets": [2,4,5],
            "className": "text-center",
        }
    ],
    // order: [[ 2, "desc" ]],
});
</script>
@endpush