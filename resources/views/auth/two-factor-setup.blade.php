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
    <title>ARU - Two Factor Setup</title>
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
                                    <h5>ตั้งค่า Two-Factor Authentication</h5>
                                    <p class="mb-0">สแกน QR Code แล้วกรอกรหัส 6 หลักเพื่อยืนยัน</p>
                                </div>

                                @if($errors->any())
                                    <div class="alert alert-danger border-0">
                                        <div class="text-danger">{{ $errors->first() }}</div>
                                    </div>
                                @endif

                                <div class="mb-3 text-center">
                                    <button type="button" class="btn btn-outline-primary" id="btn-show-qr">
                                        แสดง QR Code
                                    </button>
                                    <div id="twofa-qr" class="mt-3 d-flex justify-content-center"></div>
                                </div>

                                <form class="row g-3" method="POST" action="{{ url('user/confirmed-two-factor-authentication') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Authentication Code</label>
                                        <input type="text" name="code" class="form-control" inputmode="numeric" autocomplete="one-time-code" placeholder="123456" required>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button type="submit" class="btn btn-primary">ยืนยัน 2FA</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qrBtn = document.getElementById('btn-show-qr');
        const qrContainer = document.getElementById('twofa-qr');
        async function fetchJson(url, options = {}) {
            const res = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin',
                ...options
            });
            if (res.redirected) {
                window.location = res.url;
                return null;
            }
            if (res.status === 401 || res.status === 403 || res.status === 409 || res.status === 423) {
                window.location = "{{ url('user/confirm-password') }}";
                return null;
            }
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        }

        if (qrBtn && qrContainer) {
            qrBtn.addEventListener('click', async function () {
                try {
                    const data = await fetchJson("{{ url('user/two-factor-qr-code') }}");
                    qrContainer.innerHTML = data.svg || '';
                } catch (e) {
                    qrContainer.innerHTML = '<div class="text-danger">โหลด QR Code ไม่สำเร็จ (กรุณายืนยันรหัสผ่าน)</div>';
                }
            });
        }

    });
</script>
</body>
</html>
