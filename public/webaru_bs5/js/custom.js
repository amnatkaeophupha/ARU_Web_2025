document.addEventListener('DOMContentLoaded', function () {
    if (window.jQuery && jQuery.fn.meanmenu) {
        var $dropdown = jQuery('nav#dropdown');
        if ($dropdown.length && !jQuery('.mean-container').length) {
            $dropdown.meanmenu();
        }
    }
    var mobileMenuArea = document.querySelector('.mobile-menu-area');
    if (mobileMenuArea && !document.querySelector('.mean-container')) {
        mobileMenuArea.classList.add('aru-mobile-fallback');
        var mobileToggle = mobileMenuArea.querySelector('.aru-mobile-toggle');
        if (mobileToggle) {
            mobileToggle.addEventListener('click', function () {
                mobileMenuArea.classList.toggle('aru-mobile-open');
            });
        }
    }
    var toTopEl = document.getElementById('toTop');
    if (!toTopEl) {
        return;
    }
    function toggleToTop() {
        if (window.pageYOffset > 200) {
            toTopEl.style.display = 'block';
        } else {
            toTopEl.style.display = 'none';
        }
    }
    toggleToTop();
    window.addEventListener('scroll', toggleToTop);
    toTopEl.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    var bannerModalEl = document.getElementById('bannerModal');
    if (bannerModalEl && window.bootstrap && bootstrap.Modal) {
        var bannerModal = new bootstrap.Modal(bannerModalEl);
        var bannerModalImage = document.getElementById('bannerModalImage');
        var bannerModalOpen = document.getElementById('bannerModalOpen');
        var bannerTriggers = document.querySelectorAll('.banner-modal-trigger');
        bannerTriggers.forEach(function (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                var imgSrc = trigger.getAttribute('data-full') || trigger.getAttribute('href');
                if (bannerModalImage) {
                    bannerModalImage.src = imgSrc;
                }
                if (bannerModalOpen) {
                    bannerModalOpen.href = imgSrc;
                }
                bannerModal.show();
            });
        });
        bannerModalEl.addEventListener('hidden.bs.modal', function () {
            if (bannerModalImage) {
                bannerModalImage.src = '';
            }
        });
    }
});
