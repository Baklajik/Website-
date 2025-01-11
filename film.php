<?php
require_once 'php/database.php';

if (isset($_GET['id'])) {
    $catalog_id = $_GET['id']; 
    $query = "SELECT * FROM film 
              INNER JOIN catalog_film 
              ON catalog_film.catalog_id = film.single_film_id
              WHERE catalog_film.catalog_id = $catalog_id";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Ошибка выполнения запроса: " . mysqli_error($connect));
    }

    $film = mysqli_fetch_assoc($result);
    if (!$film) {
        die("Фильм не найден.");
    }
} else {
    die("ID фильма не указан.");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($film['film_name']); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/films.css">
    <script src="js/dropdown.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html">Киногид</a>
        </div>
        <form class="search-form">
            <input type="search" placeholder="Поиск по названию" aria-label="Поиск">
            <button type="submit">Поиск</button>
        </form>
        <nav>
            <a href="/profile.php">Личный кабинет</a>
            <a href="registry.html">Регистрация/Вход</a>
        </nav>
    </header>
    <div class="containerfilm"> 
        <img src="<?php echo htmlspecialchars($film['film_image']); ?>" class="poster"> 
        <div class="info">
            <h1><?php echo htmlspecialchars($film['film_name']); ?> <span class="rating"><?php echo htmlspecialchars($film['film_rating']); ?>/10</span></h1>
            <p><?php echo htmlspecialchars($film['eng_film_name']); ?></p>
            <h2>О фильме</h2>
            <p><strong>Год выпуска:</strong> <?php echo htmlspecialchars($film['film_year']); ?></p> 
            <p><strong>Страна:</strong> <?php echo htmlspecialchars($film['film_country']); ?></p> 
            <p><strong>Жанры:</strong> <?php echo htmlspecialchars($film['film_genre']); ?></p> 
            <p><strong>Режиссёр:</strong> <?php echo htmlspecialchars($film['film_director']); ?></p> 
            <p><strong>Продюсер:</strong> <?php echo htmlspecialchars($film['film_producer']); ?></p>
            <p><strong>Сценарий:</strong> <?php echo htmlspecialchars($film['scenario']); ?></p> 
            <p><strong>Оператор:</strong> <?php echo htmlspecialchars($film['operator']); ?></p> 
            <p><strong>Бюджет:</strong> <?php echo htmlspecialchars($film['budget']); ?></p> 
            <p><strong>Сборы в США:</strong> <?php echo htmlspecialchars($film['USA_fees']); ?></p> 
            <p><strong>Сборы в мире:</strong> <?php echo htmlspecialchars($film['world_fees']); ?></p>  
            <p><strong>Краткое описание:</strong> <?php echo htmlspecialchars($film['description']); ?></p> 
            <div class="dropdown"> 
                <button onclick="toggleDropdown(this)">Добавить в закладки</button> 
                <div class="dropdown-content">                
                    <a href="#">Буду смотреть</a>
                    <a href="#">Смотрю</a>
                    <a href="#">Просмотрено</a>    
                </div> 
            </div>       
        </div> 
    </div>

    <div class="published-comments"> 
        <h2>Опубликованные комментарии</h2> 
        <div class="comment"> 
            <p><strong>Пользователь 1:</strong> Отличный фильм! Понравился каждый момент.</p> 
        </div> 
        <div class="comment"> 
            <p><strong>Пользователь 2:</strong> Потрясающая актёрская игра и режиссура.</p> 
        </div> 
        <div class="comment"> 
            <p><strong>Пользователь 3:</strong> Один из лучших фильмов, которые я видел в этом году.</p> 
        </div>
    </div>
        
    <div class="comments-section"> 
        <h2>Комментарии</h2> 
        <textarea placeholder="Оставьте свой комментарий..."></textarea> 
        <button type="button">Отправить</button> 
    </div>

    <footer>
        <p>&copy; 2024 Киногид. Все права защищены.</p>
    </footer>
</body>
</html>
