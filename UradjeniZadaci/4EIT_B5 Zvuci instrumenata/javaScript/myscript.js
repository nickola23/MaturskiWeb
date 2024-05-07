function start(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.play();
}

function stop(soundobj) {
    var thissound=document.getElementById(soundobj);
    thissound.pause();
    thissound.currentTime = 0;
}