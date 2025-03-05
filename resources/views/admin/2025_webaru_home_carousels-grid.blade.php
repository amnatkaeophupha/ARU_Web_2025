@extends('admin/roker_layout/2025_webaru_home_carousels_layout')
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">เพิ่มข้อมูล</button>
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

        <h6 class="mb-0 text-uppercase">Card with images</h6>
        <hr/>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
            @foreach($carousels as $carousel)
            <div class="col">
                <div class="card border-primary border-bottom border-3 border-0">
                    <img src="{{ asset('storage/2025_webaru_home_carousels/'.$carousel->images) }}" class="card-img-top">
                    <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                        <h5 class="card-title text-primary">Edit Link</h5>
                        <form method="POST" action="{{ url('admin/webaru-carousels/'.$carousel->id) }}" enctype="multipart/form-data">
                        @csrf <!-- CSRF Token for security -->
                        @method('PUT') <!-- Hidden PUT method -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <textarea class="form-control" name="image_url" rows="2" style="font-size: 14px;">{{ $carousel->image_url }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-2 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="d-flex align-items-center gap-2">
                            <a href="javascript:;" class="btn btn-sm btn-inverse-primary"><i class='bx bx-star me-0'></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-outline-success"><i class='bx bx-camera me-0'></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-outline-danger"  onclick="confirmDelete({{$carousel->id}})"><i class='bx bx-trash me-0'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--end row-->
    </div>
</div>

<div class="modal fade" id="AddModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="{{ url('admin/webaru-carousels') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label mt-2">Upload File (jpg, png, jpeg):</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" style="font-size: 14px;" accept=".pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">Link</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="image_url" rows="3" style="font-size: 14px;"></textarea>
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
                                    <option value="1">จัดซื้อจัดจ้าง</option>
                                    <option value="2">สมัครงาน</option>
                                    <option value="3">ข่าวนักศึกษาภาคปกติ</option>
                                    <option value="4">ข่าวนักศึกษาภาคพิเศษ</option>
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

@endsection
