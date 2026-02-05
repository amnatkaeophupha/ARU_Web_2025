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
