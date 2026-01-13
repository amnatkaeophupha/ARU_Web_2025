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
        <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            customClass: { popup: 'swal-chakra'},
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
        </script>
        @endif

        @if(session('fail'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'ไม่สำเร็จ',
            customClass: { popup: 'swal-chakra'},
            text: '{{ session('fail') }}'
        });
        </script>
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
        @endphp

        <div class="card {{ $borderClass }} border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title text-primary d-flex justify-content-between align-items-center"
                    style="font-family:'Chakra Petch', sans-serif;">

                    {{-- ชื่อคณะ --}}
                    <h5 class="{{ $textClass }} rounded mb-0">
                         {{ $faculty->faculty_name }}
                    </h5>

                    {{-- ปุ่มด้านขวา --}}
                    <div class="btn-group">
                        <button type="button"
                                style="margin-right: 10px;"
                                class="btn btn-sm btn-outline-success"
                                data-bs-toggle="modal"
                                data-bs-target="#AddProgramModal">
                            <i class="bx bx-plus"></i> เพิ่มสาขา
                        </button>

                        <a href="{{ url('admin/webaru-admit/view/'.$cycleId) }}"
                        class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-arrow-back"></i> กลับหน้าประกาศผล
                        </a>

                    </div>
                </div>
                <hr/>
                <div class="tab-content py-3">
                    <form method="POST" action="{{ url('admin/webaru-admit/view/'.$cycleId.'/attach-programs') }}">
                    @csrf
                    <input type="hidden" name="cycle_id" value="{{ $cycleId }}">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">เลือก</th>
                                    <th style="text-align: center;" width="10%">รหัส</th>
                                    <th style="text-align: center;" width="70%">ชื่อ</th>
                                    <th style="text-align: center;" width="15%">ดำเนินการ</th>

                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($faculty->programs as $program)
                                <tr>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" value="{{ $program->id }}" name="programs[]">
                                    </td>
                                    <td class="text-center">
                                        {{ $program->program_code }}
                                    </td>
                                    <td>
                                        {{ $program->program_name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:;"
                                        class="btn btn-sm btn-outline-secondary btn-edit-program"
                                        data-bs-toggle="modal"
                                        data-bs-target="#EditProgramModal"
                                        data-id="{{ $program->id }}"
                                        data-code="{{ $program->program_code }}"
                                        data-name="{{ $program->program_name }}">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger btn-delete-program"
                                                data-id="{{ $program->id }}"
                                                data-name="{{ $program->program_name }}">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        ยังไม่มีข้อมูลสาขาวิชา
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-3 d-flex justify-content-center gap-2">
                        <button type="submit" class="btn btn-sm btn-primary" style="font-family:'Chakra Petch', sans-serif;">
                            <i class="bx bx-save"></i> บันทึกสาขาที่เลือกเข้ารอบนี้
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="AddProgramModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="POST" action="{{ url('admin/webaru-admit/course/'.$faculty->id.'/program') }}">
        @csrf
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label mt-2">รหัสสาขา</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="program_code" value="{{ old('program_code') }}" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>
                    <label class="col-sm-12 col-form-label mt-2">ชื่อสาขา</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input class="form-control" name="program_name" value="{{ old('program_name') }}" rows="3" style="font-size: 14px;"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditProgramModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form id="editProgramForm"
            method="POST"
            action=""
            style="font-family:'Chakra Petch', sans-serif;">
        @csrf
        @method('PUT')
        <div class="modal-header bg-secondary">
          <h5 class="modal-title text-white">แก้ไขสาขาวิชา</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="card-body p-2">

            <label class="col-sm-12 col-form-label mt-2 fw-bold">รหัสสาขา</label>
            <input class="form-control"
                   id="edit_program_code"
                   name="program_code"
                   style="font-size: 14px;"
                   required>

            <label class="col-sm-12 col-form-label mt-2 fw-bold">ชื่อสาขา</label>
            <input class="form-control"
                   id="edit_program_name"
                   name="program_name"
                   style="font-size: 14px;"
                   required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.btn-edit-program').forEach(function(btn){
    btn.addEventListener('click', function () {
      const id   = this.dataset.id;
      const code = this.dataset.code || '';
      const name = this.dataset.name || '';

      document.getElementById('edit_program_code').value = code;
      document.getElementById('edit_program_name').value = name;

      // ตั้ง action ไปที่ controller update
      // URL: admin/webaru-admit/program/{id}
      const form = document.getElementById('editProgramForm');
      form.action = `{{ url('admin/webaru-admit/program') }}/${id}`;
    });
  });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-delete-program').forEach(function (btn) {
        btn.addEventListener('click', function () {

            const id   = this.dataset.id;
            const name = this.dataset.name;

            Swal.fire({
                title: 'ยืนยันการลบ?',
                html: `ต้องการลบสาขา <strong>${name}</strong> ใช่หรือไม่`,
                icon: 'warning',
                customClass: { popup: 'swal-chakra'},
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'ลบข้อมูล',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {

                    // สร้าง form ลบแบบ Laravel
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/webaru-admit/program') }}/${id}`;

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrf);
                    form.appendChild(method);
                    document.body.appendChild(form);
                    form.submit();
                }
            });

        });
    });

});
</script>
@endsection
