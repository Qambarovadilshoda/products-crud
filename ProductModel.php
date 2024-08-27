<?php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }

    public function show($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(array(':id' => $id));
        
        $product = $stmt->fetch();
        
        if ($product === false) {
            return null; 
        }
        
        return $product;
    }

    public function create($name, $price, $photo) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, photo) VALUES (:name, :price, :photo)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':photo', $photo);
        
        try {
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    } 

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price, photo = :photo WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':photo', $data['photo']);

        try {
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(array(':id' => $id));
    }
}
?>