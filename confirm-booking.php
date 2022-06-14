<?php
require_once("./db/connectDB.php");
$af_row;

if (!is_numeric($_GET["id"])) {
    header("Location: ./index.php");
    exit();
}

if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    exit();
}


if ($stmt = $conn->prepare('UPDATE bookings SET booking_status= ? WHERE reservation_id = ?')) {
    $id = intval($_GET["id"]);
    $status = "verified";
    $stmt->bind_param('sd', $status, $id);
    $stmt->execute();
    if ($stmt->affected_rows === 1) {
        $af_row = true;
    } else {
        header("Location: ./index.php");
    }
    $stmt->close();
} else {
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body class="min-h-screen flex justify-center items-center">
    <section class="text-center px-8">
        <h1 class="text-3xl font-semibold my-4">Your Booking has been confirmed successfully.</h1>
        <p class="text-xl my-4">Current Booking Status: <span class="inline-block bg-green-500 text-green-50 px-6 py-1 rounded-full">Verified</span> </p>
        <p class="text-gray-500"></p>
        <a href="./index.php" class="mt-4 inline-block"><span class="underline underline-offset-2">Return Home</span></a>
    </section>
</body>

</html>