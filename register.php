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
            <input type="text" placeholder="Imie" name="name">
            <br><br>
            <input type="text" placeholder="Nazwisko" name="surname">
            <br><br>
            <input type="text" placeholder="Login" name="login">
            <br><br>
            <input type="text" placeholder="E-mail" name="Email">
            <br><br>
            <input type="password" name="password" placeholder="Hasło">
            <br><br>
            <input type="password" name="password" placeholder="Powtórz hasło">
            <br><br>
            <input type="submit" value="Zarejestruj się">
            <p>Masz juz konto? <a href="login.php">Zaloguj się</a></p>
        </form>
        
    </main>
</body>
</html>