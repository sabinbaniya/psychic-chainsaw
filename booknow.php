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
<body class="min-h-screen flex justify-center items-center">
    <div>
        <form action="./book.php" class="my-8 p-8 rounded-lg bg-gradient-to-l from-stone-300 to-slate-500 min-w-[300px] sm:min-w-[600px] w-full">
            <div>
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
            <div>
                <label for="check-in-date" class="label_style">Check-in-date</label>
                <input required type="date" name="check-in-date" id="check-in-date" class="input_style">
            </div>
            <div>
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
            <div class="w-full sm:flex items-end justify-between space-y-8 sm:space-y-0">
                <div class="basis-2/3">
                    <label for="name" class="label_style">Number of Rooms</label>
                    <input required autocomplete="off" type="tel" name="rooms" id="rooms" class="input_style" value="1">
                </div>
                <div class="w-full basis-1/3 flex justify-end">
                    <input type="submit" value="Book now" class="bg-blue-400 sm:w-11/12 w-full text-white font-semibold h-8 rounded-lg cursor-pointer hover:bg-blue-300">
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>