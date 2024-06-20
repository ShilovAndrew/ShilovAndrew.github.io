const menuToggle = document.getElementById("toggle");
const menu = document.querySelector(".mobile-nav");
const menuLinks = document.querySelectorAll(".mobile-nav-item");

menuLinks.forEach((link) =>
  link.addEventListener("click", () => {
    menuToggle.checked = false;
  })
);