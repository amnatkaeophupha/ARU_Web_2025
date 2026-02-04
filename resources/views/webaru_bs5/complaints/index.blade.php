@extends('webaru_bs5/layout')

@section('content')
@include('webaru_bs5.complaints.complaint-header')
<link rel="stylesheet" href="{{ url('webaru_bs5/aru_complaint.css') }}">
<section class="aru-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12">
                <h2 class="aru-section-title">ช่องทางรับความคิดเห็นและร้องเรียน</h2>
                <p class="aru-section-lead">เลือกหัวข้อที่ตรงกับเรื่องของท่าน เพื่อให้การรับเรื่องเป็นระบบและติดตามได้ง่าย</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <a href="/complaint/grievance" class="aru-info-link" aria-label="ร้องเรียน-ร้องทุกข์">
                    <div class="aru-info-card aru-info-card--grievance">
                        <div class="icon"><i class="icofont icofont-ui-message"></i></div>
                        <h5>ร้องเรียน-ร้องทุกข์</h5>
                        <p>รับเรื่องร้องเรียนหรือร้องทุกข์ เพื่อพิจารณาและแก้ไขอย่างเหมาะสม</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/complaint/opinion" class="aru-info-link" aria-label="รับความคิดเห็น">
                    <div class="aru-info-card aru-info-card--opinion">
                        <div class="icon"><i class="icofont icofont-ui-chat"></i></div>
                        <h5>รับความคิดเห็น</h5>
                        <p>เสนอความคิดเห็นหรือข้อเสนอแนะเพื่อพัฒนาการให้บริการของมหาวิทยาลัย</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/complaint/corruption" class="aru-info-link" aria-label="ร้องเรียนการทุจริตและประพฤติมิชอบ">
                    <div class="aru-info-card aru-info-card--corruption">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon"><i class="icofont icofont-law-document"></i></div>
                            <span class="aru-badge aru-badge-danger">ข้อมูลลับ</span>
                        </div>
                        <h5 class="mt-2" style="font-size: 16px;">ร้องเรียนการทุจริตและประพฤติมิชอบ</h5>
                        <p>แจ้งเหตุทุจริตหรือการใช้อำนาจโดยมิชอบ เพื่อความโปร่งใส</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="/complaint/direct" class="aru-info-link" aria-label="สายตรงอธิการ">
                    <div class="aru-info-card aru-info-card--direct">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="icon"><i class="icofont icofont-ui-call"></i></div>
                            <span class="aru-badge aru-badge-warning">เร่งด่วน</span>
                        </div>
                        <h5 class="mt-2">สายตรงอธิการ</h5>
                        <p>เรื่องสำคัญหรือเร่งด่วนที่ต้องการการพิจารณาโดยตรง</p>
                    </div>
                </a>
            </div>
        </div>

<div class="row mt-4">
  <div class="col-12">
    <div class="aru-privacy-notice">
      <div class="d-flex align-items-start gap-3 flex-wrap">
        <div class="aru-privacy-icon">
          <i class="icofont icofont-shield"></i>
        </div>

        <div class="flex-grow-1">
          <div class="aru-privacy-title">ประกาศคุ้มครองข้อมูลส่วนบุคคล (PDPA)</div>
          <div class="aru-privacy-text">
            ข้อมูลของท่านจะถูกเก็บเป็นความลับ และใช้เพื่อการตรวจสอบ/ติดตามผลเรื่องร้องเรียนเท่านั้น
            กรณีเลือก “ไม่เปิดเผยตัวตน” มหาวิทยาลัยอาจไม่สามารถติดต่อกลับเพื่อขอข้อมูลเพิ่มเติมได้
            กรุณาระบุรายละเอียดและแนบหลักฐานให้ครบถ้วน
          </div>

          <div class="aru-privacy-links mt-2">
            <a href="{{ route('complaint.privacy') }}" class="aru-link" target="_blank" rel="noopener">
              อ่านนโยบายความเป็นส่วนบุคคล
            </a>
            <span class="mx-2 text-muted">|</span>
            <a href="#manuals" class="aru-link">
              ดูขั้นตอน/คู่มือการดำเนินการ
            </a>
          </div>
        </div>

        <div class="aru-privacy-badges">
          <span class="aru-pill aru-pill-danger">ช่องทางทุจริต: รับแบบไม่เปิดเผยตัวตน</span>
          <span class="aru-pill aru-pill-warning">สายตรงอธิการ: ต้องมีข้อมูลติดต่อ</span>
        </div>
      </div>
    </div>
  </div>
</div>



        <div class="row mt-5">
            <div class="col-lg-6">
                <h2 class="aru-section-title" id="manuals">ขั้นตอนคู่มือ</h2>
                <p class="aru-section-lead">เลือกอ่านคู่มือที่เกี่ยวข้องเพื่อทำความเข้าใจขั้นตอนและแนวปฏิบัติ</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card h-100">
                    <div class="card-header">Download Manuals</div>
                    <div class="card-body">
                        <ol class="aru-manual-list">
                            @forelse ($manuals as $manual)
                                <li>
                                    <a href="{{ $manual->download_url }}" class="text-decoration-none" target="_blank" rel="noopener">
                                        {{ $manual->title }}
                                    </a>
                                </li>
                            @empty
                                <li class="text-muted">ยังไม่มีคู่มือให้ดาวน์โหลด</li>
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 mt-4 mt-lg-0">
                <div class="card h-100">
                    <div class="card-header">แบบฟอร์มร้องเรียนของงานนิติการ</div>
                    <div class="card-body">
                        <p class="aru-section-lead">ดาวน์โหลดแบบฟอร์มเพื่อกรอกและแนบเอกสารประกอบ</p>
                        @forelse ($forms as $form)
                            <a class="aru-submit d-inline-block text-decoration-none mb-2" href="{{ $form->download_url }}" target="_blank" rel="noopener">
                                {{ $form->title }}
                            </a>
                        @empty
                            <span class="text-muted">ยังไม่มีแบบฟอร์มให้ดาวน์โหลด</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 g-4">
            <div class="col-lg-12">
                <div class="card h-100" id="reports">
                    <div class="card-header">รายงานผล</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 70px;">ลำดับ</th>
                                        <th scope="col">รายการรายงาน</th>
                                        <th scope="col" class="text-nowrap" style="width: 120px;">ดาวน์โหลด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reports as $report)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td>
                                                <a href="{{ $report->download_url }}" class="aru-download-link text-decoration-none" target="_blank" rel="noopener">ดาวน์โหลด</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-muted">ยังไม่มีรายงานให้ดาวน์โหลด</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</section>


@endsection
