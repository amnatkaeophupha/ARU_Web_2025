<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>แจ้งความคืบหน้าเรื่องร้องเรียน</title>
</head>
<body style="font-family:Arial, sans-serif; color:#1f2a37;">
    <h2 style="margin:0 0 8px;">แจ้งความคืบหน้าเรื่องร้องเรียน</h2>
    <p style="margin:0 0 12px;">เลขอ้างอิง: <strong>{{ $case->case_no }}</strong></p>
    <p style="margin:0 0 12px;">สถานะล่าสุด: <strong>{{ $case->status }}</strong></p>
    <div style="padding:12px; background:#f6f7f9; border:1px solid #e5e7eb; border-radius:8px;">
        {{ $messageText }}
    </div>
    <p style="margin:16px 0 0; font-size:12px; color:#6b7280;">
        โปรดเก็บเลขอ้างอิงไว้สำหรับการติดตามเรื่องในภายหลัง
    </p>
</body>
</html>
