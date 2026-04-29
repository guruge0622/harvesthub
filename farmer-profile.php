<?php
require_once __DIR__ . '/includes/db.php'; include 'includes/header.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $mysqli->prepare("SELECT * FROM farmers WHERE id=?"); $stmt->bind_param('i',$id); $stmt->execute(); $res = $stmt->get_result(); $f = $res->fetch_assoc();
if (!$f) { echo '<div class="alert alert-warning">Farmer not found.</div>'; include 'includes/footer.php'; exit; }
?>

<div class="row">
  <div class="col-md-4 text-center">
    <img src="<?php echo htmlspecialchars($f['image']); ?>" class="rounded farm-card" alt="<?php echo htmlspecialchars($f['name']); ?>">
    <h3><?php echo htmlspecialchars($f['name']); ?></h3>
    <p class="muted"><?php echo htmlspecialchars($f['location']); ?></p>
    <p>Contact: <?php echo htmlspecialchars($f['contact']); ?></p>
  </div>
  <div class="col-md-8">
    <h4>Available Products</h4>
    <div class="product-grid">
      <?php
      $prod = $mysqli->query("SELECT * FROM products WHERE farmer_id=". (int)$f['id']);
      while ($p = $prod->fetch_assoc()): ?>
        <div class="card card-feature">
          <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
          <div class="p-2">
            <h5><?php echo htmlspecialchars($p['name']); ?></h5>
            <p class="muted"><?php echo htmlspecialchars($p['short_description']); ?></p>
            <a href="product-details.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-success">Details</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
