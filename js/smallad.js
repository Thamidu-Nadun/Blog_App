const customSlider = document.querySelector('.custom-slider');
        let customSlideIndex = 0;

        function nextSlide() {
            if (customSlideIndex === customSlider.children.length - 1) {
                customSlideIndex = 0;
            } else {
                customSlideIndex++;
            }
            updateCustomSlider();
        }

        function updateCustomSlider() {
            customSlider.style.transform = `translateX(-${customSlideIndex * 100}%)`;
        }

        // Automatically advance to the next slide every 2 seconds (adjust as needed)
        setInterval(nextSlide, 4000);