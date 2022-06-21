<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_email($name, $email, $username, $password)
{
    // for sending mail to user's after creation is done 

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'baniya.sabinn@outlook.com';              //SMTP username
        $mail->Password   = file_get_contents(__DIR__ . '/google_password.txt'); //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('baniya.sabinn@outlook.com', 'Sabin Baniya');
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo('baniya.sabinn@outlook.com', 'Sabin Baniya');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Login Details for Website\'s Admin Panel for $name";
        $mail->Body    = "Here\'s your login details for the admin panel: <hr/><br/>, username: $username  <br/> password : $password";
        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}

function send_confirmation_email($name, $email, $reservation_id, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms, $booking_status, $payment_status, $room_type, $payment_option)
{
    // for sending mail to user's after creation is done 

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'baniya.sabinn@outlook.com';              //SMTP username
        $mail->Password   = file_get_contents(__DIR__ . '/google_password.txt'); //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('baniya.sabinn@outlook.com', 'Sabin Baniya');
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo('baniya.sabinn@outlook.com', 'Sabin Baniya');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reservation Details regarding your booking from our website';

        if ($payment_option !== "esewa") {
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
                <div style="">
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Check-in Date</p>
                        <p style="font-size: 16px; color: #505050">' . $check_in_date . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Check-Out Date</p>
                        <p style="font-size: 16px; color: #505050">' . $check_out_date . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Adult</p>
                        <p style="font-size: 16px; color: #505050">' . $adults . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Children</p>
                        <p style="font-size: 16px; color: #505050">' . $children . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Rooms</p>
                        <p style="font-size: 16px; color: #505050">' . $no_of_rooms . '</p>
                    </span>
                </div>
                <div>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Booking Status</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $booking_status . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Payment Status</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $payment_status . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Payment Option</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $payment_option . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Room Type</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $room_type . '</p>
                    </span>
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
        } else {
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
                <div>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Check-in Date</p>
                        <p style="font-size: 16px; color: #505050">' . $check_in_date . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Check-Out Date</p>
                        <p style="font-size: 16px; color: #505050">' . $check_out_date . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Adult</p>
                        <p style="font-size: 16px; color: #505050">' . $adults . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Children</p>
                        <p style="font-size: 16px; color: #505050">' . $children . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Rooms</p>
                        <p style="font-size: 16px; color: #505050">' . $no_of_rooms . '</p>
                    </span>
                </div>
                <div>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Booking Status</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $booking_status . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Payment Status</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $payment_status . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Payment Option</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $payment_option . '</p>
                    </span>
                    <span style="margin-right: 20px">
                        <p style="font-size: 18px">Room Type</p>
                        <p style="font-size: 16px; color: #505050; text-transform: capitalize">' . $room_type . '</p>
                    </span>
                </div>
            </div>
            </body>

        ';
        }

        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}
