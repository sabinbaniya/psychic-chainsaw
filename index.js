document.addEventListener("DOMContentLoaded", () => {
  const animatingUl = document.getElementById("animating_ul");
  const Location = document.getElementById("location");
  const hour = document.getElementById("hour");
  const minute = document.getElementById("minute");
  const selectedImage = document.getElementById("selectedImage");
  const carousel = Array.from(
    document.getElementsByClassName("carouselImages")
  );
  let childArr = Array.from(animatingUl.childNodes);
  childArr = childArr.filter((c) => {
    return c.nodeName === "LI";
  });

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

  function clock() {
    const time = new Date().toLocaleTimeString().split(":");
    const hr = time[0];
    const mins = time[1];

    hour.innerText = hr;
    minute.innerText = mins;
  }

  carousel.map((el) => {
    el.addEventListener("click", (e) => {
      console.log(e);
      selectedImage.src = e.target.src;
    });
  });

  clock();
  setInterval(clock, 1000);
});
