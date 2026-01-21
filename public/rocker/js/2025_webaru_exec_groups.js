
"use strict";
const editExecGroupModal = document.getElementById('EditExecGroups');
if (editExecGroupModal) {
    editExecGroupModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const titleTh = button.getAttribute('data-title_th') || '';
        const titleEn = button.getAttribute('data-title_en') || '';
        const sortOrder = button.getAttribute('data-sort_order') || '';

        const form = document.getElementById('editExecGroupForm');
        const base = form.dataset.base;
        form.action = base + '/' + id;

        document.getElementById('edit-title-th').value = titleTh;
        document.getElementById('edit-title-en').value = titleEn;
        document.getElementById('edit-sort-order').value = sortOrder;
    });
}


function update_exec_groups(formId) {
    const form = document.getElementById(formId);
    if (form) {
        form.submit();
    }
}

document.querySelectorAll('.delete-exec-group-form').forEach((form) => {
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const title = this.getAttribute('data-title') || 'รายการนี้';

        Swal.fire({
            title: 'ยืนยันการลบ',
            text: `ต้องการลบ ${title} ใช่หรือไม่?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ลบข้อมูล',
            cancelButtonText: 'ยกเลิก',
            customClass: {
                popup: 'swal-chakra',
                title: 'swal-chakra',
                htmlContainer: 'swal-chakra',
                confirmButton: 'swal-chakra',
                cancelButton: 'swal-chakra'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
});

