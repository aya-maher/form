<?php

$id = $_GET['id'];
//echo $_GET['id'];die();
require_once './config.php';


$query = "DELETE FROM `products` WHERE id=$id";


$result = mysqli_query($link, $query);
if ($result) {
//    header("location: index.php");
    echo 'Done';
}