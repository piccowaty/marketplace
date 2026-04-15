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
        <h2>Statystyki portalu</h2>
        <section class='statistics'>
            
            <?php
                session_start();
                $con = mysqli_connect('localhost','root','','marketplace');
                $query_all = "Select count(id) from products";
                $result_all = mysqli_query($con,$query_all);
                while($row_all = mysqli_fetch_row($result_all)){
                    echo "<p>Wszystkich <br> ogłoszeń: <br>".$row_all[0]."</p>";
                }
                $query_available = "Select count(id) from products where status = 'dostepny'";
                $result_available = mysqli_query($con,$query_available);
                while($row_available = mysqli_fetch_row($result_available)){
                    echo "<p>Dostępnych <br> ogłoszeń: <br>".$row_available[0]."</p>";
                }
                $query_sold = "Select count(id) from products where status = 'sprzedany'";
                $result_sold = mysqli_query($con,$query_sold);
                while($row_sold = mysqli_fetch_row($result_sold)){
                    echo "<p>Zakończonych <br> ogłoszeń: <br>".$row_sold[0]."</p>";
                }
            ?>
        </section>
        <section class='product_list'>
            <?php
                $id_user = $_SESSION['login'];
                // Łączymy tabelę produktów z tabelą użytkowników
                $query_list_products = "select products.*, users.login from products join users on products.user_id = users.id";
                $result_list_products = mysqli_query($con, $query_list_products);

                while($a = mysqli_fetch_assoc($result_list_products)){
                    echo "<div>";
                    echo "<h3>".$a['name']."</h3>";
                    echo "<p>".$a['description']."</p>";
                    echo "<p>".$a['price']." ZŁ</p>";
                    echo "<p>Status: ".$a['status']."</p>";
                    echo "Sprzedający: <b>".$a['login']."</b>"; // Teraz wyświetli login!

                    if($_SESSION['login'] == $a['user_id']){
                        echo "<p>Twój produkt</p>";
                        echo "<input type='button' value='Twój produkt' disabled>";
                    }
                    else if($a['status'] == 'Sprzedany'){
                        echo "<p><input type='button' value='Sprzedany' disabled></p>";
                    }
                    else{
                        echo "<p><a href='buy_process.php?id=".$a['id']."'><input type='button' value='Kup teraz'></a></p>";
                    }
                    echo "</div>";
                }
            ?>
        </section>
    </main>
</body>
</html>