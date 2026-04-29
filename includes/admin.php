<?php
// Simple admin auth helpers (demo only)
// For production, store admin users in DB and use hashed passwords.
if (session_status() === PHP_SESSION_NONE) session_start();

function admin_require_login(){
    if (empty($_SESSION['admin_logged_in'])){
        header('Location: /harvesthub/admin/login.php');
        exit;
    }
}

function admin_login($username, $password){
    // Demo credentials: change in production
    $admins = [
        'admin@harvesthub.test' => 'admin123'
    ];
    if (isset($admins[$username]) && $admins[$username] === $password){
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        return true;
    }
    return false;
}

function admin_logout(){
    unset($_SESSION['admin_logged_in']);
    unset($_SESSION['admin_user']);
}
