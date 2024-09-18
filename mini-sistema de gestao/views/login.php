<?php
include_once 'db.php';
include_once 'classes/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];

    if ($user->login()) {
        session_start();
        $_SESSION['user_id'] = $user->id;
        header("Location: dashboard.php");
    } else {
        echo "Login failed.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>