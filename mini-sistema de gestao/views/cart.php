<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include_once 'db.php';
include_once 'classes/Cart.php';

$database = new Database();
$db = $database->getConnection();

$cart = new Cart($db);

if ($_POST && isset($_POST['products'])) {
    foreach ($_POST['products'] as $product_id) {
        $cart->user_id = $_SESSION['user_id'];
        $cart->product_id = $product_id;
        $cart->addToCart();
    }
    header("Location: cart.php");
}

$cart_items = $cart->getCart($_SESSION['user_id']);
$total_price = 0;
$total_items = 0;
?>

<h1>Carrinho de Compras</h1>

<?php while ($row = $cart_items->fetch(PDO::FETCH_ASSOC)): ?>
    <?php echo $row['name']; ?> - <?php echo $row['price']; ?><br>
    <?php
    $total_price += $row['price'];
    $total_items++;
    ?>
<?php endwhile; ?>

<h3>Total de Produtos: <?php echo $total_items; ?></h3>
<h3>Valor Total: R$ <?php echo number_format($total_price, 2, ',', '.'); ?></h3>

<a href="dashboard.php">Voltar para o Dashboard</a