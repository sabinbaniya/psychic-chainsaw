<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="style.css">
    <script src="./booknow.js" defer></script>
</head>

<body class="min-h-screen flex justify-center items-center max-w-[1400px] mx-auto">
    <section class="mx-4">
        <?php require_once("./include/navbar.php") ?>
        <div>
            <form action="./book.php" class="my-8 p-8 rounded-lg min-w-[300px] sm:min-w-[600px] max-w-[622px]" style="background-color: #abc;" onsubmit="showLoader()">
                <div class="max-w-[548px]">
                    <label for="name" class="label_style">Full Name</label>
                    <input required autocomplete="off" type="text" name="name" id="name" class="input_style">
                </div>
                <div class="sm:inline-block sm:mr-8 sm:w-64">
                    <label for="email" class="label_style">Email Address</label>
                    <input required autocomplete="off" type="email" name="email" id="email" class="input_style">
                </div>
                <div class="sm:inline-block sm:w-64">
                    <label for="number" class="label_style">Mobile Number</label>
                    <input required autocomplete="off" type="tel" name="number" id="number" class="input_style">
                </div>
                <div class="max-w-[548px]">
                    <label for="check-in-date" class="label_style">Check-in-date</label>
                    <input required type="date" name="check-in-date" id="check-in-date" class="input_style">
                </div>
                <div class="max-w-[548px]">
                    <label for="check-out-date" class="label_style">Check-out-date</label>
                    <input required type="date" name="check-out-date" id="check-out-date" class="input_style">
                </div>
                <div class="sm:inline-block sm:mr-8 sm:w-64">
                    <label for="adults" class="label_style">Number of Adults</label>
                    <select required name="adults" id="adults" class="input_style">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <div class="sm:inline-block sm:w-64">
                    <label for="children" class="label_style">Number of Children</label>
                    <select required name="children" id="children" class="input_style">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                </div>
                <br>
                <div class="sm:inline-block sm:mr-8 sm:w-64">
                    <label for="name" class="label_style">Number of Rooms</label>
                    <input required autocomplete="off" type="tel" name="rooms" id="rooms" class="input_style" value="1">
                </div>
                <div class="sm:inline-block sm:w-64">
                    <label for="payment" class="label_style">Payment Option</label>
                    <select required name="payment" id="payment" class="input_style">
                        <option value="offline">Offline Payment</option>
                        <option value="esewa">Esewa</option>
                    </select>
                </div>
                <div class="max-w-[548px]">
                    <label for="room_type" class="label_style">Room Type</label>
                    <select required name="room_type" id="room_type" class="input_style">
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="w-full mt-8">
                    <button type="submit" id="btn" class=" bg-blue-500  hover:bg-blue-400 w-full text-white font-semibold py-2 rounded-lg cursor-pointer flex justify-center items-center">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
        <?php require_once("./include/footer.php") ?>
    </section>
</body>
<script>
    function showLoader() {
        const img = document.createElement("img");
        img.src = "./assets/GIF/loader.gif";
        img.classList.add("h-8")
        const btn = document.getElementById("btn");
        btn.classList.remove("py-2");
        btn.classList.remove("bg-blue-500");
        btn.classList.add("py-1");
        btn.style.backgroundColor = "#93c5fd"
        btn.style.cursor = "not-allowed"
        btn.innerText = ""
        btn.appendChild(img);
    }
</script>

</html>