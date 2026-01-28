@extends('admin/roker_layout/2025_webaru_faq_layout')
@section('title', 'ตอบคำถาม - มหาวิทยาลัยราชภัฏพระนครศรีอยุธยา')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" style="font-family:'Chakra Petch', sans-serif;">
            <div class="breadcrumb-title pe-3">ถามตอบข้อสงสัย</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/webaru-faq') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">ตอบคำถาม</li>
                    </ol>
                </nav>
            </div>
        </div>

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

        <div class="card border-primary border-top border-3 border-0 mb-3">
            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                <h5 class="text-primary mb-2">รายละเอียดคำถาม</h5>
                <div class="mb-2"><strong>หัวข้อ:</strong> {{ $question->title }}</div>
                <div class="mb-2"><strong>หมวดหมู่:</strong> {{ $question->category }}</div>
                <div class="mb-2"><strong>อีเมล:</strong> {{ $question->email ?? '-' }}</div>
                <div class="mb-0"><strong>รายละเอียด:</strong></div>
                <div class="border rounded p-2 bg-light">{!! nl2br(e($question->detail)) !!}</div>
            </div>
        </div>

        <div class="card border-primary border-top border-3 border-0 mb-3">
            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                <h5 class="text-primary mb-3">ตอบคำถาม</h5>
                <form method="POST" action="{{ route('admin.webaru-faq.answers.store', $question->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">คำตอบ</label>
                        <textarea name="answer" class="form-control" rows="6" required>{{ old('answer') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ผู้ตอบ (ถ้าไม่ใช้ชื่อจากระบบ)</label>
                        <input type="text" name="answered_by_name" class="form-control" value="{{ old('answered_by_name') }}">
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ url('admin/webaru-faq') }}" class="btn btn-outline-secondary">ย้อนกลับ</a>
                        <button type="submit" class="btn btn-primary">บันทึกคำตอบ</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-primary border-top border-3 border-0">
            <div class="card-body" style="font-family:'Chakra Petch', sans-serif;">
                <h5 class="text-primary mb-3">คำตอบทั้งหมด</h5>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center" style="width: 15%;">สถานะ</th>
                                <th>คำตอบ</th>
                                <th class="text-center" style="width: 15%;">วันที่ตอบ</th>
                                <th class="text-center" style="width: 20%;">ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($question->answers as $answer)
                                <tr>
                                    <td class="text-center">
                                        @php
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
                                            $status = $answer->status ?? 'pending';
                                        @endphp
                                        <span class="badge bg-{{ $statusClasses[$status] ?? 'secondary' }}">
                                            {{ $statusLabels[$status] ?? $status }}
                                        </span>
                                        @if($answer->is_spam)
                                            <span class="badge bg-danger mt-1 d-block">สแปม</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>{!! nl2br(e($answer->answer)) !!}</div>
                                        <div class="text-muted small mt-1">ผู้ตอบ: {{ $answer->answered_by_name ?? '-' }}</div>
                                    </td>
                                    <td class="text-center">
                                        {{ $answer->created_at?->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-wrap justify-content-center gap-1">
                                            @if($answer->status !== 'published')
                                                <form method="POST" action="{{ route('admin.webaru-faq.answers.publish', [$question->id, $answer->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" title="Publish">
                                                        <i class="bx bx-show"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if($answer->status !== 'hidden')
                                                <form method="POST" action="{{ route('admin.webaru-faq.answers.hide', [$question->id, $answer->id]) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secondary btn-sm" title="Hide">
                                                        <i class="bx bx-hide"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <form method="POST" action="{{ route('admin.webaru-faq.answers.spam', [$question->id, $answer->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-sm {{ $answer->is_spam ? 'btn-warning' : 'btn-outline-warning' }}"
                                                    title="{{ $answer->is_spam ? 'Unspam' : 'Mark as spam' }}">
                                                    <i class="bx bx-shield-x"></i>
                                                </button>
                                            </form>

                                            <button type="button"
                                                class="btn btn-primary btn-sm"
                                                title="แก้ไข"
                                                data-bs-toggle="modal"
                                                data-bs-target="#EditAnswerModal"
                                                data-id="{{ $answer->id }}"
                                                data-answer="{{ $answer->answer }}"
                                                data-answered-by-name="{{ $answer->answered_by_name }}">
                                                <i class="bx bx-edit"></i>
                                            </button>

                                            <form method="POST" action="{{ route('admin.webaru-faq.answers.destroy', [$question->id, $answer->id]) }}" class="js-confirm-delete" data-title="{{ \Illuminate\Support\Str::limit($answer->answer, 60) }}">
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
                                    <td colspan="4" class="text-center text-muted">ยังไม่มีคำตอบ</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="EditAnswerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editAnswerForm" method="POST" action="" data-base="{{ url('admin/webaru-faq/'.$question->id.'/answers') }}">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" style="font-family:'Chakra Petch', sans-serif;">แก้ไขคำตอบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="font-family:'Chakra Petch', sans-serif;">
                    <div class="mb-3">
                        <label class="form-label">คำตอบ</label>
                        <textarea name="answer" id="edit-answer" class="form-control" rows="6" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ผู้ตอบ</label>
                        <input type="text" name="answered_by_name" id="edit-answered-by-name" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('scripts')
<style>
.swal2-popup {
    font-family: 'Chakra Petch', sans-serif;
}
</style>
@endpush
@endsection
