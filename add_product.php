<?php
    session_start();
    $con = mysqli_connect('localhost','root','','marketplace');
    if($_SESSION['login'] == ""){
        echo "<script>alert('Aby wyświetlić tą stronę musisz się zalogować');
        window.location.href = 'login.php';
        </script>";
    }
    if(isset($_POST['add_product_button'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $id_user = $_SESSION['login'];

        $query_add_product = "Insert into products values(null,'$name','$description','$price','Dostępny','$id_user',NOW())";
        mysqli_query($con,$query_add_product);
        header('location:index.php');
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
        <section class='add_product'>
            <form method='post' action='add_product.php'>
                <h2>Dodaj produkt</h2>
                <input type='text' name='name' id='name' placeholder='Nazwa' onkeyup="check_add()">
                <br>
                <input type='text' name='description' id='description' placeholder='Opis' onkeyup="check_add()">
                <br>
                <input type='number' name='price' id='price' placeholder='Cena' onkeyup="check_add()">
                <br>
                <input type='submit' value='Dodaj produkt' name='add_product_button' id='add_product_button' disabled>
                <p class='error_add_product' id='error_add_product'></p>
            </form>
            <script>
                function check_add(){
                    let error_add_product = document.getElementById('error_add_product');
                    let name = document.getElementById('name');
                    let description = document.getElementById('description');
                    let price = document.getElementById('price');

                    if(name.value === "" || description.value === "" || price.value === ""){
                        error_add_product.innerHTML = "Wypełnij wszystkie pola";
                        document.getElementById('add_product_button').disabled = true;
                    }
                    else{
                        error_add_product.innerHTML = "";
                        document.getElementById('add_product_button').disabled = false;
                    }
                }
            </script>
        </section>
    </main>
</body>
</html>