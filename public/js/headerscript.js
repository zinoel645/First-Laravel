// Function mở menu
(() => {
  "use strict";

  document
    .querySelector("#navbarSideCollapse")
    .addEventListener("click", () => {
      document.querySelector(".offcanvas-collapse").classList.toggle("open");
    });
})();

// function chạy active

var menuLinks = document.querySelectorAll("#header .nav-item .nav-link");
var menuDropdown = document.querySelectorAll("#header .nav-item.dropdown");
var dropdownMenuLinks = document.querySelectorAll(
  "#header .nav-item .dropdown-menu .dropdown-item"
);
var navLink = window.location.href;

for (let i = 0; i < menuLinks.length; i++) {
  if (menuLinks[i] == navLink) {
    menuLinks[i].classList.add("active");
  } else {
    for (let k = 0; k < menuDropdown.length; k++) {
      for (let j = 0; j < dropdownMenuLinks.length; j++) {
        if (dropdownMenuLinks[j] == navLink) {
          dropdownMenuLinks[j].classList.add("active");
          dropdownMenuLinks.closest(".nav-item").add("active");
        }
      }
    }
  }
}

var toOffCanvasMenu = document.querySelector(".button-offcanvas");
var moveButtontoMenu = document.querySelector("#navbarsExampleDefault");
var listMenuHeader = document.querySelector('.main-menu')
if (window.innerWidth < 992) {

  moveButtontoMenu.innerHTML = moveButtontoMenu.innerHTML + toOffCanvasMenu.innerHTML
}
