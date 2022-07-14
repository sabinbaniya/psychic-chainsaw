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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="max-w-[1400px] mx-auto">
  <?php require_once("./include/navbar.php") ?>
  <section class="lg:mb-42 md:mb-40 mb-32">
    <section class="relative">
      <main class="bg-[url('./assets/images/hero.jpg')] min-h-[60vh] mx-4 bg-center bg-cover bg-no-repeat rounded-lg overflow-x-hidden">
        <div class="w-[80%] h-[60vh] flex items-center bg-gradient-to-r from-green-300 via-blue-200 to-transparent ">
          <div class="mx-4 text-black md:pl-16 pl-4">
            <h1 class="text-4xl font-bold leading-[3rem] mb-8 drop-shadow-sm">Enjoy Your Travel <br /> With Us.</h1>
            <p class="max-w-[50ch] mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet iure accusantium voluptates exercitationem, illo et officia neque commodi accusamus explicabo, labore ut, illum iste nisi quam quasi id dolores assumenda.</p>
            <div>
              <a href="#sneakpeek" class="px-4 py-2 rounded-lg bg-transparent text-black font-bold border-[3px] border-gray-600 hover:bg-black hover:text-white">Know More</a>
            </div>
          </div>
        </div>
      </main>
      <div class="absolute flex items-start justify-between rounded-lg shadow-md px-8 py-4 w-[80%] text-center md:text-left left-1/2 -translate-x-1/2 -bottom-20 md:-bottom-28 z-50 overflow-hidden bg-white">
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
        <div class="w-80 md:w-full min-h-[55px] md:basis-1/3">
          <p class="text-gray-600 text-lg font-bold">Book now </p>
          <div>
            <ul id="animating_ul" class="break-normal mt-0 md:mt-4 font-bold relative w-56">
              <li class="absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Deluxe Room</li>
              <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Suite</li>
              <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Double Bed Room</li>
              <li class="invisible absolute left-1/2 text-lg -translate-x-1/2 md:left-0 md:translate-x-0">A Balcony Room</li>
            </ul>
          </div>
        </div>
        <div class="hidden md:block">
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
    </section>
  </section>
  <div class="h-10" id="sneakpeek"></div>
  <section class="mb-10 flex mx-4 flex-col-reverse lg:flex-row lg:space-x-8 justify-start items-start">
    <div class="grid grid-cols-4 gap-x-4 grid-rows-3 basis-1/2">
      <div class="row-span-2 col-span-4 h-80">
        <img id="selectedImage" src="./assets/images/hotel-1.jpg" class="rounded-lg h-full w-full">
      </div>
      <div class="row-span-1 col-span-4 gap-x-4 grid grid-cols-4 mt-8">
        <img src="./assets/images/hotel-1.jpg" class="carouselImages cursor-pointer hover:scale-105 transition-all w-40 h-20 opacity-75 hover:opacity-100 rounded-md">
        <img src="./assets/images/hotel-2.jpg" class="carouselImages cursor-pointer hover:scale-105 transition-all w-40 h-20 opacity-75 hover:opacity-100 rounded-md">
        <img src="./assets/images/hotel-3.jpg" class="carouselImages cursor-pointer hover:scale-105 transition-all w-40 h-20 opacity-75 hover:opacity-100 rounded-md">
        <img src="./assets/images/hotel-4.jpg" class="carouselImages cursor-pointer hover:scale-105 transition-all w-40 h-20 opacity-75 hover:opacity-100 rounded-md">
      </div>
    </div>
    <div class="lg:basis-1/3 space-y-4 lg:pl-12 mb-8 lg:mb-0">
      <p class="font-bold text-2xl md:text-4xl text-gray-700">A Sneak Peek of our Hotel</p>
      <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam neque nulla tempore recusandae iure sint, quis mollitia enim pariatur inventore! Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam neque nulla tempore recusandae iure sint, quis mollitia enim pariatur inventore!</p>
      <a href="#testimonial" class="block hover-underline-animation text-indigo-600 font-bold after:bg-indigo-600">See what others have to say about us <i class="fa-solid fa-chevron-right"></i></a>
      <a href="#room" class="pl-5 block w-40 bg-transparent border-2 border-gray-400 rounded-md text-gray-600 px-4 py-2 hover:bg-gray-100 font-bold">Explore Rooms</a>
    </div>
  </section>
  <div id="room" class="h-10"></div>
  <section class="mx-4 mb-20">
    <h3 class="text-3xl md:text-5xl font-bold text-gray-800 sm:text-left text-center">Explore Our Room Options</h3>
    <div class="grid sm:grid-cols-2 sm:grid-rows-2 lg:grid-cols-4 lg:grid-rows-1 grid-cols-1 grid-rows-4 gap-6 place-items-center my-10">
      <div class="relative overflow-hidden rounded-2xl max-h-96 max-w-xs group">
        <img src="./assets/images/room-1.jpg">
        <div class="space-y-2 absolute bottom-0 left-0 backdrop-blur-md p-4 text-gray-200 group-hover:-bottom-96 transition-all duration-500" style="background: rgba(0,0,0,0.3);">
          <p class="font-bold text-gray-200 text-lg drop-shadow-sm border-b border-gray-300">Standard Room</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe veritatis molestias repellat adipisci reiciendis</p>
          <p><i class="fa-solid fa-money-bill-1-wave"></i> NRS. 1000</p>
        </div>
      </div>
      <div class="relative overflow-hidden rounded-2xl max-h-96 max-w-xs group">
        <img src="./assets/images/room-2.jpg">
        <div class="space-y-2 absolute bottom-0 left-0 backdrop-blur-md p-4 text-gray-200 group-hover:-bottom-96 transition-all duration-500" style="background: rgba(0,0,0,0.3);">
          <p class="font-bold text-gray-200 text-lg drop-shadow-sm border-b border-gray-300">Deluxe Room</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe veritatis molestias repellat adipisci reiciendis</p>
          <p><i class="fa-solid fa-money-bill-1-wave"></i> NRS. 1200</p>
        </div>
      </div>
      <div class="relative overflow-hidden rounded-2xl max-h-96 max-w-xs group">
        <img src="./assets/images/room-3.jpg">
        <div class="space-y-2 absolute bottom-0 left-0 backdrop-blur-md p-4  text-gray-200 group-hover:-bottom-96 transition-all duration-500" style="background: rgba(0,0,0,0.3);">
          <p class="font-bold text-gray-200 text-lg drop-shadow-sm border-b border-gray-300">Double Room</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe veritatis molestias repellat adipisci reiciendis</p>
          <p><i class="fa-solid fa-money-bill-1-wave"></i> NRS. 1500</p>
        </div>
      </div>
      <div class="relative overflow-hidden rounded-2xl max-h-96 max-w-xs group">
        <img src="./assets/images/room-3.jpg">
        <div class="space-y-2 absolute bottom-0 left-0 backdrop-blur-md p-4  text-gray-200 group-hover:-bottom-96 transition-all duration-500" style="background: rgba(0,0,0,0.3);">
          <p class="font-bold text-gray-200 text-lg drop-shadow-sm border-b border-gray-300">Balcony Room</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe veritatis molestias repellat adipisci reiciendis</p>
          <p><i class="fa-solid fa-money-bill-1-wave"></i> NRS. 2000</p>
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