document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleNav");
    const nav = document.querySelector(".nav-side");
    const contentWrap = document.querySelector(".nav-content-wrap");
    const content = document.querySelector(".content");
    const contentHeader = document.querySelector(".content-header"); 
    toggleButton.addEventListener("click", function () {
        nav.classList.toggle("collapsed");
        contentWrap.classList.toggle("expanded");
        content.classList.toggle("expanded");
        contentHeader.classList.toggle("expanded");
    });
});