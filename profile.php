<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Сначала войдите в аккаунт.";
    exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Киногид - Рецензии на фильмы</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/drama.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href = "index.html">Киногид</a>
        </div>
        <form class="search-form">
            <input type="search" placeholder="Поиск по названию" aria-label="Поиск">
            <button type="submit">Поиск</button>
        </form>
        <nav>
            <a href="profile.html">Личный кабинет</a>
            <a href="registry.html">Регистрация/Вход</a>
        </nav>
    </header>
    <div class="profile-container">
        <div class="profile-header">
            <img src="https://pikuco.ru/upload/test_stable/512/512ecf62fa0b8d2b533d867cf0fc4667.webp" alt="Фото профиля" class="profile-photo">
            <h1 class="profile-nick"><?php echo htmlspecialchars($username); ?></h1>
        </div>
        <div class="tabs">
            <button class="tab-button" onclick="showTab('watched')">Просмотрено</button>
            <button class="tab-button" onclick="showTab('will-watch')">Буду смотреть</button>
            <button class="tab-button" onclick="showTab('watching')">Смотрю</button>
        </div>
        <div class="tab-content" id="watched">
            <h2>Просмотрено</h2>
            <div class="film-card">
                <a href = "dramafilm1.html"><img src="https://thumbs.dfs.ivi.ru/storage5/contents/6/1/0ceca03c51c3d38f34bdf3fd0dd2c8.jpg" alt="Постер фильма Один дома"></a>
                <div class="film-info">
                    <a href = "dramafilm1.html"><h3>1 + 1</h3></a>
                    <p><strong>Год:</strong> 2011</p>
                    <p><strong>Длительность:</strong> 1 час 52 минуты</p>
                    <p><strong>Страна:</strong> Франция</p>
                    <p><strong>Жанр:</strong> Драма</p>
                    <p><strong>Режиссёр:</strong>Оливье Накаш, Эрик Толедано</p>
                    <p><strong>Актёры:</strong> Франсуа Клюзе, Омар Си, нн Ле Ни</p>
                    <div class="rating">
                        <span>Рейтинг:</span>
                        <strong>8.8</strong>
                        <span>(2M отзывов)</span>
                    </div>
                </div>
            </div>
            <div class="film-card">
                <a href = "dramafilm2.html"><img src="https://avatars.mds.yandex.net/get-kinopoisk-image/1599028/4057c4b8-8208-4a04-b169-26b0661453e3/600x900" alt="Постер фильма Один дома"></a>
                <div class="film-info">
                    <a href = "dramafilm2.html"><h3>Зелёная Миля (The Green Mile)</h3></a>
                    <p><strong>Год:</strong> 1999</p>
                    <p><strong>Длительность:</strong> 3 часа 9 минут</p>
                    <p><strong>Страна:</strong> США</p>
                    <p><strong>Жанр:</strong> Драма</p>
                    <p><strong>Режиссёр:</strong>Фрэнк Дарабонт</p>
                    <p><strong>Актёры:</strong> Том Хэнкс, Дэвид Морс, Бонни Хант</p>
                    <div class="rating">
                        <span>Рейтинг:</span>
                        <strong>9.1</strong>
                        <span>(1M отзывов)</span>
                    </div>
                </div>
            </div>
            <!-- Список просмотренных фильмов -->
        </div>
        <div class="tab-content" id="will-watch" style="display:none;">
            <h2>Буду смотреть</h2>
            <!-- Список фильмов, которые пользователь планирует посмотреть -->
        </div>
        <div class="tab-content" id="watching" style="display:none;">
            <h2>Смотрю</h2>
            <!-- Список фильмов, которые пользователь сейчас смотрит -->
        </div>
    </div>
    <script>
        function showTab(tabId) {
            var tabs = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = 'none';
            }
            document.getElementById(tabId).style.display = 'block';
        }
    </script>
    <footer class="footer">
        <p>&copy; 2024 Киногид. Все права защищены.</p>
    </footer>
</body>