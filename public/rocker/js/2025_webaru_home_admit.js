
"use strict";

document.getElementById('editUserModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // ปุ่มที่กดเปิด modal

    const id = button.getAttribute('data-id');
    const title = button.getAttribute('data-title') || '';
    const startDate = button.getAttribute('data-start_date') || '';
    const by = button.getAttribute('data-by') || '';

    // set ค่า hidden id + ช่องต่างๆ
    document.getElementById('data-id').value = id;
    document.getElementById('edit-title').value = title;
    document.getElementById('edit-by').value = by;
     document.getElementById('editForm').action = '/admin/webaru-galleries/' + id;

    // แยกวันที่ (รองรับ "YYYY-MM-DD" หรือ "YYYY-MM-DD HH:MM:SS")
    if (startDate) {
        const datePart = startDate.split(' ')[0]; // ตัดเวลาออกถ้ามี
        const parts = datePart.split('-'); // [yyyy, mm, dd]
        if (parts.length === 3) {
            const yyyy = parseInt(parts[0], 10);
            const mm = parts[1];
            const dd = parts[2];

            // ปีใน select ของคุณเป็น พ.ศ. => ค.ศ. + 543
            document.getElementById('edit-dd').value = dd;
            document.getElementById('edit-mm').value = mm;
            document.getElementById('edit-yy').value = String(yyyy);
        }
    }
});

document.getElementById('UploadFile').addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget;
  const id = button.dataset.id;

  document.getElementById('VerifyId').value = id;

  const base = document.getElementById('uploadForm').dataset.base;
  document.getElementById('uploadForm').action = base + '/' + id + '/image';
});

function confirmDelete(Id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the hidden form
            document.getElementById(`delete-form-${Id}`).submit();

        }
    });
}



