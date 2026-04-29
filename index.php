<?php
require_once __DIR__ . '/includes/db.php';
?>
<?php include 'includes/header.php'; ?>

<section class="hero mb-4">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h1 style="color:var(--green)">HarvestHub — Farm Produce Marketplace</h1>
      <p class="lead">Fresh from local farms. Simple, affordable, and sustainable.</p>
      <a href="products.php" class="btn btn-primary">Shop Products</a>
    </div>
    <div class="col-md-6 text-center">
      <img src="img1.jpg" alt="fresh" class="img-fluid rounded">
    </div>
  </div>
</section>

<section class="mb-4">
  <h3>Featured Products</h3>
  <div class="row">
    <?php
    $res = $mysqli->query("SELECT * FROM products ORDER BY id DESC LIMIT 4");
    while ($p = $res->fetch_assoc()): ?>
      <div class="col-md-3">
        <div class="card card-feature">
          <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
          <div class="card-body">
            <h5><?php echo htmlspecialchars($p['name']); ?></h5>
            <p class="muted"><?php echo htmlspecialchars($p['short_description']); ?></p>
            <p><strong>LKR <?php echo number_format($p['price'],2); ?></strong></p>
            <a href="product-details.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-success">Details</a>
            <a href="cart.php?action=add&id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">Add to Cart</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<section class="mb-4">
  <h3>Why Choose Us</h3>
  <div class="row">
    <div class="col-md-4"><div class="card p-3">Local farms &amp; traceability</div></div>
    <div class="col-md-4"><div class="card p-3">Freshness guaranteed</div></div>
    <div class="col-md-4"><div class="card p-3">Support small farmers</div></div>
  </div>
</section>

<section class="mb-4">
  <h3>Farmer Highlights</h3>
  <div class="row">
    <?php
    $fr = $mysqli->query("SELECT * FROM farmers LIMIT 3");
    while ($f = $fr->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="d-flex align-items-center card p-3">
          <img src="<?php echo htmlspecialchars($f['image']); ?>" class="me-3 farm-card" alt="<?php echo htmlspecialchars($f['name']); ?>">
          <div>
            <h5><?php echo htmlspecialchars($f['name']); ?></h5>
            <p class="muted"><?php echo htmlspecialchars($f['location']); ?></p>
            <a href="/harvesthub/farmer-profile.php?id=<?php echo $f['id']; ?>" class="btn btn-sm btn-outline-success">View Profile</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
