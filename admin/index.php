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
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 50px;

        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
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

    <section class="max-w-[1400px] mx-auto px-8 overflow-x-auto">
        <div class="flex items-center justify-center space-x-10">
            <span class="inline-block">
                <form action="./index.php" class="inline-block" id="entriesForm">
                    <label for="entries">Show
                    </label>
                    <select required name="entries" id="entries" class="inline-block outline outline-gray-300 mx-2" onchange="document.getElementById('entriesForm').submit()">
                        <option value="10" <?= isSelected("10") ? "selected" : "" ?>> 10</option>
                        <option value="20" <?= isSelected("20") ? "selected" : "" ?>> 20</option>
                        <option value="50" <?= isSelected("50") ? "selected" : "" ?>> 50</option>
                        <option value="100" <?= isSelected("100") ? "selected" : "" ?>> 100</option>
                    </select>
                    <span>entries</span>
                </form>
            </span>
            <p class="text-center my-4 text-lg font-medium text-gray-600 inline-block">Bookings as of : <span class="text-gray-800"> <?= date("Y-m-d")  ?></span></p>
        </div>

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
            $stmt = "SELECT * FROM bookings ORDER BY ID DESC LIMIT $entries";
        } else {
            $stmt = "SELECT * FROM bookings ORDER BY ID DESC LIMIT 10";
        }

        $result = $conn->query($stmt);

        if ($result->num_rows > 0) {

            echo "
                    <table class='mx-auto rounded-lg border border-collapse'>
                    <thead class='bg-gray-800 text-white'>
                        <tr>
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

            while ($row = $result->fetch_assoc()) {
                $rsv_id = $row["reservation_id"];
                $name = $row["name"];
                $email = $row["email"];
                $mobile = $row["mobile"];
                $cid = $row["check_in_date"];
                $cod = $row["check_out_date"];
                $noa = $row["no_of_adults"];
                $noc = $row["no_of_children"];
                $nor = $row["no_of_rooms"];
                $booking_status = $row["booking_status"];
                $payment_option = $row["payment_option"];
                $payment_status = $row["payment_status"];
                $room_type = $row["room_type"];

                echo "<tr class='border hover:bg-gray-200'>";
                echo "<td class='border p-4 cursor-default' > $rsv_id </td>";
                echo "<td class='border p-4 cursor-default' > $room_type </td>";
                echo "<td class='border p-4 cursor-default' > $name </td>";
                echo "<td class='border p-4 cursor-default' > $email </td>";
                echo "<td class='border p-4 cursor-default' > $mobile </td>";
                echo "<td class='border p-4 cursor-default' > $cid </td>";
                echo "<td class='border p-4 cursor-default' > $cod </td>";
                echo "<td class='border p-4 cursor-default' > $noa </td>";
                echo "<td class='border p-4 cursor-default' > $noc </td>";
                echo "<td class='border p-4 cursor-default' > $nor </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $booking_status </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $payment_option </td>";
                echo "<td class='border p-4 cursor-default capitalize' > $payment_status </td>";
                echo "<td class='border p-4 cursor-default' > 
                        <a href='./editbooking.php?id=$rsv_id' title='Edit Reservation Details' class='hover:bg-gray-500 hover:text-white px-2 py-1 rounded-lg'>Edit</a> 
                        " . ($_SESSION["user_role"] == "admin" ? "<a href='./deletebooking.php?id=$rsv_id' title='Delete Reservation' class='hover:bg-red-500 hover:text-white px-2 py-1 rounded-lg'>Delete</a> " : null) . "
                    </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
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