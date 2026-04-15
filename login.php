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
        
        <form action="login.php" method="post" class="login_form">
            <h2>Logowanie</h2>
            <input type="text" placeholder="Twój login" name="login">
            <br><br>
            <input type="password" name="password" placeholder="Hasło">
            <br><br>
            <input type="submit" value="Zaloguj się">
            <p>Nie masz konta? <a href="register.php">Zarejestruj się</a></p>
        </form>
        
    </main>
</body>
</html>