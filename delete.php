<?php

require 'database.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    $productModel = new ProductModel($db);

    $product = $productModel->show($id);

    if ($product && $product['id'] == $id) {
        $productModel->delete($id);
        if (file_exists($product['photo'])) {
            unlink($product['photo']);
        } else {
            echo "Rasm fayli mavjud emas";
        }
        header("Location: read.php");
        exit;
    } else {
        echo "Mahsulot mavjud emas";
    }
}
?>