<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/admin.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $user = $_POST['username'] ?? '';
  $pass = $_POST['password'] ?? '';
  if (admin_login($user, $pass)){
    header('Location: index.php'); exit;
  } else {
    $error = 'Invalid credentials';
  }
}
include __DIR__ . '/../includes/header.php';
?>

<h2>Admin Login</h2>
<?php if (!empty($error)) echo '<div class="alert alert-danger">'.htmlspecialchars($error).'</div>'; ?>
<form method="post" class="col-md-4">
  <div class="mb-3"><label>Username</label><input name="username" class="form-control" required></div>
  <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control" required></div>
  <button class="btn btn-primary">Login</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
