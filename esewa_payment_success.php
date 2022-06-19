<?php
include_once("./db/connectDB.php");
include_once("./email_sender.php");

$rsv_id = $_GET["id"];
if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    exit();
}

$rsv_id = doubleval($rsv_id);

//after esewa's transaction is completed change the booking status to verified and payment status to verified and send mail to the customer.

$booking_status = "verified";
$payment_status = "verified";

$stmt = $conn->prepare("UPDATE bookings SET booking_status = ? , payment_status = ? WHERE reservation_id = ?");
$stmt->bind_param("ssd", $booking_status1, $payment_status1, $rsv_id);
$stmt->execute();
$stmt->store_result();

$stmt = $conn->prepare("SELECT name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_children, no_of_rooms, payment_option, room_type FROM bookings WHERE reservation_id = ? LIMIT 1");
$stmt->bind_param("d", $rsv_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $email, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms,  $room_type, $payment_option);
$stmt->fetch();
send_confirmation_email($name, $email, $rsv_id, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $booking_status, $payment_status, $payment_option, $room_type);

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body class="min-h-screen flex justify-center items-center">
    <div class="text-center px-8">
        <h1 class="text-3xl font-semibold my-4">Your Booking has been completed successfully.</h1>
        <p class="text-xl my-4">You will recieve a mail shortly with your reservation details.</p>
        <p class="text-gray-500">Didn't see a mail from us ? Try checking spam folder</p>
        <a href="./index.php" class="mt-4 inline-block"><span class="underline underline-offset-2">Return Home</span></a>
    </div>
</body>

</html>