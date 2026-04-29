<?php
require_once __DIR__ . '/../includes/db.php'; include __DIR__ . '/../includes/header.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $name = $mysqli->real_escape_string($_POST['name']);
  $short = $mysqli->real_escape_string($_POST['short_description']);
  $price = (float)$_POST['price'];
  $image = $mysqli->real_escape_string($_POST['image']);
  $farmer = (int)$_POST['farmer_id'];
  if ($id) {
    $mysqli->query("UPDATE products SET name='$name',short_description='$short',price=$price,image='$image',farmer_id=$farmer WHERE id=$id");
  } else {
    $mysqli->query("INSERT INTO products (name,short_description,price,image,farmer_id,created_at) VALUES ('$name','$short',$price,'$image',$farmer,NOW())");
  }
  header('Location: index.php'); exit;
}
$p = null; if ($id) { $r = $mysqli->query("SELECT * FROM products WHERE id=$id"); $p = $r->fetch_assoc(); }
$farmers = $mysqli->query("SELECT * FROM farmers");
?>
<h2><?php echo $id? 'Edit' : 'Add'; ?> Product</h2>
<form method="post" class="col-md-6">
  <div class="mb-3"><label>Name</label><input name="name" class="form-control" value="<?php echo $p['name']??''; ?>"></div>
  <div class="mb-3"><label>Short description</label><input name="short_description" class="form-control" value="<?php echo $p['short_description']??''; ?>"></div>
  <div class="mb-3"><label>Price</label><input name="price" class="form-control" value="<?php echo $p['price']??''; ?>"></div>
  <div class="mb-3"><label>Image path (relative)</label><input name="image" class="form-control" value="<?php echo $p['image']??'img1.jpg'; ?>"></div>
  <div class="mb-3"><label>Farmer</label>
    <select name="farmer_id" class="form-select">
      <?php while ($f = $farmers->fetch_assoc()): ?>
        <option value="<?php echo $f['id']; ?>" <?php if(isset($p['farmer_id']) && $p['farmer_id']==$f['id']) echo 'selected'; ?>><?php echo htmlspecialchars($f['name']); ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <button class="btn btn-primary">Save</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
