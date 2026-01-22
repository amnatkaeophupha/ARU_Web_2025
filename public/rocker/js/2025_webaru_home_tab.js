
"use strict";

function editUser(id, title, type) {
    $('#data-id').val(id);
    $('#data-title').val(title);
    $('#data-type').val(type).trigger('change');
}

function UploadFile(id, type) {
    $('#VerifyId').val(id);
    $('#VerifyType').val(type);
}

function confirmDelete(Id) {
    Swal.fire({
        title: 'ยืนยันการลบข้อมูล',
        text: "การลบนี้ไม่สามารถกู้คืนได้",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ลบข้อมูล',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            popup: 'aru-swal'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the hidden form
            document.getElementById(`delete-form-${Id}`).submit();

        }
    });
}
