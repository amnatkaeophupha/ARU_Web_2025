<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{url('rocker')}}/aru_images/favicon-32x32.png" type="image/png" />
    <link href="{{url('rocker')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('rocker')}}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="{{url('rocker')}}/css/aru_sign_app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>ARU - Two Factor Challenge</title>
</head>
<body>
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="p-4" style="font-family:'Chakra Petch', sans-serif;">
                                <div class="mb-3 text-center">
                                    <img src="{{url('rocker')}}/aru_images/logo-icon.png" width="100" />
                                </div>

                                <div class="text-center mb-3">
                                    <h5>ยืนยันตัวตน 2 ขั้นตอน</h5>
                                    <p class="mb-0">กรอกรหัส 6 หลักจากแอป Authenticator</p>
                                </div>

                                @if($errors->any())
                                    <div class="alert alert-danger border-0">
                                        <div class="text-danger">{{ $errors->first() }}</div>
                                    </div>
                                @endif

                                <form class="row g-3" method="POST" action="{{ url('/two-factor-challenge') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Authentication Code</label>
                                        <input type="text" name="code" class="form-control" inputmode="numeric" autocomplete="one-time-code" placeholder="123456">
                                    </div>

                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                    </div>
                                </form>

                                <div class="text-center mt-3">
                                    <small class="text-muted">ถ้าเข้าแอป Authenticator ไม่ได้ ให้ใช้ Recovery Code จากหน้าโปรไฟล์</small>
                                </div>

                                <form class="row g-3 mt-2" method="POST" action="{{ url('/two-factor-challenge') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Recovery Code</label>
                                        <input type="text" name="recovery_code" class="form-control" placeholder="ตัวอย่าง: BIaNcsmVSU-SlI0lnlnpy">
                                        <small class="text-muted">กรอก 1 โค้ดจากรายการ Recovery Codes (ใช้ได้ครั้งเดียว)</small>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn-outline-secondary">ยืนยันด้วย Recovery Code</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
</div>

<script src="{{url('rocker')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>
