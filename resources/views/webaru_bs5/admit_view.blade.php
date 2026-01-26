@extends('webaru_bs5/layout')
@section('content')

<section class="breadcrumbs-area bg-3 py-5 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title mb-0" style="font-size:30px; font-family:'Sarabun', sans-serif;">ประกาศผลการรับเข้า</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .admit-hero {
        background: #ffffff;
        border: 1px solid #e6e9ef;
        border-radius: 14px;
        box-shadow: 0 10px 24px rgba(0,0,0,.06);
        padding: 18px;
    }
    .admit-title {
        font-size: 22px;
        font-weight: 700;
        color: #1f2d3d;
        margin-bottom: 6px;
    }
    .admit-subtitle {
        color: #6b7280;
        font-size: 14px;
    }
    .admit-section-title {
        font-size: 18px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 12px;
    }
    .admit-card {
        background: #fff;
        border: 1px solid #e6e9ef;
        border-radius: 12px;
        box-shadow: 0 6px 16px rgba(0,0,0,.05);
        padding: 14px;
    }
    .admit-table thead th {
        background: #f4f6f9;
        color: #334155;
        font-weight: 600;
    }
    .admit-table tbody tr:hover {
        background: #f8fafc;
    }
    .admit-file-link {
        color: #1b5e20;
        font-weight: 600;
        text-decoration: none;
    }
    .admit-file-link:hover {
        text-decoration: underline;
    }
    .admit-comment {
        background: #f7fbff;
        border: 1px solid #e1ecf7;
        border-radius: 8px;
        padding: 10px 12px;
        color: #374151;
        margin-bottom: 10px;
    }
    .admit-empty {
        color: #6b7280;
        text-align: center;
        padding: 12px;
    }
</style>

<section class="py-4">
    <div class="container">
        <div class="admit-hero">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <div class="admit-title">{{ $cycle->title ?? '-' }}</div>
                    <div class="admit-subtitle">ปีการศึกษา: {{ $cycle->year ?? '-' }}</div>
                </div>
                <a class="btn btn-outline-secondary btn-sm" href="{{ url('/admit') }}">
                    <i class="fa fa-angle-left"></i> กลับหน้ารายการ
                </a>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="admit-card">
                    <div class="admit-section-title"><i class="fa fa-file me-1"></i> เอกสารประกาศผลการคัดเลือก</div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle admit-table mb-0">
                            <thead>
                                <tr>
                                    <th style="width:70px;" class="text-center">ลำดับ</th>
                                    <th>ชื่อเอกสาร</th>
                                    <th style="width:140px;" class="text-center">ดาวน์โหลด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cycle->fileDetails as $file)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $file->file_name ?? 'เอกสารแนบ' }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success btn-sm"
                                               href="{{ Storage::url($file->file_path) }}"
                                               target="_blank"
                                               rel="noopener">
                                                <i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลด
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="admit-empty">ยังไม่มีเอกสารแนบ</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if(!empty($cycle->schedules))
                <div class="col-12">
                    <div class="admit-card">
                        <div class="admit-section-title"><i class="fa fa-calendar me-1"></i> กำหนดการ</div>
                        <div class="text-muted">{!! html_entity_decode($cycle->schedules) !!}</div>
                    </div>
                </div>
            @endif

            @if(!empty($cycle->description))
                <div class="col-12">
                    <div class="admit-card">
                        <div class="admit-section-title"><i class="fa fa-file-text-o me-1"></i> คำอธิบาย</div>
                        <div class="text-muted">{!! html_entity_decode($cycle->description) !!}</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="admit-section-title mb-0">รายชื่อผู้ผ่านการคัดเลือกตามคณะและสาขา</div>
        </div>

        @if(!empty($faculties) && $faculties->count() > 0)
            @foreach($faculties as $faculty)
                @php
                    $programsWithViews = $faculty->programs->filter(function ($program) {
                        return $program->admitViews->isNotEmpty();
                    });
                    $facultyColor = match ($faculty->faculty_name) {
                        'คณะครุศาสตร์' => '#47B5E0',
                        'คณะมนุษยศาสตร์และสังคมศาสตร์' => '#1C4577',
                        'คณะวิทยาศาสตร์และเทคโนโลยี' => '#FDD110',
                        'คณะวิทยาการจัดการ' => '#7C6BAE',
                        default => '#20a487',
                    };
                @endphp

                <div class="admit-card mb-4" style="border-left: 4px solid {{ $facultyColor }};">
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <h5 class="mb-0" style="color: {{ $facultyColor }};">{{ $faculty->faculty_name }}</h5>
                    </div>

                    @if($faculty->viewComments->isNotEmpty())
                        @foreach($faculty->viewComments as $comment)
                            <div class="admit-comment">{!! $comment->comment !!}</div>
                        @endforeach
                    @endif

                    @if($programsWithViews->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle admit-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:120px;" class="text-center">รหัสสาขา</th>
                                        <th>ชื่อสาขา</th>
                                        <th style="width:180px;" class="text-center">ประกาศผล</th>
                                        <th style="width:200px;">หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programsWithViews as $program)
                                        @php
                                            $view = $program->admitViews->first();
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $program->program_code }}</td>
                                            <td>{{ $program->program_name }}</td>
                                            <td class="text-center">
                                                @if($view && $view->files)
                                                    <a class="admit-file-link"
                                                       href="{{ asset('storage/'.$view->files) }}"
                                                       target="_blank"
                                                       rel="noopener">
                                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> ดาวน์โหลด
                                                    </a>
                                                @else
                                                    <span class="text-muted">ยังไม่มีประกาศ</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($view && $view->comment)
                                                    {{ $view->comment }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="admit-empty">ยังไม่มีรายชื่อผู้ผ่านการคัดเลือกในขณะนี้</div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="admit-empty">ยังไม่มีข้อมูลคณะในขณะนี้</div>
        @endif
    </div>
</section>

@endsection
