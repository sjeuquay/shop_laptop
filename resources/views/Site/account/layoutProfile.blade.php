@extends('Site.layout')

@section('title', 'Thông tin người dùng')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-3">
            @include('Site.account.sidebarProfile')
        </div>
        <div class="col-9">
           @yield('profile')
        </div>
    </div>
</div>
@endsection
