<?php
// Start session
session_start();

if (isset($_POST['send'])) {

    // Empty check
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validation
    if (!$email || !$password) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, empty fields in login and password.File login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, mail the wrong format.File login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }

    $lendPassword = strlen($password);
    if ($lendPassword < 3 || $lendPassword > 8) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, invalid password length.File login_backend.php' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Take data, if not have make new
    $data = file_get_contents('../database/db.json');
    $db = json_decode($data, 1);
    if ($db == null) {
        $db = [];
    }
    // Search user
    foreach ($db as $user) {
        // If find the user, put in session & redirect to main page
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['isLogin'] = true;
            $date = date("Y-m-d H:i:s");
            $message = $date . ' - ' . 'User login by email ' . $email . "\r";
            file_put_contents('../database/error.txt', $message, FILE_APPEND);
            header('Location: http://localhost:8000');
            exit;
        }else {
            $date = date("Y-m-d H:i:s");
            $message = $date . ' - ' . 'Invalid email entered: ' . $email . ' and password: ' . $password . "\r";
            file_put_contents('../database/error.txt', $message, FILE_APPEND);
            header('Location: http://localhost:8000');
            exit;
        }
    }
}