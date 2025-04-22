document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleNav");
    const nav = document.querySelector(".nav-side");
    const contentWrap = document.querySelector(".nav-content-wrap");

    toggleButton.addEventListener("click", function () {
        nav.classList.toggle("collapsed");
        contentWrap.classList.toggle("expanded");
    });
});