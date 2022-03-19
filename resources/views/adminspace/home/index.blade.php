@extends('adminspace.layouts.app')
@section('content')
<div class="row card-grid">
    <div class="d-flex flex-column align-items-center col-md-4 col-lg-3 m-2 p-2 border">
        <p class="h2 mb-4">Beers</p>
        <a class="col-md-6 btn bg-primary text-white mb-2" href="">Add a beer</a>
        <a class="col-md-6 btn bg-primary text-white mb-2" href="">List all beers</a>
    </div>
    <div class="d-flex flex-column align-items-center col-md-4 col-lg-3 m-2 p-2 border">
        <p class="h2 mb-4">Users</p>
        <a class="col-md-6 btn bg-primary text-white mb-2" href="{{ route('admin.users.create') }}">Add a user</a>
        <a class="col-md-6 btn bg-primary text-white mb-2" href="{{ route('admin.users.index') }}">List all users</a>
    </div>
</div>
@endsection
