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
                                    <th width="10%">รหัส</th>
                                    <th width="50%">ชื่อประกาศ</th>
                                    <th width="20%">ชื่อประกาศ</th>
                                    <th width="20%">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $datas)
                                <tr>
                                    <td>{{ $datas->id }}</td>
                                    <td>
                                        <a target="_blank" href="{{ asset('storage/2025_webaru_home_tab/'.$datas->files) }}">{{ $datas->title }}</a>
                                    </td>
                                    <td>{{ $datas->by }}</td>
                                    <td>
                                        <button type="button" data-id="{{ $datas->id }}" data-bs-target="#UploadFile" data-bs-toggle="modal" class="btn btn-outline-info btn-sm"><i class="lni lni-cloud-upload"></i></button>
                                        {{-- <button type="button" onclick="editUser({{ $datas->id }}, @json($datas->title), @json($datas->start_date),@json($datas->by))" data-bs-target="#editUserModal" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit me-0'></i></button> --}}
                                        <button type="button" data-id="{{ $datas->id }}" data-title="{{ $datas->title }}" data-start_date="{{ $datas->start_date }}" data-by="{{ $datas->by }}" data-bs-toggle="modal" data-bs-target="#editUserModal" data-bs-toggle="modal" class="btn btn-outline-primary btn-sm"><i class='bx bx-edit me-0'></i></button>
                                        <form id="delete-form-{{ $datas->id }}" method="POST" action="{{ route('webaru-galleries.destroy', $datas->id) }}" class="d-inline">
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
        <form method="POST" action="{{ url('admin/webaru-galleries') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">วันที่</label>
                                <select name="dd" class="form-select">
                                    @for ($d = 1; $d <= 31; $d++)
                                    <option value="{{ sprintf('%02d', $d) }}">{{ $d }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">เดือน</label>
                                <select name="mm" class="form-select">
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">ปี</label>
                                <select name="yy" class="form-select">
                                <option value="{{now()->year+542}}">{{now()->year+542}}</option>
                                @for ($y = now()->year; $y <= now()->year + 2; $y++)
                                    <option
                                        value="{{ $y + 543 }}"
                                        {{ old('yy', now()->year + 543) == $y + 543 ? 'selected' : '' }}>
                                        {{ $y + 543 }}
                                    </option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <label class="col-sm-12 col-form-label mt-2">หัวข้อกิจกรรม</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="title" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">เผยแพร่โดย</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="by" rows="3" style="font-size: 14px;" value="ศูนย์ดิจิทัลเพื่อการเรียนรู้และสื่อสารองค์กร">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">Upload File Images: กำหนดขนาด 170 X 200</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" style="font-size: 14px;" accept=".jpg,.jpeg,.png">
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
            <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไข</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">วันที่</label>
                                <select id="edit-dd" name="dd" class="form-select">
                                    @for ($d = 1; $d <= 31; $d++)
                                    <option value="{{ sprintf('%02d', $d) }}">{{ $d }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">เดือน</label>
                                <select id="edit-mm" name="mm" class="form-select">
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <label class="col-sm-12 col-form-label">ปี</label>
                                <select id="edit-yy" name="yy" class="form-select">
                                <option value="{{now()->year+542}}">{{now()->year+542}}</option>
                                @for ($y = now()->year; $y <= now()->year + 2; $y++)
                                    <option
                                        value="{{ $y + 543 }}"
                                        {{ old('yy', now()->year + 543) == $y + 543 ? 'selected' : '' }}>
                                        {{ $y + 543 }}
                                    </option>
                                @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <label class="col-sm-12 col-form-label mt-2">หัวข้อกิจกรรม</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" id="edit-title" name="title" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">เผยแพร่โดย</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" id="edit-by" name="by" rows="3" style="font-size: 14px;" value="ศูนย์ดิจิทัลเพื่อการเรียนรู้และสื่อสารองค์กร">
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
            <form id="uploadForm" method="POST" data-base="{{ url('admin/webaru-galleries') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">Upload Image File ขนาดภาพ 170X200</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" style="font-size: 14px;" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="VerifyId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
