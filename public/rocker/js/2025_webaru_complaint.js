document.addEventListener('DOMContentLoaded', function () {
    if (!window.Swal) {
        return;
    }

    document.querySelectorAll('.js-doc-delete').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            var title = form.dataset.title || 'เอกสารนี้';

            Swal.fire({
                title: 'ยืนยันการลบ?',
                text: 'ต้องการลบ ' + title + ' ใช่หรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#d33',
                customClass: { popup: 'swal-chakra' }
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
