document.addEventListener('DOMContentLoaded', () => {
    const films = document.querySelectorAll('.film-card');
    const showMoreBtn = document.getElementById('show-more');
    let filmsToShow = 2;

    const showFilms = () => {
        films.forEach((film, index) => {
            if (index < filmsToShow) {
                film.style.display = 'flex';
            } else {
                film.style.display = 'none';
            }
        });

        if (filmsToShow >= films.length) {
            showMoreBtn.style.display = 'none';
        }
    };

    showMoreBtn.addEventListener('click', () => {
        filmsToShow += 2;
        showFilms();
    });

    showFilms(); 
});