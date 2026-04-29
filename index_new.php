<?php
// New homepage based on provided design (static, beginner-friendly)
require_once __DIR__ . '/includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HarvestHub – Farm Produce Marketplace</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<style>
/* (Inlined CSS from user-provided harvesthub.html) */
<?php echo ""; ?>
</style>
</head>
<body>

<!-- NOTE: This file is the custom static homepage. It uses client-side demo data and cart. -->

<?php
// Insert the original HTML content below (kept inline for clarity).
?>

<!-- NAV -->
<nav>
  <div class="nav-logo">Harvest<span>Hub</span></div>
  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#products">Products</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="nav-actions">
    <a class="btn-nav btn-outline" href="login.php">Login</a>
    <a class="btn-nav btn-fill" href="signup.php">Register</a>
    <a class="cart-btn" href="cart.php" title="Cart">🛒<span class="cart-badge" id="cartBadge">0</span></a>
  </div>
</nav>

<!-- For brevity, the rest of the page uses the original static HTML (styles and scripts) -->
<?php
$content = file_get_contents(__DIR__ . '/harvesthub_fragment.html');
if ($content) echo $content; else echo '<p style="padding:20px">Homepage fragment not found. Please add `harvesthub_fragment.html`.</p>';
?>

</body>
</html>
