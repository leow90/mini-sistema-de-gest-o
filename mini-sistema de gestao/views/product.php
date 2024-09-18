<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once 'db.php';
include_once 'classes/Product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

if ($_POST) {
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];

    if ($product->create()) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto.";
    }
    header("Location: dashboard.php");
}
?>
