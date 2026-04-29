<?php
require_once __DIR__ . '/includes/db.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $name = $mysqli->real_escape_string(trim($_POST['name']));
  $email = $mysqli->real_escape_string(trim($_POST['email']));
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $mysqli->prepare("INSERT INTO users (name,email,password,created_at) VALUES (?,?,?,NOW())");
  $stmt->bind_param('sss',$name,$email,$password);
  if ($stmt->execute()) { header('Location: login.php'); exit; } else { $error = 'Could not create account.'; }
}
include 'includes/header.php';
?>

<h2>Sign Up</h2>
<?php if (!empty($error)) echo '<div class="alert alert-danger">'.htmlspecialchars($error).'</div>'; ?>
<form method="post" class="col-md-6">
  <div class="mb-3"><label>Name</label><input name="name" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input name="email" type="email" class="form-control" required></div>
  <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control" required></div>
  <button class="btn btn-primary">Create Account</button>
</form>

<?php include 'includes/footer.php'; ?>
