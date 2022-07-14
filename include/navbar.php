<?php

echo "
<!-- header section start  -->
  <section>
    <header class='flex items-center justify-between mx-4 h-20'>
      <nav id='home' class='mt-4 h-20 flex items-center justify-between w-11/12 mx-auto max-w-[1300px]'>
        <img src='./assets/images/logo_for_email.png' class='w-16' alt='Hotel Name' />
        <!-- desktop nav  -->
        <nav class='space-x-8 md:space-x-10 hidden sm:flex'>
          <a class='font-medium hover-underline-animation text-black after:bg-black' href='#home'>Home
          </a>
          <a class='font-medium hover-underline-animation text-black after:bg-black' href='#about'>About Us
          </a>
          <a class='font-medium hover-underline-animation text-black after:bg-black' href='#getstarted'>Our Services
          </a>
        </nav>
        <div>
          <a href='./booknow.php' class=' px-4 py-2 rounded-lg bg-transparent text-black font-bold border-[3px] border-gray-600 hover:bg-black hover:text-white hidden sm:block'>Book A Room</a>
        </div>
        <!-- desktop nav end -->

        <!-- mobile nav start -->
        <div class='sm:hidden'>
          <input type='checkbox' id='menu' class='hidden peer' />
          <span class='w-7 h-[3px] bg-black block rounded relative peer-checked:bg-inherit peer-checked:after:rotate-45 peer-checked:before:-rotate-45 peer-checked:after:top-0 peer-checked:before:top-0 after:content-[\"\"] before:content-[\"\"] before:-top-2 after:top-2 before:absolute after:absolute after:w-full before:w-full after:h-full before:h-full after:block before:block after:rounded before:rounded after:bg-black before:bg-black'>
            <label for='menu' class='w-full cursor-pointer h-8 -top-4 absolute block z-50'></label>
          </span>

          <div class='absolute z-50 h-60 left-0 right-0 transition-all peer-checked:top-28 sm:hidden -top-96 rounded-sm space-y-4 flex flex-col w-11/12 mx-auto bg-white text-[#002635] text-center'>
            <a onclick='closeMenu()' class='py-2 mt-4' href='#home'>Home </a>
            <a onclick='closeMenu()' class='py-2' href='#about'>About Us </a>
            <a onclick='closeMenu()' class='py-2' href='#services'>Our Services
            </a>
            <a onclick='closeMenu()' class='py-2 mb-4' href='./booknow.php' class=''>Book Now</a>
          </div>
        </div>
        <!-- mobile nav end -->
      </nav>

    </header>
  </section>
  <!-- header section end  -->
";
