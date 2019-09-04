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
                    $miesiac = $_POST["miesiac"];
                    $rok = $_POST["rok"];
                    $energia = $_POST["energia"];
                    $zimna_woda = $_POST["zimna_woda"];
                    $ciepla_woda = $_POST["ciepla_woda"];
                    $ogrzewanie = $_POST["ogrzewanie"];

                    if(empty($energia))
                    {
                        $energia = 0;
                    }
                    if(empty($zimna_woda))
                    {
                        $zimna_woda = 0;
                    }
                    if(empty($ciepla_woda))
                    {
                        $ciepla_woda = 0;
                    }
                    if(empty($ogrzewanie))
                    {
                        $ogrzewanie = 0;
                    }
                    $dodanie_stanu_licznikow = "INSERT INTO stany_licznikow VALUES (NULL,'$miesiac','$rok','$energia','$zimna_woda','$ciepla_woda','$ogrzewanie')";

                    mysqli_query($connect,$dodanie_stanu_licznikow);

                        echo "Dodano do bazy nowe dane!<br><br>";
                        echo "miesiąc: $miesiac <br>";
                        echo "rok: $rok <br>";
                        echo "energia: $energia <br>";
                        echo "zimna woda: $zimna_woda <br>";
                        echo "ciepła woda: $ciepla_woda <br>";
                        echo "ogrzewanie: $ogrzewanie <br>"; 
                    
                    mysqli_close ($connect);

               ?>
                
            </div>
        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>