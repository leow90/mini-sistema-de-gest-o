<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once 'db.php';
include_once 'classes/Product.php';
include_once 'classes/Supplier.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$supplier = new Supplier($db);

$products = $product->readAll();
$suppliers = $supplier->readAll();

?>

<h1>Bem-vindo ao Dashboard</h1>

<h2>Cadastrar Produto</h2>
<form method="POST" action="product.php">
    <input type="text" name="name" placeholder="Nome do Produto" required>
    <input type="text" name="price" placeholder="Preço" required>
    <button type="submit">Cadastrar Produto</button>
</form>

<h2>Cadastrar Fornecedor</h2>
<form method="POST" action="supplier.php">
    <input type="text" name="name" placeholder="Nome do Fornecedor" required>
    <button type="submit">Cadastrar Fornecedor</button>
</form>

<h2>Produtos Disponíveis</h2>
<form method="POST" action="cart.php">
    <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
        <input type="checkbox" name="products[]" value="<?php echo $row['id']; ?>"> 
        <?php echo $row['name']; ?> - <?php echo $row['price']; ?> <br>
    <?php endwhile; ?>
    <button type="submit">Adicionar ao Carrinho</button>
</form>

<h2>Fornecedores</h2>
<?php while ($row = $suppliers->fetch(PDO::FETCH_ASSOC)): ?>
    <?php echo $row['name']; ?><br>
<?php endwhile; ?>