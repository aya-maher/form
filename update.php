<?php

$id = $_GET['id'];
require_once './config.php';
if (isset($_POST['submit'])) {
    $image = $_POST['image'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];



    $query = "UPDATE products SET image='$image', name='$name' , price='$price', quantity='$quantity' WHERE id=$id ";


    $result = mysqli_query($link, $query);

    if ($result) {
        header("location: index.php");
    }
}