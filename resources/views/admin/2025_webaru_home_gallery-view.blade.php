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
                    <h5 class="text-primary rounded mb-0">คลังภาพ</h5>
                </div>
                <div class="text-muted mb-2" style="font-family:'Chakra Petch', sans-serif;">
                    <strong>กิจกรรม:</strong> {{ $gallery->title ?? '-' }}
                    <span class="ms-2">
                        <strong>วันที่:</strong>
                        {{ $gallery->start_date ? \Carbon\Carbon::parse($gallery->start_date)->format('d/m/Y') : '-' }}
                    </span>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-2" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAllImages">
                        <label class="form-check-label" for="selectAllImages">เลือกทั้งหมด</label>
                    </div>
                    <form id="bulkDeleteForm" method="POST" action="{{ route('admin.webaru-galleries.delete-images') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $gallery->id }}">
                        <span id="bulkDeleteInputs"></span>
                        <button type="submit" class="btn btn-sm btn-danger" id="bulkDeleteBtn" disabled>
                            ลบที่เลือก <span id="selectedCount">(0)</span>
                        </button>
                    </form>
                </div>
                <style>
                    .aru-gallery-grid .aru-thumb {
                        background: #f6f7f9;
                        border: 1px solid #e3e6ea;
                        border-radius: 10px;
                        overflow: hidden;
                        aspect-ratio: 4 / 3;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
                    }
                    .aru-gallery-grid .aru-thumb img {
                        max-width: 100%;
                        max-height: 100%;
                        width: auto;
                        height: auto;
                        object-fit: contain;
                    }
                    .aru-gallery-grid a:hover .aru-thumb {
                        transform: translateY(-2px);
                        border-color: #b6c2cf;
                        box-shadow: 0 8px 16px rgba(0,0,0,.08);
                    }
                    .aru-gallery-grid .aru-meta {
                        font-size: 11px;
                        color: #6c757d;
                        margin-top: 6px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }
                    .aru-gallery-grid .aru-check {
                        position: absolute;
                        top: 6px;
                        left: 6px;
                        z-index: 2;
                        background: rgba(255,255,255,.95);
                        border-radius: 6px;
                        padding: 2px 6px;
                        display: flex;
                        align-items: center;
                        gap: 6px;
                        font-size: 12px;
                    }
                </style>
                <hr/>
                <div class="tab-content py-3">
                    @php
                    $images = collect($files)
                        ->reject(function ($f) {
                            return str_contains($f, '/thumbs/');
                        })
                        ->map(function ($f) {
                        $filename = basename($f);
                        $thumbPath = dirname($f) . '/thumbs/' . $filename;
                        $thumbExists = \Illuminate\Support\Facades\Storage::disk('public')->exists($thumbPath);

                        return [
                            'url' => asset('storage/' . $f),
                            'thumb_url' => $thumbExists ? asset('storage/' . $thumbPath) : asset('storage/' . $f),
                            'filename' => $filename,
                        ];
                    })->values();
                    @endphp
                    <div class="row g-2 mt-2 aru-gallery-grid" id="galleryGrid">
                    @foreach($images as $i => $image)

                        <div class="col-md-2 col-sm-3 col-4">
                        <div class="position-relative">
                            <label class="aru-check">
                                <input type="checkbox" class="form-check-input image-check" value="{{ $image['filename'] }}">
                                เลือก
                            </label>

                            {{-- คลิกเพื่อเปิด modal --}}
                                <a href="javascript:void(0)"
                                class="d-block"
                                data-bs-toggle="modal"
                                data-bs-target="#galleryModal"
                                data-index="{{ $i }}">
                                    <div class="aru-thumb" style="cursor: zoom-in;">
                                        <img src="{{ $image['thumb_url'] }}"
                                            class="d-block"
                                            alt="{{ $image['filename'] }}">
                                    </div>
                                </a>
                                <div class="aru-meta" title="{{ $image['filename'] }}">{{ $image['filename'] }}</div>

                            {{-- ปุ่มลบ --}}
                            <form method="POST"
                                action="{{ route('admin.webaru-galleries.delete-image') }}"
                                class="position-absolute top-0 end-0 m-1 single-delete-form"
                                data-filename="{{ $image['filename'] }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $gallery->id }}">
                            <input type="hidden" name="file" value="{{ $image['filename'] }}">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectAll = document.getElementById('selectAllImages');
        var checks = Array.prototype.slice.call(document.querySelectorAll('.image-check'));
        var bulkBtn = document.getElementById('bulkDeleteBtn');
        var countEl = document.getElementById('selectedCount');
        var inputsHost = document.getElementById('bulkDeleteInputs');
        var bulkForm = document.getElementById('bulkDeleteForm');

        function updateState() {
            var selected = checks.filter(function (c) { return c.checked; });
            countEl.textContent = '(' + selected.length + ')';
            bulkBtn.disabled = selected.length === 0;
            selectAll.checked = selected.length > 0 && selected.length === checks.length;
        }

        function rebuildInputs() {
            inputsHost.innerHTML = '';
            checks.forEach(function (c) {
                if (c.checked) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'files[]';
                    input.value = c.value;
                    inputsHost.appendChild(input);
                }
            });
        }

        if (selectAll) {
            selectAll.addEventListener('change', function () {
                checks.forEach(function (c) { c.checked = selectAll.checked; });
                updateState();
            });
        }

        checks.forEach(function (c) {
            c.addEventListener('change', updateState);
        });

        if (bulkForm) {
            bulkForm.addEventListener('submit', function (e) {
                rebuildInputs();
                if (!checks.some(function (c) { return c.checked; })) {
                    e.preventDefault();
                    return;
                }
            });
        }

        updateState();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var bulkForm = document.getElementById('bulkDeleteForm');
        var singleForms = Array.prototype.slice.call(document.querySelectorAll('.single-delete-form'));

        singleForms.forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var filename = form.getAttribute('data-filename') || '';
                Swal.fire({
                    title: 'ลบรูปนี้ใช่หรือไม่?',
                    text: filename ? 'ไฟล์: ' + filename : '',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ลบ',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonColor: '#dc3545'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        if (bulkForm) {
            bulkForm.addEventListener('submit', function (e) {
                e.preventDefault();
                var selectedCount = document.querySelectorAll('.image-check:checked').length;
                if (selectedCount === 0) {
                    return;
                }
                Swal.fire({
                    title: 'ลบรูปที่เลือกทั้งหมด?',
                    text: 'จำนวน ' + selectedCount + ' รูป',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ลบทั้งหมด',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonColor: '#dc3545'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        bulkForm.submit();
                    }
                });
            });
        }
    });
</script>

<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark">

      <div class="modal-header border-0">
        <h6 class="modal-title text-white mb-0" style="font-family: 'Sarabun', sans-serif;">Gallery : {{ $gallery->title ?? '-' }}</h6>

        <div class="ms-auto d-flex gap-2">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body p-0">
        <div id="galleryCarousel" class="carousel slide" data-bs-interval="false">
          <div class="carousel-inner">

            @foreach($images as $i => $image)
              <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                  <img src="{{ $image['url'] }}"
                       class="d-block img-fluid gallery-zoom-img"
                       style="max-height: 80vh; max-width: 100%; height: auto; width: auto; object-fit: contain; transform: scale(1); transition: transform .15s ease;"
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
