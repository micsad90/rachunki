<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Panel rachunków</title>
</head>
<body>
    
    <div id="container">
        <div id="nav">
            <h1>Panel rachunków</h1>
        </div>
        <div id="menu">
            Menu<br>
            <a href="sprawdz_rachunek.php"><div class="podmenu">
                1.sprawdź rachunek<br>
            </div></a>
            <a href="wpisz_liczniki.php"><div class="podmenu">
                2.wpisz liczniki<br>
            </div></a>
            <a href="zmien_wys_skladek.php"><div class="podmenu">
                3.zmień wyskość składek<br>
            </div></a>
            <a href="wystaw_rachunek.php"><div class="podmenu">
                4.wystaw rachunek
            </div></a>
        </div>
        <div id="content">
            
            <?php

                require_once "connect.php";
                $connect = mysqli_connect ("$host","$user","$pass","$db");

                $raport = "SELECT * FROM rachunki";

                if ($result=mysqli_query($connect,$raport))
                {
 
                    $rowcount=mysqli_num_rows($result);
                }    
                $i = 0;
                while ($i<$rowcount)
                    {
                        $i++;
                        $row =mysqli_fetch_row($result);
                        echo "<br>";
                        echo $row[1]."/".$row[2]." | Czynsz: ".$row[3]." zł | Garaż: ".$row[4]." zł | Śmieci: ".$row[5]."  zł| Energia: ".$row[6]." zł |Zimna woda : ".$row[7]."  zł| Ciepła woda: ".$row[8]."  zł| Ogrzewanie: ".$row[9]."  zł| SUMA: ".$row[10]." zł<br><hr><br>";
                    }
                    

            

                
                mysqli_close($connect);
            ?>

        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>