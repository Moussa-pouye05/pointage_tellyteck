const closSidebar = document.getElementById("close-sidebar");
const menuBtn = document.getElementById("menuBtn");
const sideBare = document.getElementById("sideBare")

if(menuBtn){
menuBtn.addEventListener("click", () => {
    sideBare.classList.toggle("-left-60");
    sideBare.classList.toggle("left-0");
})
}
if(closSidebar){
    closSidebar.addEventListener("click", () => {
    sideBare.classList.toggle("-left-60");
    sideBare.classList.toggle("left-0");
})
}
