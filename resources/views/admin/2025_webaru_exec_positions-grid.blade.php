@extends('admin/roker_layout/2025_webaru_exec_positions_layout')
@section('title', 'ตำแหน่งผู้บริหาร - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

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
                        <li class="breadcrumb-item active" aria-current="page">ตำแหน่งผู้บริหาร</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group gap-2">
                    <a href="{{ url('admin/webaru-exec-executives') }}{{ request('group_id') ? ('?group_id=' . request('group_id')) : '' }}" class="btn btn-outline-secondary rounded-2">
                        ย้อนกลับ
                    </a>
                    <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal" data-bs-target="#AddExecPosition">
                        เพิ่มตำแหน่ง
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
                    <h5 class="text-primary rounded mb-0">ข้อมูลตำแหน่งผู้บริหาร</h5>
                </div>
                <hr/>

                <div class="tab-content py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif; table-layout: fixed;">
                            <colgroup>
                                <col width="12%">
                                <col width="10%">
                                <col width="30%">
                                <col width="33%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">ชื่อตำแหน่ง (TH)</th>
                                    <th class="text-center">ชื่อตำแหน่ง (EN)</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($execPositions as $row)
                                <tr>
                                    <td class="text-center">
                                        <form method="POST"
                                            action="{{ route('webaru-exec-positions.toggle', $row->id) }}"
                                            class="d-inline toggle-active-form"
                                            data-title="{{ $row->title_th }}"
                                            data-status="{{ $row->is_active ? 'ปิดการมองเห็น' : 'เปิดการมองเห็น' }}">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn btn-sm {{ $row->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                title="{{ $row->is_active ? 'กำลังแสดงหน้าเว็บ' : 'ปิดการมองเห็น' }}">
                                                @if($row->is_active)
                                                    <i class="bx bx-toggle-right" style="font-size:12px;"></i> <span style="font-size:12px;">ON</span>
                                                @else
                                                    <i class="bx bx-toggle-left" style="font-size:12px;"></i> <span style="font-size:12px;">OFF</span>
                                                @endif
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-center">{{ $row->sort_order }}</td>

                                    <td style="word-wrap: break-word;">{{ $row->title_th }}</td>

                                    <td style="word-wrap: break-word;">{{ $row->title_en }}</td>

                                    <td class="text-center">
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="แก้ไข"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditExecPosition"
                                            data-id="{{ $row->id }}"
                                            data-title_th="{{ $row->title_th }}"
                                            data-title_en="{{ $row->title_en }}"
                                            data-sort_order="{{ $row->sort_order }}">
                                            <i class='bx bx-edit me-0'></i>
                                        </button>

                                        <form method="POST"
                                            action="{{ route('webaru-exec-positions.destroy', $row->id) }}"
                                            class="d-inline delete-exec-position-form"
                                            data-title="{{ $row->title_th }}">
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
                                    <td colspan="5" class="text-center text-muted">ยังไม่มีข้อมูลตำแหน่ง</td>
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
<div class="modal fade" id="AddExecPosition" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('webaru-exec-positions.store') }}">
                @csrf
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มตำแหน่งผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="mb-3">
                        <label class="form-label">ลำดับ</label>
                        <input type="number" class="form-control" name="sort_order" min="0" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อตำแหน่ง (TH)</label>
                        <input type="text" class="form-control" name="title_th" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อตำแหน่ง (EN)</label>
                        <input type="text" class="form-control" name="title_en" placeholder="ใส่หรือเว้นว่างได้">
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
<div class="modal fade" id="EditExecPosition" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editExecPositionForm" method="POST" action="" data-base="{{ url('admin/webaru-exec-positions') }}">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขตำแหน่งผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="mb-3">
                        <label class="form-label">ลำดับ</label>
                        <input type="number" class="form-control" name="sort_order" id="edit-sort-order" min="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อตำแหน่ง (TH)</label>
                        <input type="text" class="form-control" name="title_th" id="edit-title-th" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ชื่อตำแหน่ง (EN)</label>
                        <input type="text" class="form-control" name="title_en" id="edit-title-en" placeholder="ใส่หรือเว้นว่างได้">
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

@endsection
