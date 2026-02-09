@extends('webaru_bs5/layout')
@section('content')

<section class="breadcrumbs-area bg-3 ptb-50 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title announcement-page-title">ประกาศย้อนหลัง</h2>
                    <ul>
                        <li><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                        <li>ประชาสัมพันธ์</li>
                        <li>ประกาศย้อนหลัง</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="announcement-archive-area aru_tab-area pt-60 pb-80">
    <div class="container">
        <div class="section-title text-center mb-30">
            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru">
            <h1>ประกาศย้อนหลัง</h1>
            <p>แสดงข้อมูลย้อนหลังแยกตามหมวดประกาศ</p>
            <div class="separator my mtb-15">
                <i class="icofont icofont-hat-alt"></i>
            </div>
        </div>

        @if($tabCategories->count())
            <div class="announcement-category-chips mb-30">
                @foreach($tabCategories as $category)
                    <a
                        href="{{ route('announcement.index', ['category' => $category->id]) }}"
                        class="announcement-chip {{ (int) $selectedCategoryId === (int) $category->id ? 'is-active' : '' }}"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        @php
            $dayClasses = ['day-sun', 'day-mon', 'day-tue', 'day-wed', 'day-thu', 'day-fri', 'day-sat'];
        @endphp

        @php
            $items = collect($announcementItems->items());
        @endphp

        <article class="aru-tab-list pt-20 pb-100 announcement-list-wrap" style="border-bottom: none !important;">
            <ul class="list-unstyled announcement-list" style="margin-top: 10px;">
                @forelse($items->take(10) as $item)
                    @php
                        $date = $item->created_at ?: $item->updated_at;
                        $dayClass = $date
                            ? $dayClasses[$date->dayOfWeek]
                            : $dayClasses[0];
                        if ($date) {
                            $date->locale('th');
                        }
                        $dayText = $date
                            ? $date->isoFormat('D MMMM')
                            : '';
                        $yearText = $date ? (int) $date->format('Y') + 543 : '';
                        $fileUrl = $item->files
                            ? asset('storage/2025_webaru_home_tab/'.$item->files)
                            : '#';
                    @endphp
                    <li class="listTopic {{ $dayClass }}">
                        <div class="dayTopic {{ $dayClass }}">
                            <div class="day">{{ $dayText }}</div>
                            <div class="year">{{ $yearText }}</div>
                        </div>
                        <div class="topic-text">
                            <h4><a href="{{ $fileUrl }}" target="_blank">{{ $item->title }}</a></h4>
                            <p>โดย. งานทรัพยากรบุคคล เวลา {{ $date ? $date->setTimezone('Asia/Bangkok')->format('H:i:s').' น.' : '' }}</p>
                        </div>
                    </li>
                @empty
                    <li class="listTopic day-sun">
                        <div class="topic-text">
                            <h4>ไม่มีข้อมูลประกาศ</h4>
                        </div>
                    </li>
                @endforelse
            </ul>
        </article>

        @if($announcementItems->hasPages())
            <div class="announcement-pagination mt-30">
                {{ $announcementItems->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</section>

<style>
    .announcement-page-title {
        font-size: 30px;
    }

    .announcement-archive-area .section-title h1 {
        font-family: 'Sarabun', sans-serif;
    }

    .announcement-category-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .announcement-chip {
        border: 1px solid #d7d7d7;
        border-radius: 999px;
        padding: 8px 14px;
        color: #474747;
        font-weight: 600;
        transition: all .2s ease;
    }

    .announcement-chip:hover {
        border-color: #7f1827;
        color: #7f1827;
    }

    .announcement-chip.is-active {
        background: #7f1827;
        border-color: #7f1827;
        color: #fff;
    }

    .announcement-list-wrap {
        background: #fff;
        border: 1px solid #e3d7d9;
        border-radius: 12px;
        padding: 18px 20px 30px;
        box-shadow: 0 12px 28px rgba(43, 13, 18, 0.12);
    }

    .announcement-archive-area.aru_tab-area .aru-tab-list.announcement-list-wrap {
        padding: 18px 20px 42px;
        margin-bottom: 0;
    }

    .announcement-list {
        margin-top: 10px;
        margin-bottom: 0;
    }

    .announcement-pagination nav {
        display: flex;
        justify-content: center;
    }

    .announcement-pagination .pagination {
        margin-bottom: 0;
    }

    .announcement-pagination .page-link {
        color: #7f1827;
        border-color: #ead7da;
    }

    .announcement-pagination .page-item.active .page-link {
        background: #7f1827;
        border-color: #7f1827;
    }
</style>

@endsection
