<?php
// Very small admin area (no auth) for demonstration only
require_once __DIR__ . '/../includes/db.php';
include __DIR__ . '/../includes/header.php';

// delete
if (isset($_GET['delete'])) { $id=(int)$_GET['delete']; $mysqli->query("DELETE FROM products WHERE id=$id"); }

$res = $mysqli->query("SELECT p.*, f.name as farmer_name FROM products p LEFT JOIN farmers f ON p.farmer_id=f.id");
?>
<h2>Admin — Products</h2>
<a href="products-edit.php" class="btn btn-sm btn-success mb-3">Add Product</a>
<table class="table">
  <thead><tr><th>ID</th><th>Name</th><th>Farmer</th><th>Price</th><th></th></tr></thead>
  <tbody>
    <?php while ($p = $res->fetch_assoc()): ?>
      <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['name']); ?></td>
        <td><?php echo htmlspecialchars($p['farmer_name']); ?></td>
        <td><?php echo number_format($p['price'],2); ?></td>
        <td><a href="products-edit.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
            <a href="?delete=<?php echo $p['id']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../includes/footer.php'; ?>
