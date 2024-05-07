<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Elektronski recnik</title>
</head>
<body>
    <h1>Elektronski recnik</h1>
    <ul >
        <li><a href="../index.php">Početna</a></li>
        <li><a href="#">Dodavanje novih reči</a></li>
        <li><a href="uputstvo.html">Uputstvo</a></li>
    </ul>
    <div class="sadrzaj">
        <?php
            include '../baze/konekcija.php';
            $greska="";
            if(isset($_POST["submit"]))
            {
                $engleski=$srpski=$opis="";
                $br=0;
                if(!empty($_POST["engleski"]))
                {
                    $engleski=$_POST["engleski"];
                    $br++;
                }
                if(!empty($_POST["srpski"]))
                {
                    $srpski=$_POST["srpski"];
                    $br++;
                }
                if(!empty($_POST["opis"]))
                {
                    $opis=$_POST["opis"];
                    $br++;
                }
                if($br==3)
                {
                    $greska="";
                    $sql = "INSERT INTO reci (engleski,srpski,opis)
                        VALUES ('$engleski','$srpski','$opis')";
                    if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Podaci uspešno uneti')</script>";
                    } else {
                    echo "Greška: " . $sql . "<br>" . $conn->error;
                    }
                }
                else
                $greska="Greška! Pokušaj ponovo.";
            }
            $conn->close();
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <label class="siva" for="engleski">Engleska reč:</label>
            <input type="text" name="engleski"/><br>
            <label class="siva" for="srpski">Srpska reč:</label>
            <input type="text" name="srpski"/><br>
            <label class="siva" for="opis">Opis:</label>
            <textarea id="opis" name="opis" rows="4" cols="25"></textarea><br>
            <input type="submit" name="submit" value="Snimi" class="dugme">
        </form>
        <span class="greska"><?php echo $greska;?></span>
    </div> 
    
    <div class="footer">
        <p>© Osnovna škola "Sonja Marinković"</p>
    </div>
    <script src="js/custom.js"></script>
</body>
</html>