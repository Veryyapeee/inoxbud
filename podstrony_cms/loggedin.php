<?php

    session_start();

    if($_SESSION['User'] == false){
        header("Location: ../index.php");
    }
    

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="theme-color" content="#3D9CEA">
    <link rel="icon" type="image/png" sizes="32x32" href="../ASSETS/favicon.png">
    <link rel="stylesheet" href="../CSS/styleAktualnosci.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.0.js"></script>
    <title>INOXBUD</title>
    
</head>
<body>
    
  
       <div class='sticky'>
            <section class="news">
                
            </section>
            <header>
                <div id='navbar'>
                    <img src="../ASSETS/inoxbud-logo.svg" alt="" class='logo'>
                    <input type="checkbox" id="nav-toggle" class="nav-toggle">
                   <nav>
                        <ul>
                            <li><a href="loggedin.php" class='menu-active'>Aktualności</a></li>
                            <li><a href="schody.php" class='menu-underline'>Schody</a></li>
                            <li><a href="balustrady.php" class='menu-underline'>Balustrady</a></li>
                            <li><a href="daszki.php" class='menu-underline'>Daszki i zabudowy</a></li>
                            <li><a href="porecze.php" class='menu-underline'>Poręcze</a></li>
                            <li><a href="ogrodzenia.php" class='menu-underline'>Ogrodzenia</a></li>
                            <li><a href="inne.php" class='menu-underline'>Inne</a></li>
                            <li><a href="duze.php" class='menu-underline'>Duże inwestycje</a></li>
                        </ul>
                    </nav>
                    <label for="nav-toggle" class="nav-toggle-label">
                        <img src="../ASSETS/hamburger.png" alt="" class='hamburger'>
                    </label>
                </div>
            </header>
    </div>  
    <section id='akt_con'>

            <span >
                Dodaj aktualność
            </span>
            <?php

                if(isset($_SESSION['emptyAkt']))
                {
                    echo "<p class='emptyAkt'>".$_SESSION['emptyAkt']."</p>";
                    unset($_SESSION['emptyAkt']);
                }

            ?>
            
            <div class="input">
                <form action="../include/addAktualnosc.php" method='POST'>
                    <input type="text" class='addInput' name='addAktualnosc' placeholder='Twoja aktualność'>
                    <button type='submit' name='addSubmit' class='buttonSubmit'>
                        <img src="../ASSETS/add.svg" alt=""> 
                    </button>
                    <hr style='visibility: hidden;'>
                </form>
            </div>

            <span class='span2'>
                Zarządzaj działającymi
            </span>
            
            <?php
                include_once "../include/connection.php";
                $sql = "SELECT * FROM aktualnosci";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: loggedin.php?error=mysqlError");
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo
                        "<div class='input'>
                            <form action='../include/removeAktualnosc.php' method='POST'>
                            <input type='text' class='addInput' name='addAktualnosc' value='".$row['tresc']."' disabled>
                            <input type='text' hidden value='".$row['id']."' name='id' >
                                <button type='submit' name='removeSubmit' class='buttonSubmit2'>
                                    <img src='../ASSETS/delete.svg' alt=''>
                                </button>
                                <hr style='visibility: hidden'>
                            </form>
                        </div>"; 
                    
                    }
                }

            ?>
            

    </section>
    <div class='wyloguj_con'>
        <form action="../include/logout.min.php" method="post">
            <button type="submit" name="logout-submit" class='logout'>
                Wyloguj
            </button>
        </form>
    </div>

    <footer>
  
    </footer>
<!-- Skrypty -->
<script>
    /* STICKY */
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });
</script>
</body>
</html>






<!-- 
';

-->
