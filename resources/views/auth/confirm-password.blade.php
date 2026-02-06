@extends('admin/roker_layout/dashboard_layout')

@section('title', 'Confirm Password')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card profile-card">
                        <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                            <h5 class="card-title mb-2">ยืนยันรหัสผ่าน</h5>
                            <p class="profile-muted mb-4">
                                โปรดยืนยันรหัสผ่านอีกครั้งเพื่อดำเนินการต่อ
                            </p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ url('user/confirm-password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                    <input id="password" type="password" name="password" class="form-control" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
