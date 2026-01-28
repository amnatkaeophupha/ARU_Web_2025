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
                <div class="faq-view-card">
                    <div class="d-flex justify-content-between flex-wrap gap-2">
                        <div>
                            <div class="faq-view-title">{{ $question->title }}</div>
                            <div class="faq-view-meta">
                                วันที่ {{ $question->created_at?->format('d/m/Y') }}
                                • {{ $question->created_at?->diffForHumans() }}
                            </div>
                        </div>
                        <div>
                            <span class="badge bg-light text-dark border">
                                {{ $question->category }}
                            </span>
                        </div>
                    </div>
                    <div class="faq-view-detail">{!! nl2br(e($question->detail)) !!}</div>
                </div>

                <div class="faq-answer-card mt-4">
                    <div class="faq-answer-title">คำตอบ</div>
                    <div class="d-grid gap-3">
                        @forelse ($question->answers as $answer)
                            <div class="faq-answer-item">
                                <div>{!! nl2br(e($answer->answer)) !!}</div>
                                <div class="faq-answer-meta">
                                    ผู้ตอบ: {{ $answer->answered_by_name ?? 'เจ้าหน้าที่' }}
                                    • {{ $answer->created_at?->format('d/m/Y') }}
                                </div>
                            </div>
                        @empty
                            <div class="text-muted">ยังไม่มีคำตอบ</div>
                        @endforelse
                    </div>
                    <div class="mt-3">
                        <a href="{{ url('/faq') }}" class="btn btn-outline-secondary btn-sm">ย้อนกลับ</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
