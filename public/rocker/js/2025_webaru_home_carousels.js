
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


{/* Add To Head <meta name="csrf-token" content="{{ csrf_token() }}"> */}
function confirmDelete(Id) {
    Swal.fire({
        title: 'ต้องการลบข้อมูลนี้',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ยืนยันการลบข้อมูล',
        cancelButtonText: 'ยกเลิก',
        customClass: {
            title: 'swal-title',
            content: 'swal-content',
            confirmButton: 'swal-button',
            cancelButton: 'swal-button'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `webaru-carousels/${Id}`,
                method: 'DELETE',
                data: {
                  "_token": $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  Swal.fire({
                    icon: 'success',
                    title: 'ลบข้อมูลสำเร็จ!',
                    text: response.message
                  }).then(() => {
                    location.reload(); // รีเฟรชหน้า
                  });
                },
                error: function(err) {
                  Swal.fire('เกิดข้อผิดพลาด', 'ไม่สามารถลบข้อมูลได้', 'error');
                }
            });
        }
    });
}
