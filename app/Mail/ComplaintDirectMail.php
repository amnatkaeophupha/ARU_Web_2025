<?php

namespace App\Mail;

use App\Models\WebaruComplaintCase;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ComplaintDirectMail extends Mailable
{
    use Queueable, SerializesModels;

    public WebaruComplaintCase $case;
    public string $messageText;
    protected array $attachmentPaths;

    public function __construct(WebaruComplaintCase $case, string $messageText, array $attachmentPaths = [])
    {
        $this->case = $case;
        $this->messageText = $messageText;
        $this->attachmentPaths = $attachmentPaths;
    }

    public function build()
    {
        $mail = $this->subject('แจ้งเรื่องสายตรงอธิการ ' . ($this->case->case_no ?? ''))
            ->view('emails.complaint_direct');

        foreach ($this->attachmentPaths as $path) {
            if (!empty($path) && Storage::disk('public')->exists($path)) {
                $mail->attach(Storage::disk('public')->path($path));
            }
        }

        return $mail;
    }
}
