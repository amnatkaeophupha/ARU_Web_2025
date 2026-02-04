<?php

namespace App\Mail;

use App\Models\WebaruComplaintCase;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplaintUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public WebaruComplaintCase $case;
    public string $messageText;

    public function __construct(WebaruComplaintCase $case, string $messageText)
    {
        $this->case = $case;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('แจ้งความคืบหน้าเรื่องร้องเรียน ' . ($this->case->case_no ?? ''))
            ->view('emails.complaint_update');
    }
}
