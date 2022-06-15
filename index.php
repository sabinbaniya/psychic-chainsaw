<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Booking System</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="./index.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
</head>

<body class="max-w-[1400px] mx-auto">
  <!-- header section start  -->
  <section>
    <header class="flex items-center justify-between mx-4 h-20">
      <nav id="home" class="mt-4 h-20 flex items-center justify-between w-11/12 mx-auto max-w-[1300px]">
        <img src="./assets/images/logo_for_email.png" class="w-16" alt="Hotel Name" />
        <!-- desktop nav  -->
        <nav class="space-x-8 md:space-x-10 hidden sm:flex">
          <a class="hover:underline underline-offset-4 font-medium transition-all duration-500" href="#home">Home
          </a>
          <a class="hover:underline underline-offset-4 font-medium transition-all duration-500" href="#about">About Us
          </a>
          <a class="hover:underline underline-offset-4 font-medium transition-all duration-500" href="#getstarted">Our Services
          </a>
        </nav>
        <div>
          <a href="./booknow.php" class=" px-4 py-2 rounded-lg bg-transparent text-black font-bold border-[3px] border-gray-600 hover:bg-black hover:text-white hidden sm:block">Book A Room</a>
        </div>
        <!-- desktop nav end -->

        <!-- mobile nav start -->
        <div class="sm:hidden">
          <input type="checkbox" id="menu" class="hidden peer" />
          <span class="w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[''] before:content-[''] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black">
            <label for="menu" class="w-full h-8 -top-4 absolute block z-50"></label>
          </span>

          <div class="absolute z-50 h-60 left-0 right-0 transition-all peer-checked:top-28 sm:hidden -top-96 rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-white text-[#002635] text-center">
            <a onclick="closeMenu()" class="py-2 mt-4" href="#home">Home </a>
            <a onclick="closeMenu()" class="py-2" href="#about">About Us </a>
            <a onclick="closeMenu()" class="py-2" href="#services">Our Services
            </a>
            <a onclick="closeMenu()" class="py-2 mb-4" href="./booknow.php" class="">Book Now</a>
          </div>
        </div>
        <!-- mobile nav end -->
      </nav>

    </header>
  </section>
  <!-- header section end  -->
  <section class="relative">
    <main class="bg-[url('./assets/images/hero.jpg')] min-h-[60vh] mx-4 bg-center bg-cover bg-no-repeat rounded-lg overflow-x-hidden">
      <div class="w-[80%] h-[60vh] flex items-center bg-gradient-to-r from-green-300 via-blue-200 to-transparent ">
        <div class="mx-4 text-black md:pl-16 pl-4">
          <h1 class="text-4xl font-bold leading-[3rem] mb-8 drop-shadow-sm">Enjoy Your Travel <br /> With Us.</h1>
          <p class="max-w-[50ch] mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet iure accusantium voluptates exercitationem, illo et officia neque commodi accusamus explicabo, labore ut, illum iste nisi quam quasi id dolores assumenda.</p>
          <div>
            <a href="./booknow.php" class="px-4 py-2 rounded-lg bg-transparent text-black font-bold border-[3px] border-gray-600 hover:bg-black hover:text-white">Book Now</a>
          </div>
        </div>
      </div>
    </main>
    <div class="absolute flex space-y-4 md:space-y-0 flex-col md:flex-row items-center md:items-start justify-between rounded-lg shadow-md px-8 py-4 md:w-[70%] w-[50%] text-center md:text-left left-1/2 -translate-x-1/2 -bottom-[280px] md:-bottom-28 z-50 overflow-hidden bg-white">
      <div>
        <p class="text-gray-600 text-lg font-bold">Facilities</p>
        <div>
          <ul class="flex space-x-2 mt-4">
            <li title="swimming"><i class="fa-solid fa-person-swimming border-2 p-1 rounded-md text-blue-500 border-blue-500 "></i></li>
            <li title="wifi"><i class="fa-solid fa-wifi border-2 p-1 rounded-md text-green-500 border-green-500"></i></li>
            <li title="ac"><i class="fa-solid fa-wind border-2 p-1 rounded-md text-yellow-500 border-yellow-500"></i></li>
            <li title="dinner"><i class="fa-solid fa-utensils border-2 p-1 rounded-md text-orange-500 border-orange-500"></i></li>
          </ul>
        </div>
      </div>
      <div class=" w-full min-h-[55px] basis-1/3">
        <p class="text-gray-600 text-lg font-bold">Book now </p>
        <div>
          <ul id="animating_ul" class="break-normal mt-0 md:mt-4 font-bold relative">
            <li class="absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Deluxe Room</li>
            <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Suite</li>
            <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Double Bed Room</li>
            <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Balcony Room</li>
          </ul>
        </div>
      </div>
      <div>
        <p class="text-gray-600 text-lg font-bold mt-4 md:mt-0">Time<span id="location"></span></p>
        <div>
          <span class="relative bg-black inline-block h-16 w-14 text-white rounded-lg overflow-hidden">
            <span id="hour" class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-3xl font-black drop-shadow-lg" style="font-family: 'Orbitron',sans-serif;">00</span>
            <span class="absolute bottom-0 left-0 bg-gray-700 h-1/2 w-full"></span>
          </span>
          <span class="relative bg-black inline-block h-16 w-14 text-white rounded-lg overflow-hidden">
            <span id="minute" class="absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-3xl font-black drop-shadow-lg" style="font-family: 'Orbitron',sans-serif;">00</span>
            <span class="absolute bottom-0 left-0 bg-gray-700 h-1/2 w-full"></span>
          </span>
        </div>
      </div>

    </div>


    </div>
  </section>
  <script>
    function closeMenu() {
      document.getElementById("menu").checked = false;
    }
  </script>
</body>

</html>