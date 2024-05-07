<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CD katalog</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<?php
    //$file = fopen("Katalog.txt", "r") or die ("Greska");
    $result = array();
    $file = explode("\n", file_get_contents("Katalog.txt"));
    foreach ( $file as $content ) 
    {
        $result[] = array_filter(array_map("trim", explode(" | ", $content)));
    }
    //var_dump($result);
    for ($row = 0; $row < 8; $row++) 
    {
        
        //for ($col = 0; $col < count($result[0]); $col++) 
        for ($col = 0; $col < 6; $col++) 
        {
            
            echo $result[$row][$col]." / ";
        }
        echo "<br>";
        
    }  

?>
<?php
    for ($row = 0; $row < 8; $row++) 
    {
        //for ($col = 0; $col < count($result[0]); $col++) 
        for ($col = 0; $col < 6; $col++) 
        {
            $zanr[$row] = $result[$row][2];
            $godina[$row] = $result[$row][3];
        }
    }
    $zanr1 = array_values(array_unique($zanr));
    $godina1 = array_values(array_unique($godina));
?>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">CD katalog</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Početna</a></li>
                <li class="nav-item"><a href="uputstvo.php" class="nav-link">Uputstvo</a></li>
            </ul>
        </header>
        <div class="form">
            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                    <label class="form-label">Izvodjac</label>
                    <input type="text" class="form-control" name="izvodjac" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Naziv albuma</label>
                    <input type="text" class="form-control" name="album">
                </div>
                <div class="mb-3">
                    <label class="form-label">Zanr</label>
                    <select name="zanr" class="form-select">
                    <option value = "Zanr">Zanr</option>
                <!--Popuniti iz tekst fajla-->
                    <?php
                        for ($i = 0; $i < count($zanr1); $i++) 
                        {
                        ?>
                        <option value = "<?php echo $zanr1[$i]; ?>"><?php echo $zanr1[$i];?></option>
                    <?php
                        
                        }
                    ?>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label class="form-label">Godina izdanja</label>
                    <select name="godina" class="form-select">
                    <option value = "Godina">Godina</option>
                    <?php
                        for ($i = 0; $i < count($godina1); $i++) 
                        {
                    ?>
                        <option value = "<?php echo $godina1[$i]; ?>"><?php echo $godina1[$i];?></option>
                    <?php
                    
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Izdavacka kuca</label>
                    <input type="text" class="form-control" name="izdavac">
                </div>
                <button type="submit" class="btn btn-primary">Trazi</button>
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th>Izvodjac</th>
                    <th>Naziv albuma</th>
                    <th>Zanr</th>
                    <th>Godina izdavanja</th>
                    <th>Izdavacka kuca</th>
                    <th>Slika omota</th>
                </tr>
                
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if (isset( $_POST['izvodjac'] ) &&  strlen( $_POST['izvodjac'] ))
                    {
                        $izvodjac = $_POST['izvodjac'];
                    }
                    else
                    {
                        $izvodjac = " ";
                    }
                    if (isset( $_POST['album'] ) &&  strlen( $_POST['album'] ))
                    {
                        $album = $_POST['album'];
                    }
                    else
                    {
                        $album = " ";
                    }
                    $zanr = $_POST['zanr'];
                    $godina = $_POST['godina'];
                    if (isset($_POST['izdavac'] ) &&  strlen( $_POST['izdavac'] ))
                    {
                        $izdavac = $_POST['izdavac'];
                    }
                    else
                    {
                        $izdavac = " ";
                    }
                
                    for ($row = 0; $row < 8; $row++) 
                    {
                        echo "<tr>";
                        //for ($col = 0; $col < count($result[0]); $col++) 
                        for ($col = 0; $col < 6; $col++) 
                        {
                            //podeliti na vise if-ova
                            if (strpos($result[$row][0]." ", $izvodjac) !== false && strpos($result[$row][1]." ", $album) !== false && strpos($result[$row][4]." ", $izdavac) !== false) 
                            {
                                if((strcmp($result[$row][2], $zanr) == 0 && strcmp($result[$row][3], $godina) == 0))
                                {
                                    if($col == 5)
                                    {
                                        //echo "<td>".$result[$row][$col]."</td>";
                                        echo "<td><img src='" .$result[$row][5]. "' alt='img' width = '100px' height = '100px'></td>";
                                    }
                                    else
                                    {
                                        echo "<td>".$result[$row][$col]."</td>";
                                        //echo $result[$row][$col]." ";
                                    }
                                }
                                else if($zanr == "Zanr" && $godina == "Godina")
                                {
                                    if($col == 5)
                                    {
                                        //echo "<td>".$result[$row][$col]."</td>";
                                        echo "<td><img src='" .$result[$row][5]. "' alt='img' width = '100px' height = '100px'></td>";
                                    }
                                    else
                                    {
                                        echo "<td>".$result[$row][$col]."</td>";
                                        //echo $result[$row][$col]." ";
                                    }
                                }
                                else if($zanr == "Zanr" || $godina == "Godina")
                                {
                                    if((strcmp($result[$row][2], $zanr) == 0))
                                    {
                                        if($col == 5)
                                        {
                                            //echo "<td>".$result[$row][$col]."</td>";
                                            echo "<td><img src='" .$result[$row][5]. "' alt='img' width = '100px' height = '100px'></td>";
                                        }
                                        else
                                        {
                                            echo "<td>".$result[$row][$col]."</td>";
                                            //echo $result[$row][$col]." ";
                                        }
                                    }
                                    if((strcmp($result[$row][3], $godina) == 0))
                                    {
                                        if($col == 5)
                                        {
                                            //echo "<td>".$result[$row][$col]."</td>";
                                            echo "<td><img src='" .$result[$row][5]. "' alt='img' width = '100px' height = '100px'></td>";
                                        }
                                        else
                                        {
                                            echo "<td>".$result[$row][$col]."</td>";
                                            //echo $result[$row][$col]." ";
                                        }
                                    }
                                }
                                
                            }
                            
                            
                        }
                        echo "</tr>";
                    }  
                }
                
            ?>
            </table>
        </div>
    </div>
</body>
</html>