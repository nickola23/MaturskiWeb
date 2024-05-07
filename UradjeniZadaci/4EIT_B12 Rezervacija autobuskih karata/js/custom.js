function Prikazi()//funkcija za prikaz dela o funkcionalnosti pocetne stranice
{
    document.getElementById('pocetna').style.display="block";
    document.getElementById('h2').style.display="none";

}

function Prikaziautore()//funkcija za prikaz dela o funkcionalnosti stranice autori
{
    document.getElementById('autori').style.display="block";
    document.getElementById('h3').style.display="none";

}

function Prikaziuputstvo()//funkcija za prikaz dela o upustvima
{
    document.getElementById('uputstvo').style.display="block";
    document.getElementById('h4').style.display="none";

}

var red = document.querySelector('.redovi').children;//napravljen niz od div elementa
function Rezervisi(n)//fukcija za proveru da li je izbrano sediste zauzeto i ako nije za unos broja sedista u polje Broj sedista
{
  var paragraf = red[n-1].children;
  if(paragraf[0].classList.contains('zauzeto'))
    alert("Izabrano sedište je zauzeto.");
  else
  {
    var sediste = Number(n);
    document.getElementById('br').value= sediste;
  }
}
function ProveraStringa(el) //funkcija za proveru da li je paragraf(p) prazan
{
  return el.innerHTML === "" ? true : false;
}

//dugme se povecava kada se predje misom preko njega
$(document).ready(function(){
  $("button").hover(function(){
    $(this).animate({height: '55px', width: '120px'}, 100)
  },
  function(){
    $(this).css({height: 'auto', width: 'auto'})
  }); 
});
var red = document.querySelector('.redovi').children;//napravljen niz od div elementa
function Zauzmi()//funkcija za proveru unetih podataka i promenu pozadine rezervisanog sedišta
{
  //validacija unetih podataka
  var broj= document.getElementById('br').value;
  var paragraf = red[broj-1].children;
  paragraf[0].classList.replace('slobodno','zauzeto');
}


