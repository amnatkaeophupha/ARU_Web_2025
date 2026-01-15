@extends('webaru_bs3/home_layout')

@section('content')
    {{-- Breadcrumb --}}
    <section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumbs">
                        <h2 class="page-title" style="font-size:30px;">ประกาศผลการรับเข้า</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Page Styles --}}
    <style>
        /* ========= File list (Download) ========= */
        .file-list .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            padding: 10px 15px;
        }

        .file-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #333;
        }

        .file-meta .file-icon {
            font-size: 16px;
            color: #2c3e50;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-family: 'Chakra Petch', sans-serif;
            font-size: 12px;
            padding: 6px 12px;
            /* width: 140px;  // ถ้าต้องการให้ปุ่มกว้างเท่ากัน */
        }

        .file-list .no-files {
            color: #777;
            text-align: center;
            padding: 12px 15px;
        }
        .file-list-numbered {
            margin: 0;
            padding-left: 18px;
        }
        .file-list-numbered li {
            margin-bottom: 6px;
        }
        .file-list-numbered li:last-child {
            margin-bottom: 0;
        }
        .file-list-numbered a {
            color: #1b5e20;
            font-weight: 600;
        }

        /* ========= Detail section ========= */
        .detail-main-title {
            font-size: 20px;
            margin-bottom: 20px;
            margin-top: 40px;
            font-weight: 600;
            color: #2c3e50;
        }

        .schedule-card,
        .description-card {
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            padding: 14px;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 16px;
            margin-bottom: 12px;
            color: #2c3e50;
        }

        .card-title .fa {
            margin-right: 8px;
            color: #20a487;
        }

        .schedule-text {
            font-size: 14px;
            color: #444;
            padding: 8px;
        }

        /* ========= Description box ========= */
        .news-details-all-area {
            background: #fafafa;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            line-height: 1.7;
            padding: 10px;

            height: auto;
            max-height: none;
            overflow: visible;
        }

        .news-details-all-area img {
            max-width: 100%;
            height: auto;
            display: block;
        }
        /* ========= Admit result  ========= */
        .admit-results-title {
            font-size: 22px;
            font-weight: 600;
            color: #1f2d3d;
            letter-spacing: 0.2px;
            margin-bottom: 18px;
        }
        .admit-faculty-card {
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            padding: 14px;
            margin-bottom: 28px;
            border-left: 4px solid #20a487;
        }
        .admit-faculty-name {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .admit-faculty-name p {
            margin: 0;
            padding: 0;
        }
        .admit-comment {
            background: #eef9f6;
            border: 1px solid #d7f0ea;
            border-radius: 4px;
            padding: 8px 10px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        .admit-comment p {
            margin-bottom: 6px;
        }
        .admit-comment p:last-child {
            margin-bottom: 0;
        }
        .table-admit th,
        .table-admit td {
            font-size: 14px;
            vertical-align: middle;
        }
        .table-admit th {
            background: #f4f7f6;
        }
        .admit-file-link {
            color: #1b5e20;
            font-weight: 600;
        }
        .admit-empty {
            color: #777;
            text-align: center;
            padding: 12px;
        }
        body,
        h1, h2, h3, h4, h5, h6,
        p, span, div, ul, li, a, table {
            font-family: 'Chakra Petch', sans-serif;
        }
        /* ========= Responsive ========= */
        @media (max-width: 767px) {
            .file-list .list-group-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-download {
                width: 100%;
            }
        }
    </style>
    {{-- Schedule + Description --}}
    <section class="news-details-area pt-10 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-main-title">{{ $cycle->title }}</div>
                    <div class="news-details-all gray-bg" style="padding-bottom:10px;padding-top:30px;">
                        <div class="row schedule-wrapper">
                            {{-- file upload detail --}}
                            <div class="col-md-12">
                                <div class="schedule-card">
                                    <h4 class="card-title">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        เอกสารประกาศผลการคัดเลือก
                                    </h4>
                                    <div class="schedule-text">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-admit">
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
                                                                <a class="btn btn-success btn-xs btn-download"
                                                                   href="{{ Storage::url($file->file_path) }}"
                                                                   target="_blank"
                                                                   rel="noopener">
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                    ดาวน์โหลด
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="no-files">ยังไม่มีเอกสารแนบ</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Schedule --}}
                            @if(!empty($cycle->schedules))
                                <div class="col-md-12">
                                    <div class="schedule-card">
                                        <h4 class="card-title">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            กำหนดการ
                                        </h4>

                                        <div class="schedule-text">
                                            {!! html_entity_decode($cycle->schedules) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- Description --}}
                            @if(!empty($cycle->description))
                                <div class="col-md-12">
                                    <div class="description-card">
                                        <h4 class="card-title" style="font-size: 18px; font-weight: 600;">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            คำอธิบาย
                                        </h4>

                                        <div class="news-details-all-area pt-20 pl-20 pr-20">
                                            {!! html_entity_decode($cycle->description) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div> {{-- /.schedule-wrapper --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

      <section class="lecturers-area pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="admit-results-title">รายชื่อผู้ผ่านการคัดเลือกตามคณะและสาขา</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
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
                            <div class="admit-faculty-card" style="border-left-color: {{ $facultyColor }};">
                                <div class="admit-faculty-name" style="color: {{ $facultyColor }};">
                                    {{ $faculty->faculty_name }}
                                </div>

                                @if($faculty->viewComments->isNotEmpty())
                                    @foreach($faculty->viewComments as $comment)
                                        <div class="admit-comment" style="padding-bottom:10px; background-color:#f9f9f9; border-radius:4px; margin-bottom:10px;">
                                            {!! $comment->comment !!}
                                        </div>
                                    @endforeach
                                @endif

                                @if($programsWithViews->isNotEmpty())
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-admit">
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
                                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                                    ดาวน์โหลด
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
            </div>
        </div>
    </section>

@endsection
