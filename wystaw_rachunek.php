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

                wybierz za ktory miesiąc chcesz wystawić rachunek:<br>
                <form action="form_wystaw_rachunek.php" method="post">
                    miesiąc: <select name="miesiac">
                                <option>Styczen</option>
                                <option>Luty</option>
                                <option>Marzec</option>
                                <option>Kwiecien</option>
                                <option>Maj</option>
                                <option>Czerwiec</option>
                                <option>Lipiec</option>
                                <option>Sierpien</option>
                                <option>Wrzesien</option>
                                <option>Pazdziernik</option>
                                <option>Listopad</option>
                                <option>Grudzien</option>
                            </select><br><br>
                    rok: <select name="rok">
		                    <option>2019</option>
		                    <option>2020</option>
                        </select><br><br>
                    <input type="submit" value="generuj rachunek" />
                </form>
            </div>
        </div>
        <div id="footer">rachuneczki rachuneczki &copy Michał Sadło</div>
    </div>
</body>
</html>