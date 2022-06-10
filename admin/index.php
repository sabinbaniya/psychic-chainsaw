<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table {
            max-width: 90%;
            margin: 0 auto;
        }

        td, th {
            text-align: left;
            padding: 15px;
        }

        th {
            background-color: #1e1e1e;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #dcdcdc;
        }

        tr:not(:first-child):hover {
            background-color: #eaeaea;
            border: 1px dashed black;
        }
    </style>
</head>
<body>
    Bookings till now: 
        <?php 
            include_once("../db/connectDB.php");

            $stmt = "SELECT * FROM bookings";
            $result = $conn->query($stmt);

            if ($result->num_rows > 0) {

                echo "
                <table>
                    <tr>
                        <th>Reservation Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Check in Date</th>
                        <th>Check Out Date</th>
                        <th>No of Adults</th>
                        <th>No of Children</th>
                        <th>No of Rooms</th>
                    </tr>
                ";

                while($row = $result->fetch_assoc()) {
                    $rsv_id = $row["reservation_id"];
                    $name = $row["name"];
                    $email = $row["email"];
                    $mobile = $row["mobile"];
                    $cid = $row["check_in_date"];
                    $cod = $row["check_out_date"];
                    $noa = $row["no_of_adults"];
                    $noc = $row["no_of_children"];
                    $nor = $row["no_of_rooms"];

                    echo "<tr>";
                        echo "<td> $rsv_id </td>";
                        echo "<td> $name </td>";
                        echo "<td> $email </td>";
                        echo "<td> $mobile </td>";
                        echo "<td> $cid </td>";
                        echo "<td> $cod </td>";
                        echo "<td> $noa </td>";
                        echo "<td> $noc </td>";
                        echo "<td> $nor </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No Bookings Found!";
            }
            $conn->close(); 
        ?>
    
</body>
</html>