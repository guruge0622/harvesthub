<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();
// Simple session cart implementation
$action = $_GET['action'] ?? null;
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($action === 'add' && $id>0) {
  // add 1 quantity
  $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
  header('Location: cart.php'); exit;
}
if ($action === 'remove' && $id>0) {
  unset($_SESSION['cart'][$id]); header('Location: cart.php'); exit;
}
include 'includes/header.php';
?>

<h2>Your Cart</h2>
<?php if (empty($_SESSION['cart'])): ?>
  <div class="alert alert-info">Your cart is empty. <a href="products.php">Shop now</a></div>
<?php else: ?>
  <table class="table">
    <thead><tr><th>Product</th><th>Qty</th><th>Price</th><th></th></tr></thead>
    <tbody>
    <?php $total=0; foreach ($_SESSION['cart'] as $pid=>$qty):
      $r = $mysqli->query("SELECT * FROM products WHERE id=".(int)$pid); $p = $r->fetch_assoc();
      if (!$p) continue;
      $sub = $p['price']*$qty; $total += $sub; ?>
      <tr>
        <td><?php echo htmlspecialchars($p['name']); ?></td>
        <td><?php echo (int)$qty; ?></td>
        <td>LKR <?php echo number_format($sub,2); ?></td>
        <td><a href="cart.php?action=remove&id=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger">Remove</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div class="d-flex justify-content-between align-items-center">
    <h4>Total: LKR <?php echo number_format($total,2); ?></h4>
    <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
  </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
