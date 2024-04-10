const navImages = document.querySelectorAll('.navImg');
const mainContImg = document.querySelector('.mainContImg');
const mainContText = document.querySelector('.mainContText');
const opisi = [];
const centralniOpis = "";

navImages.forEach(img => {
    img.addEventListener('click', () => {
    const imgSrc = img.getAttribute('src');
    const newImgSrc = imgSrc;
    mainContImg.style.backgroundImage = "url(" + newImgSrc + ")";
    mainContText.textContent = opisi[3];
})});

fetch('../txt/opisiSlika.txt')
    .then(response => response.text())
    .then(text => {
    opisi = text.split('\n');
    centralniOpis = opisi[0];
    mainContText.textContent = centralniOpis;
})
.catch(error => console.error('Грешка при учитавању описа слика:', error));