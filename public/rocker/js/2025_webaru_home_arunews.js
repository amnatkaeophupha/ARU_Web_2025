
"use strict";

function EditFile(id) {
    $('#data-id').val(id);
    // update route ของ resource: /admin/webaru-arunews/{id}
    const base = document.getElementById('updateForm').dataset.base;
    document.getElementById('updateForm').action = base + '/' + id;
}

function EditModal(id, title) {
    // set ค่าใน input
    $('#edit_id').val(id);
    $('#edit_title').val(title);

     const base = $('#editForm').data('base');      // ได้ค่า base url จาก blade
    $('#editForm').attr('action', base + '/' + id);
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
                url: `webaru-arunews/${Id}`,
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
