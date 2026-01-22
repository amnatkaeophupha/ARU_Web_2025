@extends('admin/roker_layout/2025_webaru_home_arunews_layout')
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
                        <li class="breadcrumb-item active" aria-current="page">ARU NEWS</li>
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
                    <h5 class="text-primary rounded mb-0">ข้อมูล ARU NEWS</h5>
                </div>
                <hr/>
                <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif;">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" width="5%" style="text-align: center;">ID</th>
                            <th scope="col" width="50%" style="text-align: center;">ฉบับที่ ปีที่ วันที่</th>
                            <th scope="col" width="30%" style="text-align: center;">ไฟล์</th>
                            <th scope="col" width="15%" style="text-align: center;">ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($webaruNews as $news)
                        <tr>
                            <th scope="row" style="text-align: center;">{{ $news->id }}</th>
                            <td style="vertical-align: middle;">{{ $news->title }}</td>
                            <td style="vertical-align: middle;">{{ $news->files }}</td>
                            <td style="text-align: center;">
                                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-success"><i class='bx bx-upload me-0'></i></a> --}}
                                <a href="javascript:;" class="btn btn-sm btn-outline-success" onclick="EditFile({{$news->id}})" data-bs-target="#UpdateFileModal" data-bs-toggle="modal"><i class='bx bx-upload me-0'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-primary" onclick="EditModal({{$news->id}}, '{{ e($news->title) }}')" data-bs-target="#EditModal" data-bs-toggle="modal"><i class='bx bx-edit me-0'></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{$news->id}})"><i class='bx bx-trash me-0'></i></a>
                            </td>
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
        <form method="POST" action="{{ url('admin/webaru-arunews') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">

                    <label class="col-sm-12 col-form-label mt-2">ปีที่ ฉบัยที่ วันที่ </label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="title" rows="1" style="font-size: 14px;">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">Upload File (PDF):</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" style="font-size: 14px;" accept=".pdf">
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

<div class="modal fade" id="UpdateFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="updateForm" method="POST" action=""  data-base="{{ url('admin/webaru-arunews') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Hidden PUT method -->
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เปลี่ยนไฟล์ข่าว</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" style="font-size: 14px;" accept="application/pdf" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="data-id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" data-base="{{ url('admin/webaru-arunews/updateTitle') }}">
            @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขหัวข้อข่าว</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" name="title" id="edit_title" class="form-control" style="font-size: 14px;" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="edit_id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
