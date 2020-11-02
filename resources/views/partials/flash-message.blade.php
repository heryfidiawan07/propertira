@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show row" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('visitor-message'))
    <div class="alert alert-success alert-dismissible fade show row" role="alert">
        {{ session('visitor-message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif