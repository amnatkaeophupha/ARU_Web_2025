@extends('admin/roker_layout/2025_webaru_home_admit_layout')
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
                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">สถานะ</th>
                                    <th style="text-align: center;" width="10%">วันที่</th>
                                    <th style="text-align: center;" width="70%">เนื้อหา</th>
                                    <th style="text-align: center;" width="15%">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $datas)
                                <tr>
                                    <td style="text-align: center;">
<form method="POST"
      action="{{ url('admin/webaru-admit/'.$datas->id.'/toggle') }}"
      class="d-inline toggle-active-form"
      data-title="{{ $datas->title }}"
      data-status="{{ $datas->is_active ? 'ปิดการมองเห็น' : 'เปิดการมองเห็น' }}">
    @csrf
    @method('PATCH')

    <button type="submit"
        class="btn btn-sm
        {{ $datas->is_active ? 'btn-success' : 'btn-secondary' }}"
        title="{{ $datas->is_active ? 'กำลังแสดงหน้าเว็บ' : 'ปิดการมองเห็น' }}">

        @if($datas->is_active)
            <i class="bx bx-toggle-right"></i> ON
        @else
            <i class="bx bx-toggle-left"></i> OFF
        @endif
    </button>
</form>
                                    </td>
                                    <td>
                                        {{ $datas->created_at->format('d/m/Y') }}

                                    </td>
                                    <td>
                                        @if($datas->files)
                                            <a href="{{ url('admin/webaru-admit/view/'.$datas->id) }}">{{ $datas->title }}</a>
                                            <br>
                                            [ <a href="{{ asset('storage/'.$datas->files) }}" class="text-danger" style="font-size: 12px;" target="_blank">ดูไฟล์ PDF</a> ]
                                        @else
                                            {{ $datas->title }}
                                            <span class="text-danger">(ไม่มีไฟล์ PDF)</span>
                                        @endif
                                    <td>
                                        {{-- ปุ่มไปหน้าประกาศผล --}}
                                        <a href="{{ url('admin/webaru-admit/view/'.$datas->id) }}"
                                        class="btn btn-outline-success btn-sm"
                                        title="ดูผลประกาศ">
                                            <i class="bx bx-list-check"></i>
                                        </a>

                                        <button type="button"
                                                data-id="{{ $datas->id }}"
                                                data-bs-target="#UploadFile"
                                                data-bs-toggle="modal"
                                                class="btn btn-outline-info btn-sm">
                                            <i class="lni lni-cloud-upload"></i>
                                        </button>

                                        <a href="{{ url('admin/webaru-admit/edit/'.$datas->id) }}" class="btn btn-outline-primary btn-sm" title="แก้ไข"><i class='bx bx-edit me-0'></i></a>

                                        <form method="POST"
                                            action="{{ route('webaru-admit.destroy', $datas->id) }}"
                                            class="d-inline delete-admitcycle-form"
                                            data-title="{{ $datas->title }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="ลบ">
                                                <i class='bx bx-trash me-0'></i>
                                            </button>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.delete-admitcycle-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const title = form.getAttribute('data-title') || '';

      Swal.fire({
        title: 'ยืนยันการลบรายการนี้?',
        html: title ? ('<div class="text-muted small mt-2">' + title + '</div>') : '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ลบ',
        cancelButtonText: 'ยกเลิก',
        reverseButtons: true,
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
</script>


<div class="modal fade" id="AddUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <form method="POST" action="{{ url('admin/webaru-admit') }}" enctype="multipart/form-data">
        @csrf
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label mt-2">ปีการรับเข้า</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="year" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">ชื่อรอบการรับเข้า</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="title" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">Upload ประกาศ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="files" class="form-control" style="font-size: 14px;" accept=".pdf">
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">กำหนดการ</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="schedules" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">หัวข้อคำอธิบาย</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="head_detail" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>

                     <label class="col-sm-12 col-form-label mt-2">คำอธิบาย</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <textarea class="form-control" id="div_editor1" name="description" rows="3" style="font-size: 14px;"></textarea>
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
<script>
	var editor1 = new RichTextEditor("#div_editor1");

//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script>

<div class="modal fade" id="UploadFile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="uploadForm"
                  method="POST"
                  data-base="{{ url('admin/webaru-admit/admitcycle_upload') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">Upload PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="card-body p-2">
                        <label class="col-sm-12 col-form-label fw-bold">Upload PDF File</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="file"
                                           name="files"
                                           class="form-control"
                                           style="font-size: 14px;"
                                           accept=".pdf"
                                           required>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const uploadModal = document.getElementById('UploadFile');
    const uploadForm  = document.getElementById('uploadForm');
    const verifyId    = document.getElementById('VerifyId');

    uploadModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // ปุ่มที่กดเปิด modal
        const id = button.getAttribute('data-id');

        verifyId.value = id;

        const base = uploadForm.getAttribute('data-base'); // .../admin/webaru-admit/admitcycle_upload
        uploadForm.action = base + '/' + id;               // .../admitcycle_upload/{id}
    });
});
</script>

<script>
document.querySelectorAll('.toggle-active-form').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const title = this.dataset.title;
        const status = this.dataset.status;

        Swal.fire({
            title: status,
            text: title,
            icon: 'question',
            customClass: { popup: 'swal-chakra' },
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then(result => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
});
</script>
@endsection
