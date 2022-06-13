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

    <section class="flex justify-center items-center bg-gray-100" style="min-height: calc(100vh - 80px)">
        <form action="" class="p-8 rounded-lg bg-white w-80 text-gray-600">

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
                <input type="submit" value="Create User" class="bg-blue-500 font-bold text-white rounded-lg w-full py-2 mt-4 mb-2 cursor-pointer hover:bg-blue-400">
            </div>
        </form>

    </section>

</body>

</html>