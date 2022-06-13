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

    <!-- nav component starts  -->
    <header class="flex justify-between items-center h-20 max-w-[1400px] mx-auto px-8">
        <div>
            <p class="text-gray-600 text-2xl font-bold">Admin Panel</p>
        </div>
        <!-- menu for desktop starts -->
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li class="text-lg bg-gray-900 px-2 py-1 text-white rounded-lg transition-all">
                    <a href="">Bookings</a>
                </li>
                <li class="text-lg px-2 py-1 hover:bg-gray-300 transition-all rounded-lg">
                    <a href="">Item 2</a>
                </li>
                <li class="text-lg px-2 py-1 hover:bg-gray-300 transition-all rounded-lg">
                    <a href="">Item 3</a>
                </li>
            </ul>
        </nav>
        <div class="hidden md:block">
            <button>
                <a href="#" class="border-[3px] px-6 py-2 rounded-lg border-red-500 hover:bg-red-700 hover:text-white font-semibold transition-all">Log Out</a>
            </button>
        </div>
        <!-- menu for desktop ends -->

        <!-- mobile menu starts  -->
        <div class="md:hidden">
            <input type="checkbox" id="menu" class="hidden peer" />
            <span class="w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[''] before:content-[''] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black before:transition-all before:duration-300 after:transition-all after:duration-300">
                <label for="menu" class="w-full h-8 -top-4 absolute block z-50 cursor-pointer"></label>
            </span>

            <div class="absolute z-50 pb-8 left-0 right-0 transition-all duration-300 peer-checked:top-28 md:hidden -top-[500px] rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-gray-300 text-[#002635] text-center">
                <a onclick="closeMenu()" class="py-2 mt-4" href="">Bookings</a>
                <a onclick="closeMenu()" class="py-2" href="">Item 2 </a>
                <a onclick="closeMenu()" class="py-2" href="">Item 3 </a>
                <button>
                    <a href="./logout.php" onclick="closeMenu()" class="border-2 my-2 px-6 py-2 inline-block rounded-lg border-red-500 font-semibold transition-all">Log Out</a>
                </button>
            </div>
        </div>
        <!-- mobile menu endss  -->
    </header>
    <!-- nav component ends  -->
    <section class="max-w-[1400px] mx-auto px-8 overflow-x-scroll">
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