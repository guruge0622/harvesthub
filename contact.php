<?php
require_once __DIR__ . '/includes/db.php'; include 'includes/header.php';
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $name = $mysqli->real_escape_string($_POST['name']);
  $email = $mysqli->real_escape_string($_POST['email']);
  $message = $mysqli->real_escape_string($_POST['message']);
  $stmt = $mysqli->prepare("INSERT INTO contact_messages (name,email,message,created_at) VALUES (?,?,?,NOW())");
  $stmt->bind_param('sss',$name,$email,$message);
  $stmt->execute();
  $success = 'Message sent. We will contact you soon.';
}
?>

<h2>Contact Us</h2>
<?php if (!empty($success)) echo '<div class="alert alert-success">'.htmlspecialchars($success).'</div>'; ?>
<form method="post" class="col-md-6">
  <div class="mb-3"><label>Name</label><input name="name" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input name="email" type="email" class="form-control" required></div>
  <div class="mb-3"><label>Message</label><textarea name="message" class="form-control" required></textarea></div>
  <button class="btn btn-primary">Send</button>
</form>

<?php include 'includes/footer.php'; ?>
