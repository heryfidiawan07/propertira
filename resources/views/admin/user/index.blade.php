@extends('layouts.admin.app')

@section('content')
<section class="section">

    <div class="section-header pb-2 pt-3">
        <h5>USER MANAGEMENT</h5>
        <div class="section-header-breadcrumb">
            <button class="btn btn-primary btn-sm float-right mb-2" id="btn-create" data-toggle="modal" data-target="#modal-user">Create User</button>
        </div>
    </div>
    
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-12">
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">USERNAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>#</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#modal-user"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>#</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#modal-user"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-user" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Role</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Role 1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Role 2</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

});

$('#btn-create').click(function() {
    $('.modal-title').text('Create User');
});

$('.btn-edit').click(function() {
    $('.modal-title').text('Edit User');
});

$('.btn-delete').click(function() {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        }
    });
});
</script>
@endsection