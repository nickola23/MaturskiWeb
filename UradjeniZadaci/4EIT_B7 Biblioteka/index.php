<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Biblioteka</title>
</head>
<body>
    <h1>Biblioteka</h1>
    <ul >
        <li><a href="#">Početna</a></li>
        <li><a href="pages/biblioteka.xml">Pregled</a></li>
        <li><a href="pages/autor.html">O autoru</a></li>
        <li><a href="pages/uputstvo.html">Uputstvo</a></li>
    </ul>
    <div class="sadrzaj">
        <h2 class="siva">Možete se logovati sa sledećim nalozima</h2><br>
        <?php
            include 'baze/konekcija.php';
            // $sql = "SELECT * FROM korisnici";
            // $result = $conn->query($sql);
            // if ($result->num_rows > 0) {
            // // output data of each row
            // while($row = $result->fetch_assoc()) {
            //     echo "Korisničko ime: " . $row["korisnickoIme"]."<br>"."Lozinka: ".$row["lozinka"]."<br>";
            // }
            // } else {
            // echo "0 results";
            // }
            $query = "SELECT * FROM utisak";
            $result = $conn->query($query);
            if ($result->num_rows>0) {
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["korisnickoIme"];
                    $field2name = $row["lozinka"];
                    $korisnik="Korisničko ime: ".$field1name;
                    $lozinka="Lozinka: ".$field2name;
                    echo '<tr> 
                            <td>'.$korisnik.'</td><br>
                            <td>'.$lozinka.'</td><br>
                          </tr>';
                }
                $result->free();
            }
        ?>
        <hr>
        <p class="siva">Unesite parametre za logovanje <span><b>Registruj se</b></span> ako nemate nalog</p>
        <?php
            $greska=$welcome="";
            if(isset($_POST["submit"]))
            {
                $korisnik=$lozinka="";
                $korisnik = $_POST["korisnicko"];
                $lozinka=$_POST["lozinka"];
                $sql = "SELECT * FROM utisak";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["korisnickoIme"]==$korisnik && $row["lozinka"]==$lozinka)
                        {
                            $greska="";
                            $provera=1;
                            break;
                        }
                        else
                        {
                            $provera=0;
                            $greska="Nevažeći podaci";
                        }
                    }
                } else {
                    echo "0 results";
                }
                if($provera==1)
                $welcome="Dobrodošli na stranicu!";
                else if($provera==0)
                $welcome="";

            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <fieldset>
                <legend class="siva">Forma za logovanje</legend>
                <div class="polja">
                    <label class="siva" for="korisnicko">Korisničko ime:</label><br>
                    <input type="text" name="korisnicko" class="unesi"/>
                </div>
                <div class="polja">
                    <label class="siva" for="lozinka">Lozinka:</label><br>
                    <input type="password" name="lozinka" class="unesi"/>
                </div>
                <span class="greska"><?php echo $greska;?></span>
            </fieldset>
            <input type="submit" name="submit" value="Prijava" class="dugme">
        </form>
        <span><?php echo $welcome;?></span>
    </div> 
    
    <div class="footer">
        <p>© Gradska biblioteka</p>
    </div>
</body>
</html>