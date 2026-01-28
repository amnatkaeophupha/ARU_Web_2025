<?php

namespace App\Http\Controllers;

use App\Models\WebaruFaqQuestion;
use App\Models\WebaruFaqAnswer;
use Illuminate\Http\Request;

class WebaruFaqQuestionController extends Controller
{
    public function index()
    {
        $questions = WebaruFaqQuestion::query()
            ->where('status', 'published')
            ->where('is_spam', false)
            ->orderByDesc('created_at')
            ->get();

        return view('webaru_bs5.faq_index', compact('questions'));
    }

    public function show(int $id)
    {
        $question = WebaruFaqQuestion::query()
            ->where('status', 'published')
            ->where('is_spam', false)
            ->with(['answers' => function ($query) {
                $query->where('status', 'published')
                    ->where('is_spam', false)
                    ->orderBy('created_at');
            }])
            ->findOrFail($id);

        return view('webaru_bs5.faq_view', compact('question'));
    }

    public function adminIndex()
    {
        $questions = WebaruFaqQuestion::query()
            ->orderByDesc('created_at')
            ->get();

        return view('admin.2025_webaru_faq-grid', compact('questions'));
    }

    public function adminShow(int $id)
    {
        $question = WebaruFaqQuestion::with(['answers' => function ($query) {
            $query->orderByDesc('created_at');
        }])->findOrFail($id);

        return view('admin.2025_webaru_faq-answer', compact('question'));
    }

    public function adminStoreAnswer(Request $request, int $id)
    {
        $validated = $request->validate([
            'answer' => ['required', 'string'],
            'answered_by_name' => ['nullable', 'string', 'max:150'],
        ]);

        $question = WebaruFaqQuestion::findOrFail($id);
        $user = $request->user();
        $manualName = isset($validated['answered_by_name'])
            ? trim((string) $validated['answered_by_name'])
            : '';

        WebaruFaqAnswer::create([
            'question_id' => $question->id,
            'answer' => $validated['answer'],
            'answered_by_user_id' => $user?->id,
            'answered_by_name' => $manualName !== ''
                ? $manualName
                : ($user?->name ?? null),
            'is_official' => true,
            'status' => 'published',
            'is_spam' => false,
            'ip_address' => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
        ]);

        $question->increment('answer_count');

        return redirect()
            ->route('admin.webaru-faq.answer', $question->id)
            ->with('success', 'บันทึกคำตอบเรียบร้อยแล้ว');
    }

    public function adminUpdateAnswer(Request $request, int $id, int $answerId)
    {
        $validated = $request->validate([
            'answer' => ['required', 'string'],
            'answered_by_name' => ['nullable', 'string', 'max:150'],
        ]);

        $answer = WebaruFaqAnswer::where('question_id', $id)->findOrFail($answerId);
        $user = $request->user();
        $manualName = isset($validated['answered_by_name'])
            ? trim((string) $validated['answered_by_name'])
            : '';

        $answer->update([
            'answer' => $validated['answer'],
            'answered_by_user_id' => $user?->id,
            'answered_by_name' => $manualName !== ''
                ? $manualName
                : ($user?->name ?? $answer->answered_by_name),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('admin.webaru-faq.answer', $id)
            ->with('success', 'อัปเดตคำตอบเรียบร้อยแล้ว');
    }

    public function adminPublishAnswer(int $id, int $answerId)
    {
        $answer = WebaruFaqAnswer::where('question_id', $id)->findOrFail($answerId);
        $answer->status = 'published';
        $answer->save();

        return back()->with('success', 'เผยแพร่คำตอบแล้ว');
    }

    public function adminHideAnswer(int $id, int $answerId)
    {
        $answer = WebaruFaqAnswer::where('question_id', $id)->findOrFail($answerId);
        $answer->status = 'hidden';
        $answer->save();

        return back()->with('success', 'ซ่อนคำตอบแล้ว');
    }

    public function adminToggleSpamAnswer(int $id, int $answerId)
    {
        $answer = WebaruFaqAnswer::where('question_id', $id)->findOrFail($answerId);
        $answer->is_spam = !$answer->is_spam;
        $answer->save();

        return back()->with('success', $answer->is_spam ? 'ทำเครื่องหมายสแปมแล้ว' : 'ยกเลิกสแปมแล้ว');
    }

    public function adminDestroyAnswer(int $id, int $answerId)
    {
        $answer = WebaruFaqAnswer::where('question_id', $id)->findOrFail($answerId);
        $answer->delete();

        WebaruFaqQuestion::whereKey($id)->decrement('answer_count');

        return back()->with('success', 'ลบคำตอบแล้ว');
    }

    public function adminPublish(int $id)
    {
        $question = WebaruFaqQuestion::findOrFail($id);
        $question->status = 'published';
        $question->save();

        return back()->with('success', 'เผยแพร่คำถามแล้ว');
    }

    public function adminHide(int $id)
    {
        $question = WebaruFaqQuestion::findOrFail($id);
        $question->status = 'hidden';
        $question->save();

        return back()->with('success', 'ซ่อนคำถามแล้ว');
    }

    public function adminToggleSpam(int $id)
    {
        $question = WebaruFaqQuestion::findOrFail($id);
        $question->is_spam = !$question->is_spam;
        $question->save();

        return back()->with('success', $question->is_spam ? 'ทำเครื่องหมายเป็นสแปมแล้ว' : 'ยกเลิกสแปมแล้ว');
    }

    public function adminDestroy(int $id)
    {
        $question = WebaruFaqQuestion::findOrFail($id);
        $question->delete();

        return back()->with('success', 'ลบคำถามแล้ว');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => ['required','string','max:255'],
            'detail'   => ['required','string'],
            'category' => ['nullable','string','max:250'],
            'email'    => ['nullable','email','max:255'],
        ]);

        WebaruFaqQuestion::create([
            'title'      => $validated['title'],
            'detail'     => $validated['detail'],
            'category'   => $validated['category'] ?? 'other',
            'email'      => $validated['email'] ?? null,
            'posted_ip'  => $request->ip(),
            'user_agent' => substr((string) $request->userAgent(), 0, 255),
            'status'     => 'pending',
            'is_spam'    => false,
        ]);

        return redirect('/faq')->with('success', 'ส่งคำถามเรียบร้อยแล้ว (รอตรวจสอบก่อนเผยแพร่)');
    }
}
