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

<section class="about-area py-5 aru-intro">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="faq-card">
                    @if (session('success'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="board-header mb-2">
                        <div>
                            <div class="faq-title">กระดานถาม‑ตอบ</div>
                            <div class="faq-subtitle">แลกเปลี่ยนคำถามและคำตอบจากผู้ใช้งาน</div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <a class="btn btn-outline-danger" href="{{ url('/faq/ask') }}"><i class="fa fa-plus me-1"></i> สร้างคำถาม</a>
                        </div>
                    </div>

                    <div class="board-list d-grid gap-3">
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
                                'other'     => 'อื่น ๆ',
                            ];
                        @endphp

                        @forelse ($questions as $question)
                            <div class="board-item">
                                <div class="board-meta">
                                    <div class="count">{{ (int) $question->answer_count }}</div>
                                    <div>คำตอบ</div>
                                </div>
                                <div>
                                    <div class="board-title">
                                        <a href="{{ route('faq.view', $question->id) }}" class="text-decoration-none">
                                            {{ $question->title }}
                                        </a>
                                    </div>
                                    <div class="board-preview">
                                        {{ \Illuminate\Support\Str::limit($question->detail, 140) }}
                                    </div>
                                    <div class="board-footer">
                                        <div class="board-tags">
                                            <span class="badge bg-light text-dark border">
                                                {{ $catLabels[$question->category] ?? $question->category }}
                                            </span>
                                        </div>
                                        <div class="board-user">
                                            <div class="board-avatar"></div>
                                            <span>วันที่ {{ $question->created_at?->format('d/m/Y') }} • {{ $question->created_at?->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted py-4">
                                ยังไม่มีคำถามที่เผยแพร่
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
