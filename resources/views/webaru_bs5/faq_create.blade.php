@extends('webaru_bs5/layout')

@section('content')
<section class="breadcrumbs-area bg-3 py-5 bg-opacity bg-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title" style="font-family:'Sarabun', sans-serif;">ถามตอบข้อสงสัย</h2>
                    <ul>
                        <li>
                            <a class="active" href="{{url('/')}}">หน้าแรก</a>
                        </li>
                        <li>
                            <a>ข้อมูลที่ควรรู้</a>
                        </li>
                        <li>ถามตอบข้อสงสัย</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5 aru-intro">
  <div class="container">


    <div class="row">
      <div class="col-md-8 mx-auto">

        <div class="faq-form-card">
          <div class="mb-3">
            <div class="faq-form-title">ตั้งคำถามใหม่</div>
            <div class="faq-form-subtitle">
              กรอกข้อมูลให้ครบถ้วน เพื่อให้เจ้าหน้าที่หรือผู้ใช้งานท่านอื่นช่วยตอบได้เร็วขึ้น
            </div>
          </div>

          {{-- แสดง error ทั้งหมด --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- ฟอร์ม --}}
          <form method="POST" action="{{ url('/faq/ask') }}">
            @csrf

            <div class="mb-3">
              <label class="form-label">หัวข้อคำถาม <span class="text-danger">*</span></label>
              <input
                type="text"
                name="title"
                class="form-control"
                placeholder="เช่น สมัครเรียนต้องทำอย่างไร?"
                value="{{ old('title') }}"
                required>
              <div class="form-text">แนะนำให้สั้น ชัดเจน และมีคำสำคัญ</div>
            </div>

            <div class="mb-3">
              <label class="form-label">รายละเอียดคำถาม <span class="text-danger">*</span></label>
              <textarea
                name="detail"
                class="form-control"
                rows="6"
                placeholder="อธิบายรายละเอียดเพิ่มเติม เช่น คณะ/สาขา/ชั้นปี/ปัญหาที่พบ"
                required>{{ old('detail') }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">หมวดหมู่</label>
              <select class="form-select" name="category">
                <option value="">เลือกหมวดหมู่</option>
                @php
                  $cats = [
                    'admission' => 'รับสมัคร/สมัครเรียน',
                    'study'     => 'การเรียน/ตารางเรียน',
                    'tuition'   => 'ค่าเทอม/การเงิน',
                    'scholar'   => 'ทุน/กยศ',
                    'graduation'=> 'บัณฑิต/รับปริญญา',
                    'activity'  => 'กิจกรรม/ชั่วโมงกิจกรรม',
                    'it'        => 'IT/บัญชี/อีเมล/ซอฟต์แวร์',
                    'hr'        => 'บุคคล/สมัครงาน',
                    'other'     => 'อื่น ๆ',
                  ];
                @endphp
                @foreach($cats as $k => $v)
                  <option value="{{ $k }}" @selected(old('category') === $k)>{{ $v }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">อีเมล (สำหรับติดต่อกลับ)</label>
              <input
                type="email"
                name="email"
                class="form-control"
                placeholder="name@example.com"
                value="{{ old('email') }}">
              <div class="form-text">ไม่บังคับกรอก แต่ช่วยให้ติดต่อกลับได้</div>
            </div>

            {{-- กันสแปมแบบเบา ๆ (Honeypot) --}}
            <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true">
              <label>Leave this empty</label>
              <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <a href="{{ url('/faq') }}" class="btn btn-outline-secondary">ย้อนกลับ</a>
              <button type="submit" class="btn btn-primary">ส่งคำถาม</button>
            </div>

            <div class="mt-3 small text-muted">
              * ข้อมูลจะถูกตรวจสอบก่อนแสดงผล (เพื่อป้องกันสแปม/คำไม่เหมาะสม)
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
</section>


@endsection
