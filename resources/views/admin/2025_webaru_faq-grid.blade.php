@extends('admin/roker_layout/2025_webaru_faq_layout')
@section('title', 'ถามตอบข้อสงสัย - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ถามตอบข้อสงสัย</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายการคำถาม</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        @if ($errors->any())
        <div class="alert alert-danger border-0 alert-dismissible fade show" style="font-family:'Chakra Petch', sans-serif;">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0">
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
                    <h5 class="text-primary rounded mb-0">ข้อมูลคำถาม</h5>
                </div>
                <hr/>

                <div class="tab-content py-3">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="font-family:'Chakra Petch', sans-serif; table-layout: fixed;">
                            <colgroup>
                                <col width="5%">
                                <col width="10%">
                                <col width="30%">
                                <col width="15%">
                                <col width="10%">
                                <col width="10%">
                                <col width="20%">
                            </colgroup>
                            <thead class="table-primary">
                                <tr>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">หมวดหมู่</th>
                                    <th class="text-center">หัวข้อคำถาม</th>
                                    <th class="text-center">อีเมล</th>
                                    <th class="text-center">คำตอบ</th>
                                    <th class="text-center">วันที่ถาม</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $catLabels = [
                                        'admission' => 'รับสมัคร/สมัครเรียน',
                                        'study'     => 'การเรียน/ตารางเรียน',
                                        'tuition'   => 'ค่าเทอม/การเงิน',
                                        'scholar'   => 'ทุน/กยศ',
                                        'graduation'=> 'บัณฑิต/รับปริญญา',
                                        'activity'  => 'กิจกรรม/ชั่วโมงกิจกรรม',
                                        'it'        => 'IT/บัญชี/อีเมล/ซอฟต์แวร์',
                                        'hr'        => 'บุคคล/สมัครงาน',
                                        'safety'    => 'อาชีวอนามัย/ความปลอดภัย',
                                        'other'     => 'อื่น ๆ',
                                    ];

                                    $statusLabels = [
                                        'pending'   => 'รอตรวจ',
                                        'published' => 'เผยแพร่',
                                        'hidden'    => 'ซ่อน',
                                    ];

                                    $statusClasses = [
                                        'pending'   => 'warning',
                                        'published' => 'success',
                                        'hidden'    => 'secondary',
                                    ];
                                @endphp
                                @forelse($questions as $question)
                                <tr>
                                    <td class="text-center">
                                        @php
                                            $status = $question->status ?? 'pending';
                                        @endphp
                                        <span class="badge bg-{{ $statusClasses[$status] ?? 'secondary' }}">
                                            {{ $statusLabels[$status] ?? $status }}
                                        </span>
                                        @if($question->is_spam)
                                            <span class="badge bg-danger mt-1 d-block">สแปม</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        {{ $catLabels[$question->category] ?? $question->category }}
                                    </td>

                                    <td style="word-wrap: break-word;">
                                        <div class="fw-bold">{{ $question->title }}</div>
                                        <div class="text-muted small">
                                            {{ \Illuminate\Support\Str::limit($question->detail, 120) }}
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        {{ $question->email ?? '-' }}
                                    </td>

                                    <td class="text-center">{{ (int) $question->answer_count }}</td>

                                    <td class="text-center">
                                        {{ $question->created_at?->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-wrap justify-content-center gap-1">
                                            @if($question->status !== 'published')
                                                <form method="POST" action="{{ route('admin.webaru-faq.publish', $question->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" title="Publish">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if($question->status !== 'hidden')
                                                <form method="POST" action="{{ route('admin.webaru-faq.hide', $question->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secondary btn-sm" title="Hide">
                                                        <i class="bx bx-hide"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="POST" action="{{ route('admin.webaru-faq.spam', $question->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-sm {{ $question->is_spam ? 'btn-warning' : 'btn-outline-warning' }}"
                                                    title="{{ $question->is_spam ? 'Unspam' : 'Mark as spam' }}">
                                                    <i class="bx bx-shield-x"></i>
                                                </button>
                                            </form>

                                            <a href="{{ route('admin.webaru-faq.answer', $question->id) }}"
                                               class="btn btn-primary btn-sm"
                                               title="ตอบคำถาม">
                                                <i class="bx bx-message-square-dots"></i>
                                            </a>

                                            <form method="POST" action="{{ route('admin.webaru-faq.destroy', $question->id) }}" class="js-confirm-delete" data-title="{{ $question->title }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="ลบ">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">ยังไม่มีข้อมูล</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<style>
.swal2-popup {
    font-family: 'Chakra Petch', sans-serif;
}
</style>
@endpush
