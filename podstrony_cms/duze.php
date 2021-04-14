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
    <link rel="stylesheet" href="../CSS/styleCms.min.css" />
    <link rel="stylesheet" href="../CSS/lightbox.min.css">
    <script src='../JS/lightbox-plus-jquery.min.js'></script>
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
                            <li><a href="loggedin.php" class='menu-underline'>Aktualności</a></li>
                            <li><a href="schody.php" class='menu-underline'>Schody</a></li>
                            <li><a href="balustrady.php" class='menu-underline'>Balustrady</a></li>
                            <li><a href="daszki.php" class='menu-underline'>Daszki i zabudowy</a></li>
                            <li><a href="porecze.php" class='menu-underline'>Poręcze</a></li>
                            <li><a href="ogrodzenia.php" class='menu-underline'>Ogrodzenia</a></li>
                            <li><a href="inne.php" class='menu-underline'>Inne</a></li>
                            <li><a href="duze.php" class='menu-active'>Duże inwestycje</a></li>
                        </ul>
                    </nav>
                    <label for="nav-toggle" class="nav-toggle-label">
                        <img src="../ASSETS/hamburger.png" alt="" class='hamburger'>
                    </label>
                </div>
            </header>
    </div>  
    <section id='galleryCon'>
        <div class='gallery_top'>
            Podmień całą galerię
            <p class='only'>Wyłącznie 15 zdjęć na raz</p>
            <?php
                if(isset($_SESSION['wrongAmount']))
                {
                    echo "<p class='only' style='color: red;'>".$_SESSION['wrongAmount']."</p>";
                    unset($_SESSION['wrongAmount']);
                }
            ?>
            <form action="../include/galeria/updateWholeImg.php" method='POST' enctype='multipart/form-data'>
                <label for="flg" class='opacity'>Przeglądaj</label>
                <input type='file' name='galeria[]' style='display: none;' id='flg' multiple>
                <input type='text' name='kategoria' value='duze.php' hidden>
                <input type='text' name='tabela' value='duze' hidden>
                <button type='submit' class='opacity btn_tp' name='submitWhole'>Wykonaj</button>
            </form>
            <span>Obsługiwane formaty: .png, .jpg, .svg</span>
            <hr>
            <p class="modyfikuj">Modyfikuj pojedynczo</p>
        </div>
        <?php
        include_once "../include/connection.php";
       

        $sql = "SELECT * from duze";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: duze.php?error=mysqlError");
        } else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            
            for($i = 0; $i<15; $i++) {
                $z = $i+1;
                $sql2 = "SELECT * FROM duze WHERE id='$z';";
                $stmt2 = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt2, $sql2)){
                mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);
                $rowCount2 = mysqli_num_rows($result2);
                $row2 = mysqli_fetch_assoc($result2);
                
                if($rowCount2 < 1 ){
                    echo "
                <div class='img".($i+1)." galeria__img__con'>
                    <div class='img_con' style='display: flex; align-items: center; justify-content: center; font-family: Oswald, sans-serif;'>
                       Dodaj zdjęcie
                    <div class='numerZdjecia'>".($i+1)."</div>
                    </div>
                    <div class='img_form'>
                        <form action='../include/galeria/updateImg.php' method='POST' id='upload' enctype='multipart/form-data'>
                            <input type='text' name='id' value='".($i+1)."' hidden>
                            <input type='text' name='kategoria' value='duze' hidden>
                            <input type='text' name='strona' value='duze.php' hidden>
                            <label for='file".$i."' class='opacity label'>Zamień</label>
                            <input type='file' name='file' id='file".$i."' hidden>
                            <button type='submit' class='update_img opacity' name='submit'>
                                Wykonaj
                            </button>
                        </form>
                        <form action='../include/galeria/deleteimg.php' method='POST'>
                        <input type='text' name='delete_img' value='".($i+1)."' hidden>
                        <input type='text' name='strona' value='duze.php' hidden>
                        <input type='text' name='kategoria' value='duze' hidden>
                        <button type='submit' class='delete_img' name='delete'>
                            Usuń 
                        </button>
                    </div>
                </form>
                </div>";
                } else{
                
                echo "
                <div class='img".($i+1)." galeria__img__con'>
                    <div class='img_con'>
                        <a href='../include/galeria/img/".$row2['nazwa']."' data-lightbox='mygallery' data-title='Zdjęcie NR".($i+1)."'>
                            <img src='../include/galeria/img/".$row2['nazwa']."'>
                        </a>
                        <div class='numerZdjecia'>".($i+1)."</div>
                    </div>
                    <div class='img_form'>
                        <form action='../include/galeria/updateImg.php' method='POST' id='upload' enctype='multipart/form-data'>
                            <input type='text' name='id' value='".($i+1)."' hidden>
                            <input type='text' name='kategoria' value='duze' hidden>
                            <input type='text' name='strona' value='duze.php' hidden>
                            <label for='file".$i."' class='opacity label'>Zamień</label>
                            <input type='file' name='file' id='file".$i."' hidden>
                            <button type='submit' class='update_img opacity' name='submit'>
                                Wykonaj
                            </button>
                        </form>
                        <form action='../include/galeria/deleteimg.php' method='POST'>
                        <input type='text' name='kategoria' value='duze' hidden>
                        <input type='text' name='strona' value='duze.php' hidden>
                        <input type='text' name='delete_img' value='".($i+1)."' hidden>
                        <button type='submit' class='delete_img' name='delete'>
                            Usuń
                        </button>
                    </div>
                </form>
                </div>";
                }
            }
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
