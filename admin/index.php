<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit;
}


function isSelected($val)
{
    if (!isset($_GET["entries"])) {
        return false;
    }

    $entries = $_GET["entries"];

    if ($entries < 0) {
        $entries = 10;
    }
    if ($entries > 100) {
        $entries = 100;
    }

    if ($val === $entries) {
        return true;
    } else {
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        button:disabled {
            cursor: not-allowed;
            opacity: 75%;
        }
    </style>
</head>

<body class="overflow-x-hidden">
    <?php
    require("./navbar.php");
    if (isset($_GET["success"])) {
        if ($_GET["success"] === "true") {
            echo '
            <div class="w-64 h-10 bg-green-400 flex justify-center items-center text-center rounded-lg absolute -right-[200px] top-16 notification">
                <p class="text-white text-md">Successfully Deleted Record.</p>
            </div>
            ';
        } else {
            echo '
            <div class="w-96 h-10 bg-red-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-16 notification">
                <p class="text-white text-md">Couldn\'t delete record. Please try again later!</p>
            </div>
            ';
        }
    }
    ?>

    <section class="max-w-[1400px] mx-auto px-8 ">
        <?php
        include_once("../db/connectDB.php");

        if (isset($_GET["entries"])) {
            $entries = intval($_GET["entries"]);
            if ($entries < 0) {
                $entries = 10;
            }
            if ($entries > 100) {
                $entries = 100;
            }
            if (isset($_GET["page"])) {
                $GLOBALS["max-next-reached"] = false;

                $stmt2 = "SELECT * FROM bookings";
                $page = abs(intval($_GET["page"]));
                $res = $conn->query($stmt2);
                $totalPage = $res->num_rows;
                $offset = (($entries * $page) - $entries) + 10;

                if ($offset > $totalPage) {
                    $offset = $totalPage;
                    $GLOBALS["max-next-reached"] = true;
                }

                if ($offset < 0) {
                    $offset = 0;
                }

                $stmt = $conn->prepare("SELECT reservation_id,
                    name,
                    email,
                    mobile,
                    check_in_date,
                    check_out_date,
                    no_of_adults,
                    no_of_children,
                    no_of_rooms,
                    booking_status,
                    payment_option,
                    payment_status,
                    room_type FROM bookings ORDER BY id DESC LIMIT ? OFFSET ?");
                $stmt->bind_param("ii", $entries, $offset);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $reservation_id,
                    $name,
                    $email,
                    $mobile,
                    $check_in_date,
                    $check_out_date,
                    $no_of_adults,
                    $no_of_children,
                    $no_of_rooms,
                    $booking_status,
                    $payment_option,
                    $payment_status,
                    $room_type
                );
            } else {
                $stmt = $conn->prepare("SELECT reservation_id,
                name,
                email,
                mobile,
                check_in_date,
                check_out_date,
                no_of_adults,
                no_of_children,
                no_of_rooms,
                booking_status,
                payment_option,
                payment_status,
                room_type FROM bookings ORDER BY id DESC LIMIT ?");
                $stmt->bind_param("i", $entries);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $reservation_id,
                    $name,
                    $email,
                    $mobile,
                    $check_in_date,
                    $check_out_date,
                    $no_of_adults,
                    $no_of_children,
                    $no_of_rooms,
                    $booking_status,
                    $payment_option,
                    $payment_status,
                    $room_type
                );
            }
        } else {
            $stmt = $conn->prepare("SELECT reservation_id,
                name,
                email,
                mobile,
                check_in_date,
                check_out_date,
                no_of_adults,
                no_of_children,
                no_of_rooms,
                booking_status,
                payment_option,
                payment_status,
                room_type FROM bookings ORDER BY id DESC LIMIT ?");
            $limit = 10;
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result(
                $reservation_id,
                $name,
                $email,
                $mobile,
                $check_in_date,
                $check_out_date,
                $no_of_adults,
                $no_of_children,
                $no_of_rooms,
                $booking_status,
                $payment_option,
                $payment_status,
                $room_type
            );
        }

        $count = 1; ?>

        <div class="">
            <form action="<?= $_SERVER["PHP_SELF"] ?>" class="flex justify-between items-center" id="entriesForm">
                <button <?= isset($_GET["page"]) ? (intval($_GET["page"]) === 0 ? "disabled" : "") : "disabled" ?> onclick="this.submit()" name="page" value="<?= isset($_GET["page"]) ? (intval($_GET["page"]) - 1 < 0  ? 0 : intval($_GET["page"]) - 1) : 0 ?>" class="px-4 py-1 bg-gray-800 text-white rounded-lg hover:bg-gray-900">Previous</button>
                <div>
                    <label for="entries">Show
                    </label>
                    <select required name="entries" id="entries" class="inline-block outline outline-gray-300 mx-2" onchange="document.getElementById('entriesForm').submit()">
                        <option value="10" <?= isSelected("10") ? "selected" : "" ?>> 10</option>
                        <option value="20" <?= isSelected("20") ? "selected" : "" ?>> 20</option>
                        <option value="50" <?= isSelected("50") ? "selected" : "" ?>> 50</option>
                        <option value="100" <?= isSelected("100") ? "selected" : "" ?>> 100</option>
                    </select>
                    <span>entries</span>
                    <p class="text-center my-4 text-lg font-medium text-gray-600 inline-block">Bookings as of : <span class="text-gray-800"> <?= date("Y-m-d")  ?></span></p>
                </div>
                <button <?= isset($GLOBALS["max-next-reached"]) ? ($GLOBALS["max-next-reached"] ? "disabled" : "") : "" ?> onclick="this.submit()" name="page" value="<?= isset($_GET["page"]) ? intval($_GET["page"]) + 1 : 1 ?>" class="px-4 py-1 bg-gray-800 text-white rounded-lg hover:bg-gray-900">Next</button>
            </form>
        </div>

        <?php
        if ($stmt->num_rows > 0) {
            echo "
                <div class='overflow-x-auto' id='scrollchange'>
                    <table class='mx-auto rounded-lg border border-collapse'>
                    <thead class='bg-gray-800 text-white'>
                        <tr>
                            <th class='border px-4 py-1 cursor-default'>S No</th>
                            <th class='border px-4 py-1 cursor-default'>Reservation Id</th>
                            <th class='border px-4 py-1 cursor-default'>Room type</th>
                            <th class='border px-4 py-1 cursor-default'>Name</th>
                            <th class='border px-4 py-1 cursor-default'>Email</th>
                            <th class='border px-4 py-1 cursor-default'>Mobile</th>
                            <th class='border px-4 py-1 cursor-default'>Check in Date</th>
                            <th class='border px-4 py-1 cursor-default'>Check Out Date</th>
                            <th class='border px-4 py-1 cursor-default'>No of Adults</th>
                            <th class='border px-4 py-1 cursor-default'>No of Children</th>
                            <th class='border px-4 py-1 cursor-default'>No of Rooms</th>
                            <th class='border px-4 py-1 cursor-default'>Booking Status</th>
                            <th class='border px-4 py-1 cursor-default'>Payment Method</th>
                            <th class='border px-4 py-1 cursor-default'>Payment Status</th>
                            <th class='border px-4 py-1 cursor-default'>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";

            while ($stmt->fetch()) {

                echo "<tr class='border hover:bg-gray-200'>";
                echo "<td class='border p-4 cursor-default' > " . $count++ . "</td>";
                echo "<td class='border p-4 cursor-default' > $reservation_id </td>";
                echo "<td class='border p-4 cursor-default' > $room_type </td>";
                echo "<td class='border p-4 cursor-default' > $name </td>";
                echo "<td class='border p-4 cursor-default' > $email </td>";
                echo "<td class='border p-4 cursor-default' > $mobile </td>";
                echo "<td class='border p-4 cursor-default' > $check_in_date </td>";
                echo "<td class='border p-4 cursor-default' > $check_out_date </td>";
                echo "<td class='border p-4 cursor-default' > $no_of_adults </td>";
                echo "<td class='border p-4 cursor-default' > $no_of_children </td>";
                echo "<td class='border p-4 cursor-default' > $no_of_rooms </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $booking_status </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $payment_option </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $payment_status </td>";
                echo "<td class='border p-4 cursor-default' > 
                        <a href='./editbooking.php?id=$reservation_id' title='Edit Reservation Details' class='hover:bg-gray-500 hover:text-white px-2 py-1 rounded-lg'>Edit</a> 
                        " . ($_SESSION["user_role"] == "admin" ? "<a href='./deletebooking.php?id=$reservation_id' title='Delete Reservation' class='hover:bg-red-500 hover:text-white px-2 py-1 rounded-lg'>Delete</a> " : null) . "
                    </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p class='text-center my-4 text-xl font-bold text-red-500'>No Bookings Found!</p>";
        }
        $conn->close();
        ?>
    </section>

</body>
<script>
    function closeMenu() {
        document.getElementById("menu").checked = false;
    }
</script>


</html>