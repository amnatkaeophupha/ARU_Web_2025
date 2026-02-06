@extends('admin/roker_layout/dashboard_layout')

@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <style>
                .profile-card {
                    border: 1px solid #e6e9ef;
                    border-radius: 14px;
                    box-shadow: 0 10px 24px rgba(0,0,0,.06);
                }
                .profile-title {
                    font-weight: 600;
                    color: #1f2d3d;
                }
                .profile-muted {
                    color: #6b7280;
                }
                .swal-chakra {
                    font-family: 'Chakra Petch', sans-serif;
                }
            </style>
            <div class="main-body">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="card profile-card">
                            <div class="card-body text-center" style="font-family:'Chakra Petch', sans-serif;">
                                <div class="d-flex flex-column align-items-center">
                                    @if(Auth::user()->avatar <> null)
                                    <img src="{{ asset('webaru_bs5/avatars/' . Auth::user()->avatar) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @else
                                    <img src="{{ asset('webaru_bs5/avatars/avatar-0.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    @endif
                                    <div class="mt-3">
                                        <h4 class="profile-title mb-1">{{ Auth::user()->name; }}</h4>
                                        <div class="profile-muted mb-1">
                                            {{ Auth::user()->getRoleNames()->map(fn($r) => config('roles.'.$r, $r))->implode(', ') ?: '-' }}
                                        </div>
                                        <div class="profile-muted small">{{ Auth::user()->email; }}</div>
                                    </div>
                                    @error('avatars')
                                    @php($avatarError = $message)
                                    @enderror
                                    @if(session('success'))
                                    @php($avatarSuccess = session('success'))
                                    @endif
                                    <form action="{{ url('admin/profile_images') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-3">
                                        <input class="form-control" name="avatars" type="file" id="formFile">
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button type="submit" class="btn btn-primary">Change Avatar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card profile-card">
                            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                            <form action="{{url('admin/profile_update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if(session('data_success'))
                                @php($profileSuccess = session('data_success'))
                                @endif
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name; }}" />
                                        @error('name')
                                        <div class="text-danger rounded pt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email; }}" />
                                        @error('email')
                                        <div class="text-danger rounded pt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Role</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select" name="role_name" id="inputSelectCountry" aria-label="Default select example">
                                            <option value="">Select Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ Auth::user()->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ config('roles.'.$role->name, $role->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_name')
                                        <div class="text-danger rounded pt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="mobile" class="form-control" value="{{Auth::user()->mobile}}" />
                                        @error('mobile')
                                        <div class="text-danger rounded pt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Agency</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Phranakhon Si Ayutthaya Rajabhat University" readonly />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-lg-12">
                        <div class="card profile-card">
                            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                                <h5 class="card-title">Two-Factor Authentication (2FA)</h5>
                                <p class="profile-muted mb-3">เพิ่มความปลอดภัยด้วยการยืนยันตัวตนด้วยรหัสจากแอป</p>

                                @if(session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                @if(Auth::user()->two_factor_secret)
                                    @if(!Auth::user()->two_factor_confirmed_at)
                                        <div class="alert alert-warning">
                                            2FA ถูกเปิดแล้ว แต่ยังไม่ได้ยืนยันรหัส
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-outline-primary" id="btn-show-qr">
                                                แสดง QR Code
                                            </button>
                                            <div id="twofa-qr" class="mt-3"></div>
                                        </div>
                                        <form method="POST" action="{{ url('user/confirmed-two-factor-authentication') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="twofa-code" class="form-label">รหัสยืนยัน (6 หลัก)</label>
                                                <input id="twofa-code" type="text" name="code" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">ยืนยัน 2FA</button>
                                        </form>
                                    @else
                                        <div class="mb-3">
                                            <span class="badge bg-success">เปิดใช้งานแล้ว</span>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-outline-primary" id="btn-show-qr">
                                                แสดง QR Code
                                            </button>
                                            <div id="twofa-qr" class="mt-3"></div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-outline-secondary" id="btn-show-recovery">
                                                แสดง Recovery Codes
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary ms-2" id="btn-regenerate-recovery">
                                                สร้างใหม่
                                            </button>
                                            <div class="small profile-muted mt-2">
                                                Recovery Codes คือรหัสสำรองใช้แทนรหัส 2FA เมื่อเข้าแอปไม่ได้ และแต่ละรหัสใช้ได้ครั้งเดียว
                                            </div>
                                            <pre id="twofa-recovery" class="mt-2 small bg-light p-2 rounded"></pre>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ปิด 2FA</button>
                                    </form>
                                @else
                                    <p class="profile-muted">ยังไม่ได้เปิดใช้งาน 2FA</p>
                                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">เปิด 2FA</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-lg-12">
                        <div class="card profile-card border-danger">
                            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                                <div>
									<h5 class="card-title">Delete your Account</h5>
								</div>
								<p class="card-text">{{ Auth::user()->name; }} </p>
                                <a href="{{ url('admin/destroy') }}" class="btn btn-danger">Delete your entire account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qrBtn = document.getElementById('btn-show-qr');
        const qrContainer = document.getElementById('twofa-qr');
        const recoveryBtn = document.getElementById('btn-show-recovery');
        const regenBtn = document.getElementById('btn-regenerate-recovery');
        const recoveryContainer = document.getElementById('twofa-recovery');

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

        if (recoveryBtn && recoveryContainer) {
            recoveryBtn.addEventListener('click', async function () {
                try {
                    const data = await fetchJson("{{ url('user/two-factor-recovery-codes') }}");
                    recoveryContainer.textContent = (data || []).join("\n");
                } catch (e) {
                    recoveryContainer.textContent = 'โหลด Recovery Codes ไม่สำเร็จ (กรุณายืนยันรหัสผ่าน)';
                }
            });
        }

        if (regenBtn && recoveryContainer) {
            regenBtn.addEventListener('click', async function () {
                try {
                    const data = await fetchJson("{{ url('user/two-factor-recovery-codes') }}", {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });
                    if (data) {
                        recoveryContainer.textContent = (data || []).join("\n");
                    }
                } catch (e) {
                    recoveryContainer.textContent = 'สร้าง Recovery Codes ไม่สำเร็จ (กรุณายืนยันรหัสผ่าน)';
                }
            });
        }

        @if(!empty($avatarError))
            Swal.fire({
                icon: 'error',
                title: 'อัปโหลดไม่สำเร็จ',
                text: @json($avatarError),
                customClass: { popup: 'swal-chakra' }
            });
        @endif
        @if(!empty($avatarSuccess))
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: @json($avatarSuccess),
                customClass: { popup: 'swal-chakra' }
            });
        @endif
        @if(!empty($profileSuccess))
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: @json($profileSuccess),
                customClass: { popup: 'swal-chakra' }
            });
        @endif
    });
</script>
