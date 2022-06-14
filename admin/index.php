<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: ../index.php");
    exit;
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
</head>

<body>
    <?php
    require("./navbar.php");
    ?>
    <section class="max-w-[1400px] mx-auto px-8 overflow-x-auto">
        <p class="text-center my-4 text-lg font-medium text-gray-600">Bookings as of : <span class="text-gray-800"> <?= date("Y-m-d")  ?></span></p>
        <?php
        include_once("../db/connectDB.php");

        $stmt = "SELECT * FROM bookings ORDER BY ID DESC";
        $result = $conn->query($stmt);

        if ($result->num_rows > 0) {

            echo "
                    <table class='mx-auto rounded-lg border border-collapse'>
                    <thead class='bg-gray-800 text-white'>
                        <tr>
                            <th class='border p-4 cursor-default'>Reservation Id</th>
                            <th class='border p-4 cursor-default'>Name</th>
                            <th class='border p-4 cursor-default'>Email</th>
                            <th class='border p-4 cursor-default'>Mobile</th>
                            <th class='border p-4 cursor-default'>Check in Date</th>
                            <th class='border p-4 cursor-default'>Check Out Date</th>
                            <th class='border p-4 cursor-default'>No of Adults</th>
                            <th class='border p-4 cursor-default'>No of Children</th>
                            <th class='border p-4 cursor-default'>No of Rooms</th>
                            <th class='border p-4 cursor-default'>Booking Status</th>
                            <th class='border p-4 cursor-default'>Payment Method</th>
                            <th class='border p-4 cursor-default'>Payment Status</th>
                            <th class='border p-4 cursor-default'>Options</th>
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

                echo "<tr class='border hover:bg-gray-200'>";
                echo "<td class='border p-4 cursor-default' > $rsv_id </td>";
                echo "<td class='border p-4 cursor-default' > $name </td>";
                echo "<td class='border p-4 cursor-default' > $email </td>";
                echo "<td class='border p-4 cursor-default' > $mobile </td>";
                echo "<td class='border p-4 cursor-default' > $cid </td>";
                echo "<td class='border p-4 cursor-default' > $cod </td>";
                echo "<td class='border p-4 cursor-default' > $noa </td>";
                echo "<td class='border p-4 cursor-default' > $noc </td>";
                echo "<td class='border p-4 cursor-default' > $nor </td>";
                echo "<td class='border p-4 cursor-default' > $booking_status </td>";
                echo "<td class='border p-4 cursor-default' > $payment_option </td>";
                echo "<td class='border p-4 cursor-default' > $payment_status </td>";
                echo "<td class='border p-4 cursor-default' > 
                    <a href='./editbooking.php?id=$rsv_id' title='Edit Reservation Details'>Edit</a> 
                    <a title='Delete Reservation'>Delete</a> 
                </td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No Bookings Found!";
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