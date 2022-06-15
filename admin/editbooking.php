<?php

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit();
}

include_once("../db/connectDB.php");

if (!isset($_GET["success"])) {
    if (isset($_POST["update"])) {
        if ($stmt = $conn->prepare('UPDATE bookings SET name = ?, email = ?, mobile = ?, check_in_date = ?, check_out_date = ?, no_of_adults = ?, no_of_children = ?, no_of_rooms = ?, payment_option = ?, booking_status = ?, payment_status = ? WHERE reservation_id = ? LIMIT 1')) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $mobile = doubleval($_POST["mobile"]);
            $check_in_date = $_POST["check-in-date"];
            $check_out_date = $_POST["check-out-date"];
            $no_of_adults = intval($_POST["adults"]);
            $no_of_children = intval($_POST["children"]);
            $no_of_rooms = intval($_POST["rooms"]);
            $payment_option = $_POST["payment"];
            $booking_status = $_POST["booking"];
            $payment_status = $_POST["payment_status"];
            $id = doubleval($_POST["rs"]);

            $stmt->bind_param("ssdssiiisssd", $name, $email, $mobile, $check_in_date, $check_out_date, $no_of_adults, $no_of_children, $no_of_rooms, $payment_option, $booking_status, $payment_status, $id);
            $stmt->execute();
            if ($stmt->affected_rows === 1) {
                header("Location: ./editbooking.php?success=true");
                exit();
            } else {
                header("Location: ./editbooking.php?success=false");
                exit();
            }
        } else {
            header("Location: ../index.php");
        }
    } else {

        if (!isset($_GET["id"])) {
            if (!isset($_GET["success"])) {
                header("Location: ./index.php");
                exit();
            }
        }

        if ($stmt = $conn->prepare('SELECT name, email, mobile, check_in_date, check_out_date, no_of_adults, no_of_rooms, payment_option, booking_status, payment_status FROM bookings WHERE reservation_id = ?')) {
            $resv_id = intval($_GET["id"]);
            $stmt->bind_param("d", $resv_id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($name, $email, $mobile, $check_in_date, $check_out_date, $no_of_adults, $no_of_rooms, $payment_option, $booking_status, $payment_status);
            $stmt->fetch();
        } else {
            header("Location: ../index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="overflow-x-hidden">

    <section class="flex justify-center items-center relative">
        <?php
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                echo '
            <div class="w-64 h-10 bg-green-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-8 notification">
                <p class="text-white text-md">Successfully Edited Record.</p>
            </div>
            ';
            } else {
                echo '
            <div class="w-96 h-10 bg-red-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-8 notification">
                <p class="text-white text-md">Couldn\'t edit record. Please try again later</p>
            </div>
            ';
            }
        }
        ?>
        <form action="./editbooking.php" method="POST" class="my-8 p-8 rounded-lg bg-gradient-to-l from-stone-300 to-slate-500 min-w-[300px] sm:min-w-[600px] max-w-[622px]" onsubmit="showLoader()">
            <div class="max-w-[548px]">
                <label for="name" class="label_style">Full Name</label>
                <input required autocomplete="off" type="text" name="name" id="name" class="input_style" value="<?= isset($name) ? $name : ""; ?>">
            </div>
            <div class="sm:inline-block sm:mr-8 sm:w-64">
                <label for="email" class="label_style">Email Address</label>
                <input required autocomplete="off" type="email" name="email" id="email" class="input_style" value="<?= isset($email) ? $email : ""; ?>">
            </div>
            <div class="sm:inline-block sm:w-64">
                <label for="number" class="label_style">Mobile Number</label>
                <input required autocomplete="off" type="tel" name="mobile" id="number" class="input_style" value="<?= isset($mobile) ? $mobile : ""; ?>">
            </div>
            <div class="max-w-[548px]">
                <label for="check-in-date" class="label_style">Check-in-date</label>
                <input required type="date" name="check-in-date" id="check-in-date" class="input_style" value="<?= isset($check_in_date) ? $check_in_date : ""; ?>">
            </div>
            <div class="max-w-[548px]">
                <label for="check-out-date" class="label_style">Check-out-date</label>
                <input required type="date" name="check-out-date" id="check-out-date" class="input_style" value="<?= isset($check_out_date) ? $check_out_date : ""; ?>">
            </div>
            <div class="sm:inline-block sm:mr-8 sm:w-64">
                <label for="adults" class="label_style">Number of Adults</label>
                <select required name="adults" id="adults" class="input_style" value="<?= isset($no_of_adults) ?  $no_of_adults : ""; ?>">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            <?=
            isset($resv_id) ?
                '<input type="hidden" name="rs" value=' . $resv_id  . ' />' :
                null
            ?>
            <div class="sm:inline-block sm:w-64">
                <label for="children" class="label_style">Number of Children</label>
                <select required name="children" id="children" class="input_style" value="<?= isset($no_of_children) ? $no_of_children : ""; ?>">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            <br>
            <div class="sm:inline-block sm:mr-8 sm:w-64">
                <label for="name" class="label_style">Number of Rooms</label>
                <input required autocomplete="off" type="tel" name="rooms" id="rooms" class="input_style" value="<?= isset($no_of_rooms) ? $no_of_rooms : ""; ?>">
            </div>
            <div class="sm:inline-block sm:w-64">
                <label for="payment" class="label_style">Payment Option</label>
                <select required name="payment" id="payment" class="input_style" value="<?= isset($payment_option) ? $payment_option : ""; ?>">
                    <option value="offline">Offline Payment</option>
                    <option value="esewa">Esewa</option>
                </select>
            </div>
            <br>
            <div class="sm:inline-block sm:mr-8 sm:w-64">
                <label for="payment_status" class="label_style">Payment Status</label>
                <select required name="payment_status" id="payment_staus" class="input_style" value="<?= isset($payment_status) ? $payment_status : ""; ?>">
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                </select>
            </div>
            <div class="sm:inline-block sm:w-64">
                <label for="booking" class="label_style">Booking Status</label>
                <select required name="booking" id="booking" class="input_style" value="<?= isset($booking_status) ? $booking_status : ""; ?>">
                    <option value="pending">Pending</option>
                    <option value="verified">Verified</option>
                </select>
            </div>
            <div class="w-full mt-8">
                <?= !isset($_GET["success"]) ? '
                    <button type="submit" id="btn" name="update" class=" bg-blue-500  hover:bg-blue-400 w-full text-white font-semibold py-2 rounded-lg cursor-pointer flex justify-center items-center">
                        Update
                    </button>
                ' : '
                <a href="./index.php">
                    <button type="button" id="btn" class=" bg-blue-500  hover:bg-blue-400 w-full text-white font-semibold py-2 rounded-lg cursor-pointer flex justify-center items-center">
                        Return Back
                    </button>
                </a>
                '
                ?>
            </div>
        </form>
    </section>
</body>

<script>
    function showLoader() {
        const img = document.createElement("img");
        img.src = "../assets/GIF/loader.gif";
        img.classList.add("h-8")
        const btn = document.getElementById("btn");
        btn.classList.remove("py-2");
        btn.classList.remove("bg-blue-500");
        btn.classList.add("py-1");
        btn.style.backgroundColor = "#93c5fd"
        btn.style.cursor = "not-allowed"
        btn.innerText = ""
        btn.appendChild(img);
    }
</script>

</html>