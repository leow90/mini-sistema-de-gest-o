<?php
include_once 'db.php';
include_once 'classes/Cart.php';

$database = new Database();
$db = $database->getConnection();

$cart = new Cart($db);

$user_id = $_POST['user_id']; // ID do usuário passado via AJAX
$cart_items = $cart->getCart($user_id);

$response = [];

while ($row = $cart_items->fetch(PDO::FETCH_ASSOC)) {
    $response[] = ['name' => $row['name'], 'price' => $row['price']];
}

echo json_encode($response);
?>