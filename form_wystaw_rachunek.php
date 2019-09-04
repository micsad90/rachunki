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
                    $connect = mysqli_connect("$host","$user","$pass","$db") or die ("błąd połączenia!");

                    $miesiac = @$_POST[miesiac];
                    $rok = @$_POST[rok];

                    $sprawdzenie = "SELECT * FROM stany_licznikow WHERE miesiac='$miesiac' AND rok='$rok'";

                    $pobranie_danych = mysqli_query($connect,$sprawdzenie);
                    if($row=mysqli_fetch_assoc($pobranie_danych))
                    {
                        $id = @$row[id_stanow_licznikow];
                        $energia = @$row[energia];
                        $zimna_woda = @$row[zimna_woda];
                        $ciepla_woda = @$row[ciepla_woda];
                        $ogrzewanie = @$row[ogrzewanie];
                    }
                    else
                    {
                        echo "coś nie gra!";
                    }

                    $liczniki_poprzedni_miesiac = $id-1;

                    $pobranie_poprzednich_licznikow = "SELECT * FROM stany_licznikow WHERE id_stanow_licznikow='$liczniki_poprzedni_miesiac'";

                    $pobranie_danych2 = mysqli_query($connect,$pobranie_poprzednich_licznikow);
                    if($row=mysqli_fetch_assoc($pobranie_danych2))
                    {
                        $id2 = @$row[id_stanow_licznikow];
                        $energia2 = @$row[energia];
                        $zimna_woda2 = @$row[zimna_woda];
                        $ciepla_woda2 = @$row[ciepla_woda];
                        $ogrzewanie2 = @$row[ogrzewanie];
                    }
                    else
                    {
                        echo "coś nie gra!";
                    }

                    $zuzycie_energii = $energia-$energia2;
                    $zuzycie_zimnej_wody = $zimna_woda-$zimna_woda2;
                    $zuzycie_cieplej_wody = $ciepla_woda-$ciepla_woda2;
                    $zuzycie_ogrzewania = $ogrzewanie-$ogrzewanie2;

                    $ceny_licznikow = "SELECT * FROM koszty_licznikow";

                    $pobranie_ceny_licznikow = mysqli_query($connect,$ceny_licznikow);
                    if($row=mysqli_fetch_assoc($pobranie_ceny_licznikow))
                    {
                        $cena_energii = @$row[energia];
                        $cena_zimnej_wody = @$row[zimna_woda];
                        $cena_cieplej_wody = @$row[ciepla_woda];
                        $cena_ogrzewania = @$row[ogrzewanie];
                    }
                    else
                    {
                        echo "coś nie gra!";
                    }

                    $koszt_zuzycia_energii = $zuzycie_energii*$cena_energii;
                    $koszt_zuzycia_zimnej_wody = $zuzycie_zimnej_wody*$cena_zimnej_wody;
                    $koszt_cieplej_wody = $zuzycie_cieplej_wody*$cena_cieplej_wody;
                    $koszt_ogrzewania = $zuzycie_ogrzewania*$cena_ogrzewania;

                    $czynsz = "SELECT * FROM czynsz";

                    $pobranie_czynszu = mysqli_query($connect,$czynsz);
                    if($row=mysqli_fetch_assoc($pobranie_czynszu))
                    {
                        $mieszkanie = @$row[mieszkanie];
                        $garaz = @$row[garaz];
                        $smieci = @$row[smieci];

                    }
                    else
                    {
                        echo "coś nie gra!";
                    }
                    $rachunek = $mieszkanie+$garaz+$smieci+$koszt_zuzycia_energii+$koszt_zuzycia_zimnej_wody+$koszt_cieplej_wody+$koszt_ogrzewania;
                    
                    echo "Czynsz za mieszkanie: $mieszkanie zł<br>";
                    echo "Czynsz za garaż: $garaz zł<br>";
                    echo "koszt odpadów: $smieci zł<br>"; 
                    echo "Koszt zużycia energii: $koszt_zuzycia_energii zł<br>";
                    echo "Koszt zużycia zimnej wody: $koszt_zuzycia_zimnej_wody zł<br>";
                    echo "Koszt zużycia ciepłej wody: $koszt_cieplej_wody zł<br>";
                    echo "Koszt zużycia ogrzewania: $koszt_ogrzewania zł<br>";
                    echo "<hr>";
                    echo "Całkowity koszt wynosi: $rachunek zł";

                    $dodanie_rachunku = "INSERT INTO rachunki VALUES(NULL,'$miesiac','$rok','$mieszkanie','$garaz','$smieci','$koszt_zuzycia_energii','$koszt_zuzycia_zimnej_wody','$koszt_cieplej_wody','$koszt_ogrzewania','$rachunek')";
                    mysqli_query($connect,$dodanie_rachunku);

                ?>
            </div>
        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>