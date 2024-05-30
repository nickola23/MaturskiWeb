function pretraziPoSifri(sifra, tekstualniFajl) {
    const linije = tekstualniFajl.split('\n');
    for (const linija of linije) {
        const sifraArtikla = linija.substring(0, 6);
        if (sifraArtikla === sifra) {
            console.log('Пронађен артикал:', linija);
        }
    }
}