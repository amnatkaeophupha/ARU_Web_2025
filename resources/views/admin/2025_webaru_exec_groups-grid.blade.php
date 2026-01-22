@extends('admin/roker_layout/2025_webaru_exec_groups_layout')
@section('title', 'กลุ่มผู้บริหาร - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ผู้บริหาร</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">กลุ่มผู้บริหาร</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddExecGroups">
                        เพิ่มกลุ่ม
                    </button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        @if ($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
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
                    <h5 class="text-primary rounded mb-0">ข้อมูลกลุ่มผู้บริหาร</h5>
                </div>
                <hr/>

                <div class="tab-content py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif; table-layout: fixed;">
                            <colgroup>
                                <col width="10%">
                                <col width="8%">
                                <col width="22%">
                                <col width="45%">
                                <col width="15%">
                            </colgroup>
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">ชื่อไทย</th>
                                    <th class="text-center">ชื่ออังกฤษ</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($execGroups as $datas)
                                <tr>
                                    <td class="text-center">
                                        <form method="POST"
                                            action="{{ route('webaru-exec-groups.toggle', $datas->id) }}"
                                            class="d-inline toggle-active-form"
                                            data-title="{{ $datas->title_th }}"
                                            data-next="{{ $datas->is_active ? 'ปิดการมองเห็น' : 'เปิดการมองเห็น' }}">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn btn-sm {{ $datas->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                title="{{ $datas->is_active ? 'กำลังแสดงหน้าเว็บ' : 'ปิดการมองเห็น' }}">
                                                @if($datas->is_active)
                                                    <i class="bx bx-toggle-right" style="font-size:12px;"></i> <span style="font-size:12px;">ON</span>
                                                @else
                                                    <i class="bx bx-toggle-left" style="font-size:12px;"></i> <span style="font-size:12px;">OFF</span>
                                                @endif
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-center">{{ $datas->sort_order }}</td>

                                    <td style="word-wrap: break-word;">{{ $datas->title_th }}</td>

                                    <td style="word-wrap: break-word;">{{ $datas->title_en }}</td>

                                    <td class="text-center">
                                        {{-- ไปหน้ารายชื่อผู้บริหารในกลุ่มนี้ --}}
                                        <a href="{{ route('webaru-exec-executives.index', ['group_id' => $datas->id]) }}"
                                           class="btn btn-outline-success btn-sm"
                                           title="ดูรายชื่อผู้บริหาร">
                                            <i class="bx bx-list-check"></i>
                                        </a>

                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="แก้ไข"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditExecGroups"
                                            data-id="{{ $datas->id }}"
                                            data-title_th="{{ $datas->title_th }}"
                                            data-title_en="{{ $datas->title_en }}"
                                            data-sort_order="{{ $datas->sort_order }}">
                                            <i class='bx bx-edit me-0'></i>
                                        </button>

                                        <form method="POST"
                                            action="{{ route('webaru-exec-groups.destroy', $datas->id) }}"
                                            class="d-inline delete-exec-group-form"
                                            data-title="{{ $datas->title_th }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="ลบ">
                                                <i class='bx bx-trash me-0'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">ยังไม่มีข้อมูล</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ADD MODAL --}}
<div class="modal fade" id="AddExecGroups" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('store_exec_groups') }}">
                @csrf
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มกลุ่มผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="mb-3">
                        <label class="form-label">ลำดับ</label>
                        <input type="number" class="form-control" name="sort_order" min="0" value="{{ old('sort_order', 0) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อไทย</label>
                        <input type="text" class="form-control" name="title_th" value="{{ old('title_th') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่ออังกฤษ</label>
                        <input type="text" class="form-control" name="title_en" value="{{ old('title_en') }}">
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

{{-- EDIT MODAL --}}
<div class="modal fade" id="EditExecGroups" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editExecGroupForm" method="POST" action="" data-base="{{ url('admin/webaru-exec-groups') }}">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขข้อมูลกลุ่มผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="mb-3">
                        <label class="form-label">ลำดับ</label>
                        <input type="number" class="form-control" name="sort_order" id="edit-sort-order" min="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อไทย</label>
                        <input type="text" class="form-control" name="title_th" id="edit-title-th" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่ออังกฤษ</label>
                        <input type="text" class="form-control" name="title_en" id="edit-title-en">
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // เติมค่าใน Edit Modal + set action
    const editModal = document.getElementById('EditExecGroups');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const titleTh = button.getAttribute('data-title_th') || '';
            const titleEn = button.getAttribute('data-title_en') || '';
            const sortOrder = button.getAttribute('data-sort_order') || 0;

            document.getElementById('edit-title-th').value = titleTh;
            document.getElementById('edit-title-en').value = titleEn;
            document.getElementById('edit-sort-order').value = sortOrder;

            const form = document.getElementById('editExecGroupForm');
            const base = form.getAttribute('data-base');
            form.action = `${base}/${id}`;
        });
    }

    // Confirm delete
    document.querySelectorAll('.delete-exec-group-form').forEach(function(form){
        form.addEventListener('submit', function(e){
            const title = form.getAttribute('data-title') || '';
            if(!confirm(`ยืนยันลบกลุ่ม "${title}" ?\n(การลบกลุ่มจะลบรายชื่อผู้บริหารในกลุ่มนี้ด้วย ถ้า FK เป็น cascade)`)){
                e.preventDefault();
            }
        });
    });

    // Confirm toggle (optional)
    document.querySelectorAll('.toggle-active-form').forEach(function(form){
        form.addEventListener('submit', function(e){
            const title = form.getAttribute('data-title') || '';
            const next = form.getAttribute('data-next') || '';
            if(!confirm(`ยืนยันเปลี่ยนสถานะกลุ่ม "${title}" เป็น "${next}" ?`)){
                e.preventDefault();
            }
        });
    });

});
</script>
@endpush

@endsection
