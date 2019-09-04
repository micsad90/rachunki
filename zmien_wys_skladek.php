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
                require_once "connect.php";
                $connect = mysqli_connect ("$host","$user","$pass","$db") or die ("błąd połączenia!");

                $czynsz = "SELECT * FROM czynsz";

                $pobranie_danych = mysqli_query($connect,$czynsz);

                if($row=mysqli_fetch_assoc($pobranie_danych))
                {
                    $mieszkanie = @$row[mieszkanie];
                    $garaz = @$row[garaz];
                    $smieci = @$row[smieci];
                }
                else 
                {
                    echo "coś nie poszło";
                }
               echo "Czynsz za mieszkanie wynosi: $mieszkanie zł<br>";
                echo "Czynsz za garaż wynosi: $garaz zł<br>";
                echo "Koszt odpadów wynosi: $smieci zł<br><br>"; 
              ?>  
                <form action="form_zmien_wys_skladek.php" method="post">
                    <input type='submit' value='zmień' />
                </form>
            </div>
        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>