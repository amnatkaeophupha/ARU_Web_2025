@extends('admin/roker_layout/2025_webaru_home_gallery_layout')
@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">เนื้อหา</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ประกาศมหาวิทยาลัย</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddUserModal">เพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        @if ($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <div class="text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('fail'))
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <div class="text-white">{{ session('fail') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">ข้อมูลประกาศ</h5>
                </div>
                <hr/>
                <div class="tab-content py-3">
                    <div class="table-responsive">
                        <table class="table" style="font-family:'Chakra Petch', sans-serif;">
                            <thead>
                                <tr>
                                    <th>สถานะ</th>
                                    <th>รหัส</th>
                                    <th>ชื่อประกาศ</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $datas)
                                <tr>
                                    <td>
                                        <button type="button" class="btn @if($datas->active == 1) btn-outline-success @else btn-outline-secondary @endif btn-sm" onclick="IsActive({{ $datas->id }}, @if($datas->active==1) 0 @else 1 @endif, {{ $datas->type }} )"><i class="lni lni-eye me-0"></i></button>
                                        </td>
                                    <td>{{ $datas->id }}</td>
                                    <td>
                                        <a target="_blank" href="{{ asset('storage/2025_webaru_home_tab/'.$datas->files) }}">{{ $datas->title }}</a>
                                    </td>
                                    <td>
                                        <button type="button" onclick="UploadFile({{ $datas->id }},'{{ $datas->type }}')" data-bs-target="#UploadFile" data-bs-toggle="modal" class="btn btn-outline-info btn-sm"><i class="lni lni-cloud-upload"></i></button>
                                        <button type="button" onclick="editUser({{ $datas->id }}, '{{ $datas->title }}','{{ $datas->type }}')" data-bs-target="#editUserModal" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit me-0'></i></button>
                                        <form id="delete-form-{{ $datas->id }}" method="POST" action="{{ route('webaru-tabs.destroy', $datas->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDelete({{ $datas->id }})"><i class='bx bx-trash me-0'></i></button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AddUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="{{ url('admin/webaru-tabs') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">ประเภทประกาศ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group" >
                                <select class="form-select" name="type" style="font-size: 14px;">
                                    <option value="1" selected>ข่าวประชาสัมพันธ์ทั่วไป</option>
                                    <option value="2">จัดซื้อจัดจ้าง</option>
                                    <option value="3">สมัครงาน</option>
                                    <option value="4">ข่าวนักศึกษาภาคปกติ</option>
                                    <option value="5">ข่าวนักศึกษาภาคพิเศษ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">หัวข้อ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="title" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">Upload File (PDF, Word, Excel):</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" style="font-size: 14px;" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('admin/webaru-tabs/update') }}">
            @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไข</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">ประเภทประกาศ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group" >
                                <select class="form-select" name="type" style="font-size: 14px;" id="data-type">
                                    <option value="1">ข่าวประชาสัมพันธ์ทั่วไป</option>
                                    <option value="2">จัดซื้อจัดจ้าง</option>
                                    <option value="3">สมัครงาน</option>
                                    <option value="4">ข่าวนักศึกษาภาคปกติ</option>
                                    <option value="5">ข่าวนักศึกษาภาคพิเศษ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <label class="col-sm-12 col-form-label mt-2">หัวข้อ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="title" id="data-title" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="data-id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UploadFile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('admin/webaru-tabs/upload') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">Upload File (PDF, Word, Excel)</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="files" class="form-control" style="font-size: 14px;" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="VerifyId">
                <input type="hidden" name="type" id="VerifyType">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function IsActive(id, active, type) {
    $.ajax({
        url: '/admin/webaru-tabs/active',
        type: 'POST',
        data: {
            id: id,
            active: active,
            type: type,
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            location.reload();
        }
    });
}
</script>
@endsection
