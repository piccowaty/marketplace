<?php
    session_start();
    $con = mysqli_connect('localhost','root','','marketplace');
    if($_SESSION['login'] == ""){
        echo "<script>alert('Aby wyświetlić tą stronę musisz się zalogować');
        window.location.href = 'login.php';
        </script>";
    }
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
        <section class='users_list'>
            <h2>Lista uzytkowników:</h2>
            <?php
                $query_list = "Select login, email from users";
                $result_list = mysqli_query($con,$query_list);
                echo "login, email<br><br>";
                while($array = mysqli_fetch_array($result_list)){
                    echo $array['login'].", ".$array['email']."<br>";
                }
            ?>
        </section>
    </main>
</body>
</html>