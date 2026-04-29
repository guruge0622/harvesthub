<?php require_once __DIR__ . '/includes/db.php'; include 'includes/header.php'; ?>

<h2>All Products</h2>
<div class="product-grid">
<?php
$res = $mysqli->query("SELECT p.*, f.name as farmer_name FROM products p LEFT JOIN farmers f ON p.farmer_id=f.id ORDER BY p.id DESC");
while ($p = $res->fetch_assoc()): ?>
  <div class="card card-feature product-card">
    <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
    <div class="p-3">
      <h5><?php echo htmlspecialchars($p['name']); ?></h5>
      <p class="muted"><?php echo htmlspecialchars($p['short_description']); ?></p>
      <p><strong>LKR <?php echo number_format($p['price'],2); ?></strong></p>
      <a href="product-details.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-success">Details</a>
      <a href="cart.php?action=add&id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">Add to Cart</a>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>
