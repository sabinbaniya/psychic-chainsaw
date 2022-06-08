const animatingUl = document.getElementById("animating_ul");
const location = document.getElementById("location");
const hour = document.getElementById("hour");
const minute = document.getElementById("minute");
const childArr = Array.from(animatingUl.childNodes);

let j = 0;

function animate() {
  switch (j) {
    case 0:
      j = 1;
      childArr[0].classList.remove("fade_in");
      childArr[0].classList.add("invisible");
      childArr[1].classList.add("fade_in");
      childArr[1].classList.remove("invisible");
      break;
    case 1:
      j = 2;
      childArr[1].classList.remove("fade_in");
      childArr[1].classList.add("invisible");
      childArr[2].classList.add("fade_in");
      childArr[2].classList.remove("invisible");
      break;
    case 2:
      j = 3;
      childArr[2].classList.remove("fade_in");
      childArr[2].classList.add("invisible");
      childArr[3].classList.add("fade_in");
      childArr[3].classList.remove("invisible");
      break;
    case 3:
      j = 0;
      childArr[3].classList.add("invisible");
      childArr[3].classList.remove("fade_in");
      childArr[0].classList.add("fade_in");
      childArr[0].classList.remove("invisible");
      break;
  }
}

setInterval(() => {
  animate();
}, 4000);
