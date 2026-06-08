const closeSidebar = document.getElementById("close-sidebar");
const menuNav = document.getElementById("menuBtn");
const sideBare = document.getElementById("sideBare");
const desktopMedia = window.matchMedia("(min-width: 768px)");

const openSidebar = () => {
    sideBare.classList.remove("-left-60");
    sideBare.classList.add("left-0");
    menuNav?.setAttribute("aria-expanded", "true");
};

const closeMobileSidebar = () => {
    sideBare.classList.remove("left-0");
    sideBare.classList.add("-left-60");
    menuNav?.setAttribute("aria-expanded", "false");
};

if (menuNav && sideBare) {
    menuNav.setAttribute("aria-expanded", "false");
    menuNav.addEventListener("click", openSidebar);
}

if (closeSidebar && sideBare) {
    closeSidebar.addEventListener("click", closeMobileSidebar);
}

if (sideBare) {
    desktopMedia.addEventListener("change", (event) => {
        if (event.matches) {
            closeMobileSidebar();
        }
    });
}
