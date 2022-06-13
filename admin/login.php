<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex space-y-8 flex-col justify-center items-center ">
        <h3 class="text-3xl font-bold text-gray-700">Login</h3>
        <form action="./authenticate.php" method="POST" class="bg-white p-8 space-y-8 rounded-lg w-80">
            <div class="flex flex-col-reverse">
                <input autocomplete="username" type="text" name="username" id="username" class="peer mt-4 border-2 border-gray-200 px-4 py-2 h-12 rounded-lg"/>
                <label for="username" class="peer-focus:text-lg transition-all block text-md text-gray-700">Username</label>
            </div>
            <div class="flex flex-col-reverse">
                <input autocomplete="current-password" type="password" name="password" id="password" class="peer mt-4 border-2 border-gray-200 px-4 py-2 h-12 rounded-lg"/>
                <label for="password" class="peer-focus:text-lg transition-all block text-md text-gray-700">Password</label>
            </div>
            <div>
                <input type="submit" value="Log In" class="cursor-pointer w-full  bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-400">
            </div>
        </form>

    </div>
</body>
</html>