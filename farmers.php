<?php require_once __DIR__ . '/includes/db.php'; include 'includes/header.php'; ?>

<h2>Our Farmers</h2>
<div class="row">
<?php $res = $mysqli->query("SELECT * FROM farmers ORDER BY id DESC"); while ($f = $res->fetch_assoc()): ?>
  <div class="col-md-4">
    <div class="card p-3">
      <div class="d-flex align-items-center">
        <img src="<?php echo htmlspecialchars($f['image']); ?>" class="me-3 farm-card" alt="<?php echo htmlspecialchars($f['name']); ?>">
        <div>
          <h5><?php echo htmlspecialchars($f['name']); ?></h5>
          <p class="muted"><?php echo htmlspecialchars($f['location']); ?></p>
          <a href="farmer-profile.php?id=<?php echo $f['id']; ?>" class="btn btn-sm btn-outline-success">View</a>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>
