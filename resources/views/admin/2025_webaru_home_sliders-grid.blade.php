@extends('admin/roker_layout/2025_webaru_home_sliders_layout')
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
                        <li class="breadcrumb-item active" aria-current="page">ภาพประชาสัมพันธ์มหาวิทยาลัย</li>
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

        <h4 class="mb-0" style="font-family:'Chakra Petch', sans-serif;">ภาพประกาศ ขนาด 1920 X 700 พิกเซล</h4>
        <hr/>
        <div class="row">
            @foreach($sliders as $slider)
            <div class="col-lg-4 col-xl-4 col-md-6">
                <div class="card border-primary border-bottom border-3 border-0">
                    <img src="{{ asset('storage/2025_webaru_home_sliders/'.$slider->images) }}" class="card-img-top">
                    <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">

                        <form method="POST" action="{{ url('admin/webaru-sliders/update') }}" enctype="multipart/form-data">
                        @csrf <!-- CSRF Token for security -->
                        @method('PUT') <!-- Hidden PUT method -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="card-title text-primary">หัวเรื่อง</h5>
                                    <div class="input-group">
                                        <textarea class="form-control" name="topic" rows="2" style="font-size: 14px;">{{ $slider->topic }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h5 class="card-title text-primary mt-2">รายละเอียด</h5>
                                    <div class="input-group">
                                        <textarea class="form-control" name="title" rows="2" style="font-size: 14px;">{{ $slider->title }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h5 class="card-title text-primary mt-2">Link</h5>
                                    <div class="input-group">
                                        <textarea class="form-control" name="link_url" rows="2" style="font-size: 14px;">{{ $slider->link_url }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-2 text-end">
                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-sm @if($slider->status == 1) btn-outline-success @else btn-outline-secondary @endif" onclick="IsActive({{$slider->id}},@if($slider->status==1) 0 @else 1 @endif)">
                                <i class="lni lni-eye me-0"></i>
                            </button>
                            <a href="javascript:;" class="btn btn-sm btn-outline-info" onclick="EditData({{$slider->id}})" data-bs-target="#EditModal" data-bs-toggle="modal"><i class='bx bx-camera me-0'></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-outline-danger" onclick="confirmDelete({{$slider->id}})"><i class='bx bx-trash me-0'></i></a>
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
        <form method="POST" action="{{ url('admin/webaru-sliders') }}" enctype="multipart/form-data">
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
                                <input type="file" name="image" class="form-control" style="font-size: 14px;" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">หัวเรื่อง</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="topic" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">รายละเอียด</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="title" rows="3" style="font-size: 14px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <label class="col-sm-12 col-form-label mt-2">Link</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" name="link_url" rows="3" style="font-size: 14px;"></textarea>
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

<div class="modal fade" id="EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('admin/webaru-sliders/update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Hidden PUT method -->
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เปลี่ยนภาพ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" style="font-size: 14px;" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="data-id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function IsActive(id, status) {
    $.ajax({
        url: '/admin/webaru-sliders/status',
        type: 'POST',
        data: {
            id: id,
            status: status,
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            location.reload();
        }
    });
}
</script>
@endsection
