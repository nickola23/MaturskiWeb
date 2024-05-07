let url = "https://naslovi.net/vremenska-prognoza/";
function funkcija() {
    let grad = document.querySelector("#izbor").value;
    document.querySelector("#promena").src = url + grad;
    //document.querySelector("#opis").innerHTML = grad.charAt(0).toUpperCase() + grad.slice(1) + " je lep grad.";
    window.open("./stranice/"+grad+".html", "", "width=200,height=400");
    //window.open("./stranice/"+grad+".html");
}