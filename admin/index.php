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
        Bookings till now:
        <?php
        include_once("../db/connectDB.php");

        $stmt = "SELECT * FROM bookings";
        $result = $conn->query($stmt);

        if ($result->num_rows > 0) {

            echo "
                    <table class='mx-auto rounded-lg border border-collapse'>
                    <thead class='bg-gray-800 text-white px-4 py-2'>
                        <tr>
                            <th class='border p-4'>Reservation Id</th>
                            <th class='border p-4'>Name</th>
                            <th class='border p-4'>Email</th>
                            <th class='border p-4'>Mobile</th>
                            <th class='border p-4'>Check in Date</th>
                            <th class='border p-4'>Check Out Date</th>
                            <th class='border p-4'>No of Adults</th>
                            <th class='border p-4'>No of Children</th>
                            <th class='border p-4'>No of Rooms</th>
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

                echo "<tr class='border'>";
                echo "<td class='border p-4' > $rsv_id </td>";
                echo "<td class='border p-4' > $name </td>";
                echo "<td class='border p-4' > $email </td>";
                echo "<td class='border p-4' > $mobile </td>";
                echo "<td class='border p-4' > $cid </td>";
                echo "<td class='border p-4' > $cod </td>";
                echo "<td class='border p-4' > $noa </td>";
                echo "<td class='border p-4' > $noc </td>";
                echo "<td class='border p-4' > $nor </td>";
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