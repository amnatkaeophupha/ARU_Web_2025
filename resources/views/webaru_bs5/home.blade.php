@extends('webaru_bs5/layout')
@section('content')


        <!-- Start of slider area -->
        <div class="slider-area">
            <div class="slider-active">
                @forelse($sliders as $slider)
                    @php
                        $sliderImagePath = str_starts_with($slider->images ?? '', '2025_webaru_home_sliders/')
                            ? $slider->images
                            : '2025_webaru_home_sliders/'.($slider->images ?? '');
                    @endphp
                    <div class="slider-all">
                        <img src="{{ asset('storage/'.$sliderImagePath) }}" alt="">
                        <div class="slider-text-wrapper">
                            <div class="d-flex h-100 align-items-center justify-content-center">
                                <div class="slider-text animated" >
                                    @if(!empty($slider->topic))
                                        <h1 style="font-family:'Sarabun', sans-serif;">{{ $slider->topic }}</h1>
                                    @endif
                                    @if(!empty($slider->title))
                                        <p style="font-family: 'Sarabun', sans-serif; margin-top: 15px;">{{ $slider->title }}</p>
                                    @endif
                                    @if(!empty($slider->link_url))
                                        <a class="button extra-small mb-20" href="{{ $slider->link_url }}">
                                            <span>เพิ่มเติม</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="slider-all">
                        <img src="{{ url('webaru_bs5/images/slider/1.jpg') }}" alt="">
                    </div>
                @endforelse
            </div>
            <div class="slider-vision-area">
                <div class="container-fluid">
                    <p class="slider-vision mb-0 text-center">
                        <strong>วิสัยทัศน์:</strong>
                        เป็นมหาวิทยาลัยราชภัฏที่มีความเป็นเลิศด้านการพัฒนานวัตกรรมที่สอดคล้องกับการศึกษา และพัฒนาท้องถิ่นอย่างยั่งยืนด้วยทุนทางวัฒนธรรมแห่งเมืองมรดกโลก
                        <span class="slider-vision__year">ภายในปี 2570</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- End of slider area -->

        <!-- Start page complaint_center content -->
        <section class="complaint_center-area gray-bg ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-9" style="padding:0;">
                        <div class="service-all white-bg" style="padding-bottom:40px;">
                            <div class="complaint-head">
                                <div>
                                    <h2 class="service-title-th" style="margin-bottom: 6px;">ศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ</h2>
                                    <p class="complaint-sub">เข้าสู่หน้าหลักเพื่อดูรายละเอียดทั้งหมดและ<strong class="complaint-sub-highlight">ติดตามสถานะเรื่องร้องเรียน</strong></p>
                                </div>
                                <a class="button extra-small complaint-home-btn" href="{{ route('complaint.index') }}">
                                    <span>ไปหน้าหลัก</span>
                                </a>
                            </div>
                            @php
                                $complaintNewCounts = $complaintNewCounts ?? [];
                                $faqPendingCount = (int) ($faqPendingCount ?? 0);
                                $formatBadgeCount = function ($count) {
                                    $count = (int) $count;
                                    return $count > 99 ? '99+' : (string) $count;
                                };
                            @endphp
                            <div class="row complaint-cards">
                                <div class="col-md-6 col-sm-6">
                                    <a class="complaint-card" href="{{ route('complaint.create', ['type' => 'grievance']) }}">
                                        @canany(['complaints.dashboard.view', 'complaints.general.manage'])
                                            @php $newCount = (int) ($complaintNewCounts['GRIEVANCE'] ?? 0); @endphp
                                            @if($newCount > 0)
                                                <span class="complaint-card-badge complaint-card-badge--grievance" title="เรื่องร้องเรียนร้องทุกข์เข้าใหม่ {{ $newCount }} เรื่อง" aria-label="เรื่องร้องเรียนร้องทุกข์เข้าใหม่ {{ $newCount }} เรื่อง">
                                                    ใหม่ {{ $formatBadgeCount($newCount) }}
                                                </span>
                                            @endif
                                        @endcanany
                                        <div class="complaint-card-icon">
                                            <i class="icofont icofont-ui-message"></i>
                                        </div>
                                        <div class="complaint-card-body">
                                            <h3>รับเรื่องร้องเรียนร้องทุกข์</h3>
                                            <p>แจ้งปัญหา/ข้อร้องเรียนสำคัญ เพื่อให้มหาวิทยาลัยรับทราบและดำเนินการอย่างเหมาะสม</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a class="complaint-card" href="{{ route('faq.index') }}">
                                        @can('webaru.faq.manage')
                                            @if($faqPendingCount > 0)
                                                <span class="complaint-card-badge complaint-card-badge--faq" title="คำถามเข้าใหม่ (รอตรวจสอบ) {{ $faqPendingCount }} รายการ" aria-label="คำถามเข้าใหม่ (รอตรวจสอบ) {{ $faqPendingCount }} รายการ">
                                                    ใหม่ {{ $formatBadgeCount($faqPendingCount) }}
                                                </span>
                                            @endif
                                        @endcan
                                        <div class="complaint-card-icon">
                                            <i class="icofont icofont-ui-chat"></i>
                                        </div>
                                        <div class="complaint-card-body">
                                            <h3>ถามตอบข้อสงสัย</h3>
                                            <p>ค้นหาคำตอบ หรือส่งคำถาม เพื่อให้ข้อมูลที่ถูกต้องและโปร่งใสเกี่ยวกับการดำเนินงาน</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a class="complaint-card" href="{{ route('complaint.create', ['type' => 'corruption']) }}">
                                        @canany(['complaints.dashboard.view', 'complaints.general.manage'])
                                            @php $newCount = (int) ($complaintNewCounts['CORRUPTION'] ?? 0); @endphp
                                            @if($newCount > 0)
                                                <span class="complaint-card-badge complaint-card-badge--corruption" title="เรื่องร้องเรียนทุจริตเข้าใหม่ {{ $newCount }} เรื่อง" aria-label="เรื่องร้องเรียนทุจริตเข้าใหม่ {{ $newCount }} เรื่อง">
                                                    ใหม่ {{ $formatBadgeCount($newCount) }}
                                                </span>
                                            @endif
                                        @endcanany
                                        <div class="complaint-card-icon">
                                            <i class="icofont icofont-law-document"></i>
                                        </div>
                                        <div class="complaint-card-body">
                                            <h3>ร้องเรียนทุจริตและประพฤติมิชอบ</h3>
                                            <p>แจ้งเบาะแสทุจริต/ใช้อำนาจโดยมิชอบ เพื่อส่งเสริมธรรมาภิบาลและความโปร่งใส</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <a class="complaint-card" href="{{ route('complaint.create', ['type' => 'opinion']) }}">
                                        @canany(['complaints.dashboard.view', 'complaints.general.manage'])
                                            @php $newCount = (int) ($complaintNewCounts['OPINION'] ?? 0); @endphp
                                            @if($newCount > 0)
                                                <span class="complaint-card-badge complaint-card-badge--opinion" title="ความคิดเห็นเข้าใหม่ {{ $newCount }} เรื่อง" aria-label="ความคิดเห็นเข้าใหม่ {{ $newCount }} เรื่อง">
                                                    ใหม่ {{ $formatBadgeCount($newCount) }}
                                                </span>
                                            @endif
                                        @endcanany
                                        <div class="complaint-card-icon">
                                            <i class="icofont icofont-ui-call"></i>
                                        </div>
                                        <div class="complaint-card-body">
                                            <h3>รับฟังความคิดเห็น</h3>
                                            <p>ส่งข้อเสนอแนะและความคิดเห็น เพื่อร่วมพัฒนาการบริการและการดำเนินงานของมหาวิทยาลัย</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="complaint-contact-card" aria-label="ข้อมูลติดต่อศูนย์รับเรื่องร้องเรียน">
                                        <div class="complaint-contact-card__title">
                                            <span class="complaint-contact-card__title-icon" aria-hidden="true">
                                                <i class="icofont icofont-support"></i>
                                            </span>
                                            <span>ติดต่อศูนย์รับเรื่องร้องเรียน</span>
                                        </div>
                                        <div class="complaint-contact-card__items">
                                            <div class="complaint-contact-card__item">
                                                <span class="complaint-contact-card__item-icon" aria-hidden="true">
                                                    <i class="icofont icofont-phone"></i>
                                                </span>
                                                <div class="complaint-contact-card__item-body">
                                                    <div class="complaint-contact-card__label">โทร.</div>
                                                    <div class="complaint-contact-card__value">
                                                        <a class="complaint-contact-card__link" href="tel:0355276555">035-527-6555</a>
                                                        <span class="complaint-contact-card__meta">ต่อ 1321</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="complaint-contact-card__item">
                                                <span class="complaint-contact-card__item-icon" aria-hidden="true">
                                                    <i class="icofont icofont-email"></i>
                                                </span>
                                                <div class="complaint-contact-card__item-body">
                                                    <div class="complaint-contact-card__label">อีเมล</div>
                                                    <div class="complaint-contact-card__value">
                                                        <a class="complaint-contact-card__link" href="mailto:complaint@aru.ac.th">complaint@aru.ac.th</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="complaint-contact-card__item">
                                                <span class="complaint-contact-card__item-icon" aria-hidden="true">
                                                    <i class="icofont icofont-clock-time"></i>
                                                </span>
                                                <div class="complaint-contact-card__item-body">
                                                    <div class="complaint-contact-card__label">เวลาทำการ</div>
                                                    <div class="complaint-contact-card__value">
                                                        <span class="complaint-contact-card__meta">วันจันทร์–ศุกร์ เวลา 08:30–16:30 น.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding:0;">
                        <div class="service-from navy-bg text-center" style="padding: 17px 15px;">
                            <div class="cp-font" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.18); border-radius: 14px; padding: 20px 14px;">
                                <h3 style="margin: 0 0 10px; font-size: 24px; line-height: 1.35;">สายตรงอธิการบดี</h3>
                                <div style="margin-bottom: 16px;">
                                    <img
                                        src="{{ url('webaru_bs5/aru_images/executives_default.png') }}"
                                        alt="สายตรงอธิการบดี"
                                        class="img-fluid"
                                        style="max-width: 180px; width: 100%; border-radius: 12px; border: 3px solid rgba(255, 255, 255, 0.7); box-shadow: 0 10px 22px rgba(0, 0, 0, 0.25);"
                                    >
                                </div>
                                <p class="president-name">
                                    รศ.ดร.ชูสิทธิ์ ประดับเพ็ชร์
                                </p>
                                <a class="button extra-small" href="{{ route('complaint.create', ['type' => 'direct']) }}" style="padding: 8px 10px; border-radius: 10px;">
                                    <span class="president-cta">ส่งข้อความถึงอธิการบดี</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End page complaint_center content -->

        <!-- Start of arunew area content   -->
        <section class="arunew-area pt-60 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                            <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 arunew-main">
                        @if($mainArunews && $mainArunews->files)
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="arunew-pdf-preview-main" data-pdf="{{ asset('storage/2025_webaru_home_arunews/'.$mainArunews->files) }}" data-scale="1.6" style="display:block; width:100%; height:auto; margin:0 auto;"></canvas>
                                    <div class="text-center mt-3">
                                        <a class="button extra-small arunew-read-btn" href="{{ asset('storage/2025_webaru_home_arunews/'.$mainArunews->files) }}" target="_blank" rel="noopener">
                                            <span>Download</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body text-center text-muted">
                                    ไม่มีข้อมูล
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="arunew-more text-center mt-30 mb-60">
                    <a class="button extra-small arunew-read-btn arunew-more-btn" href="{{ route('aru_news') }}">
                        <span>ดูย้อนหลัง</span>
                    </a>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    if (!window.pdfjsLib) {
                        return;
                    }
                    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                    var canvases = document.querySelectorAll('canvas[data-pdf]');
                    canvases.forEach(function (canvas) {
                        var pdfUrl = canvas.getAttribute('data-pdf');
                        if (!pdfUrl) {
                            return;
                        }
                        var scale = parseFloat(canvas.getAttribute('data-scale')) || 1.4;
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
                                page.render({
                                    canvasContext: context,
                                    viewport: viewport
                                });
                            });
                        });
                    });
                });
            </script>
        </section>
        <!-- End of arunew area content   -->

        <!-- Start of banner carousel area content   -->
        <section class="banner_carousel-area gray-bg pb-50 pt-50">
            <div class="container">
                <div class="row">
                    @forelse($carousels as $carousel)
                        @php
                            $imagePath = str_starts_with($carousel->images ?? '', '2025_webaru_home_carousels/')
                                ? $carousel->images
                                : '2025_webaru_home_carousels/'.($carousel->images ?? '');
                        @endphp
                        <div class="col-md-6">
                            <div class="banner-card" style="margin-bottom: 20px;">
                                <a class="banner-modal-trigger" href="{{ asset('storage/'.$imagePath) }}" data-full="{{ asset('storage/'.$imagePath) }}" data-link="{{ $carousel->image_url ?? '' }}">
                                    <img src="{{ asset('storage/'.$imagePath) }}" alt="ประกาศ">
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="banner-card">
                                <div class="p-4 text-center text-muted">ไม่มีข้อมูล</div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="modal fade" id="bannerModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-body text-center" style="padding: 5px;">
                            <img id="bannerModalImage" src="" alt="ประกาศ" class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <a id="bannerModalOpen" class="button extra-small" href="#" target="_blank" rel="noopener">
                                <span>Open link</span>
                            </a>
                            <a class="button extra-small banner-modal-close-btn" data-bs-dismiss="modal">
                                <span>Close</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of banner carousel area content   -->


        <!-- End of banner carousel area content   -->
        <section class="aru_tab-area pb-80 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">ประชาสัมพันธ์</h1>
                            <p>ประชาสัมพันธ์ข่าวสารมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="tabs">
                            <div class="tab-button-outer">
                                <ul id="tab-button">
                                @foreach($tabCategories as $index => $category)
                                    @php
                                        $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    @endphp
                                    <li><a href="#{{ $tabId }}">{{ $category->name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="tab-select-outer">
                                <select id="tab-select">
                                @foreach($tabCategories as $index => $category)
                                    @php
                                        $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    @endphp
                                    <option value="#{{ $tabId }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            @foreach($tabCategories as $index => $category)
                                @php
                                    $tabId = 'tab' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                    $items = $tabsByCategory[$category->id] ?? collect();
                                    $dayClasses = ['day-sun', 'day-mon', 'day-tue', 'day-wed', 'day-thu', 'day-fri', 'day-sat'];
                                @endphp
                                <div id="{{ $tabId }}" class="tab-contents">
                                    <article class="aru-tab-list pt-20" style="border-bottom: none !important;">
                                        <ul class="list-unstyled" style="margin-top: 10px;">
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
                                    <div class="tab-view-all">
                                        <a href="{{ route('announcement.index', ['category' => $category->id]) }}">ดูทั้งหมด</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="countdown-area bg-1 ptb-110 bg-opacity bg-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-12 text-center">
                        <div class="webaru_video-content">
                            <iframe src="https://www.youtube.com/embed/ylFuHaxHIs8?si=NsR-7OHf5yS-W5hQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="register-from aru-official-card" style="height: 420px;">
                            <div class="aru-official-card_icon" aria-hidden="true">
                                <i class="icofont icofont-social-youtube-play"></i>
                            </div>
                            <h3 class="aru-official-card_title">ARU Official Channel</h3>
                            <p class="aru-official-card_desc">ติดตามช่องทาง YouTube ทางการของมหาวิทยาลัย</p>
                            <a class="button extra-small aru-official-card_btn" href="https://www.youtube.com/@ARU-Official-Channel" target="_blank" rel="noopener noreferrer">
                                <span>ไปที่ YouTube</span>
                            </a>
                            <div class="aru-official-card_url" aria-label="ลิงก์ช่อง YouTube">
                                <i class="icofont icofont-link" aria-hidden="true"></i>
                                <span>https://www.youtube.com/@ARU-Official-Channel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start page Photo Gallery content -->
        <div class="event-area pt-100 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center pt-10 mb-60">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 class="uppercase">Photo Gallery</h1>
                            <p>ภาพกิจกรรมนักศึกษา บุคลากรมหาวิทยาลัยราชภัฏพระนครศรีอยุธยา </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse($galleries as $gallery)
                        @php
                            $galleryImagePath = str_starts_with($gallery->image ?? '', '2025_webaru_home_gallery/')
                                ? $gallery->image
                                : '2025_webaru_home_gallery/'.($gallery->image ?? '');
                            $galleryDate = $gallery->start_date ? \Carbon\Carbon::parse($gallery->start_date) : null;
                            $thaiMonths = [
                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน',
                                5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม',
                                9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม',
                            ];
                            $galleryDateText = $galleryDate
                                ? $galleryDate->format('d') . ' ' . ($thaiMonths[(int) $galleryDate->format('m')] ?? '') . ' พ.ศ. ' . ($galleryDate->year >= 2500 ? $galleryDate->year : $galleryDate->year + 543)
                                : '';
                        @endphp
                        <div class="col-md-4 col-sm-6">
                            <div class="webaru_gallery-area">
                                <div class="news-img">
                                    <img src="{{ asset('storage/'.$galleryImagePath) }}" alt="{{ $gallery->title ?? '' }}" >
                                    <div class="news-date navy-bg">
                                        <div class="blog-meta-2 d-flex justify-content-between align-items-center">
                                            <span class="published3">
                                                <i class="icofont icofont-ui-calendar"></i>
                                                {{ $galleryDateText }}
                                            </span>
                                            <span class="published3">
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
                        <div class="col-md-12 text-center text-muted">ไม่มีข้อมูล</div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="button extra-small news-btn mt-60" href="{{ route('gallery.past') }}">
                            <span>ดูทั้งหมด</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       <!-- End page Photo Gallery content -->

        <div class="counter-area bg-2 bg-opacity bg-relative ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 text-center">
                        <div class="counter-bottom2">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/1.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Teachers</h2>
                                </div>
                                <div class="counter cnt-two" data-target="34">
                                    <h1>34</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/2.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Students</h2>
                                </div>
                                <div class="counter cnt-two" data-target="3554">
                                    <h1>3554</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/3.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Research</h2>
                                </div>
                                <div class="counter cnt-two" data-target="354">
                                    <h1>354</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="{{ url('webaru_bs5/images/icons/4.png') }}" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Awards</h2>
                                </div>
                                <div class="counter cnt-two" data-target="44">
                                    <h1>44</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
