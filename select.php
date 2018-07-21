<?php


 $id = $_GET['id'];
 
    require_once './config.php';
    
    $query = "SELECT * FROM products WHERE id = $id";

    $result = mysqli_query($link, $query);

    $num_rows = mysqli_num_rows($result);

    $data = mysqli_fetch_assoc($result);
    
    echo json_encode($data); die();