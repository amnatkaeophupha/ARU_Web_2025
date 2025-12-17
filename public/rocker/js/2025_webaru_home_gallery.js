
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
