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
                        <li class="breadcrumb-item active" aria-current="page">ประกาศผลการรับเข้านักศึกษา</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
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
        @if(session('success'))
        <script>
        Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: @json(session('success')),
        timer: 1600,
        showConfirmButton: false
        });
        </script>
        @endif
        <style>
        .editor-large {
            min-height: 650px;
            font-size: 14px;
        }
        </style>
        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">แก้ไขข้อมูลประกาศ</h5>
                </div>
                <hr/>
                <div class="tab-content py-3">
                    <form class="row g-3" method="POST" action="{{ url('admin/webaru-admit/update/'.$item->id) }}"style="font-family:'Chakra Petch', sans-serif;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="input1" class="form-label fw-bold border-0">ปีการรับเข้า</label>
                            <input type="text" name="year" class="form-control" style="font-size: 14px;" value="{{ old('year', $item->year) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="input2" class="form-label fw-bold border-0">ชื่อประกาศรับเข้า</label>
                            <input type="text" name="title" class="form-control" style="font-size: 14px;" value="{{ old('title', $item->title) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="input3" class="form-label fw-bold border-0">กำหนดการ</label>
                            <input type="text" name="schedules" class="form-control" style="font-size: 14px;" value="{{ old('schedules', $item->schedules) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="input11" class="form-label fw-bold border-0">หัวข้อคำอธิบาย</label>
                            <input name="head_detail" class="form-control" style="font-size: 14px;" rows="3" value="{{ old('head_detail', $item->head_detail) }}">
                        </div>
                        <div class="col-md-12">
                            <label for="input11" class="form-label fw-bold border-0">คำอธิบาย</label>
                            <textarea name="description" class="form-control editor-large" id="div_editor1">{{ old('description', $item->description) }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">บันทึก</button>
                                <a href="{{ url('admin/webaru-admit') }}" class="btn btn-light px-4">ย้อนกลับ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-success border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-success rounded mb-0">เอกสารไฟล์รายละเอียดแนบ</h5>
                </div>
                <hr/ style="margin-top: 0px; margin-bottom: 0px;">
                <div class="tab-content py-3">
                    <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif;">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;" width="5%">ID</th>
                                <th scope="col" style="text-align: center;" width="70%">ชื่อปุ่มเปิดไฟล์</th>
                                <th scope="col" style="text-align: center;" width="20%">ชื่อไฟล์</th>
                                <th scope="col" style="text-align: center;" width="5%">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($item->fileDetails as $index => $file)
                            <tr>
                                <th scope="row" style="text-align: center;">{{ $file->id }}</th>

                                {{-- ชื่อปุ่มเปิดไฟล์ --}}
                                <td>

                                    <a href="{{ asset('storage/'.$file->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success" style="font-family:'Chakra Petch', sans-serif;">
                                        {{ $file->file_name}}
                                    </a>
                                </td>

                                {{-- ชื่อไฟล์จริง + ปุ่มเปิด --}}
                                <td>
                                    <div class="small text-muted mt-1" style="font-family:'Chakra Petch', sans-serif;">
                                        {{ basename($file->file_path) }}
                                    </div>
                                </td>

                                {{-- ปุ่มลบ --}}
                                <td class="text-center">
                                    <form method="POST"
                                        action="{{ url('admin/webaru-admit/file-detail/'.$file->id) }}" class="delete-file-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    ยังไม่มีไฟล์แนบเพิ่มเติม
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card border-danger border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-danger rounded mb-0">เพิ่มเอกสารไฟล์รายละเอียดแนบ</h5>
                </div>
                <hr/>
                <div class="tab-content py-3">
                    <form class="row g-3" method="POST" action="{{ url('admin/webaru-admit/'.$item->id.'/file-detail') }}"style="font-family:'Chakra Petch', sans-serif;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="webaru_admitcycle_id" value="{{ $item->id }}">
                        <div class="col-md-12">
                            <label for="input2" class="form-label fw-bold border-0">ชื่อปุ่มแนบไฟล์เพิ่มเติม :</label>
                            <input type="text" name="file_name" class="form-control" style="font-size: 14px;">
                        </div>
                        <div class="col-md-12">
                            <label for="input3" class="form-label fw-bold border-0">ไฟล์เพิ่มเติม</label>
                            <input type="file" name="files" class="form-control" style="font-size: 14px;" accept=".pdf">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-danger px-4">บันทึก</button>
                                 <a href="{{ url('admin/webaru-admit') }}" class="btn btn-light px-4">ย้อนกลับ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
	var editor1 = new RichTextEditor("#div_editor1");
//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.delete-file-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      Swal.fire({
        title: 'ยืนยันการลบไฟล์?',
        text: 'ลบแล้วไม่สามารถกู้คืนได้',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ลบไฟล์',
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

@endsection
