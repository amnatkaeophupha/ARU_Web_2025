@extends('webaru_bs5/layout')
@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title aru-news-page-title">ARU News ย้อนหลัง</h2>
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                        <li>ประชาสัมพันธ์</li>
                        <li>ARU News ย้อนหลัง</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="aru-news-archive-area pt-60 pb-80">
    <div class="container">
        <div class="aru-news-archive-head mb-40">
            <div class="aru-news-archive-intro">
                <h3 class="aru-news-archive-title">คลังเอกสารข่าวประชาสัมพันธ์</h3>
                <p class="aru-news-archive-desc">เลือกดูข่าว ARU News ย้อนหลัง แยกตามปี และเปิดอ่านเอกสารฉบับเต็มได้ทันที</p>
            </div>
            <div class="aru-news-archive-filter">
                <form method="GET" action="{{ route('aru_news') }}" class="aru-news-filter-form">
                    <label for="year" class="aru-news-filter-label">ปีงบประมาณ/ปีเผยแพร่</label>
                    <select id="year" name="year" class="aru-news-filter-select" onchange="this.form.submit()">
                        <option value="">ทั้งหมด</option>
                        @foreach($yearOptions as $yearOption)
                            @php
                                $yearCe = (int) $yearOption;
                                $yearBe = $yearCe + 543;
                            @endphp
                            <option value="{{ $yearCe }}" {{ (string) $year === (string) $yearCe ? 'selected' : '' }}>
                                {{ $yearBe }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        @if($newsItems->count())
            <div class="row">
                @foreach($newsItems as $news)
                    @php
                        $title = trim((string) ($news->title ?? ''));
                        $displayTitle = $title !== '' ? $title : 'ARU News';
                        $createdAt = $news->created_at;
                        $thaiMonths = [
                            1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.', 5 => 'พ.ค.', 6 => 'มิ.ย.',
                            7 => 'ก.ค.', 8 => 'ส.ค.', 9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.',
                        ];
                        $publishDate = '-';
                        $publishYearThai = '-';
                        if ($createdAt) {
                            $monthNumber = (int) $createdAt->format('n');
                            $thaiYear = (int) $createdAt->format('Y') + 543;
                            $publishDate = $createdAt->format('d').' '.($thaiMonths[$monthNumber] ?? '').' '.$thaiYear;
                            $publishYearThai = $thaiYear;
                        }
                        $pdfUrl = !empty($news->files)
                            ? asset('storage/2025_webaru_home_arunews/'.$news->files)
                            : null;
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        <article class="aru-news-card h-100">
                            <div class="aru-news-card-head">
                                <span class="aru-news-card-badge">{{ $publishYearThai }}</span>
                                <p class="aru-news-card-date mb-0">
                                    <i class="icofont icofont-ui-calendar"></i>
                                    {{ $publishDate ?: '-' }}
                                </p>
                            </div>
                            <div class="aru-news-card-preview">
                                @if($pdfUrl)
                                    <canvas
                                        class="aru-news-pdf-canvas"
                                        data-pdf="{{ $pdfUrl }}"
                                        data-scale="0.9"
                                        aria-label="ตัวอย่างเอกสาร {{ $displayTitle }}"
                                    ></canvas>
                                    <div class="aru-news-preview-fallback">กำลังโหลดตัวอย่างเอกสาร...</div>
                                @else
                                    <div class="aru-news-preview-fallback">ไม่พบไฟล์เอกสารสำหรับแสดงตัวอย่าง</div>
                                @endif
                            </div>
                            <h4 class="aru-news-card-title">{{ $displayTitle }}</h4>
                            <div class="aru-news-card-file">
                                <i class="icofont icofont-file-pdf"></i>
                                <span>{{ $news->files ?: 'ไม่พบไฟล์เอกสาร' }}</span>
                            </div>
                            <div class="aru-news-card-actions">
                                @if($pdfUrl)
                                    <a class="button extra-small arunew-read-btn" href="{{ $pdfUrl }}" target="_blank" rel="noopener">
                                        <span>เปิดเอกสาร</span>
                                    </a>
                                @else
                                    <span class="aru-news-card-unavailable">ไฟล์ไม่พร้อมใช้งาน</span>
                                @endif
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            @if($newsItems->hasPages())
                <div class="aru-news-paging text-center mt-30">
                    @if($newsItems->onFirstPage())
                        <span class="aru-page-btn disabled">ก่อนหน้า</span>
                    @else
                        <a class="aru-page-btn" href="{{ $newsItems->previousPageUrl() }}">ก่อนหน้า</a>
                    @endif

                    @php
                        $currentPage = $newsItems->currentPage();
                        $lastPage = $newsItems->lastPage();
                        $pages = [];

                        if ($lastPage <= 7) {
                            $pages = range(1, $lastPage);
                        } else {
                            $pages[] = 1;

                            if ($currentPage > 3) {
                                $pages[] = '...';
                            }

                            $start = max(2, $currentPage - 1);
                            $end = min($lastPage - 1, $currentPage + 1);
                            for ($i = $start; $i <= $end; $i++) {
                                $pages[] = $i;
                            }

                            if ($currentPage < $lastPage - 2) {
                                $pages[] = '...';
                            }

                            $pages[] = $lastPage;
                            $pages = array_values(array_unique($pages, SORT_REGULAR));
                        }
                    @endphp

                    <div class="aru-page-numbers" aria-label="pagination">
                        @foreach($pages as $page)
                            @if($page === '...')
                                <span class="aru-page-dots">...</span>
                            @elseif((int) $page === $currentPage)
                                <span class="aru-page-num is-active">{{ $page }}</span>
                            @else
                                <a class="aru-page-num" href="{{ $newsItems->url($page) }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>

                    @if($newsItems->hasMorePages())
                        <a class="aru-page-btn" href="{{ $newsItems->nextPageUrl() }}">ถัดไป</a>
                    @else
                        <span class="aru-page-btn disabled">ถัดไป</span>
                    @endif
                </div>
            @endif
        @else
            <div class="aru-news-empty text-center">
                <h4>ยังไม่มีรายการข่าว{{ $year ? ' ปี '.($year + 543) : '' }}</h4>
                <p>กรุณาเลือกปีอื่น หรือกลับมาตรวจสอบอีกครั้งภายหลัง</p>
            </div>
        @endif
    </div>
</section>

<style>
    .breadcrumbs-area,
    .aru-news-archive-area,
    .aru-news-archive-area * {
        font-family: 'Chakra Petch', sans-serif;
    }

    .aru-news-page-title {
        font-size: 30px;
    }

    .aru-news-archive-head {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 20px;
        align-items: end;
    }

    .aru-news-archive-title {
        font-size: 30px;
        margin-bottom: 10px;
        color: #7f1827;
    }

    .aru-news-archive-desc {
        margin-bottom: 0;
        color: #616161;
    }

    .aru-news-filter-form {
        min-width: 250px;
    }

    .aru-news-filter-label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #2d2d2d;
    }

    .aru-news-filter-select {
        border: 1px solid #d7d7d7;
        height: 44px;
        border-radius: 8px;
        padding: 0 12px;
        width: 100%;
        background: #fff;
    }

    .aru-news-card {
        border: 1px solid #ececec;
        border-radius: 14px;
        padding: 22px;
        background: linear-gradient(180deg, #fff 0%, #fff8f8 100%);
        display: flex;
        flex-direction: column;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .aru-news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    }

    .aru-news-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        gap: 12px;
    }

    .aru-news-card-badge {
        background: #7f1827;
        color: #fff;
        font-size: 12px;
        padding: 6px 10px;
        border-radius: 999px;
        font-weight: 600;
    }

    .aru-news-card-date {
        font-size: 13px;
        color: #666;
        white-space: nowrap;
    }

    .aru-news-card-date i {
        margin-right: 4px;
    }

    .aru-news-card-title {
        font-size: 20px;
        line-height: 1.5;
        margin-bottom: 8px;
        margin-top: 14px;
        color: #202020;
        min-height: 60px;
    }

    .aru-news-card-preview {
        border: 1px solid #e9e9e9;
        border-radius: 10px;
        overflow: hidden;
        background: #fafafa;
        min-height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .aru-news-pdf-canvas {
        display: none;
        width: 100%;
        height: auto;
    }

    .aru-news-preview-fallback {
        font-size: 14px;
        color: #8a8a8a;
        text-align: center;
        padding: 15px;
    }

    .aru-news-card-file {
        margin-top: 0;
        font-size: 14px;
        color: #5f5f5f;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        word-break: break-all;
    }

    .aru-news-card-file i {
        color: #c21f32;
        font-size: 18px;
    }

    .aru-news-card-actions .button {
        margin-bottom: 0;
    }

    .aru-news-card-unavailable {
        color: #a7a7a7;
        font-size: 14px;
        font-style: italic;
    }

    .aru-news-paging {
        display: flex;
        gap: 12px;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .aru-page-btn {
        min-width: 96px;
        text-align: center;
        padding: 9px 14px;
        border-radius: 999px;
        border: 1px solid #7f1827;
        color: #7f1827;
        font-weight: 600;
    }

    .aru-page-btn:hover {
        background: #7f1827;
        color: #fff;
    }

    .aru-page-btn.disabled {
        pointer-events: none;
        opacity: .45;
    }

    .aru-page-status {
        font-weight: 600;
        color: #3b3b3b;
    }

    .aru-page-numbers {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .aru-page-num {
        min-width: 40px;
        height: 40px;
        border-radius: 999px;
        border: 1px solid #d8d8d8;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #4b4b4b;
        font-weight: 600;
        padding: 0 10px;
    }

    .aru-page-num:hover {
        border-color: #7f1827;
        color: #7f1827;
    }

    .aru-page-num.is-active {
        background: #7f1827;
        border-color: #7f1827;
        color: #fff;
    }

    .aru-page-dots {
        color: #8a8a8a;
        font-weight: 600;
        padding: 0 4px;
    }

    .aru-news-empty {
        border: 1px dashed #d9d9d9;
        border-radius: 14px;
        padding: 60px 20px;
        background: #fff;
    }

    @media (max-width: 991px) {
        .aru-news-page-title {
            font-size: 26px;
        }

        .aru-news-archive-title {
            font-size: 26px;
        }

        .aru-news-card-title {
            min-height: auto;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.pdfjsLib) {
            return;
        }

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
        var canvases = document.querySelectorAll('.aru-news-pdf-canvas[data-pdf]');

        canvases.forEach(function (canvas) {
            var pdfUrl = canvas.getAttribute('data-pdf');
            var fallback = canvas.parentElement.querySelector('.aru-news-preview-fallback');
            var scale = parseFloat(canvas.getAttribute('data-scale')) || 0.9;

            if (!pdfUrl) {
                if (fallback) {
                    fallback.textContent = 'ไม่พบไฟล์เอกสารสำหรับแสดงตัวอย่าง';
                }
                return;
            }

            pdfjsLib.getDocument(pdfUrl).promise.then(function (pdf) {
                return pdf.getPage(1).then(function (page) {
                    var viewport = page.getViewport({ scale: scale });
                    var dpr = window.devicePixelRatio || 1;
                    var context = canvas.getContext('2d');

                    canvas.width = Math.floor(viewport.width * dpr);
                    canvas.height = Math.floor(viewport.height * dpr);
                    canvas.style.width = '100%';
                    canvas.style.height = 'auto';
                    context.setTransform(dpr, 0, 0, dpr, 0, 0);

                    return page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;
                });
            }).then(function () {
                canvas.style.display = 'block';
                if (fallback) {
                    fallback.style.display = 'none';
                }
            }).catch(function () {
                if (fallback) {
                    fallback.textContent = 'ไม่สามารถแสดงตัวอย่างเอกสารได้';
                }
            });
        });
    });
</script>

@endsection
