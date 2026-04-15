<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'marketplace');

if(isset($_GET['id']) && isset($_SESSION['login'])){
    $product_id = $_GET['id'];
    $buyer_id = $_SESSION['login'];

    // Dodanie do tabeli purchases (używając Twoich nazw kolumn)
    $q1 = "INSERT INTO purchases (product_id, buyer_id, purchase_date) VALUES ('$product_id', '$buyer_id', NOW())";
    // Zmiana statusu na Sprzedany
    $q2 = "UPDATE products SET status = 'Sprzedany' WHERE id = '$product_id'";

    mysqli_query($con, $q1);
    mysqli_query($con, $q2);
    
    header("Location: index.php");
}
?>