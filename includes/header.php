<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HarvestHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/harvesthub/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/harvesthub/index.php">HarvestHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/harvesthub/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/harvesthub/products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="/harvesthub/farmers.php">Farmers</a></li>
        <li class="nav-item"><a class="nav-link" href="/harvesthub/about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/harvesthub/contact.php">Contact</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <a href="/harvesthub/cart.php" class="btn btn-outline-success me-2">Cart</a>
        <?php if (!empty($_SESSION['user'])): ?>
          <span class="me-2">Hello, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></span>
          <a href="/harvesthub/logout.php" class="btn btn-sm btn-secondary">Logout</a>
        <?php else: ?>
          <a href="/harvesthub/login.php" class="btn btn-success">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<main class="container my-4">
