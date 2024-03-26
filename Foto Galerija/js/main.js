const navImages = document.querySelectorAll('.navImg');
const mainContImg = document.querySelector('.mainContImg');
const mainContText = document.querySelector('.mainContText');

navImages.forEach(img => {
    img.addEventListener('click', () => {
    const imgSrc = img.getAttribute('src');
    const imgAlt = img.getAttribute('alt');
    const newImgSrc = "." + imgSrc;
    mainContImg.style.backgroundImage = "url(" + newImgSrc + ")";
    mainContText.innerHTML = imgAlt;
})});
