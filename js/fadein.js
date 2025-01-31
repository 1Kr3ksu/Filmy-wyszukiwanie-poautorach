document.addEventListener("DOMContentLoaded", function() {
    const films = document.querySelectorAll('.film');

    films.forEach(film => {
        film.style.opacity = "0";
    });

    films.forEach((film, index) => {
        setTimeout(() => {
            film.style.transition = "opacity 1s ease-in-out";
            film.style.opacity = "1";
        }, index * 300);
    });
});
