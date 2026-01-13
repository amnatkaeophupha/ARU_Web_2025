@extends('admin/roker_layout/2025_webaru_home_admit_layout')
@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')
@section('content')
<style>
.swal-chakra,
.swal-chakra * {
    font-family: 'Chakra Petch', sans-serif !important;
}
</style>
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

        @foreach($faculties as $faculty)
        @php
            $textClass = match($faculty->id) {
                1 => 'text-primary',
                2 => 'text-info',
                3 => 'text-warning',
                4 => 'text-success',
                default => 'text-secondary',
            };
            $borderClass = match($faculty->id) {
                1 => 'border-primary',
                2 => 'border-info',
                3 => 'border-warning',
                4 => 'border-success',
                default => 'border-secondary',
            };
            $alertClass = match($faculty->id) {
                1 => 'alert-primary',
                2 => 'alert-info',
                3 => 'alert-warning',
                4 => 'alert-success',
                default => 'alert-secondary',
            };
            $bgClass = match($faculty->id) {
                1 => 'bg-primary',
                2 => 'bg-info',
                3 => 'bg-warning',
                4 => 'bg-success',
                default => 'bg-secondary',
            };
        @endphp
        <div class="card {{ $borderClass }} border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center"
                    style="font-family:'Chakra Petch', sans-serif;">

                    {{-- ชื่อคณะ --}}
                    <h5 class="{{ $textClass }} rounded mb-0">
                        {{ $faculty->faculty_name }}
                    </h5>

                    {{-- ปุ่มด้านขวา --}}
                    <div class="btn-group">

                        <a href="{{ url('admin/webaru-admit/course/'.$faculty->id.'?cycle_id='.$cycle->id) }}"
                        class="btn btn-sm btn-outline-danger" style="margin-right: 10px;">
                            <i class="bx bx-plus"></i> เพิ่มสาขา
                        </a>

                        <a href="{{ url('admin/webaru-admit/view/'.$cycle->id.'/faculty/'.$faculty->id.'/comment') }}"
                        class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-edit"></i> เพิ่มคำอธิบาย
                        </a>

                    </div>
                </div>
                <hr/>
                @php
                $facultyComment = $faculty->viewComments->first(); // เพราะ unique ต่อ 1 cycle+faculty
                @endphp
                <style>
                .faculty-comment p {
                    margin-bottom: 0;
                }
                </style>
                @foreach($faculty->viewComments as $c)
                <div class="alert {{ $alertClass }} border-0 {{$bgClass}} fade show mt-2 p-2"
                    style="margin-bottom:0; font-family:'Chakra Petch', sans-serif;">
                    <div class="d-flex justify-content-between align-items-start">
                        {{-- เนื้อหา comment --}}
                        <div class="text-white faculty-comment">
                            {!! $c->comment !!}
                        </div>

                        {{-- ปุ่มลบ --}}
                        <button type="button"
                                class="btn btn-sm btn-outline-light ms-2 btn-delete-comment"
                                data-id="{{ $c->id }}"
                                title="ลบคำอธิบาย">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>
                </div>
                @endforeach
                <div class="tab-content py-3">

                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="10%">รหัส</th>
                                    <th style="text-align: center;" width="40%">ชื่อ</th>
                                    <th style="text-align: center;" width="15%">ลิงค์</th>
                                    <th style="text-align: center;" width="25%">หมายเหตุ</th>
                                    <th style="text-align: center;" width="10%">ดำเนินการ</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($faculty->programs as $program)
                                <tr>
                                     @foreach($program->admitViews as $view)
                                    <td class="text-center">{{ $program->program_code }}</td>
                                    <td>{{ $program->program_name }}</td>
                                    <td>
                                        @if($view->files)
                                            <a href="{{ asset('storage/'.$view->files) }}" target="_blank">
                                                ดูไฟล์ประกาศ
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($view->comment)
                                            <div>{{ $view->comment }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- Upload / แก้ไข --}}
                                        <button type="button"
                                                class="btn btn-sm btn-outline-info btn-upload-view"
                                                data-bs-toggle="modal"
                                                data-bs-target="#UploadViewModal"
                                                data-cycle="{{ $cycle->id }}"
                                                data-program="{{ $program->id }}"
                                                data-programname="{{ $program->program_name }}">
                                            <i class="bx bx-upload"></i>
                                        </button>
                                        {{-- ลบ --}}
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger btn-delete-view"
                                                data-id="{{ $view->id }}"
                                                data-name="{{ $program->program_name }}">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </td>
                                    @endforeach
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="modal fade" id="UploadViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="uploadViewForm" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">
            Upload ประกาศผล
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
          <div class="mb-2 fw-bold" id="uploadProgramName"></div>

          <label class="col-form-label fw-bold">ไฟล์ประกาศผล (PDF)</label>
          <input type="file" name="files" class="form-control" accept=".pdf">

          <label class="col-form-label fw-bold mt-2">หมายเหตุ</label>
          <textarea name="comment" class="form-control" rows="3"></textarea>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete-comment').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;

            Swal.fire({
                title: 'ยืนยันการลบ?',
                text: 'ต้องการลบคำอธิบายนี้หรือไม่',
                icon: 'warning',
                customClass: { popup: 'swal-chakra' },
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ลบ'
            }).then((result) => {
                if (result.isConfirmed) {

                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/webaru-admit/view-comment') }}/${id}`;

                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    // เปิด modal upload
    document.querySelectorAll('.btn-upload-view').forEach(btn => {
        btn.addEventListener('click', function () {
        const cycleId = this.dataset.cycle;
        const programId = this.dataset.program;
        const programName = this.dataset.programname;

        document.getElementById('uploadProgramName').innerText = programName;

        const form = document.getElementById('uploadViewForm');
        form.action = `{{ url('admin/webaru-admit/view') }}/${cycleId}/program/${programId}/upload`;
        });
    });


    // ลบประกาศผล
    document.querySelectorAll('.btn-delete-view').forEach(btn => {
        btn.addEventListener('click', function () {

            const id   = this.dataset.id;
            const name = this.dataset.name;

            Swal.fire({
                title: 'ยืนยันการลบ?',
                text: `ลบประกาศผลของ ${name}`,
                icon: 'warning',
                customClass: { popup: 'swal-chakra'},
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ลบ'
            }).then(result => {
                if (result.isConfirmed) {

                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/webaru-admit/view') }}/${id}`;

                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;

                    document.body.appendChild(form);
                    form.submit();
                }
            });

        });
    });

});
</script>
@endsection
