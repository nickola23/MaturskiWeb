const images = document.querySelectorAll('.zastava');

images.forEach(img => {
    img.addEventListener('click', () => {
        const imgSrc = img.getAttribute('src').split("/")[2].split(".")[0];
        window.open('./html/' + imgSrc + '.html', imgSrc, 'width=300,height=250')
    })
});

images.forEach(img => {
    img.addEventListener('mouseover', () => {
        const imgSrc = img.getAttribute('src').split("/")[2].split(".")[0];
        const soundSrc = "./audio/" + imgSrc + ".mp3";
        const audio = new Audio(soundSrc);
        audio.play();
    })
});