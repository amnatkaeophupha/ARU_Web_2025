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
                                $images = collect($files ?? [])->map(fn($f) => asset('storage/'.$f))->values();
                            @endphp
                            <div class="row g-3">
                                @forelse($images as $url)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="webaru_gallery-area">
                                            <div class="news-img">
                                                <img src="{{ $url }}" alt="gallery image" style="width: 100%; height: auto; object-fit: contain;">
                                            </div>
                                        </div>
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
