@extends('layouts.admin.app')

@section('content')
<section class="section">

    <div class="section-body">
        <div class="row">
            <div class="col">
                <h2 class="section-title">All {{ucfirst(Request::segment(2))}}</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
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
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Created</td>
                                <td>Show</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@include('admin.message.modal.show')
@endsection

@push('js')
<script>
const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{route('messages.index')}}",
    columns: [
        {
            data: 'DT_RowIndex', name: 'id'
        },
        {
            data: 'name', name: 'name'
        },
        {
            data: 'phone', name: 'phone'
        },
        {
            data: 'email', name: 'email'
        },
        {
            data: 'created_at', name: 'created_at'
        },
        {
            data: 'show', name: 'show'
        },
        {
            data: 'delete', name: 'delete'
        }
    ],
    columnDefs: [
        {
            'targets': [5,6],
            'orderable': false,
        },
        {
            "targets": [5,6],
            "className": "text-center",
        }
    ],
    // order: [[ 2, "desc" ]],
});

$(document).on('click', '.show', function(e) {
    e.preventDefault();
    $('#message-show').modal('show');
    $.getJSON($(this).attr('href'), function(data) {
        // console.log(data);
        $('.message-title').text(data.subject);
        $('.message-body').html(
            '<p><i>From: </i>'+data.name+'<p>'+
            '<p><i>Email: </i>'+data.email+'<p>'+
            '<p><i>Phone: </i>'+data.phone+'<p>'+
            '<p>'+data.created_at+'<p>'+
            '<p>'+data.message+'</p>'
        );
    });
});
</script>
@endpush