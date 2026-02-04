@extends('webaru_bs5/layout')

@section('content')

@include('webaru_bs5.complaints.complaint-header')
<link rel="stylesheet" href="{{ url('webaru_bs5/aru_complaint.css') }}">
{{-- resources/views/complaints/create.blade.php --}}
<section class="aru-section alt" id="complaint-form">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-8">
                <div class="aru-form-wrap">

                    @php
                        $type = strtoupper($type ?? request('type') ?? 'GRIEVANCE');

                        $typeLabels = [
                            'GRIEVANCE'  => 'ร้องเรียน-ร้องทุกข์',
                            'OPINION'    => 'รับความคิดเห็น',
                            'CORRUPTION' => 'ร้องเรียนการทุจริตและประพฤติมิชอบ',
                            'DIRECT'     => 'สายตรงอธิการ',
                        ];

                        $pageTitle = $typeLabels[$type] ?? 'ส่งเรื่อง';
                    @endphp

                    <h3 class="aru-section-title">แบบฟอร์ม: {{ $pageTitle }}</h3>
                    <p class="aru-section-lead mb-3">
                        ข้อมูลจะถูกเก็บเป็นความลับและใช้เพื่อการพิจารณาเรื่องเท่านั้น
                    </p>

                    {{-- แจ้งเตือนเฉพาะประเภท --}}
                    <div id="type-alert" class="aru-note mb-3 d-none"></div>

                    <form method="post" action="{{ route('complaint.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        {{-- type_code / channel (ระบบใช้) --}}
                        <input type="hidden" name="type_code" value="{{ $type }}">
                        <input type="hidden" name="channel" value="WEB">

                        <div class="row g-3">

                            {{-- Priority --}}
                            <div class="col-md-6" id="priority-wrap">
                                <label for="priority">ความเร่งด่วน</label>

                                @php
                                    $oldPriority = old('priority', 'NORMAL');
                                    $isOpinion = ($type === 'OPINION');
                                @endphp

                                <select id="priority"
                                        @if(!$isOpinion) name="priority" @endif
                                        class="form-select @error('priority') is-invalid @enderror"
                                        @if(!$isOpinion) required @endif>
                                    <option value="NORMAL" {{ $oldPriority === 'NORMAL' ? 'selected' : '' }}>ปกติ</option>
                                    <option value="LOW"    {{ $oldPriority === 'LOW' ? 'selected' : '' }}>ต่ำ</option>
                                    <option value="HIGH"   {{ $oldPriority === 'HIGH' ? 'selected' : '' }}>สูง</option>
                                    <option value="URGENT" {{ $oldPriority === 'URGENT' ? 'selected' : '' }}>เร่งด่วน</option>
                                </select>

                                {{-- OPINION ให้ hidden ส่งค่าแทน (กันกรณี JS ไม่ทำงาน) --}}
                                <input type="hidden"
                                    id="priority_hidden"
                                    value="{{ $oldPriority }}"
                                    @if($isOpinion) name="priority" @endif>

                                @error('priority')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>


                            {{-- Anonymous --}}
                            <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check mb-2">
                                {{-- ส่งค่าเสมอ --}}
                                <input type="hidden"
                                    name="is_anonymous"
                                    id="is_anonymous_hidden"
                                    value="{{ old('is_anonymous') ? '1' : '0' }}">

                                {{-- checkbox จริง --}}
                                <input id="is_anonymous"
                                    class="form-check-input"
                                    type="checkbox"
                                    {{ old('is_anonymous') ? 'checked' : '' }}>

                                <label class="form-check-label" for="is_anonymous" style="margin-left: 10px;">
                                ไม่ประสงค์เปิดเผยตัวตน
                                </label>
                            </div>
                            </div>

                            {{-- Contact fields --}}
                            <div id="contact-fields" class="col-12">
                                <div class="bg-light border rounded-3 p-3 aru-contact-section">
                                    <div class="fw-semibold mb-2">ข้อมูลผู้ติดต่อ</div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="contact_name">ชื่อ-นามสกุล</label>
                                            <input id="contact_name" name="contact_name" type="text"
                                                   value="{{ old('contact_name') }}"
                                                   class="form-control aru-input-pad @error('contact_name') is-invalid @enderror"
                                                   style="padding: 12px 14px !important; height: 46px !important; line-height: 1.2 !important;"
                                                   placeholder="กรอกชื่อ-นามสกุล">
                                            @error('contact_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="contact_phone">เบอร์โทรศัพท์</label>
                                            <input id="contact_phone" name="contact_phone" type="text"
                                                   value="{{ old('contact_phone') }}"
                                                   class="form-control aru-input-pad @error('contact_phone') is-invalid @enderror"
                                                   style="padding: 12px 14px !important; height: 46px !important; line-height: 1.2 !important;"
                                                   placeholder="0xx-xxx-xxxx">
                                            @error('contact_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="col-md-12">
                                            <label for="contact_email">อีเมล</label>
                                            <input id="contact_email" name="contact_email" type="email"
                                                   value="{{ old('contact_email') }}"
                                                   class="form-control aru-input-pad @error('contact_email') is-invalid @enderror"
                                                   style="padding: 12px 14px !important; height: 46px !important; line-height: 1.2 !important;"
                                                   placeholder="example@email.com">
                                            @error('contact_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Subject + Detail --}}
                            <div class="col-12">
                                <div class="bg-white border rounded-3 p-3 aru-detail-section">
                                    <div class="fw-semibold mb-2">รายละเอียดเรื่อง</div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="subject">หัวข้อเรื่อง</label>
                                            <input id="subject" name="subject" type="text"
                                                   value="{{ old('subject') }}"
                                                   class="form-control @error('subject') is-invalid @enderror"
                                                   style="padding: 12px 14px !important; height: 46px !important; line-height: 1.2 !important;"
                                                   placeholder="ระบุหัวข้อโดยย่อ" required>
                                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="detail">รายละเอียด</label>
                                            <textarea id="detail" name="detail" rows="6"
                                                      class="form-control @error('detail') is-invalid @enderror"
                                                      placeholder="กรุณาอธิบายรายละเอียดให้ครบถ้วน" required>{{ old('detail') }}</textarea>
                                            @error('detail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Attachment (optional; ถ้าคุณใช้ตาราง attachments จริง แนะนำเก็บไฟล์แยก) --}}
                            <div class="col-12">
                                <div class="bg-light border rounded-3 p-3">
                                    <label for="attachment">แนบเอกสาร (ถ้ามี)</label>
                                    <input id="attachment" name="attachment" type="file"
                                           class="form-control aru-file-input @error('attachment') is-invalid @enderror"
                                           accept=".pdf,.jpg,.jpeg,.png">
                                    <div class="form-text">รองรับ PDF/JPG/PNG ขนาดไม่เกินที่ระบบกำหนด</div>
                                    @error('attachment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-12">
                            <div class="form-check mt-3">
                                <input id="pdpa_accept" name="pdpa_accept"
                                    class="form-check-input @error('pdpa_accept') is-invalid @enderror"
                                    type="checkbox" value="1" required {{ old('pdpa_accept') ? 'checked' : '' }}>

                                <label class="form-check-label" for="pdpa_accept" style="margin-left: 10px;">
                                ข้าพเจ้าได้อ่านและยอมรับ
                                <a href="{{ route('complaint.privacy') }}" class="aru-privacy-link" target="_blank" rel="noopener">
                                    นโยบายความเป็นส่วนบุคคล
                                </a>
                                </label>

                                @error('pdpa_accept')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>


                            {{-- Consent --}}
                            <div class="col-12">
                                <div class="form-check">
                                    <input id="consent" name="consent" class="form-check-input" type="checkbox" value="1" required>
                                    <label class="form-check-label" for="consent" style="margin-left: 10px;">
                                        ยินยอมให้มหาวิทยาลัยใช้ข้อมูลเพื่อการตรวจสอบและติดตามผล
                                    </label>
                                </div>
                                @error('consent')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            {{-- Submit --}}
                            <div class="col-12 d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="text-muted small">
                                    ระบบจะออกเลขอ้างอิงและรหัสติดตาม (PIN) หลังส่งเรื่องสำเร็จ
                                </div>
                                <button type="submit" class="aru-submit">ส่งเรื่อง</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header">คำแนะนำก่อนส่งเรื่อง</div>
                    <div class="card-body">
                        <ul class="aru-report-list">
                            <li>กรอกข้อมูลให้ครบถ้วน เพื่อให้ตรวจสอบได้รวดเร็ว</li>
                            <li>แนบหลักฐานที่เกี่ยวข้อง หากมีเอกสารประกอบ</li>
                            <li>ข้อมูลจะถูกเก็บเป็นความลับและใช้เพื่อการพิจารณาเท่านั้น</li>
                            <li>ระบบจะออกเลขอ้างอิงและรหัสติดตามหลังส่งเรื่อง</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JS: ปรับฟอร์มตาม type_code + anonymous --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const typeCode = "{{ $type }}";

  const anon        = document.getElementById('is_anonymous');
  const anonHidden  = document.getElementById('is_anonymous_hidden');

  const contactWrap = document.getElementById('contact-fields');
  const name        = document.getElementById('contact_name');
  const phone       = document.getElementById('contact_phone');
  const email       = document.getElementById('contact_email');

  const alertBox       = document.getElementById('type-alert');
  const priorityWrap   = document.getElementById('priority-wrap');
  const prioritySelect = document.getElementById('priority');
  const priorityHidden = document.getElementById('priority_hidden');

  // ---------- helpers ----------
  function setAlert(html){
    if(!alertBox) return;
    alertBox.classList.remove('d-none');
    alertBox.innerHTML = html;
  }

  function syncAnonHidden() {
    if (!anonHidden) return;
    anonHidden.value = (anon && anon.checked) ? '1' : '0';
  }

  function getPriority(){
    // prioritySelect อาจ disabled (OPINION) แต่ก็ยังมี value ได้
    if (prioritySelect && prioritySelect.value) return prioritySelect.value;
    if (priorityHidden && priorityHidden.value) return priorityHidden.value;
    return 'NORMAL';
  }

  function setPriority(val){
    const v = val || 'NORMAL';
    if (prioritySelect) prioritySelect.value = v;
    if (priorityHidden) priorityHidden.value = v;
  }

  function syncPriorityHiddenFromSelect(){
    if (!priorityHidden || !prioritySelect) return;
    priorityHidden.value = prioritySelect.value || 'NORMAL';
  }

  // ---------- Priority: init ----------
  if (prioritySelect) {
    prioritySelect.addEventListener('change', syncPriorityHiddenFromSelect);
  }
  if (priorityWrap) priorityWrap.style.display = '';

  // ให้ hidden มีค่าแน่นอนตั้งแต่แรก (กันค่าว่าง)
  if (priorityHidden && !priorityHidden.value) {
    priorityHidden.value = (prioritySelect && prioritySelect.value) ? prioritySelect.value : 'NORMAL';
  }
  // sync ครั้งแรก (กันค่าค้าง)
  syncPriorityHiddenFromSelect();

  // ---------- UI per type ----------
  if (typeCode === 'OPINION') {
    setAlert(
      '<div class="fw-semibold mb-1">รับความคิดเห็น</div>' +
      '<div>ท่านสามารถส่งข้อเสนอแนะได้โดยไม่ต้องระบุข้อมูลติดต่อ (ถ้าต้องการให้ติดต่อกลับ กรุณากรอกข้อมูลติดต่อ)</div>'
    );

    // ซ่อน priority
    if (priorityWrap) priorityWrap.style.display = 'none';

    // OPINION: select ถูก Blade เอา name ออกแล้ว => hidden คือผู้ส่งจริง
    if (prioritySelect) {
      prioritySelect.required = false;
      prioritySelect.disabled = true;
    }

    // ✅ ล็อก NORMAL เสมอ (ตามที่คุณถามก่อนหน้า “ล็อก NORMAL”)
    setPriority('NORMAL');
  } else {
    // ประเภทอื่น: select ใช้งานปกติ (Blade ใส่ name ให้แล้ว)
    if (prioritySelect) {
      prioritySelect.disabled = false;
      prioritySelect.required = true;
    }
    // sync hidden เฉย ๆ (กันค้าง)
    syncPriorityHiddenFromSelect();
  }

  if (typeCode === 'CORRUPTION') {
    setAlert(
      '<div class="fw-semibold mb-1">แจ้งเรื่องทุจริตและประพฤติมิชอบ</div>' +
      '<div>ข้อมูลจะถูกเก็บเป็นความลับสูงสุด และระบบจำกัดการเข้าถึงเฉพาะผู้รับผิดชอบเท่านั้น</div>'
    );

    if (anon) {
      anon.checked = true;
      anon.disabled = true;
    }
    syncAnonHidden();

    setPriority('NORMAL');
  }

  if (typeCode === 'DIRECT') {
    setAlert(
      '<div class="fw-semibold mb-1">สายตรงอธิการ</div>' +
      '<div>โปรดใช้ช่องทางนี้สำหรับเรื่องสำคัญหรือเร่งด่วนที่ต้องการการพิจารณาโดยตรง</div>'
    );

    if (anon) {
      anon.checked = false;
      anon.disabled = true;
    }
    syncAnonHidden();

    setPriority('HIGH');
  }

  // ---------- Contact behavior ----------
  function toggleContact() {
    const isAnon = anon && anon.checked;

    const allowEmptyContact     = (typeCode === 'OPINION'); // OPINION ไม่บังคับกรอก
    const directMustHaveContact = (typeCode === 'DIRECT');  // DIRECT บังคับกรอก

    syncAnonHidden();

    // required rules
    if (name)  name.required  = ((!isAnon && !allowEmptyContact) || directMustHaveContact);
    if (phone) phone.required = directMustHaveContact;
    if (email) email.required = false;

    if (!contactWrap) return;

    if (isAnon) {
      contactWrap.style.display = 'none';
      [name, phone, email].forEach(el => {
        if (!el) return;
        el.value = '';
        el.disabled = true;
      });
    } else {
      contactWrap.style.display = '';
      [name, phone, email].forEach(el => el && (el.disabled = false));
    }
  }

  if (anon) anon.addEventListener('change', toggleContact);

  // init
  syncAnonHidden();
  toggleContact();

});
</script>










@endsection
