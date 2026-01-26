
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
        title: 'ยืนยันการลบข้อมูล',
        text: "การลบนี้ไม่สามารถกู้คืนได้",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ลบข้อมูล',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the hidden form
            document.getElementById(`delete-form-${Id}`).submit();

        }
    });
}


    document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('galleryModal');
    const carouselEl = document.getElementById('galleryCarousel');
    const carousel = new bootstrap.Carousel(carouselEl, { interval: false, ride: false, touch: true });

    const slideInfo = document.getElementById('slideInfo');

    // Zoom state
    let zoom = 1;
    const zoomStep = 0.2;
    const zoomMin = 1;
    const zoomMax = 3;

    function getActiveImg() {
        return carouselEl.querySelector('.carousel-item.active .gallery-zoom-img');
    }
    function applyZoom() {
        const img = getActiveImg();
        if (img) img.style.transform = `scale(${zoom})`;
    }
    function resetZoom() {
        zoom = 1;
        applyZoom();
    }

    // เปิด modal แล้วไปยังสไลด์ที่คลิก
    document.getElementById('galleryGrid')?.addEventListener('click', function(e){
        const a = e.target.closest('a[data-index]');
        if (!a) return;
        const index = parseInt(a.getAttribute('data-index'), 10) || 0;

        // ไปสไลด์นั้น
        carousel.to(index);
        resetZoom();
        updateInfo();
    });

    // เปลี่ยนสไลด์แล้ว reset zoom + อัปเดตข้อความ
    carouselEl.addEventListener('slid.bs.carousel', function () {
        resetZoom();
        updateInfo();
    });

    // ปิด modal แล้ว reset zoom
    modalEl.addEventListener('hidden.bs.modal', function(){
        resetZoom();
    });

    // ปุ่มซูม
    document.getElementById('zoomInBtn')?.addEventListener('click', function(){
        zoom = Math.min(zoomMax, zoom + zoomStep);
        applyZoom();
    });
    document.getElementById('zoomOutBtn')?.addEventListener('click', function(){
        zoom = Math.max(zoomMin, zoom - zoomStep);
        applyZoom();
    });
    document.getElementById('zoomResetBtn')?.addEventListener('click', function(){
        resetZoom();
    });

    function updateInfo(){
        const items = carouselEl.querySelectorAll('.carousel-item');
        const activeIndex = [...items].findIndex(x => x.classList.contains('active'));
        slideInfo.textContent = `รูปที่ ${activeIndex + 1} จาก ${items.length}`;
    }

    // init info
    updateInfo();
    });
