<?php
include_once("./db/connectDB.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// echo '<script>window.location.href = "./booking-completed.php"</script>';

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
                <input value="http://localhost/hotel/esewa_payment_failed.php?q=fu"  type="hidden" name="su">
                <input value=' . $success_url . ' type="hidden" name="fu">
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

$stmt = $conn->prepare("INSERT INTO BOOKINGS (reservation_id , name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_children, no_of_rooms, payment_option, booking_status, payment_status, room_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("dssdssiiissss", $reservation_id, $name, $email, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $payment_option, $booking_status, $payment_status, $room_type);

$stmt->execute();
$stmt->close();
$conn->close();

// for sending mail to customer after booking is done 

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'baniya.sabinn@outlook.com';              //SMTP username
    $mail->Password   = file_get_contents("google_password.txt"); //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;
    $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('baniya.sabinn@outlook.com', 'Sabin Baniya');
    $mail->addAddress($email, $name);     //Add a recipient    
    $mail->addReplyTo('baniya.sabinn@outlook.com', 'Sabin Baniya');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reservation Details regarding your booking from our website';
    $mail->Body    = '
            <head></head>
            <body
            style="
                min-height: 50vh;
                font-family: sans-serif;
                margin: 10px auto;
                max-width: 700px;
            "
            >
            <p style="font-size: 18px; margin: 40px auto">
                This email is regarding the booking you made online on
                <a href="#" style="color: black">website name</a>. <br />
                Please confirm your booking my clicking on the confirm booking button down
                below.<br />
                If you didn\'t made any bookings you can safely ignore this email. For any
                enquiries contact our front desk at: 982343241
            </p>
            <div style="border: 2px solid black; border-radius: 10px">
                <div
                style="
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                    height: 200px;
                "
                >
                <div
                    style="
                    display: flex;
                    flex-direction: column;
                    max-width: 150px;
                    align-items: center;
                    "
                >
                    <img
                    src=""
                    alt="Hotel Name"
                    height="150px"
                    />
                    <p style="font-size: 20px">Hotel Name</p>
                </div>
                <div>
                    <h1>Reservation Confirmed</h1>
                    <p style="font-size: 16px">
                    Your reservation number is :
                    <span style="text-decoration: underline">' . $reservation_id . '</span>
                    </p>
                </div>
                </div>
            </div>
            <div
                style="
                border: 2px solid black;
                border-top: 0px;
                border-radius: 10px;
                padding: 0px 20px;
                "
            >
                <div
                style="
                    margin: 20px 0px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    width: 250px;
                "
                >
                <img
                    src=""
                    alt="Hotel name"
                    width="100px"
                />
                <div>
                    <p style="font-size: 19px; font-weight: 600">Hotel Name</p>
                    <p>Pokhara, Nepal</p>
                    <p>Call us: 982149312</p>
                </div>
                </div>
                <div>
                <h2>Guest Name</h2>
                <p style="font-size: 18px">' . $name . '</p>
                <p style="font-size: 14px">' . $mobile . '</p>
                </div>
                <div style="display: flex">
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Check-in Date</p>
                    <p style="font-size: 16px; color: #505050">' . $check_in_date . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Check-Out Date</p>
                    <p style="font-size: 16px; color: #505050">' . $check_out_date . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Adult</p>
                    <p style="font-size: 16px; color: #505050">' . $adults . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Children</p>
                    <p style="font-size: 16px; color: #505050">' . $children . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Rooms</p>
                    <p style="font-size: 16px; color: #505050">' . $no_of_rooms . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Booking Status</p>
                    <p style="font-size: 16px; color: #505050">' . $booking_status . '</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Payment Status</p>
                    <p style="font-size: 16px; color: #505050">' . $payment_status . '</p>
                </div>
                </div>
            </div>
            <div
                style="
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                "
            >
                <a href="http://localhost/confirm-booking.php?id=' . $reservation_id . '">
                <button
                    style="
                    background-color: #3b82f6;
                    border-radius: 10px;
                    border-width: 0px;
                    padding: 20px 30px;
                    color: white;
                    font-weight: 600;
                    font-size: 18px;
                    "
                    type="button"
                >
                    Confirm Booking
                </button>
                </a>
            </div>
            </body>

        ';
    $mail->AltBody = 'Please use a client-mail that supports html';
    $mail->send();
} catch (Exception $e) {
    echo ($mail->ErrorInfo);
}
