<?php
require_once __DIR__ . '/includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $email = $mysqli->real_escape_string($_POST['email']);
  $pass = $_POST['password'];
  $res = $mysqli->query("SELECT * FROM users WHERE email='".$email."' LIMIT 1");
  if ($u = $res->fetch_assoc()){
    if (password_verify($pass, $u['password'])){
      $_SESSION['user'] = ['id'=>$u['id'],'name'=>$u['name'],'email'=>$u['email']];
      header('Location: index.php'); exit;
    } else { $error = 'Invalid credentials'; }
  } else { $error = 'Invalid credentials'; }
}
include 'includes/header.php';
?>

<h2>Login</h2>
<?php if (!empty($error)) echo '<div class="alert alert-danger">'.htmlspecialchars($error).'</div>'; ?>
<form method="post" class="col-md-6">
  <div class="mb-3"><label>Email</label><input name="email" type="email" class="form-control" required></div>
  <div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control" required></div>
  <button class="btn btn-primary">Login</button>
  <a href="signup.php" class="btn btn-link">Sign up</a>
</form>

<?php include 'includes/footer.php'; ?>
