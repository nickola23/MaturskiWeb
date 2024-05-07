<!DOCTYPE html>
<html>
    <head>
        <title>Rezervacija autobuskih karata</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <?php
            $greska="";
            if(isset($_POST["submit"]))
            {
                $i=0;
                if(!empty($_POST["br"]))
                {
                    $i++;
                    $broj=$_POST["br"];
                }
                if(!empty($_POST["ime"]))
                $i++;
                if(!empty($_POST["mail"]))
                $i++;
                if($i=3)
                {
                    $greska="";
                    $greska="";
                    include 'baze/konekcija.php';
                    $sql = "INSERT INTO broj_sedista (broj_sedista,rezervacija)
                        VALUES ('$broj',1)";
                    if ($conn->query($sql) === TRUE) {
                    // echo "<script>alert('Uspešna rezervacija')</script>";
                    } else {
                    echo "Greška: " . $sql . "<br>" . $conn->error;
                    }
                }
                else
                $greska="Greška!";
            }
        ?>
        <div class="topnav fixed-top">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="active" href="#">Početna</a>
                </li>
                <li class="nav-item">
                    <a href="pages/autor.html">O autoru</a>
                </li>
                <li class="nav-item">
                    <a href="pages/uputstvo.html">Uputstvo</a>
                </li>
            </ul>
        </div>
        
        <div id="sekcija">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center"><h1>Rezervacija autobuskih karata</h1></div>
                    <div class="col-sm-6 text-center">
                        <li class="primer sediste slobodno paragraf">slobodna sedišta</li>
                    </div>
                    <div class="col-sm-6 text-center">
                        <li class="primer sediste zauzeto paragraf">zauzeta sedišta</li>
                    </div>
                    <div class="col-sm-12" id="okvir">
                        <div class="row redovi">
                            <div class="col-sm-3 text-center" onclick="Rezervisi(1)"><p class="sediste slobodno">sedište broj: 1</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(2)"><p class="sediste slobodno">sedište broj: 2</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(3)"><p class="sediste zauzeto">sedište broj: 3</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(4)"><p class="sediste slobodno">sedište broj: 4</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(5)"><p class="sediste slobodno">sedište broj: 5</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(6)"><p class="sediste slobodno">sedište broj: 6</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(7)"><p class="sediste slobodno">sedište broj: 7</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(8)"><p class="sediste slobodno">sedište broj: 8</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(9)"><p class="sediste zauzeto">sedište broj: 9</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(10)"><p class="sediste zauzeto">sedište broj: 10</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(11)"><p class="sediste slobodno">sedište broj: 11</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(12)"><p class="sediste slobodno">sedište broj: 12</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(13)"><p class="sediste slobodno">sedište broj: 13</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(14)"><p class="sediste slobodno">sedište broj: 14</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(15)"><p class="sediste slobodno">sedište broj: 15</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(16)"><p class="sediste slobodno">sedište broj: 16</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(17)"><p class="sediste zauzeto">sedište broj: 17</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(18)"><p class="sediste slobodno">sedište broj: 18</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(19)"><p class="sediste zauzeto">sedište broj: 19</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(20)"><p class="sediste zauzeto">sedište broj: 20</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(21)"><p class="sediste zauzeto">sedište broj: 21</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(22)"><p class="sediste slobodno">sedište broj: 22</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(23)"><p class="sediste slobodno">sedište broj: 23</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(24)"><p class="sediste slobodno">sedište broj: 24</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(25)"><p class="sediste slobodno">sedište broj: 25</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(26)"><p class="sediste slobodno">sedište broj: 26</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(27)"><p class="sediste slobodno">sedište broj: 27</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(28)"><p class="sediste slobodno">sedište broj: 28</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(29)"><p class="sediste zauzeto">sedište broj: 29</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(30)"><p class="sediste zauzeto">sedište broj: 30</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(31)"><p class="sediste slobodno">sedište broj: 31</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(32)"><p class="sediste zauzeto">sedište broj: 32</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(33)"><p class="sediste slobodno">sedište broj: 33</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(34)"><p class="sediste slobodno">sedište broj: 34</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(35)"><p class="sediste slobodno">sedište broj: 35</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(36)"><p class="sediste slobodno">sedište broj: 36</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(37)"><p class="sediste slobodno">sedište broj: 37</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(38)"><p class="sediste slobodno">sedište broj: 38</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(39)"><p class="sediste slobodno">sedište broj: 39</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(40)"><p class="sediste slobodno">sedište broj: 40</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(41)"><p class="sediste zauzeto">sedište broj: 41</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(42)"><p class="sediste zauzeto">sedište broj: 42</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(43)"><p class="sediste slobodno">sedište broj: 43</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(44)"><p class="sediste slobodno">sedište broj: 44</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(45)"><p class="sediste slobodno">sedište broj: 45</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(46)"><p class="sediste slobodno">sedište broj: 46</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(47)"><p class="sediste zauzeto">sedište broj: 47</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(48)"><p class="sediste slobodno">sedište broj: 48</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(49)"><p class="sediste zauzeto">sedište broj: 49</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(50)"><p class="sediste slobodno">sedište broj: 50</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(51)"><p class="sediste slobodno">sedište broj: 51</p></div>
                            <div class="col-sm-3 text-center" onclick="Rezervisi(52)"><p class="sediste zauzeto">sedište broj: 52</p></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="br" class="paragraf">Broj sedišta: </label><br>
                                <input type="number" id="br" name="br" placeholder="Izaberite broj sedišta">

                            </div>
                            
                            <div class="form-group">
                                <label for="ime" class="paragraf">Ime i prezime: </label><br>
                                <input type="text" id="ime" name="ime" placeholder="Unesite Vaše ime i prezime"> 
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="mail" class="paragraf">E-mail: </label><br>
                                <input type="text" id="mail" name="mail" placeholder="Unesite Vaš E-mail"> 
                                
                            </div> 

                            <input type="submit" name="submit" value="Rezerviši" class="dugme" id="dugme" onclick="Zauzmi()">
                            <span class="greska"><?php echo $greska;?></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
			<div class="footer1">
				© Autobuska stanica
			</div>
                 
        <script src="js/custom.js"></script>
    
    </body>	
</html>