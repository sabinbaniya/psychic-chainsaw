<?php

echo '
     <footer class="border-t-2  border-gray-200 bg-no-repeat bg-left-bottom bg-cover" style="background-image: url(\'./assets/images/pattern-curve.svg\')">
        <section class="lg:max-w-[1400px] max-w-[90%] space-y-8 mx-auto flex flex-col text-center md:text-left md:flex-row justify-between items-center px-8 py-8">
            <section class="basis-1/3">
                <p class="font-bold text-gray-800 text-xl">Hotel</p>
                <p class="text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consectetur debitis explicabo saepe repellendus porro sequi rem, magnam dolorem tempore.</p>
            </section>
            <section class="basis-1/3 ">
                <ul class="space-y-4">
                    <li><a href="./">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="./booknow.php">Book a Room</a></li>
                    <li><a href="#">Our services</a></li>
                </ul>
            </section>
            <section>
                <ul class="flex justify-between items-center space-x-8">
                    <li><a href="#"><i class="fa-brands fa-instagram fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-facebook fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter fa-2xl hover:-translate-y-1 inline-block transition-all"></i></a></li>
                </ul>
            </section>
        </section>
        <footer class="py-4">
            <p class="text-center font-semibold text-gray-900">Copyright &copy; <span id="current_year"></span> - Hotel Name</p>
        </footer>
    </footer>
    <script>
        document.getElementById("current_year").innerText = new Date().getFullYear()
    </script>
';
