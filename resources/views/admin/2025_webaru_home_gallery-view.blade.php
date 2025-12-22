@extends('admin/roker_layout/2025_webaru_home_gallery_layout')
@section('title', 'มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">เนื้อหา</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ประกาศมหาวิทยาลัย</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadFile">เพิ่มข้อมูล</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        @if ($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
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

        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body">
                <div class="card-title" style="font-family:'Chakra Petch', sans-serif;">
                    <h5 class="text-primary rounded mb-0">ข้อมูลประกาศ</h5>
                </div>
                <hr/>
                <div class="tab-content py-3">


@php
  $images = collect($files)->map(fn($f) => asset('storage/'.$f))->values();
@endphp

<div class="row g-1 mt-2" id="galleryGrid">
  @foreach($images as $i => $url)
    @php
      $filename = basename($url); // ได้ชื่อไฟล์ xxx.png
    @endphp

    <div class="col-md-3 col-sm-4 col-6">
      <div class="position-relative">

        {{-- คลิกเพื่อเปิด modal --}}
        <a href="javascript:void(0)"
           class="d-block"
           data-bs-toggle="modal"
           data-bs-target="#galleryModal"
           data-index="{{ $i }}">
          <img src="{{ $url }}"
               class="img-fluid rounded shadow-sm d-block w-100"
               style="cursor: zoom-in; aspect-ratio:1/1; object-fit:cover;">
        </a>

        {{-- ปุ่มลบ --}}
        <form method="POST"
              action="{{ route('admin.webaru-galleries.delete-image') }}"
              class="position-absolute top-0 end-0 m-1"
              onsubmit="return confirm('ต้องการลบรูปนี้ใช่หรือไม่?');">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" value="{{ $gallery->id }}">
          <input type="hidden" name="file" value="{{ $filename }}">
          <button type="submit" class="btn btn-sm btn-danger">
            <i class="bx bx-trash"></i>
          </button>
        </form>

      </div>
    </div>
  @endforeach
</div>


                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="UploadFile" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.webaru-galleries.upload-images') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                <div class="card-body p-2">
                    <label class="col-sm-12 col-form-label">Upload Image File</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="file" name="files[]" class="form-control" style="font-size: 14px;" accept="image/*" multiple required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="{{ $gallery->id }}">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark">

      <div class="modal-header border-0">
        <h6 class="modal-title text-white mb-0">Gallery ID: {{ $gallery->id }}</h6>

        <div class="ms-auto d-flex gap-2">
          <button type="button" class="btn btn-sm btn-outline-light" id="zoomInBtn">+</button>
          <button type="button" class="btn btn-sm btn-outline-light" id="zoomOutBtn">-</button>
          <button type="button" class="btn btn-sm btn-outline-light" id="zoomResetBtn">Reset</button>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body p-0">
        <div id="galleryCarousel" class="carousel slide" data-bs-interval="false">
          <div class="carousel-inner">

            @foreach($images as $i => $url)
              <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                  <img src="{{ $url }}"
                       class="d-block img-fluid gallery-zoom-img"
                       style="max-height: 70vh; transform: scale(1); transition: transform .15s ease;"
                       alt="image-{{ $i }}">
                </div>
              </div>
            @endforeach

          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div>
      </div>

      <div class="modal-footer border-0 justify-content-between">
        <small class="text-light" id="slideInfo"></small>
        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
