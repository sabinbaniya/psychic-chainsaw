<?php
if (isset($_POST["create"])) {
    require_once("../db/connectDB.php");
    require_once("./helpers/random_str.php");
    require_once("../email_sender.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $type = $_POST["type"];

    $unhashed_pw = random_str(8);

    $password = password_hash($unhashed_pw, null);

    $stmt = $conn->prepare("INSERT INTO users (name, username, password, role) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $username, $password, $type);
    $stmt->execute();
    if ($stmt->affected_rows === 1) {
        $m = send_email($name, $email, $username, $unhashed_pw);
        echo $m;
        header("Location: ./createuser.php?success=true");
        exit();
    } else {
        header("Location: ./createuser.php?success=false");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a user</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require("./navbar.php")
    ?>

    <section class="flex flex-col justify-center overflow-x-hidden items-center bg-gray-100" style="min-height: calc(100vh - 80px)">
        <?php
        if (isset($_GET["success"])) {
            if ($_GET["success"] === "true") {
                echo '
            <div class="w-96 h-10 bg-green-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-8 notification">
                <p class="text-white text-md">Successfully Created User. Email sent to given email.</p>
            </div>
            ';
            } else {
                echo '
            <div class="w-96 h-10 bg-red-400 flex justify-center items-center text-center rounded-lg absolute -right-[500px] top-8 notification">
                <p class="text-white text-md">Couldn\'t create user. Please try again later.</p>
            </div>
            ';
            }
        }
        ?>
        <h3 class="my-6 text-2xl text-gray-700 font-semibold">Create a user</h3>
        <form action="./createuser.php" class="p-8 rounded-lg bg-white w-80 text-gray-600" method="POST">

            <div class="w-full">
                <label for="name" class="block mt-6 mb-2 text-lg">Name</label>
                <input type="text" name="name" id="name" autocomplete="name" class="border rounded-lg px-4 w-full py-2 h-10" required>
            </div>

            <div class="w-full">
                <label for="email" class="block mt-6 mb-2 text-lg">Email</label>
                <input type="email" name="email" id="email" autocomplete="email" class="border rounded-lg px-4 w-full py-2 h-10" required>
            </div>
            <div class="w-full">
                <label for="username" class="block mt-6 mb-2 text-lg">Username</label>
                <input type="text" name="username" id="username" autocomplete="username" class="border rounded-lg px-4 w-full py-2 h-10" required>
            </div>
            <div class="w-full my-4">
                <label for="type" class="text-lg">Select a role</label>
                <select name="type" id="type" class="border p-2 inline-block ml-4">
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div>
                <button type="submit" name="create" class="bg-blue-500 font-bold text-white rounded-lg w-full py-2 mt-4 mb-2 cursor-pointer hover:bg-blue-400">
                    Create User
                </button>
            </div>
        </form>

    </section>

</body>

</html>