<?php
    session_start();
    $con = mysqli_connect('localhost','root','','marketplace');
    echo $_SESSION['login'];

    if(isset($_POST['login_button'])){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query_login = "Select id,password from users where login = '$login'";
        $result_login = mysqli_query($con,$query_login);
        while($row = mysqli_fetch_row($result_login)){
            if(password_verify($password,$row[1])){
                $_SESSION['login'] = $row[0];
                header('location:index.php');
            }
            else{
                echo "<script>alert('Niepoprawny login lub hasło');</script>";
            }
        }
    }
    echo $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <section class="nazwa">
            <a href="index.php">Bazar<span class="pl">PL</span></a>
        </section>
        <nav>
            <a href="index.php">Produkty</a><a href="add_product.php">Dodaj Produkt</a><a href="users.php">Użytkownicy</a>
        </nav>
        <section class="login_info">
            <a href="logout.php">Wyloguj</a>
        </section>
    </header>
    <main>
        <form action="login.php" method="post" class="login_form">
            <h2>Logowanie</h2>
            <input type="text" placeholder="Twój login" name="login" id="login" oninput="checkLogin()">
            <br><br>
            <input type="password" name="password" placeholder="Hasło" id="password" oninput="checkLogin()">
            <br><br>
            <p id="login_error"></p>
            <input type="submit" value="Zaloguj się" name="login_button" id="login_button" disabled>
            <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
        </form>
        <script>
            function checkLogin(){
                let login = document.getElementById('login');
                let password = document.getElementById('password');
                let error = document.getElementById('login_error');
                let button = document.getElementById('login_button');

                if(login.value === "" && password.value === ""){
                    error.innerHTML = "Wpisz login i hasło";
                    button.disabled = true;

                } else if(login.value === ""){
                    error.innerHTML = "Wpisz login";
                    button.disabled = true;

                } else if(password.value === ""){
                    error.innerHTML = "Wpisz hasło";
                    button.disabled = true;

                } else {
                    error.innerHTML = "";
                    button.disabled = false;
                }
            }
        </script>
    </main>
</body>
</html>