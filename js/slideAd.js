const slider = document.querySelector('.slider');
let slideIndex = 0;

function showSlide(index) {
    slider.style.transform = `translateX(-${index * 100}%)`;
}

function nextSlide() {
    slideIndex = (slideIndex + 1) % slider.childElementCount;
    showSlide(slideIndex);
}

// Automatically advance the slider every 3 seconds (adjust as needed)
setInterval(nextSlide, 3000);

// Initial slide
showSlide(slideIndex);
