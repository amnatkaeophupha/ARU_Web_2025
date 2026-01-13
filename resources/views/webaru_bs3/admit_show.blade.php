@extends('webaru_bs3/home_layout')
@section('content')
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
<!-- Start page content -->
<section class="lecturers-area ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" style="font-family:'Chakra Petch', sans-serif;font-size:18px;">{{ $cycle->title }}
                <ul class="list-group" style="margin-top:10px;">
                    @forelse($cycle->fileDetails as $file)
                        <li class="list-group-item" style="display:flex; justify-content:space-between; font-size:14px; align-items:center; gap:10px;">
                            <div>
                                <i class="fa fa-file"></i>
                                {{ $file->file_name ?? 'เอกสารแนบ' }}
                            </div>

                            <div>
                                <a class="btn btn-success btn-xs"
                                href="{{ asset($file->file_path) }}"
                                target="_blank"
                                style="font-family:'Chakra Petch', sans-serif;font-size:12px;">
                                    <i class="fa fa-download"></i> ดาวน์โหลด
                                </a>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-center" style="color:#777;">
                            ยังไม่มีเอกสารแนบ
                        </li>
                    @endforelse
                </ul>


            </div>
        </div>
        </div>
    </div> <!-- End container -->
</section> <!-- End section -->
<!-- End page content -->
@endsection
