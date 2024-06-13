<?php
$file_path = "./Prilog/vebprodavnica.txt"; 
function populate_product_table($file_path) {
    echo "<table border='1'>";
    echo "<tr><th>Slika</th><th>Karakteristike</th><th>Cena</th></tr>";

    if (file_exists($file_path)) {
        $lines = file($file_path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            // Izdvajamo karakteristike iz linije teksta
            $characteristics = trim(substr($line, 0, 90));
            // Izdvajamo cenu iz linije teksta
            $price = trim(substr($line, 119, 10));
            $proizvodjac=trim(substr($line,51,4));
            $RAM=trim(substr($line,31,19));
            $procesor=trim(substr($line,56,14));
            $ekran=trim(substr($line,81,9));
            $kamera=trim(substr($line,71,9));
            $dual=trim(substr($line,130,3));
            // Izdvajamo putanju do slike iz opsega karaktera 91-120
            $image = trim(substr($line, 90, 30));
            $image = str_replace(' ', '', $image); // Uklanjamo praznine iz putanje slike

            echo "<tr>";
            // Dodajemo komentar sa putanjom do slike
            echo "<!-- Putanja do slike: $image -->";
            echo "<td><img src='$image' alt='Slika proizvoda' style='width: 100px; height: auto;'></td>";
            echo "<td><br>Proizvodjac: $proizvodjac<br>RAM: $RAM<br>Procesor: $procesor<br>Ekran: $ekran<br>Kamera: $kamera<br>Dual SIM: $dual<br></td>";
            echo "<td>$price.RSD</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
}

// Funkcija koja čita datoteku, broji redove, razmake i bele praznine, i popunjava dropdown meni
function populate_dropdown($file_path, $start_index, $attribute_width) {
    $options = [];
    $line_count = 0;
    $space_count = 0;
    $whitespace_count = 0;

    if (file_exists($file_path)) {
        $lines = file($file_path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $line_count++; // Brojanje redova

            // Brojanje razmaka
            $space_count += substr_count($line, ' ');

            // Brojanje bele praznine (uključujući razmake)
            $whitespace_count += strlen($line) - strlen(trim($line));

            $attribute = trim(substr($line, $start_index, $attribute_width));
            $attribute = str_replace(' ', '', $attribute); // Uklanjamo razmake iz imena karakteristike
            if (!in_array($attribute, $options) && !empty($attribute)) {
                $options[] = $attribute;
                echo "<option value='$attribute'>$attribute</option>";
            }
        }
    }

    echo "<p>Broj redova u datoteci: $line_count</p>";
    echo "<p>Broj razmaka u datoteci: $space_count</p>";
    echo "<p>Broj bele praznine (razmaka i tabova) u datoteci: $whitespace_count</p>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web prodavnica</title>
    <link rel="stylesheet" href="./css/stiling.css">
</head>
<body>
<div class="kontejner">
   
    <nav>
        <ul>
            <li><a href="index.php">Zadatak 8</a></li>
            <li><a id="mica" href="index.php">Veb Prodavnica</a></li>
        </ul>
    </nav>
</div>
<h1>Web prodavnica</h1>
<hr>
Parametri za pretarzgu:<br>

    <form id="search-form">
        <label for="manufacturer">Proizvođač:</label>
        <select id="manufacturer" name="manufacturer">
            <option value="">Izaberite proizvođača</option>
            <?php populate_dropdown($file_path, 31, 19); ?>
        </select>
        <label for="camera">Kamera:</label>
        <select id="camera" name="camera">
            <option value="">Izaberite kameru</option>
            <?php populate_dropdown($file_path, 71, 9); ?>
        </select>
        <label for="screen">Ekran:</label>
        <select id="screen" name="screen">
            <option value="">Izaberite ekran</option>
            <?php populate_dropdown($file_path, 81, 9); ?>
        </select><br>
        <label for="ram">RAM memorija:</label>
        <select id="ram" name="ram">
            <option value="">Izaberite RAM memoriju</option>
            <?php populate_dropdown($file_path, 51, 4); ?>
        </select>
        <label for="sim">DUAL SIM:</label>
        <select id="sim" name="sim">
            <option value="">Izaberite SIM</option>
            <?php populate_dropdown($file_path, 130, 3); ?>
        </select>
        <label for="processor">Procesor:</label>
        <select id="processor" name="processor">
            <option value="">Izaberite procesor</option>
            <?php populate_dropdown($file_path, 56, 14); ?>
        </select>
        <button type="button" id="search-button">Traži</button>
    </form>
    <hr>
    <div id="results">
        <?php populate_product_table($file_path); ?>
    </div>

    <a href="instructions.html">Korisničko uputstvo</a>
    
    <div class="dole">
    <p class="elektro">Elektro saobracajna skola Nikola Tesla Nis<p>
  <a href="index.php" class="active">Program</a>
  <a href="./html/o autoru.html">O autoru</a>
  <a href="./html/uputstvo.html">Korisnicko uputstvo</a>
</div>
    <script src="./js/script.js">


    </script>
</body>
</html>
