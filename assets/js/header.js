const checkbox = document.getElementById("nav__check");
const nav = document.querySelector(".nav");

checkbox.addEventListener("change", function () {
  if (this.checked) {
    nav.style.left = "0";
  } else {
    nav.style.left = "-100%";
  }
});