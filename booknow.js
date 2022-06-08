const checkInDate = document.getElementById("check-in-date");
const checkOutDate = document.getElementById("check-out-date");


checkInDate?.addEventListener("change", handleChange);
checkInDate?.min = new Date().toLocaleDateString("en-CA");
checkOutDate?.disabled = true;

function handleChange() {
  checkOutDate.disabled = false;
  checkOutDate.min = checkInDate.value;
}