<?php
class Cart {
    private $conn;
    private $table_name = "cart";

    public $user_id;
    public $product_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addToCart() {
        $query = "INSERT INTO " . $this->table_name . " (user_id, product_id) VALUES (:user_id, :product_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":product_id", $this->product_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getCart($user_id) {
        $query = "SELECT p.name, p.price FROM " . $this->table_name . " c JOIN products p ON c.product_id = p.id WHERE c.user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt;
    }
}
?>