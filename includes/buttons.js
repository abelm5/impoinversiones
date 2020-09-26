document.querySelector('.btn-slide-bars').addEventListener("click", () => {
    document.querySelector('.nav-main').classList.toggle('show');
});
document.querySelector('.Texto-cabecera').addEventListener("click",() => {
    document.querySelector('.nav-main').classList.remove('show');
});
document.querySelector('.Texto-cabecera').addEventListener("touchmove", () => {
    document.querySelector('.nav-main').classList.add('show');
});