<?php
require_once 'php/database.php';

$query = "SELECT * FROM catalog_film";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($connect));
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фильмы по жанрам</title>
    <link rel="stylesheet" href="css/drama.css">
    <script src="js/dropdown.js"></script>
    <script src="js/button.js"></script>
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
    <div class="container">
        <div class="sidebar"> 
            <div class="dropdown"> 
                <button onclick="toggleDropdown(this)">Страны</button> 
                <div class="dropdown-content"> 
                    <a href="#">Все страны</a> 
                    <a href="#">США</a>
                    <a href="#">Франция</a>
                    <a href="#">Великобритания</a>
                    <a href="#">Канада</a>
                    <a href="#">Мексика</a>
                    <a href="#">Китай</a>      
                </div> 
            </div> 
            <div class="dropdown"> 
                <button onclick="toggleDropdown(this)">Жанры</button> 
                <div class="dropdown-content"> 
                    <a href="#">Комедии</a> 
                    <a href="dramagenre.php">Драма</a> 
                    <a href="#">Фантастика</a>
                    <a href="#">Боевик</a>
                    <a href="#">Ужасы</a>
                    <a href="#">Мелодрама</a>     
                </div> 
            </div> 
            <div class="dropdown"> 
                <button onclick="toggleDropdown(this)">Годы</button> 
                <div class="dropdown-content"> 
                    <a href="#">Все годы</a>
                    <a href="#">2024</a>
                    <a href="#">2023</a>
                    <a href="#">2022</a>
                    <a href="#">2021</a>
                    <a href="#">2020</a>
                    <a href="#">2019</a>
                    <a href="#">2018</a>
                    <a href="#">2017</a>
                    <a href="#">2016</a>
                    <a href="#">2015</a>
                    <a href="#">2014</a>
                    <a href="#">2013</a>
                    <a href="#">2012</a>
                    <a href="#">2011</a>
                    <a href="#">2010</a>
                    <a href="#">2009</a>
                    <a href="#">2008</a>
                    <a href="#">2007</a>
                    <a href="#">2006</a>
                    <a href="#">2005</a>
                    <a href="#">2004</a>
                    <a href="#">2003</a>
                    <a href="#">2002</a>
                    <a href="#">2001</a>
                    <a href="#">2000</a>
                    <a href="#">1980-1989</a>
                    <a href="#">1970-1979</a>
                    <a href="#">1990-1999</a>
                    <a href="#">1960-1969</a>
                    <a href="#">1950-1959</a>
                    <a href="#">1940-1949</a>
                    <a href="#">1930-1939</a>
                    <a href="#">1920-1929</a>
                    <a href="#">1910-1919</a>                  
                </div>
            </div>
        </div>
        <div class="content">
            <h1>Фильмы выбранного жанра</h1>
            <div class="film-row">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="film-card">
                    <a href="film.php?id=<?php echo $row['catalog_id'];?>">
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Постер фильма <?php echo htmlspecialchars($row['name']); ?>"></a>
                    <div class="film-info">
                        <a href="film.php?id=<?php echo $row['catalog_id']; ?>"><h3><?php echo htmlspecialchars($row['name']); ?></h3></a>
                        <p><strong>Год:</strong> <?php echo htmlspecialchars($row['year']); ?></p>
                        <p><strong>Длительность:</strong> <?php echo htmlspecialchars($row['duration']); ?></p>
                        <p><strong>Страна:</strong> <?php echo htmlspecialchars($row['country']); ?></p>
                        <p><strong>Жанр:</strong> <?php echo htmlspecialchars($row['genre']); ?></p>
                        <p><strong>Режиссёр:</strong> <?php echo htmlspecialchars($row['director']); ?></p>
                        <p><strong>Актёры:</strong> <?php echo htmlspecialchars($row['actors']); ?></p>
                        <div class="rating">
                            <span>Рейтинг:</span> 
                            <strong><?php echo htmlspecialchars($row['rating']); ?></strong>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <button id="show-more">Показать ещё</button>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Киногид. Все права защищены.</п>
    </footer>   
</body>
</html>