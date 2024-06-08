@extends('Site.account.layoutProfile')

@section('title', 'Thông tin người dùng')
@section('profile')
    <div class="card" style="height: 100%;">
        <div class="card-header bg-dark text-white">
            Thông Tin Cá Nhân
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="d-flex flex-column-reverse justify-content-center align-items-center">
                        <label for="avatar" class="btn btn-primary" id="avatar-label" style="width: 150px;">Chọn ảnh</label>
                        <input type="file" class="form-control-file mb-3" id="avatar" accept="image/*"
                            style="display: none;">
                        <img src="{{ asset('images/users/128x128.png') }}" class="img-fluid mb-3" alt="Avatar"
                            id="avatar-preview" width="128" height="128">
                    </div>
                </div>
                <div class="col-md-12">
                    <form>
                        <div class="form-group">
                            <label for="name">Họ và Tên:</label>
                            <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại:</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ:</label>
                            <textarea class="form-control" id="address" rows="3" placeholder="Nhập địa chỉ"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('avatar').addEventListener('change', function() {
            var input = this;
            var preview = document.getElementById('avatar-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
