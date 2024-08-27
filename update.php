<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $newName = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $newPrice = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $productModel = new ProductModel($db);
    $product = $productModel->show($id);

    if ($product && $product['id'] == $id) {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            if (file_exists($product['photo'])) {
                unlink($product['photo']);
            }
            $allowedExtensions = ['jpg', 'png', 'jpeg'];
            if (is_array($allowedExtensions)) {
                $newFilename = $_FILES['photo']['name'];
                $target = 'uploads/';
                $targetFile = $target . $newFilename;
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                    $product['photo'] = $targetFile;
                }
            }
        }
        $data = [
            'id' => $id,
            'name' => $newName,
            'price' => $newPrice,
            'photo' => $product['photo'],
        ];
        $productModel->update($id, $data);
        header("Location: read.php");
        exit;
    } else {
        die('Mahsulot mavjud emas yoki so\'rov xato.');
    }
}
