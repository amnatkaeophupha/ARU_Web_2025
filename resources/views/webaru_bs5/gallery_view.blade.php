@extends('webaru_bs5/layout')
@section('content')

        <section class="gallery_view gray-bg ptb-50">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-12 col-sm-12">
                        <div class="section-title text-center mb-30">
                            <img src="{{ url('webaru_bs5/aru_images/logo/2025_aru_Logo_title.png') }}" alt="aru" >
                            <h1 style="font-family:'sarabun',sans-serif;">กิจกรรม</h1>
                            <p>กิจกรรมมหาวิทยาลัยและหน่วยงานต่างๆ </p>
                            <div class="mt-2 text-muted" style="font-family:'sarabun',sans-serif;">
                                <strong>หัวข้อกิจกรรม:</strong> {{ $gallery->title ?? '-' }}
                                <span class="ms-2">
                                    <strong>วันที่:</strong>
                                    {{ $gallery->start_date ? \Carbon\Carbon::parse($gallery->start_date)->format('d/m/Y') : '-' }}
                                </span>
                            </div>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-camera"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="service-all white-bg">
                            @php
                                $images = collect($files ?? [])
                                    ->reject(function ($f) {
                                        return str_contains($f, '/thumbs/');
                                    })
                                    ->map(function ($f) {
                                    $path = ltrim($f, '/');
                                    $filename = basename($path);
                                    $thumbPath = dirname($path) . '/thumbs/' . $filename;
                                    $thumbExists = \Illuminate\Support\Facades\Storage::disk('public')->exists($thumbPath);
                                    $fullUrl = asset('storage/' . $path);
                                    $thumbUrl = $thumbExists ? asset('storage/' . $thumbPath) : $fullUrl;

                                    return [
                                        'url' => $fullUrl,
                                        'thumb_url' => $thumbUrl,
                                        'caption' => pathinfo($path, PATHINFO_FILENAME),
                                    ];
                                })->values();
                            @endphp
                            <style>
                                .aru-gallery-grid .aru-card {
                                    background: #fff;
                                    border: 1px solid #e6e9ef;
                                    border-radius: 12px;
                                    overflow: hidden;
                                    box-shadow: 0 6px 16px rgba(0,0,0,.06);
                                    transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
                                    height: 100%;
                                }
                                .aru-gallery-grid .aru-thumb {
                                    background: #f6f7f9;
                                    aspect-ratio: 4 / 3;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    overflow: hidden;
                                }
                                .aru-gallery-grid .aru-thumb img {
                                    max-width: 100%;
                                    max-height: 100%;
                                    width: auto;
                                    height: auto;
                                    object-fit: contain;
                                }
                                .aru-gallery-grid a:hover .aru-card {
                                    transform: translateY(-3px);
                                    border-color: #c9d3e1;
                                    box-shadow: 0 10px 20px rgba(0,0,0,.10);
                                }
                                .aru-gallery-grid .aru-caption {
                                    padding: 10px 12px;
                                    font-size: 13px;
                                    color: #586270;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                }
                            </style>
                            <div class="row g-3 aru-gallery-grid">
                                @forelse($images as $image)
                                    <div class="col-md-4 col-sm-6">
                                        <a href="{{ $image['url'] }}" data-fancybox="aru-gallery" data-caption="{{ $image['caption'] }}" class="d-block">
                                            <div class="aru-card">
                                                <div class="aru-thumb">
                                                    <img src="{{ $image['thumb_url'] }}" alt="gallery image" loading="lazy" decoding="async" fetchpriority="low">
                                                </div>
                                                <div class="aru-caption">{{ $image['caption'] }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center text-muted">ไม่มีข้อมูล</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
