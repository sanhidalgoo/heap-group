@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
