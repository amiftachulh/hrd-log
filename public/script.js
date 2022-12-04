const menuBtn = document.getElementById("menu-toggle");
const leftNav = document.getElementById("left-nav-menu");
const mainContent = document.getElementById("main-content");

menuBtn.addEventListener("click", () => {
  leftNav.classList.toggle("show");
  mainContent.classList.toggle("shrink");
});
