<?php
include_once("./db/connectDB.php");
include_once("./email_sender.php");


//Load Composer's autoloader
require 'vendor/autoload.php';

$name = $_GET["name"];
$email = $_GET["email"];
$mobile = $_GET["number"];
$check_in_date = $_GET["check-in-date"];
$check_out_date = $_GET["check-out-date"];
$adults = $_GET["adults"];
$children = $_GET["children"];
$no_of_rooms = $_GET["rooms"];
$payment_option = $_GET["payment"];
$booking_status = "pending";
$payment_status = "pending";
$room_type = $_GET["room_type"];
$reservation_id = random_int(0, 2312312432599);
$amt;

if ($payment_option == "esewa") {
    switch ($room_type) {
        case "single":
            $amt = 1000
                * intval($no_of_rooms);
            break;
        case "double":
            $amt = 1500
                * intval($no_of_rooms);
            break;
        case "deluxe":
            $amt = 2500
                * intval($no_of_rooms);
            break;
        default:
            $amt = 0;
            break;
    }

    // configure tax_amount , service charge
    $tax_amount = 100;
    $service_charge = 100;
    $total = $amt + $tax_amount + $service_charge;
    $success_url = "http://localhost/hotel/esewa_payment_success.php?id=" . $reservation_id;
    $stmt = $conn->prepare("INSERT INTO BOOKINGS (reservation_id , name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_children, no_of_rooms, payment_option, booking_status, payment_status, room_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dssdssiiissss", $reservation_id, $name, $email, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $payment_option, $booking_status, $payment_status, $room_type);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proceed to Online Payment</title>
            <link rel="stylesheet" href="./style.css" >
        </head>

        <body class="min-h-screen flex justify-center items-center">
            <div class="text-center">
                <p class="text-xl text-gray-800 font-bold py-10">Proceeding to pay with esewa</p>
                <img src="./assets/images/esewa-icon-large.png" class="h-20 mx-auto"/>
                <p class="font-light text-md text-gray-600 py-4">Please wait...</p>
            </div>
            <form action="https://uat.esewa.com.np/epay/main" method="POST" id="main" style="display:none;">
                <input value=' . $total . ' name="tAmt" type="hidden">
                <input value=' . $amt . ' name="amt" type="hidden">
                <input value=' . $tax_amount . ' name="txAmt" type="hidden">
                <input value=' . $service_charge . ' name="psc" type="hidden">
                <input value="0" name="pdc" type="hidden">
                <input value="EPAYTEST" name="scd" type="hidden">
                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                <input value=' . $success_url . '  type="hidden" name="su">
                <input value="http://localhost/hotel/esewa_payment_failed.php?q=fu" type="hidden" name="fu">
                <input value="Submit" type="submit" id="submit" type="hidden" style="display:none;">
            </form>
        </body>
        <script>
            document.getElementById("submit").click()
        </script>

        </html>
    ';
    return;
}

echo '<script>window.location.href = "./booking-completed.php"</script>';

$stmt = $conn->prepare("INSERT INTO BOOKINGS (reservation_id , name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_children, no_of_rooms, payment_option, booking_status, payment_status, room_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("dssdssiiissss", $reservation_id, $name, $email, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $payment_option, $booking_status, $payment_status, $room_type);

$stmt->execute();
$stmt->close();
$conn->close();

// for sending mail to customer after booking is done 
send_confirmation_email($name, $email, $reservation_id, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $booking_status, $payment_status, $room_type, $payment_option);
