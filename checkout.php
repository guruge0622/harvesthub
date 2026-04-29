<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD']==='POST') {
  // Basic validation
  $name = $mysqli->real_escape_string(trim($_POST['name']));
  $address = $mysqli->real_escape_string(trim($_POST['address']));
  $phone = $mysqli->real_escape_string(trim($_POST['phone']));
  $payment = $mysqli->real_escape_string(trim($_POST['payment']));

  if (empty($name) || empty($address) || empty($phone)) {
    $error = 'Please fill required fields.';
  } elseif (empty($_SESSION['cart'])) {
    $error = 'Cart is empty.';
  } else {
    // Create order (simple): store as JSON list
    $items = [];
    $total = 0;
    foreach ($_SESSION['cart'] as $pid=>$qty) {
      $r = $mysqli->query("SELECT * FROM products WHERE id=".(int)$pid); $p = $r->fetch_assoc();
      if (!$p) continue;
      $items[] = ['id'=>$p['id'],'name'=>$p['name'],'qty'=>$qty,'price'=>$p['price']];
      $total += $p['price']*$qty;
    }
    $stmt = $mysqli->prepare("INSERT INTO orders (customer_name,delivery_address,phone,payment_method,total_amount,items,created_at) VALUES (?,?,?,?,?,?,NOW())");
    $items_json = json_encode($items);
    $stmt->bind_param('sssdss',$name,$address,$phone,$payment,$total,$items_json);
    $stmt->execute();
    $_SESSION['cart'] = [];
    $success = 'Order placed successfully. Thank you!';
  }
}
?>

<h2>Checkout</h2>
<?php if (!empty($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
<?php if (!empty($success)): ?><div class="alert alert-success"><?php echo $success; ?></div><?php endif; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Full name</label>
    <input name="name" class="form-control" required>
  </div>
  <div class="col-12">
    <label class="form-label">Delivery address</label>
    <textarea name="address" class="form-control" required></textarea>
  </div>
  <div class="col-md-4">
    <label class="form-label">Contact number</label>
    <input name="phone" class="form-control" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Payment method</label>
    <select name="payment" class="form-select">
      <option>Cash on Delivery</option>
      <option>Bank Transfer</option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Place Order</button>
  </div>
</form>

<?php include 'includes/footer.php'; ?>
