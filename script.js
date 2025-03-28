document.addEventListener("DOMContentLoaded", function () {
    function setupSlider(sliderClass) {
        const slides = document.querySelectorAll(sliderClass + " .slide");
        let currentIndex = 0;

        function showNextSlide() {
            slides[currentIndex].style.opacity = "0"; // Ẩn ảnh hiện tại
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].style.opacity = "1"; // Hiển thị ảnh tiếp theo
        }

        setInterval(showNextSlide, 2000); // Chạy mỗi 1 giây
    }

    setupSlider(".center-slider");
    setupSlider(".side-slider.left");
    setupSlider(".side-slider.right");
});

