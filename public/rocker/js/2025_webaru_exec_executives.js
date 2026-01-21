
"use strict";

document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('EditExecExecutive');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const groupId = button.getAttribute('data-group_id');
            const positionId = button.getAttribute('data-position_id');
            const nameTh = button.getAttribute('data-name_th');
            const nameEn = button.getAttribute('data-name_en');
            const positionText = button.getAttribute('data-position_text');
            const phone = button.getAttribute('data-phone');
            const email = button.getAttribute('data-email');
            const personOrder = button.getAttribute('data-person_order');
            const photoUrl = button.getAttribute('data-photo');

            document.getElementById('edit-group-id').value = groupId ?? '';
            document.getElementById('edit-position-id').value = positionId ?? '';
            document.getElementById('edit-name-th').value = nameTh ?? '';
            document.getElementById('edit-name-en').value = nameEn ?? '';
            document.getElementById('edit-position-text').value = positionText ?? '';
            document.getElementById('edit-phone').value = phone ?? '';
            document.getElementById('edit-email').value = email ?? '';
            document.getElementById('edit-person-order').value = personOrder ?? 0;

            const photoPreview = document.getElementById('edit-photo-preview');
            if (photoUrl) {
                photoPreview.src = photoUrl;
                photoPreview.classList.remove('d-none');
            } else {
                photoPreview.removeAttribute('src');
                photoPreview.classList.add('d-none');
            }

            const removePhoto = document.getElementById('edit-remove-photo');
            if (removePhoto) {
                removePhoto.checked = false;
            }

            const photoInput = document.getElementById('edit-photo');
            if (photoInput) {
                photoInput.value = '';
            }

            const form = document.getElementById('editExecExecutiveForm');
            const base = form.getAttribute('data-base');
            form.action = `${base}/${id}`;
        });
    }

    document.querySelectorAll('.delete-exec-executive-form').forEach(function (form) {
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
