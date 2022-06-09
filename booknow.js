const checkInDate = document.getElementById("check-in-date");
const checkOutDate = document.getElementById("check-out-date");

checkInDate.addEventListener("change", handleChange);
checkInDate.value = new Date().toLocaleDateString("en-CA");
checkInDate.min = new Date().toLocaleDateString("en-CA");
const arr = checkInDate.min.split("-");
arr[2] = parseInt(arr[2]) + 1;
checkOutDate.min = arr.join("-");

function handleChange() {
  const arr = checkInDate.min.split("-");
  arr[2] = parseInt(arr[2]) + 1;
  checkOutDate.min = arr.join("-");
}
