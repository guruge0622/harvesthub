<?php
require_once __DIR__ . '/includes/db.php';
include 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $mysqli->prepare("SELECT p.*, f.name as farmer_name FROM products p LEFT JOIN farmers f ON p.farmer_id=f.id WHERE p.id=? LIMIT 1");
$stmt->bind_param('i',$id);
$stmt->execute();
$res = $stmt->get_result();
$p = $res->fetch_assoc();
if (!$p) { echo '<div class="alert alert-warning">Product not found.</div>'; include 'includes/footer.php'; exit; }
?>

<div class="row">
  <div class="col-md-6">
    <img src="<?php echo htmlspecialchars($p['image']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($p['name']); ?>">
  </div>
  <div class="col-md-6">
    <h2><?php echo htmlspecialchars($p['name']); ?></h2>
    <p class="muted"><?php echo htmlspecialchars($p['short_description']); ?></p>
    <p><strong>LKR <?php echo number_format($p['price'],2); ?></strong></p>
    <p><small>Farmer: <?php echo htmlspecialchars($p['farmer_name']); ?></small></p>
    <a href="cart.php?action=add&id=<?php echo $p['id']; ?>" class="btn btn-primary">Add to Cart</a>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
