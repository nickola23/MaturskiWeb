<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CD Katalog</title>
</head>
<body>
    <h1>CD Katalog</h1>
    <ul >
        <li><a href="#">Katalog</a></li>
        <li><a href="pages/korisnickoUputstvo.html">Korisničko uputstvo</a></li>
    </ul>
    <div class="sadrzaj">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <label class="siva" for="izvodjac">Izvodjač:</label><br>
                    <label class="siva" for="naziv">Naziv albuma:</label><br>
                    <label class="siva" for="zanr">Žanr:</label>
                    <label class="siva" for="godina">Godina izdanja:</label>
                    <label class="siva" for="kuca">Izdavačka kuća:</label>
                </div>
                <div class="col-sm-8">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                        <input type="text" name="izvodjac"/><br>
                        <input type="email" name="naziv"/><br>
                        <select name="zanr" class="form-select">
                            <option value = "Zanr">Zanr</option>
                                <!--Popuniti iz tekst fajla-->
                            <!-- <?php
                                for ($i = 0; $i < count($zanr1); $i++) 
                                {
                                ?>
                                <option value = "<?php echo $zanr1[$i]; ?>"><?php echo $zanr1[$i];?></option>
                            <?php
                                
                                }
                            ?> -->
                        </select>
                        <select name="godina" class="form-select">
                        <option value="Godina">Godina</option>
                        <?php
                            for ($i = 0; $i < count($godina1); $i++) 
                            {
                        ?>
                            <option value = "<?php echo $godina1[$i]; ?>"><?php echo $godina1[$i];?></option>
                        <?php
                        
                            }
                        ?>
                        </select>
                        <input type="email" name="kuca"/><br>
                        <input type="submit" name="submit" value="Traži">
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>    
        </div>
    </div> 
    <div class="footer">
        <p>© Klub Kolekcionar</p>
    </div>
</body>
</html>