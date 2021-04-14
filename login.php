<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="theme-color" content="#3D9CEA">
    <link rel="icon" type="image/png" sizes="32x32" href="ASSETS/favicon.png">
    <link rel="stylesheet" href="CSS/styleLogin.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.0.js"></script>
    <title>INOXBUD</title>
    
</head>
<body>
    <article>
        <div class="login__window">
            <img src="ASSETS/inoxbud-logo.svg" alt="">
            <span class='log_text'>
                Zaloguj się do systemu
            </span>
            <div class='error_fields'>
                <?php

                    if(isset($_GET['error'])) {
                        if($_GET['error'] == "emptyfields") {
                            echo '<p class="error">Uzupełnij wszystkie pola!</p>';
                        }
                        else if($_GET['error'] == "wrongpassword") {
                            echo '<p class="error">Hasło jest nieprawidłowe!</p>';
                        }
                        else if($_GET['error'] == "nouser") {
                            echo '<p class="error">Użytkownik o takiej nazwie nie istnieje!</p>';
                        }
                        else if($_GET['error'] == "sql") {
                            echo '<p class="error">Nie można połączyć się z bazą danych!!</p>';
                        }
                        
                    }

                ?>
            </div>
            <form action="include/login.min.php" method='POST'>
                <img src="ASSETS/lock.svg" alt="">
                <img src="ASSETS/usr.svg" alt="">
                <input type="text" name='login' placeholder='Twój login' > 
                <input type="password" name='pwd' placeholder='Hasło'> <br><br><br>
                <button type='submit' name='loginSubmit'>Zaloguj</button>
            </form>
        </div>
        <a href='http://inoxbud.pl'>Wróć na stronę główną</a>
    </article>
    <footer>

    </footer>

</body>
</html>