<?php
include('./php/read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefonski imenik</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Zadatak 6</a></li>
            <li><a id="mica" href="index.php">Telefonski imenik</a></li>
        </ul>
    </nav>
    <h3>Parametri za pretragu</h3>
    <form method="get" action="index.php">
        <div>
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime">
        </div>
        <div>
            <label for="adresa">Adresa:</label>
            <input type="text" id="adresa" name="adresa">
        </div>
        <div>
            <label for="telefon">Telefon:</label>
            <input type="text" id="telefon" name="telefon">
        </div>
        <div>
            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime">
        </div>
        <div>
            <label for="mesto">Mesto:</label>
            <select id="mesto" name="mesto">
                <option value="">Mesta</option>
                <?php
                // Collect unique mesta
                $mesta = array_unique(array_column($rows, 4));
                foreach ($mesta as $mesto): ?>
                    <option value="<?php echo htmlspecialchars($mesto); ?>"><?php echo htmlspecialchars($mesto); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <button type="submit">Traži</button>
    </form>
    <hr>
    <table>
        <thead>
            <tr>
                <?php foreach ($headers as $header): ?>
                    <th><?php echo htmlspecialchars($header); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?php echo htmlspecialchars($cell); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?php echo count($headers); ?>">No results found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <footer>
        <div class="school-name">
            Elektro Saobracajna tehnicka skola "Nikola Tesla"
        </div>
        <div class="links">
            <a href="./pages/vazni.php">Vazni telefoni</a>
            <a href="./pages/uputstvo.php">Uputstvo</a>
            <a href="./pages/autor.php">O autoru</a>
        </div>
    </footer>
</body>
</html>
