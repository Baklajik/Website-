<?php
require_once 'database.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);    
    $password = trim($_POST['password']);

    if(empty($username) || empty($email) || empty($password)) {
        echo "Ошибка: Вы не заполнили все поля";
    } else {
        $query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "Ошибка: Такой пользователь уже существует";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
            $result = mysqli_query($connect, $query);
            if ($result) {
                echo "Пользователь успешно зарегистрирован";
            } else {
                echo "Ошибка: Пользователь не зарегистрирован";
            }
        }
    }
} else {
    echo "Ошибка: Вы не заполнили все поля";
}
?>
