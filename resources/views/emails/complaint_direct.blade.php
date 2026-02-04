<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>แจ้งเรื่องสายตรงอธิการ</title>
</head>
<body style="font-family:Arial, sans-serif; color:#1f2a37;">
    <h2 style="margin:0 0 8px; color:#a01d29;">แจ้งเรื่องสายตรงอธิการ</h2>
    <p style="margin:0 0 12px;">เลขอ้างอิง: <strong>{{ $case->case_no }}</strong></p>
    <p style="margin:0 0 12px;">หัวข้อเรื่อง: <strong>{{ $case->subject }}</strong></p>
    <p style="margin:0 0 12px;">สถานะล่าสุด: <strong>{{ $case->status }}</strong></p>
    <p style="margin:0 0 12px;">ผู้ติดต่อ: <strong>{{ $case->contact_name ?? '-' }}</strong></p>
    <p style="margin:0 0 12px;">โทร: <strong>{{ $case->contact_phone ?? '-' }}</strong></p>
    <p style="margin:0 0 12px;">อีเมล: <strong>{{ $case->contact_email ?? '-' }}</strong></p>
    <div style="padding:12px; background:#f6f7f9; border:1px solid #e5e7eb; border-radius:8px; color:#a01d29;">
        {!! $messageText !!}
    </div>
    <p style="margin:16px 0 0; font-size:12px; color:#6b7280;">
        ข้อความนี้ส่งจากระบบศูนย์รับเรื่องร้องเรียนและข้อเสนอแนะ
    </p>
</body>
</html>
