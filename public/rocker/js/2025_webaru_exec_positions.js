
"use strict";

document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('EditExecPosition');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const titleTh = button.getAttribute('data-title_th');
            const titleEn = button.getAttribute('data-title_en');
            const sortOrder = button.getAttribute('data-sort_order');

            document.getElementById('edit-title-th').value = titleTh ?? '';
            document.getElementById('edit-title-en').value = titleEn ?? '';
            document.getElementById('edit-sort-order').value = sortOrder ?? 0;

            const form = document.getElementById('editExecPositionForm');
            const base = form.getAttribute('data-base');
            form.action = `${base}/${id}`;
        });
    }

    document.querySelectorAll('.delete-exec-position-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            const title = this.getAttribute('data-title') || 'รายการนี้';

            Swal.fire({
                title: 'ยืนยันการลบ',
                text: `ต้องการลบ ${title} ใช่หรือไม่?`,
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    popup: 'swal-font'
                },
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ลบข้อมูล',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
});
