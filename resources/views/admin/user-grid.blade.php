@extends('admin/roker_layout/users_layout')

@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Content</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Grid System</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddUserModal">AddUser</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('status'))
        <div class="alert alert-info border-0 bg-info alert-dismissible fade show">
            <div class="text-white">{{ session('status') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('email'))
        <div class="alert alert-info border-0 bg-info alert-dismissible fade show">
            <div class="text-white">{{ session('email') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white">{{ session('fail') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">ข้อมูลผู้ใช้งานระบบ</h5>
                </div>
                <style>
                    .user-table thead th {
                        background: #eef2f7;
                        font-weight: 600;
                        color: #334155;
                        white-space: nowrap;
                    }
                    .user-table tbody tr:hover {
                        background: #f3f6fb;
                    }
                    .user-table td,
                    .user-table th {
                        vertical-align: middle;
                    }
                    .user-name {
                        font-weight: 600;
                        color: #1f2d3d;
                    }
                    .user-email {
                        font-size: 12px;
                        color: #6b7280;
                    }
                </style>
                <div class="d-flex flex-wrap align-items-center gap-2 mb-2" style="font-family:'Chakra Petch', sans-serif;">
                    <button type="button" class="btn btn-outline-success btn-sm" id="bulkActivateBtn" disabled>
                        เปิดใช้งานที่เลือก
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="bulkDeactivateBtn" disabled>
                        ปิดใช้งานที่เลือก
                    </button>
                    <span class="text-muted small" id="selectedUsersCount">(0)</span>
                </div>
                <hr/>
                    <table class="table table-bordered table-hover align-middle mb-0 user-table" style="font-family:'Chakra Petch', sans-serif;">
                        <thead>
                            <tr>
                                <th style="width: 44px;">
                                    <div class="form-check m-0">
                                        <input class="form-check-input" type="checkbox" id="selectAllUsers">
                                    </div>
                                </th>
                                <th class="text-center" style="width: 80px;">ID</th>
                                <th style="width: 36%;">ผู้ใช้งาน</th>
                                <th style="width: 18%;">เบอร์โทร</th>
                                <th class="text-center" style="width: 14%;">Role</th>
                                <th class="text-center" style="width: 18%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                @if(Auth::user()->id <> $user->id)
                                <td>
                                    <div class="form-check m-0 d-flex align-items-center gap-2">
                                        <input class="form-check-input user-select" type="checkbox" data-id="{{ $user->id }}">
                                        <span class="badge {{ $user->active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $user->active ? 'ON' : 'OFF' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>
                                    <div class="user-name">{{ $user->name }}</div>
                                    <div class="user-email">{{ $user->email }}</div>
                                </td>
                                <td>{{ $user->mobile }}</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border">{{ $user->role }}</span>
                                </td>
                                <td>
                                    <button type="button" onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}','{{ $user->mobile }}','{{ $user->role }}')"
                                        data-bs-target="#editUserModal" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit me-0'></i></button>
                                    <button type="button" onclick="VerifyEmail({{ $user->id }},'{{ $user->email }}')" data-bs-target="#VerifyEmailModal" data-bs-toggle="modal" class="btn btn-outline-info btn-sm"><i class='bx bx-envelope-open me-0'></i></button>
                                    <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDelete({{ $user->id }})"><i class='bx bx-trash me-0'></i></button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>

    </div>
</div>



<div class="modal fade" id="AddUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
        <form method="POST" action="{{ url('admin/users/store') }}">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มผู้ใช้งานระบบ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">ชื่อผู้ใช้งาน</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-user'></i></span>
                                <input type="text" name="name" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">เบอร์โทร</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-microphone'></i></span>
                                <input type="text" name="mobile" class="form-control" placeholder="เบอร์โทร">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">อีเมล</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                <input type="email" name="email" class="form-control" placeholder="อีเมล">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">ตั้งรหัสผ่าน</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-lock-open'></i></span>
                                <input type="password" name="password" class="form-control" placeholder="ตั้งรหัสผ่าน">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">บทบาท</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-flag'></i></span>
                                <select class="form-select" name="role">
                                    <option selected>เลือกบทบาท</option>
                                    <option {{ old('role')=='manager'? 'selected' : '' }} value="manager">ผู้จัดการ</option>
                                    <option {{ old('role')=='admin'? 'selected' : '' }} value="admin">ผู้ดูแลระบบ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label"></label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active_users">
                                <label class="form-check-label">เปิดใช้งาน</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
        </div>

    </div>
</div>


<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('admin/users/update') }}">
            @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขผู้ใช้งานระบบ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">ชื่อผู้ใช้งาน</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-user'></i></span>
                                <input type="text" name="name" id="user-name" class="form-control" placeholder="ชื่อผู้ใช้งาน">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">เบอร์โทร</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-microphone'></i></span>
                                <input type="text" name="mobile" id="user-mobile" class="form-control" placeholder="เบอร์โทร">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">อีเมล</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                <input type="email" name="email" id="user-email" class="form-control" placeholder="อีเมล">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label">บทบาท</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-flag'></i></span>
                                <select class="form-select" id="user-role" name="role">
                                    <option selected>เลือกบทบาท</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>ผู้ดูแลระบบ</option>
                                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>ผู้จัดการ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="user-id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="VerifyEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('admin/users/sendmail') }}">
            @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">Email</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-envelope'></i></span>
                                <input type="email" name="email" id="VerifyEmail" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="VerifyId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">VerifyEmail</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAll = document.getElementById('selectAllUsers');
        const checks = Array.from(document.querySelectorAll('.user-select'));
        const bulkOn = document.getElementById('bulkActivateBtn');
        const bulkOff = document.getElementById('bulkDeactivateBtn');
        const countEl = document.getElementById('selectedUsersCount');
        const csrfToken = "{{ csrf_token() }}";

        function updateControls() {
            const selected = checks.filter(c => c.checked);
            const count = selected.length;
            countEl.textContent = `(${count})`;
            bulkOn.disabled = count === 0;
            bulkOff.disabled = count === 0;
            selectAll.checked = count > 0 && count === checks.length;
        }

        function updateStatus(ids, active) {
            const requests = ids.map(id => fetch(`users/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ active: active ? 1 : 0 })
            }).then(r => r.json()));

            return Promise.all(requests);
        }

        if (selectAll) {
            selectAll.addEventListener('change', function () {
                checks.forEach(c => c.checked = selectAll.checked);
                updateControls();
            });
        }

        checks.forEach(c => c.addEventListener('change', updateControls));

        bulkOn.addEventListener('click', function () {
            const ids = checks.filter(c => c.checked).map(c => c.dataset.id);
            if (ids.length === 0) return;
            Swal.fire({
                title: 'เปิดใช้งานผู้ใช้ที่เลือก?',
                text: `จำนวน ${ids.length} ราย`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then(result => {
                if (result.isConfirmed) {
                    updateStatus(ids, true).then(() => location.reload());
                }
            });
        });

        bulkOff.addEventListener('click', function () {
            const ids = checks.filter(c => c.checked).map(c => c.dataset.id);
            if (ids.length === 0) return;
            Swal.fire({
                title: 'ปิดใช้งานผู้ใช้ที่เลือก?',
                text: `จำนวน ${ids.length} ราย`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then(result => {
                if (result.isConfirmed) {
                    updateStatus(ids, false).then(() => location.reload());
                }
            });
        });

        updateControls();
    });
</script>

<script>
    function editUser(id, name, email, mobile, role) {
        $('#user-id').val(id);
        $('#user-name').val(name);
        $('#user-email').val(email);
        $('#user-mobile').val(mobile);
        $('#user-role').val(role);
    }
    function VerifyEmail(id, email) {
        $('#VerifyId').val(id);
        $('#VerifyEmail').val(email);
    }
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the hidden form
                document.getElementById(`delete-form-${userId}`).submit();

            }
        });
    }
</script>
@endsection
