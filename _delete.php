<?php 


if(isset($_GET['productID'])){
    $productID = $_GET['productID'];
}else{
    header("Location: view.php");
}

    $url = "http://localhost/Invenroty_system/_delete.php?productID=$productID";
    $response = file_get_contents($url);
    if($response){
        header("Location: view.php");
    }