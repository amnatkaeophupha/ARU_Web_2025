@extends('admin/roker_layout/2025_webaru_exec_executives_layout')
@section('title', 'ผู้บริหาร - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

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
                        <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้บริหาร</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group gap-2">
                    <a href="{{ url('admin/webaru-exec-positions') }}{{ request('group_id') ? ('?group_id=' . request('group_id')) : '' }}" class="btn btn-outline-secondary rounded-2">
                        จัดการตำแหน่ง
                    </a>
                    <button type="button" class="btn btn-primary rounded-2" data-bs-toggle="modal" data-bs-target="#AddExecExecutive">
                        เพิ่มผู้บริหาร
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
                    <h5 class="text-primary rounded mb-0">
                        ข้อมูลผู้บริหาร
                        @if(!empty($selectedGroup))
                            : {{ $selectedGroup->title_th }}
                        @endif
                    </h5>
                </div>
                <hr/>
                <div class="tab-content py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 w-100" style="font-family:'Chakra Petch', sans-serif; table-layout: fixed;">
                            <colgroup>
                                <col width="5%">
                                <col width="5%">
                                <col width="7%">
                                <col width="23%">
                                <col width="15%">
                                <col width="15%">
                                <col width="20%">
                                <col width="10%">
                            </colgroup>
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">ภาพ</th>
                                    <th class="text-center">ตำแหน่ง</th>
                                    <th class="text-center">ชื่อ (TH)</th>
                                    <th class="text-center">ชื่อ (EN)</th>
                                    <th class="text-center">ติดต่อ</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($executives as $item)
                                <tr>
                                    <td class="text-center">
                                        <form method="POST"
                                            action="{{ route('webaru-exec-executives.toggle', $item->id) }}"
                                            class="d-inline toggle-active-form"
                                            data-title="{{ $item->name_th }}"
                                            data-status="{{ $item->is_active ? 'ปิดการมองเห็น' : 'เปิดการมองเห็น' }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm px-2 py-1 small {{ $item->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                title="{{ $item->is_active ? 'กำลังแสดงหน้าเว็บ' : 'ปิดการมองเห็น' }}">
                                                @if($item->is_active)
                                                    <i class="bx bx-toggle-right" style="font-size:12px;"></i> <span style="font-size:12px;">ON</span>
                                                @else
                                                    <i class="bx bx-toggle-left" style="font-size:12px;"></i> <span style="font-size:12px;">OFF</span>
                                                @endif
                                            </button>
                                        </form>
                                    </td>

                                    <td class="text-center">{{ $item->person_order }}</td>

                                    <td class="text-center">
                                        @if($item->photo)
                                            <img src="{{ asset('storage/'.$item->photo) }}" alt="photo" class="img-thumbnail" style="max-height: 60px;">
                                        @else
                                            <span class="text-muted small">ไม่มีรูปภาพ</span>
                                        @endif
                                    </td>

                                    <td style="word-wrap: break-word;">
                                        {{ optional($item->position)->title_th }}
                                        @if(!empty($item->position_text))
                                            <div class="text-muted small">{{ $item->position_text }}</div>
                                        @endif
                                    </td>

                                    <td style="word-wrap: break-word;">{{ $item->name_th }}</td>

                                    <td style="word-wrap: break-word;">{{ $item->name_en }}</td>

                                    <td style="word-wrap: break-word;">
                                        @if(!empty($item->phone))
                                            <div>{{ $item->phone }}</div>
                                        @endif
                                        @if(!empty($item->email))
                                            <div>{{ $item->email }}</div>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="แก้ไข"
                                            data-bs-toggle="modal"
                                            data-bs-target="#EditExecExecutive"
                                            data-id="{{ $item->id }}"
                                            data-group_id="{{ $item->group_id }}"
                                            data-position_id="{{ $item->position_id }}"
                                            data-name_th="{{ $item->name_th }}"
                                            data-name_en="{{ $item->name_en }}"
                                            data-position_text="{{ $item->position_text }}"
                                            data-phone="{{ $item->phone }}"
                                            data-email="{{ $item->email }}"
                                            data-person_order="{{ $item->person_order }}"
                                            data-photo="{{ $item->photo ? asset('storage/'.$item->photo) : '' }}">
                                            <i class='bx bx-edit me-0'></i>
                                        </button>

                                        <form method="POST"
                                            action="{{ route('webaru-exec-executives.destroy', $item->id) }}"
                                            class="d-inline delete-exec-executive-form"
                                            data-title="{{ $item->name_th }}">
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
                                    <td colspan="8" class="text-center text-muted">ยังไม่มีข้อมูลผู้บริหาร</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $executives->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- ADD MODAL --}}
<div class="modal fade" id="AddExecExecutive" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('webaru-exec-executives.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">เพิ่มผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">กลุ่ม</label>
                            <select class="form-select" name="group_id" required>
                                <option value="">-- เลือกกลุ่ม --</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->title_th }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ตำแหน่ง</label>
                            <select class="form-select" name="position_id" required>
                                <option value="">-- เลือกตำแหน่ง --</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->title_th }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ชื่อ (TH)</label>
                            <input type="text" class="form-control" name="name_th" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ชื่อ (EN)</label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ตำแหน่งย่อย ( เช่น รองอธิการบดีฝ่าย... )</label>
                            <input type="text" class="form-control" name="position_text">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ลำดับ</label>
                            <input type="number" class="form-control" name="person_order" min="1" value="1">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">รูปภาพ</label>
                            <input type="file" class="form-control" name="photo" accept="image/*">
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

{{-- EDIT MODAL --}}
<div class="modal fade" id="EditExecExecutive" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editExecExecutiveForm" method="POST" action="" data-base="{{ url('admin/webaru-exec-executives') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขผู้บริหาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">กลุ่ม</label>
                            <select class="form-select" name="group_id" id="edit-group-id" required>
                                <option value="">-- เลือกกลุ่ม --</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->title_th }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ตำแหน่ง</label>
                            <select class="form-select" name="position_id" id="edit-position-id" required>
                                <option value="">-- เลือกตำแหน่ง --</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->title_th }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ชื่อ (TH)</label>
                            <input type="text" class="form-control" name="name_th" id="edit-name-th" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ชื่อ (EN)</label>
                            <input type="text" class="form-control" name="name_en" id="edit-name-en">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ตำแหน่งย่อย ( เช่น รองอธิการบดีฝ่าย... )</label>
                            <input type="text" class="form-control" name="position_text" id="edit-position-text">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ลำดับ</label>
                            <input type="number" class="form-control" name="person_order" id="edit-person-order" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone" id="edit-phone">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email" id="edit-email">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">รูปภาพปัจจุบัน</label>
                            <div class="mb-2">
                                <img id="edit-photo-preview" src="" alt="photo" class="img-thumbnail d-none" style="max-height: 120px;">
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="remove_photo" id="edit-remove-photo" value="1">
                                <label class="form-check-label" for="edit-remove-photo">ลบรูปเดิม</label>
                            </div>
                            <input type="file" class="form-control" name="photo" id="edit-photo" accept="image/*">
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

@endsection
