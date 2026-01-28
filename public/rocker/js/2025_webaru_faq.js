
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('EditAnswerModal');
    if (editModal) {
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var answer = button.getAttribute('data-answer') || '';
            var answeredByName = button.getAttribute('data-answered-by-name') || '';

            var answerEl = document.getElementById('edit-answer');
            var nameEl = document.getElementById('edit-answered-by-name');
            if (answerEl) {
                answerEl.value = answer;
            }
            if (nameEl) {
                nameEl.value = answeredByName;
            }

            var form = document.getElementById('editAnswerForm');
            if (form) {
                var base = form.getAttribute('data-base');
                form.action = base + '/' + id;
            }
        });
    }

    document.querySelectorAll('.js-confirm-delete').forEach(function(form){
        form.addEventListener('submit', function(e){
            e.preventDefault();
            var title = form.getAttribute('data-title') || '';
            Swal.fire({
                title: 'ยืนยันการลบ?',
                text: title ? 'ลบรายการ: ' + title : 'คุณต้องการลบรายการนี้หรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#dc3545',
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
