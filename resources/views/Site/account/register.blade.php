@extends('Site.layout')

@section('title', 'login')
@section('content')

    <div class="container py-5" style="max-width: 500px">
        <h3 class="text-uppercase text-center">Tạo tài khoản</h3>
        <form action="" method="POST">
            @csrf
            <div class="d-flex flex-column my-2">
                <label for="">Họ và tên</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id=""
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column my-2">
                <label for="">Tài khoản</label>
                <input class="form-control @error('user_name') is-invalid @enderror" type="text" name="user_name"
                    id="" value="{{ old('user_name') }}">
                @error('user_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column my-2">
                <label for="">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                    id="" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column my-2">
                <label for="">Mật khẩu</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    id="" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center mt-4">
                <button class="text-center btn btn-outline-dark" type="submit">Tạo tài khoản</button>
            </div>
        </form>
    </div>
@endsection
