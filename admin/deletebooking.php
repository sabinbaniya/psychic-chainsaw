<?php

include_once("../db/connectDB.php");

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    exit;
}

if ($stmt = $conn->prepare('DELETE FROM bookings WHERE reservation_id = ?')) {
    $id = doubleval($_GET["id"]);
    $stmt->bind_param('d', $id);
    $stmt->execute();
    header("Location: ./index.php?success=true");
    exit();
} else {
    header("Location: ./index.php?success=false");
    exit();
}
