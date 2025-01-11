<?php
require_once 'database.php';

if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        echo "Ошибка: Вы не заполнили все поля";
    }else{
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['user_id'];
                header('Location: /profile.php');
                exit;
            }else{
                echo "Ошибка: Неверный логин или пароль";
            }
        }else{
            echo "Ошибка: Такого пользователя не существует";
        }
    }
}else{
    echo "Ошибка: Вы не заполнили все поля";
}
?>