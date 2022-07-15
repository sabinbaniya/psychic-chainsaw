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
    <title>Admin Hotel Website</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" /> -->
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="./index.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://npmcdn.com/flickity@2/dist/flickity.css" rel="stylesheet" />
    <script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="overflow-x-hidden bg-white text-black min-h-screen">
    <?php require_once("./navbar.php") ?>

    <section class="px-8  max-w-[1400px] mx-auto">
        <?php
        if (isset($_GET["deleted"])) {
            if ($_GET["deleted"] === "true") {
                echo '
            <div class="w-64 h-10 bg-green-400 flex justify-center items-center text-center rounded-lg absolute -right-[200px] top-28 notification">
                <p class="text-white text-md">Successfully deleted a record.</p>
            </div>
            ';
            } else {
                echo '
            <div class="w-96 h-10 bg-red-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-28 notification">
                <p class="text-white text-md">Couldn\'t delete that record. Please try again later!</p>
            </div>
            ';
            }
        }

        ?>
        <section class="my-10">
            <h3 class="font-bold text-gray-700 text-xl md:text-3xl text-center">Form Submissions from Contact Form</h3>
            <?php
            require_once("../db/connectDB.php");

            if ($stmt = $conn->prepare("SELECT name, email, subject,mobile, message, createdat FROM contact_form_submissions ORDER BY id DESC")) {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($name, $email, $subject, $mobile, $message, $createdat);

                echo "
                <div class='overflow-x-auto my-10'>
                    <table class='mx-auto rounded-lg border border-collapse'>
                    <thead class='bg-gray-800 text-white'>
                        <tr>
                            <th class='border px-4 py-1 cursor-default'>S No</th>
                            <th class='border px-4 py-1 cursor-default'>Name</th>
                            <th class='border px-4 py-1 cursor-default'>Email</th>
                            <th class='border px-4 py-1 cursor-default'>Mobile</th>
                            <th class='border px-4 py-1 cursor-default'>Subject</th>
                            <th class='border px-4 py-1 cursor-default'>Message</th>
                            <th class='border px-4 py-1 cursor-default'>Recieved on</th>
                            <th class='border px-4 py-1 cursor-default'>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    ";

                $count = 1;

                while ($stmt->fetch()) {
                    echo "<tr class='border hover:bg-gray-200'>";
                    echo "<td class='border p-4 cursor-default' > " . $count++ . "</td>";
                    echo "<td class='border p-4 cursor-default' > $name </td>";
                    echo "<td class='border p-4 cursor-default' > $email </td>";
                    echo "<td class='border p-4 cursor-default' > $mobile </td>";
                    echo "<td class='border p-4 cursor-default' > $subject </td>";
                    echo "<td class='border p-4 cursor-default capitalize' > $message </td>";
                    echo "<td class='border p-4 cursor-default capitalize' > $createdat </td>";
                    echo "
                        <td class='border p-4 cursor-default' > 
                            <a href='./delete-form-submissions.php?id=$createdat' title='Delete Message' class='hover:bg-red-500 hover:text-white px-2 py-1 rounded-lg'>Delete</a> 
                        </td>
                        ";
                    echo "</tr>";
                }

                echo "</tbody>
                    </table>
                    </div>
                ";
            }

            ?>
        </section>
    </section>
</body>

</html>