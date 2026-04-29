<?php
// Database connection - update credentials if needed
// Place this file in includes/ and include where DB access is required

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$db_name = 'harvesthub';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
    // In production, do not echo raw errors
    die("Database connection failed: " . $mysqli->connect_error);
}

// Helper: simple escape wrapper
function e($str) {
    global $mysqli;
    return htmlspecialchars($mysqli->real_escape_string($str));
}

?>
