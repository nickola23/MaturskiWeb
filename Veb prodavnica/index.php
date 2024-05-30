<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osnovna skola Sonja Marinkovic</title>
    <link rel="stylesheet" href="./css/global.css">
</head>
<body>
    <main>
        <?php 
            require "./components/header.php"
        ?>
        <div class="heading">
            <img src="./images/srbija.png" alt="" class="logo">
            <h1>Web prodavnica</h1>
        </div>
        <hr>
        <p>Parametri za pretragu</p>
        <div class="search">
            <div class="col">
                <div class="row"><label for="">Proizvodjac: </label>
                    <select id="Proizvodjac" name="Proizvodjac">
                        <option value=""selected disabled></option>
                        <option value="512MB">512MB</option>
                        <option value="1GB">1GB</option>
                        <option value="1.5GB">1.5GB</option>
                        <option value="3GB">3GB</option>
                    </select>
                </div>
                <div class="row"><label for="">RAM: </label>
                    <select id="RAM" name="RAM">
                        <option value=""selected disabled></option>
                        <option value="512MB">512MB</option>
                        <option value="1GB">1GB</option>
                        <option value="1.5GB">1.5GB</option>
                        <option value="3GB">3GB</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="row"><label for="">Kamera: </label>
                    <select id="Kamera" name="Kamera">
                        <option value=""selected disabled></option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="9">9</option>
                        <option value="11">11</option>
                        <option value="13">13</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="row"><label for="">Dual SIM: </label>
                    <select id="SIM" name="SIM">
                        <option value=""selected disabled></option>
                        <option value="Da">Da</option>
                        <option value="Ne">Ne</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="row"><label for="">Ekran: </label>
                    <select id="Ekran" name="Ekran">
                        <option value=""selected disabled></option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="5.5">5.5</option>
                        <option value="6">6</option>
                        <option value="6.5">6.5</option>
                    </select>
                </div>
                <div class="row"><label for="">Procesor: </label>
                    <select id="Procesor" name="Procesor">
                        <option value=""selected disabled></option>
                        <option value="Single Core">Single Core</option>
                        <option value="Dual core">Dual core</option>
                        <option value="Quadra core">Quadra core</option>
                    </select>
                </div>
            </div>
            <button class="submit">Trazi</button>
        </div>
        <hr>
        <div class="results">
            <div class="resultName"><p>Karakteristike</p><p>Cena</p></div>
            <div class="resultMain">
                <div class="resultImg"><img src="./images/" alt="" class="resulImgImg"></div>
                <div class="resultDesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempora sint quae a reprehenderit explicabo officiis perferendis. Consequuntur quidem quod corporis, fugiat tempore, aut exercitationem quas nisi numquam recusandae asperiores.</div>
                <div class="resultPrice">11.490,00</div>
            </div>
        </div>
    </main>
    <?php 
        require "./components/footer.php"
    ?>
    <script src="./js/main.js"></script>
</body>
</html>