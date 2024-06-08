@extends('Site.account.layoutProfile')

@section('title', 'Đổi mật khẩu')
@section('profile')
    <div class="card" style="height: 100%;">
        <div class="card-header bg-dark text-white">
            Đổi Mật Khẩu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="form-group">
                            <label for="current-password">Mật Khẩu Hiện Tại:</label>
                            <input type="password" class="form-control" id="current-password"
                                placeholder="Nhập mật khẩu hiện tại">
                        </div>
                        <div class="form-group">
                            <label for="new-password">Mật Khẩu Mới:</label>
                            <input type="password" class="form-control" id="new-password" placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Xác Nhận Mật Khẩu Mới:</label>
                            <input type="password" class="form-control" id="confirm-password"
                                placeholder="Xác nhận mật khẩu mới">
                        </div>
                        <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
