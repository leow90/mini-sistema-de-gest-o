<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once 'db.php';
include_once 'classes/Supplier.php';

$database = new Database();
$db = $database->getConnection();

$supplier = new Supplier($db);

if ($_POST) {
    $supplier->name = $_POST['name'];

    if ($supplier->create()) {
        echo "Fornecedor cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar fornecedor.";
    }
    header("Location: dashboard.php");
}
?>