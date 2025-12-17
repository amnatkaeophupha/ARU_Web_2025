@extends('layouts.app')

@section('title', 'ARU Photo Gallery')

@push('styles')
<style>
    .aru-gallery-title {
        font-family: 'Sarabun', sans-serif;
        text-align: center;
        margin-bottom: 30px;
    }

    .aru-gallery-card {
        margin-bottom: 20px;
        text-align: center;
        font-family: 'Sarabun', sans-serif;
    }

    .aru-gallery-card img {
        border-radius: 10px;
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .aru-gallery-caption {
        margin-top: 8px;
        font-size: 14px;
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <h2 class="aru-gallery-title">ARU Photo Gallery</h2>

    <div class="row">
        @foreach($photos as $photo)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="aru-gallery-card">
                    {{-- ลิงก์รูปใหญ่ + ใช้ Fancybox --}}
                    <a href="{{ asset('aru_gallery/' . $photo['file']) }}"
                       data-fancybox="aru-gallery"
                       data-caption="{{ $photo['title'] }} - {{ $photo['detail'] }}">
                        <img src="{{ asset('aru_gallery/' . $photo['thumb']) }}"
                             alt="{{ $photo['title'] }}"
                             class="img-fluid">
                    </a>

                    <div class="aru-gallery-caption">
                        <strong>{{ $photo['title'] }}</strong><br>
                        <small>{{ $photo['detail'] }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('[data-fancybox="aru-gallery"]').fancybox({
            loop: true,
            buttons: [
                "zoom",
                "slideShow",
                "thumbs",
                "close"
            ],
            protect: true,     // กันคลิกขวา save รูป (ช่วยได้ระดับหนึ่ง)
            transitionEffect: "fade"
        });
    });
</script>
@endpush
