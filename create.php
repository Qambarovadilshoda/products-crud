<?php
require 'database.php';

$productModel = new ProductModel($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    
    if ($name && $price !== false && isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        if (is_array($allowedExtensions)) {
            $photo = $_FILES['photo']['name'];
            $target = "uploads/".basename($photo);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                $productModel->create($name, $price, $target);
                header('Location: index.php');
                exit;
            }else{
                die('Rasmni yuklashda xatolik bor');
            }
        }else{
            die('Faqat jpg, png, jpeg formatdagi fayllarni yuklash mumkin');
        }
    }else{
        die("Iltimos ma'lumotlaringizni to'g'ri kiriting");
    }
}else{
    die("Noto'g'ri so'rov");
}
?>
