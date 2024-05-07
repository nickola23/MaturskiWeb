<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Elektronski recnik</title>
</head>
<body>
    <h1>Elektronski recnik</h1>
    <ul >
        <li><a href="#">Početna</a></li>
        <li><a href="pages/dodavanje.php">Dodavanje novih reči</a></li>
        <li><a href="pages/uputstvo.html">Uputstvo</a></li>
    </ul>
    <div class="sadrzaj">
        <?php
            $greska=$prevodEngleski=$prevodSrpski=$srpski=$engleski=$opis="";
            if(isset($_POST["submit"]))
            {
                include 'baze/konekcija.php';
                $br=0;
                $sql='SELECT * FROM reci';
                $result = $conn->query($sql);
                $provera=$_POST["izbor"];
                if($provera==1)
                {
                        $srpski=$_POST["srpski"];
                        while ($row = $result->fetch_assoc()) {
                            if($srpski==$row["Srpski"])
                            {
                                $prevodEngleski=$row["Engleski"];
                                $prevodSrpski=$srpski;
                                $opis=$row["Opis"];
                                $br++;
                            }
                        }
                }
                if($provera==2)
                {
                    $engleski=$_POST["engleski"];
                    while ($row = $result->fetch_assoc()) {
                        if($engleski==$row["Engleski"])
                        {
                            $prevodSrpski=$row["Srpski"];
                            $prevodEngleski=$engleski;
                            $opis=$row["Opis"];
                            $br++;
                        }
                    }
                }
                if($br==0)
                {
                    $greska="Greška!";
                    $prevodEngleski=$prevodSrpski=$srpski=$engleski=$opis="";
                }
                else
                {
                    $greska="";
                }
            }
        ?>

        <form method="post">
            <label class="siva" for="izbor">Smer:</label>
            <select onchange="promeni(value)" name = "izbor" id = "izbor">
                <option value="default">Izaberite smer prevodjenja</option>
                <option value="1">srpski-engleski</option>
                <option value="2">engleski-srpski</option>
            </select><br>
            <label class="siva" for="engleski">Engleska reč:</label>
            <input type="text" id="engleski" name="engleski" value="<?php echo $prevodEngleski;?>"/><br>
            <label class="siva" for="srpski">Srpska reč:</label>
            <input type="text" id="srpski" name="srpski" value="<?php echo $prevodSrpski;?>"/><br>
            <label class="siva" for="opis">Opis:</label>
            <textarea id="opis" name="opis" rows="4" cols="25"><?php echo $opis;?></textarea><br>
            <input type="submit" name="submit" value="Prevedi" class="dugme">
        </form>
        <span class="greska"><?php echo $greska;?></span>
    </div> 
    
    <div class="footer">
        <p>© Osnovna škola "Sonja Marinković"</p>
    </div>
    <script src="js/custom.js"></script>
</body>
</html>