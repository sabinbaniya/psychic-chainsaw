<?php

$active;
if (strpos($_SERVER["REQUEST_URI"], "createuser") !== false) {
    $active = "createuser";
} else {
    $active = "bookings";
}

echo '
 <!-- nav component starts  -->
    <header class="flex justify-between items-center h-20 max-w-[1400px] mx-auto px-8">
        <div>
            <a href="./index.php" class="text-gray-600 text-2xl font-bold">Admin Panel</a>
        </div>
        <!-- menu for desktop starts -->
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li>
                    <a href="./index.php" class="text-lg inline-block ' . ($active == "bookings" ? "bg-gray-900 text-white" : "hover:bg-gray-300") . ' px-2 py-1 rounded-lg transition-all">Bookings</a>
                </li> ' . ($_SESSION["user_role"] == "admin" ? "<li>
                    <a href='./createuser.php'  class='text-lg inline-block px-2 py-1  ' . ($active == 'createuser' ? 'bg-gray-900 text-white' : 'hover:bg-gray-300') . ' transition-all rounded-lg'>Create User</a>
                </li>" : null) . '
            </ul>
        </nav>
        <div class="hidden md:block">
            <button>
                <a href="./logout.php" class="border-[3px] px-6 py-2 rounded-lg border-red-500 hover:bg-red-700 hover:text-white font-semibold transition-all">Log Out</a>
            </button>
        </div>
        <!-- menu for desktop ends -->

        <!-- mobile menu starts  -->
        <div class="md:hidden">
            <input type="checkbox" id="menu" class="hidden peer" />
            <span class="w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[\'\'] before:content-[\'\'] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black before:transition-all before:duration-300 after:transition-all after:duration-300">
                <label for="menu" class="w-full h-8 -top-4 absolute block z-50 cursor-pointer"></label>
            </span>

            <div class="absolute z-50 pb-8 left-0 right-0 transition-all duration-300 peer-checked:top-28 md:hidden -top-[500px] rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-gray-300 text-[#002635] text-center">
                <a onclick="closeMenu()" class="py-2 mt-4" href="./index.php">Bookings</a>
                <a onclick="closeMenu()" class="py-2" href="./createuser.php">Create User </a>
                <button>
                    <a href="./logout.php" onclick="closeMenu()" class="border-2 my-2 px-6 py-2 inline-block rounded-lg border-red-500 font-semibold transition-all">Log Out</a>
                </button>
            </div>
        </div>
        <!-- mobile menu endss  -->
    </header>
    <!-- nav component ends  -->
';
