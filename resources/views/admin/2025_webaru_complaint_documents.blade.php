@extends('admin/roker_layout/2025_webaru_complaint_layout')
@section('title', 'ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')

<style>
    .complaint-documents-page,
    .complaint-documents-page * {
        font-family: 'Chakra Petch', sans-serif;
    }
</style>

<div class="page-wrapper">
    <div class="page-content complaint-admin-page complaint-documents-page">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายการเรื่องร้องเรียน</li>
                    </ol>
                </nav>
            </div>
        </div>

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

        @php
            $categoryLabels = [
                'report' => 'รายงานผล',
                'manual' => 'คู่มือ',
                'form' => 'แบบฟอร์มร้องเรียน',
            ];
        @endphp

        <div class="card border-primary border-top border-3 border-0 mb-3">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">เพิ่มเอกสารใหม่</h5>
                </div>
                <hr/>
                <form method="POST" action="{{ url('admin/webaru-complaint-documents') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-md-3">
                            <label class="form-label">ประเภทเอกสาร</label>
                            <select name="category" class="form-select form-select-sm" required>
                                <option value="report">รายงานผล</option>
                                <option value="manual">คู่มือ</option>
                                <option value="form">แบบฟอร์มร้องเรียน</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">ชื่อเอกสาร</label>
                            <input type="text" name="title" class="form-control form-control-sm" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label">ปีงบประมาณ</label>
                            <input type="number" name="fiscal_year" class="form-control form-control-sm" min="2000" max="3000">
                        </div>
                        <div class="col-12 col-md-3">
                            <label class="form-label">ไตรมาส (ถ้ามี)</label>
                            <select name="report_quarter" class="form-select form-select-sm">
                                <option value="">-</option>
                                <option value="1">ไตรมาส 1</option>
                                <option value="2">ไตรมาส 2</option>
                                <option value="3">ไตรมาส 3</option>
                                <option value="4">ไตรมาส 4</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-5">
                            <label class="form-label">หน่วยงาน/เจ้าของเอกสาร</label>
                            <input type="text" name="agency" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label">วันที่เผยแพร่</label>
                            <input type="date" name="published_at" class="form-control form-control-sm">
                        </div>
                        <div class="col-12 col-md-2">
                            <label class="form-label">ลำดับแสดงผล</label>
                            <input type="number" name="sort_order" class="form-control form-control-sm" min="0" value="0">
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label">ไฟล์เอกสาร</label>
                            <input type="file" name="file" class="form-control form-control-sm" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                        </div>
                        <div class="col-12 col-md-2 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="create-is-active" value="1" checked>
                                <label class="form-check-label" for="create-is-active">แสดงผล</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-sm"><i class="bx bx-save me-1"></i>บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5 class="text-primary rounded mb-0">รายการเอกสาร</h5>
                    </div>
                </div>
                <hr/>

                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th style="width: 70px;">#</th>
                                <th style="width: 140px;">ประเภท</th>
                                <th>ชื่อเอกสาร</th>
                                <th style="width: 120px;">ปี/ไตรมาส</th>
                                <th style="width: 140px;">ไฟล์</th>
                                <th style="width: 120px;">สถานะ</th>
                                <th style="width: 160px;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documents as $doc)
                                <tr>
                                    <td>{{ $doc->id }}</td>
                                    <td>{{ $categoryLabels[$doc->category] ?? $doc->category }}</td>
                                    <td>{{ $doc->title }}</td>
                                    <td>
                                        {{ $doc->fiscal_year ?? '-' }}
                                        @if ($doc->report_quarter)
                                            / Q{{ $doc->report_quarter }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $doc->download_url }}" target="_blank" rel="noopener">
                                            {{ basename($doc->file_url) }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($doc->is_active)
                                            <span class="badge bg-success">แสดงผล</span>
                                        @else
                                            <span class="badge bg-secondary">ปิดการแสดงผล</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#edit-doc-{{ $doc->id }}">
                                            แก้ไข
                                        </button>
                                        <form method="POST" action="{{ url('admin/webaru-complaint-documents/' . $doc->id) }}" class="d-inline js-doc-delete" data-title="{{ $doc->title }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr class="collapse" id="edit-doc-{{ $doc->id }}">
                                    <td colspan="7">
                                        <form method="POST" action="{{ url('admin/webaru-complaint-documents/' . $doc->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row g-3">
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">ประเภทเอกสาร</label>
                                                    <select name="category" class="form-select form-select-sm" required>
                                                        <option value="report" @selected($doc->category === 'report')>รายงานผล</option>
                                                        <option value="manual" @selected($doc->category === 'manual')>คู่มือ</option>
                                                        <option value="form" @selected($doc->category === 'form')>แบบฟอร์มร้องเรียน</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="form-label">ชื่อเอกสาร</label>
                                                    <input type="text" name="title" class="form-control form-control-sm" value="{{ $doc->title }}" required>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">ปีงบประมาณ</label>
                                                    <input type="number" name="fiscal_year" class="form-control form-control-sm" min="2000" max="3000" value="{{ $doc->fiscal_year }}">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <label class="form-label">ไตรมาส (ถ้ามี)</label>
                                                    <select name="report_quarter" class="form-select form-select-sm">
                                                        <option value="">-</option>
                                                        <option value="1" @selected($doc->report_quarter == 1)>ไตรมาส 1</option>
                                                        <option value="2" @selected($doc->report_quarter == 2)>ไตรมาส 2</option>
                                                        <option value="3" @selected($doc->report_quarter == 3)>ไตรมาส 3</option>
                                                        <option value="4" @selected($doc->report_quarter == 4)>ไตรมาส 4</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <label class="form-label">หน่วยงาน/เจ้าของเอกสาร</label>
                                                    <input type="text" name="agency" class="form-control form-control-sm" value="{{ $doc->agency }}">
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <label class="form-label">วันที่เผยแพร่</label>
                                                    <input type="date" name="published_at" class="form-control form-control-sm" value="{{ optional($doc->published_at)->format('Y-m-d') }}">
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <label class="form-label">ลำดับแสดงผล</label>
                                                    <input type="number" name="sort_order" class="form-control form-control-sm" min="0" value="{{ $doc->sort_order }}">
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">อัปโหลดไฟล์ใหม่ (ถ้าต้องการ)</label>
                                                    <input type="file" name="file" class="form-control form-control-sm" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                                </div>
                                                <div class="col-12 col-md-2 d-flex align-items-end">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="is_active" id="edit-is-active-{{ $doc->id }}" value="1" @checked($doc->is_active)>
                                                        <label class="form-check-label" for="edit-is-active-{{ $doc->id }}">แสดงผล</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm"><i class="bx bx-save me-1"></i>อัปเดต</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted text-center">ยังไม่มีเอกสาร</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $documents->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .swal-chakra,
    .swal-chakra * {
        font-family: 'Chakra Petch', sans-serif;
    }
</style>

@endsection
