<?php

if (!isset($_POST["username"], $_POST["password"])) {
    header("Location: ../index.php");
}

require_once("../db/connectDB.php");
session_start();

if ($stmt = $conn->prepare('SELECT id, password, role FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $role);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION["user_role"] = $role;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;

            header("Location: ./index.php");
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
    $stmt->close();
}
