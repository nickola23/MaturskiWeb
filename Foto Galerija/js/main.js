const navImages = document.querySelectorAll('.navImg');
const mainContImg = document.querySelector('.mainContImg');
const mainContText = document.querySelector('.mainContText');
const opisi = "";
const centralniOpis = "";

fetch('./txt/opisiSlika.txt')
    .then(response => response.text())
    .then(text => {
    opisi = text.split('\n\n');
    centralniOpis = opisi[0];
    mainContText.textContent = centralniOpis;
})
.catch(error => console.error('Грешка при учитавању описа слика:', error));

navImages.forEach(img => {
    img.addEventListener('click', () => {
    const imgSrc = img.getAttribute('src');
    const imgAlt = img.getAttribute('alt');
    const newImgSrc = "." + imgSrc;
    mainContImg.style.backgroundImage = "url(" + newImgSrc + ")";
    mainContText.innerHTML = imgAlt;
})});
