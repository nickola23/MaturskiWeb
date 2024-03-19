const images = document.querySelectorAll('.animal');
const sounds = ["cat.mp3", "dog.mp3", "chicken.mp3", "duck.mp3", "goose.mp3"];

images.forEach(img => {
    img.addEventListener('mouseover', () => {
        const imgSrc = img.getAttribute('src');
        const soundSrc = "./audio/" + imgSrc.split('.')[1].split('/')[2] + ".mp3";
        console.log(soundSrc);
        const audio = new Audio(soundSrc);
        audio.play();
    })
});

images.forEach(img => {
    img.addEventListener('click', () =>{
        const imgSrc = img.getAttribute('src').split('.')[1].split('/')[2];
        window.open('./html/' + imgSrc + '.html', imgSrc, 'width=100,height=50');
    })
});