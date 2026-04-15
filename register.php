<?php
session_start();
$_SESSION['login'] = "";
$con = mysqli_connect('localhost','root','','marketplace');

if(isset($_POST['register_button'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_query = "SELECT * FROM users WHERE login='$login' OR email='$email'";
    $result = mysqli_query($con, $check_query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Konto z tym loginem lub emailem już istnieje!');</script>";

    } else {
        $query = "INSERT INTO users (id, name, surname, login, password, email) 
                  VALUES (NULL, '$name', '$surname', '$login', '$password', '$email')";
        
        mysqli_query($con, $query);
        echo "Rejestracja udana!";
        header('location:login.php');
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <section class="nazwa">
            Bazar<span class="pl">PL</span>
        </section>
        <nav>
            <a href="">Produkty</a><a href="">Dodaj Produkt</a><a href="">Użytkownicy</a>
        </nav>
        <section class="login_info">
            <a href="logout.php">Wyloguj</a>
        </section>
    </header>
    <main>
        <form action="register.php" method="post" class="register_form">
            <h2>Rejestracja</h2>
            <input type="text" placeholder="Imie" name="name" id="name" onkeyup="check()">
            <br><br>
            <input type="text" placeholder="Nazwisko" name="surname" id="surname" onkeyup="check()">
            <br><br>
            <input type="text" placeholder="Login" name="login" id="login" onkeyup="check()">
            <br><br>
            <input type="email" placeholder="E-mail" name="email" id="email" onkeyup="check()">
            <br><br>
            <input type="password" name="password" placeholder="Hasło" id="password" onkeyup="check()">
            <br><br>
            <input type="password" name="password_repeat" placeholder="Powtórz hasło" id="password_repeat" onkeyup="check()">
            <br><br>
            <p class="error_register" id="error_register"></p>
            
            <input type="submit" value="Zarejestruj się" name="register_button" id="register_button" disabled>
            <p>Masz juz konto? <a href="login.php">Zaloguj się</a></p>
            <script>
                function check(){

                    let error_register = document.getElementById('error_register');
                    let name = document.getElementById('name');
                    let surname = document.getElementById('surname');
                    let login = document.getElementById('login');
                    let email = document.getElementById('email');
                    let password = document.getElementById('password');
                    let password_repeat = document.getElementById('password_repeat');
                    if(name.value === "" || surname.value === "" || login.value === "" || email.value === "" || password.value === "" || password_repeat.value === "")
                        {
                        error_register.innerHTML = "Wpisz wszystkie dane";
                        document.getElementById('register_button').disabled = true;
                    } else if(password.value !== password_repeat.value){
                        error_register.innerHTML = "Hasła się nie zgadzają";
                        document.getElementById('register_button').disabled = true;

                    } else {
                        error_register.innerHTML = "";
                        document.getElementById('register_button').disabled = false;
                    }
                }
            </script>
        </form>
    </main>
</body>
</html>