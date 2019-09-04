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
            <div id="wew_content">
                
                <?php
                $mieszkanie = @$_POST[mieszkanie_czynsz];
                $garaz = @$_POST[garaz_czynsz];
                $smieci = @$_POST[smieci];
                if((empty($mieszkanie)) || (empty($garaz)) || (empty($smieci)))
                {
                    echo "wszystkie pola muszą być uzupełnione!!!";
                }
                else 
                {
                    
                    require_once "connect.php";
                    $connect = mysqli_connect ("$host","$user","$pass","$db");

                    $zmiana_ceny_czynszu = "UPDATE czynsz SET mieszkanie='$mieszkanie', garaz='$garaz', smieci='$smieci' WHERE id_czynszu=1";

                    mysqli_query ($connect,$zmiana_ceny_czynszu);
                    mysqli_close($connect);
                }
                ?>
                Pomyślnie zmieniłeś skladki czynszu 

            </div>
        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>