jQuery(document).ready(function($) {
    // Инициализация модального окна
    $('#signIn').modal();
});

// Получаем ссылку на контейнер карусели
var carouselContainer = document.querySelector('.carousel-container');
var carouselTrack = carouselContainer.querySelector('.carousel-track');
var carouselItems = carouselContainer.querySelectorAll('.carousel-block');
var carouselWidth = carouselContainer.offsetWidth;
var currentIndex = 0;
var direction = 1; // Направление движения (1 - вперед, -1 - назад)

// Копируем каждый элемент и добавляем его в конец трека
carouselItems.forEach(function(item) {
    carouselTrack.appendChild(item.cloneNode(true));
});

// Устанавливаем ширину трека равной общей ширине карусели
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

// Анимируем карусель
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
                carouselTrack.style.transition = 'transform 0.5s ease-in-out';
                carouselTrack.style.transform = 'translateX(' + (-carouselItems[currentIndex].offsetLeft) + 'px)';
            }, 10);
        }
    }, 5000);
}

// Вызываем функцию для анимации карусели
animateCarousel();

