<?php
session_start();
require_once 'config/db.php';

header('Content-Type: text/html; charset=utf-8');

// ✅ check for "remember me" cookie
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_user'])) {
    $_SESSION['user_id'] = $_COOKIE['remember_user'];
    // ممكن تجيب بيانات المستخدم من DB لو عايز
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param('ss', $email, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $username, $hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;

                // ✅ if remember me is checked, set a cookie for 30 days
                if (isset($_POST['remember'])) {
                    setcookie('remember_user', $id, time() + (30 * 24 * 60 * 60), "/");
                }

                header('Location: index.php');
                exit;
            } else {
                $error = 'Incorrect password.';
            }
        } else {
            $error = 'Invalid email or username.';
        }
        $stmt->close();
    }
}
?>
