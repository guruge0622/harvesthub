<?php
/*
 Simple setup script to import database/harvesthub.sql into MySQL.
 Usage: visit http://localhost/harvesthub/setup.php in browser while XAMPP MySQL is running.
 After successful import, remove this file for security.
*/

$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = '';
$sqlFile = __DIR__ . '/database/harvesthub.sql';

if (!file_exists($sqlFile)) {
    die('SQL file not found: ' . htmlspecialchars($sqlFile));
}

$sql = file_get_contents($sqlFile);
$mysqli = new mysqli($db_host, $db_user, $db_pass);
if ($mysqli->connect_errno) {
    die('Connect error: ' . $mysqli->connect_error);
}

set_time_limit(0);

if ($mysqli->multi_query($sql)) {
    echo "<h2>Import started...</h2>\n";
    do {
        if ($res = $mysqli->store_result()) {
            // free result if any
            $res->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());

    if ($mysqli->errno) {
        echo '<div style="color:red">Completed with errors: ' . htmlspecialchars($mysqli->error) . '</div>';
    } else {
        echo '<div style="color:green">Database import completed successfully.</div>';
    }
} else {
    echo '<div style="color:red">Import failed: ' . htmlspecialchars($mysqli->error) . '</div>';
}

echo '<p><strong>Security:</strong> remove <code>setup.php</code> after use.</p>';

?>
