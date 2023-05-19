$(document).ready(function() {
    // Modal window initialization
    $('#signIn').modal();

    // Get reference to carousel container
    var carouselContainer = $('.carousel-container');
    var carouselTrack = carouselContainer.find('.carousel-track');
    var carouselItems = carouselContainer.find('.carousel-block');
    var currentIndex = 0;
    var direction = 1; // Direction of movement (1 - forward, -1 - backward)

    // Clone each item and append it to the end of the track
    carouselItems.clone().appendTo(carouselTrack);

    // Set the width of the track equal to the total width of the carousel
    function recalculateCarouselWidth() {
        var carouselWidth = carouselContainer.width();
        var totalWidth = 0;

        carouselItems.each(function() {
            totalWidth += $(this).outerWidth();
        });

        var neededCopies = Math.ceil(carouselWidth / totalWidth) + 1;
        for (var i = 0; i < neededCopies; i++) {
            carouselItems.clone().appendTo(carouselTrack);
        }

        carouselTrack.width(totalWidth * neededCopies);
    }

    recalculateCarouselWidth();

    // Animate the carousel
    function animateCarousel() {
        setInterval(function() {
            var itemWidth = carouselItems.eq(currentIndex).outerWidth();
            var trackOffset = -itemWidth * currentIndex;

            carouselTrack.css('transform', 'translateX(' + trackOffset + 'px)');

            currentIndex += direction;

            if (currentIndex >= carouselItems.length) {
                currentIndex = 0;
                carouselTrack.css('transition', 'none');
                carouselTrack.css('transform', 'translateX(0)');
                setTimeout(function() {
                    carouselTrack.css('transition', 'transform 0.5s ease-in-out');
                    carouselTrack.css('transform', 'translateX(' + (-carouselItems.eq(currentIndex).position().left) + 'px)');
                }, 10);
            }
        }, 5000);
    }

    // Call the function to animate the carousel
    animateCarousel();
});

