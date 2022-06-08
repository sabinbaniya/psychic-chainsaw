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
    $reservation_id = random_int(0, 2312312432599);

    $stmt = $conn->prepare("INSERT INTO BOOKINGS (reservation_id , name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_children, no_of_rooms) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dssdssiii",$reservation_id, $name, $email, $mobile, $check_in_date, $check_out_date, $adults, $children, $no_of_rooms);

    $stmt->execute();
    $stmt->close();

    // for sending mail to customer after booking is done 

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.postmarkapp.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'dummymail@tutanota.de';              //SMTP username
        $mail->Password   = file_get_contents("google_password.txt");//SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 26;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sabin.chatapp@gmail.com', 'Sabin Baniya');
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo('sabin.chatapp@gmail.com', 'Sabin Baniya');

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
                    src="https://unsplash.com/photos/BL61VV4p23w"
                    alt="Hotel Name"
                    height="150px"
                    />
                    <p style="font-size: 20px">Hotel Name</p>
                </div>
                <div>
                    <h1>Reservation Confirmed</h1>
                    <p style="font-size: 16px">
                    Your reservation number is :
                    <span style="text-decoration: underline">'.$reservation_id.'</span>
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
                    src="https://unsplash.com/photos/tB5yDgTvSIY"
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
                <p style="font-size: 18px">'.$name.'</p>
                <p style="font-size: 14px">'.$mobile.'</p>
                </div>
                <div style="display: flex">
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Check-in Date</p>
                    <p style="font-size: 16px; color: #505050">'.$check_in_date.'</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Check-Out Date</p>
                    <p style="font-size: 16px; color: #505050">'.$check_out_date.'</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Adult</p>
                    <p style="font-size: 16px; color: #505050">'.$adults.'</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Children</p>
                    <p style="font-size: 16px; color: #505050">'.$children.'</p>
                </div>
                <div style="margin-right: 20px">
                    <p style="font-size: 18px">Rooms</p>
                    <p style="font-size: 16px; color: #505050">'.$no_of_rooms.'</p>
                </div>
                </div>
            </div>
            </body>

        ';
        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        
    } catch (Exception $e) {
        echo($mail->ErrorInfo);
    }

?>