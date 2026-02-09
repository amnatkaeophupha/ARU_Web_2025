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
                    <h2 class="page-title gallery-past-page-title">คลังภาพกิจกรรมย้อนหลัง</h2>
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                        <li>Photo Gallery</li>
                        <li>คลังภาพย้อนหลัง</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery-past-area gray-bg pt-60 pb-80">
    <div class="container">
        <div class="section-title text-center mb-35">
            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru">
            <h1 class="uppercase">Photo Gallery Archive</h1>
            <p>รวมภาพกิจกรรมมหาวิทยาลัยย้อนหลัง แยกตามปีเผยแพร่</p>
            <div class="separator my mtb-15">
                <i class="icofont icofont-camera"></i>
            </div>
        </div>

        <div class="gallery-filter-wrap mb-50">
            <form method="GET" action="{{ route('gallery.past') }}" class="gallery-filter-form">
                <label for="year" class="gallery-filter-label">ปีเผยแพร่ (พ.ศ.)</label>
                <select id="year" name="year" class="gallery-filter-select" onchange="this.form.submit()">
                    <option value="">ทั้งหมด</option>
                    @foreach($yearOptions as $yearOption)
                        @php
                            $yearRaw = (int) $yearOption;
                            $yearBe = $yearRaw >= 2400 ? $yearRaw : $yearRaw + 543;
                        @endphp
                        <option value="{{ $yearRaw }}" {{ (string) $year === (string) $yearRaw ? 'selected' : '' }}>
                            {{ $yearBe }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="row">
            @php
                $thaiMonths = [
                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน',
                    5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม',
                    9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม',
                ];
            @endphp
            @forelse($galleries as $gallery)
                @php
                    $galleryImagePath = str_starts_with($gallery->image ?? '', '2025_webaru_home_gallery/')
                        ? $gallery->image
                        : '2025_webaru_home_gallery/'.($gallery->image ?? '');
                    $galleryDate = $gallery->start_date ? \Carbon\Carbon::parse($gallery->start_date) : null;
                    $displayYear = null;
                    if ($galleryDate) {
                        $rawYear = (int) $galleryDate->format('Y');
                        $displayYear = $rawYear >= 2400 ? $rawYear : $rawYear + 543;
                    }
                    $galleryDateText = $galleryDate
                        ? $galleryDate->format('d').' '.($thaiMonths[(int) $galleryDate->format('m')] ?? '').' พ.ศ. '.$displayYear
                        : '-';
                    $imageUrl = !empty($gallery->image) ? asset('storage/'.$galleryImagePath) : url('webaru_bs5/images/blog/1.jpg');
                @endphp
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="webaru_gallery-area gallery-past-card">
                        <div class="news-img">
                            <img src="{{ $imageUrl }}" alt="{{ $gallery->title ?? '' }}">
                            <div class="news-date navy-bg">
                                <div class="blog-meta-2">
                                    <span class="published3">
                                        <i class="icofont icofont-ui-calendar"></i>
                                        {{ $galleryDateText }}
                                    </span>
                                    <span class="published3 ms-2">
                                        <i class="icofont icofont-eye-alt"></i>
                                        {{ number_format((int) ($gallery->view_count ?? $gallery->views ?? 0)) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="img-text gray-bg">
                            <p>{{ $gallery->title }}</p>
                            <a class="button extra-small" href="{{ route('gallery.view', $gallery->id) }}">
                                <span>ดูเพิ่มเติม</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="gallery-empty-state text-center">
                        <h4>ไม่พบข้อมูลภาพกิจกรรม{{ $year ? ' ปี '.($year >= 2400 ? $year : $year + 543) : '' }}</h4>
                        <p>กรุณาเลือกปีอื่น หรือกลับมาตรวจสอบอีกครั้งภายหลัง</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="gallery-past-pagination text-center mt-30">
                @if($galleries->onFirstPage())
                    <span class="gallery-page-btn disabled">ก่อนหน้า</span>
                @else
                    <a class="gallery-page-btn" href="{{ $galleries->previousPageUrl() }}">ก่อนหน้า</a>
                @endif

                <span class="gallery-page-status">หน้า {{ $galleries->currentPage() }} / {{ $galleries->lastPage() }}</span>

                @if($galleries->hasMorePages())
                    <a class="gallery-page-btn" href="{{ $galleries->nextPageUrl() }}">ถัดไป</a>
                @else
                    <span class="gallery-page-btn disabled">ถัดไป</span>
                @endif
            </div>
        @endif
    </div>
</section>

<style>
    .gallery-past-page-title {
        font-size: 30px;
    }

    .gallery-filter-wrap {
        display: flex;
        justify-content: flex-end;
    }

    .gallery-filter-form {
        min-width: 240px;
    }

    .gallery-filter-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .gallery-filter-select {
        width: 100%;
        height: 44px;
        border: 1px solid #d9d9d9;
        border-radius: 8px;
        padding: 0 12px;
        background: #fff;
    }

    .gallery-past-card {
        height: 100%;
        border: 1px solid #ececec;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .gallery-past-card .news-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .gallery-past-card .news-date .blog-meta-2,
    .gallery-past-card .news-date .published3 {
        font-family: 'Chakra Petch', sans-serif;
    }

    .gallery-past-card .img-text {
        min-height: 220px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .gallery-past-card .img-text p {
        width: 100%;
        min-height: 104px;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-past-card .img-text .button {
        align-self: flex-end;
        margin-top: auto;
    }

    .gallery-empty-state {
        border: 1px dashed #d9d9d9;
        border-radius: 12px;
        padding: 50px 20px;
        background: #fff;
    }

    .gallery-past-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .gallery-page-btn {
        min-width: 96px;
        padding: 8px 14px;
        border: 1px solid #7f1827;
        border-radius: 999px;
        color: #7f1827;
        font-weight: 600;
        text-align: center;
    }

    .gallery-page-btn:hover {
        background: #7f1827;
        color: #fff;
    }

    .gallery-page-btn.disabled {
        opacity: .45;
        pointer-events: none;
    }

    .gallery-page-status {
        font-weight: 600;
        color: #3b3b3b;
    }

    @media (max-width: 991px) {
        .gallery-filter-wrap {
            justify-content: center;
        }
    }
</style>


@endsection
