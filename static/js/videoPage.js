const videoViewMenu = document.querySelector('.view-video-menu');
const menuHeight = videoViewMenu.clientHeight;
if(menuHeight > 593) {
    videoViewMenu.style.height = "593px";
    videoViewMenu.style.overflowY = "scroll";
}