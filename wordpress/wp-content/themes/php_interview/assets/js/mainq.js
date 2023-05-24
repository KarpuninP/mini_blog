$(document).ready(function() {
    // Modal window initialization
    $('#signIn').modal();

// Get reference to carousel container
var carouselContainer = document.querySelector('.carousel-container');
var carouselTrack = carouselContainer.querySelector('.carousel-track');
var carouselItems = carouselContainer.querySelectorAll('.carousel-block');
var carouselWidth = carouselContainer.offsetWidth;
var currentIndex = 0;
var direction = 1;  // Direction of movement (1 - forward, -1 - backward)

if (carouselItems.length > 0) { // Check if carouselItems is not empty
    // Clone each item and append it to the end of the track
    carouselItems.forEach(function(item) {
        carouselTrack.appendChild(item.cloneNode(true));
    });

    // Set the width of the track equal to the total width of the carousel
    function recalculateCarouselWidth() {
        var carouselWidth = carouselContainer.offsetWidth;
        var totalWidth = 0;

        carouselItems.forEach(function(item) {
            totalWidth += item.offsetWidth;
        });

        var neededCopies = Math.ceil(carouselWidth / totalWidth) + 1;
        for (var i = 0; i < neededCopies; i++) {
            carouselItems.forEach(function(item) {
                carouselTrack.appendChild(item.cloneNode(true));
            });
        }

        carouselTrack.style.width = totalWidth * neededCopies + 'px';
    }

    recalculateCarouselWidth();

    // Animate the carousel
    function animateCarousel() {
        setInterval(function() {
            var itemWidth = carouselItems[currentIndex].offsetWidth;
            var trackOffset = -itemWidth * currentIndex;

            carouselTrack.style.transform = 'translateX(' + trackOffset + 'px)';

            currentIndex += direction;

            if (currentIndex >= carouselItems.length) {
                currentIndex = 0;
                carouselTrack.style.transition = 'none';
                carouselTrack.style.transform = 'translateX(0)';
                setTimeout(function() {
                    carouselTrack.style.transition = 'transform 1.5s ease-in-out';
                    carouselTrack.style.transform = 'translateX(' + (-carouselItems[currentIndex].offsetLeft) + 'px)';
                }, 10);
            }
        }, 10000);
    }
    animateCarousel();
}

});
