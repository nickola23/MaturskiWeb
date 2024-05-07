<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Knjiga utisaka</title>
</head>
<body>
    <h1>Knjiga utisaka</h1>
    <ul >
        <li><a href="#">Početna</a></li>
        <li><a href="pages/autor.html">O autoru</a></li>
        <li><a href="pages/uputstvo.html">Uputstvo</a></li>
    </ul>
    <?php
        include 'baze/konekcija.php';
        $greskaIme=$greskaEmail=$greska="";
        if(isset($_POST["submit"]))
        {
            $ime=$email=$komentar="";
            $br=0;
            if(empty($_POST["ime"]))
            $greskaIme="Morate uneti ime";
            else
            {
                $ime=$_POST["ime"];
                $greskaIme="";
                $br++;
            }
            if(empty($_POST["email"]))
            $greskaEmail="Morate uneti email";
            else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $greskaEmail="Email nije u dobrom formatu";
            }
            else
            {
                $email=$_POST["email"];
                $greskaEmail="";
                $br++;
            }
            if(empty($_POST["komentar"]))
            $greska="Morate uneti komentar";
            else
            {
                $komentar=$_POST["komentar"];
                $greska="";
                $br++;
            }
            if($br==3)
            {
                $sql1 = "INSERT INTO utisak (ime,email,komentar)
                        VALUES ('$ime','$email','$komentar')";
                        if ($conn->query($sql1) === TRUE) {
                        echo "<script>alert('Podaci uspešno uneti')</script>";
                        } else {
                        echo "Greška: " . $sql1 . "<br>" . $conn->error;
                        }
            }
            $conn->close();
        }
    ?>
    <div class="sadrzaj">
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                    <label class="siva" for="ime">Ime:</label><br>
                    <label class="siva" for="email">Email:</label><br>
                    <label class="siva" for="komentar">Komentar:</label>
                </div>
                <div class="col-sm-9">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                        <input type="text" name="ime"/><span class="greska"><?php echo $greskaIme;?><span><br>
                        <input type="email" name="email"/><span class="greska"><?php echo $greskaEmail;?><span><br>
                        <textarea id="opis" name="komentar" rows="4" cols="25"></textarea><span class="greska"><?php echo $greska;?><span><br>
                        <input type="submit" name="submit" value="Dodaj komentar" class="dugme">
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>    
        </div>
    </div> 
    
    <div class="footer">
        <p>© Muzej Srbije</p>
    </div>
</body>
</html>