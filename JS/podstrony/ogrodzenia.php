<!DOCTYPE html>
<html lang="pl">
<head>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145310246-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145310246-1');
</script>
<meta name="keywords" content="INOXBUD,Warszawa,schody,schody z drewna,drewno,balustrady,poręcze,bramy,daszki,ogrodzenia,ul.Tołostoja 1/199,        Tołostoja Warszawa, ul.Warszawska 249, Warszawska Warszawa, drewania schody, Babice Warszawa,schody na wymiar, schody na zamówienie,                balustrady na zamówienie,balustrady na wymiar, poręcze na zamówienie,poręcze na wymiar, bramy na zamówienie,bramy na wymiar, daszki na              zamówienie,daszki na wymiar, ogrodzenia na zamówienie, ogrodzenie na wymiar">
    <meta name="theme-color" content="#3D9CEA">
    <link rel="icon" type="image/png" sizes="32x32" href="../ASSETS/favicon.png">
    <link rel="stylesheet" href="../CSS/styleSchody.css" />
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
                   <?php

                    require "../include/connection.php";

                    $sql = "SELECT * FROM aktualnosci";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: ogrodzenia.php?error=MysqlError");
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo 
                            "<div class='slide fade'>

                                <span>".$row['tresc']."</span>
                            
                            </div>";
                        }
                    }

                ?>
                <script src='../JS/slideshow.js'></script>
            </section>
            <header>
                <div id='navbar'>
                    <a href='../index.php'>
                        <img src="../ASSETS/inoxbud-logo.svg" alt="ogrodzenia" title="logo inoxbud" class='logo'>
                    </a>
                    <input type="checkbox" id="nav-toggle" class="nav-toggle">
                   <nav>
                        <ul>
                            <li><a href="schody.php" class='menu-underline'>Schody</a></li>
                            <li><a href="balustrady.php" class='menu-underline'>Balustrady</a></li>
                            <li><a href="daszki.php" class='menu-underline'>Daszki i zabudowy</a></li>
                            <li><a href="porecze.php" class='menu-underline'>Poręcze</a></li>
                            <li><a href="ogrodzenia.php" class='menu-underline'>Ogrodzenia</a></li>
                            <li><a href="inne.php" class='menu-underline'>Inne</a></li>
                            <li><a href="duzeInwestycje.php" class='menu-underline'>Duże inwestycje</a></li>
                            <li><span class='menu-underline' id='gotoSchody'>Kontakt</span></li>
                        </ul>
                    </nav>
                    <label for="nav-toggle" class="nav-toggle-label">
                        <img src="../ASSETS/hamburger.png" alt="drewno" class='hamburger'>
                    </label>
                </div>
                
            </header>
            
        </div>
        
        <article>

            <div class="galeria__header" style="background-image: url('../ASSETS/bramy-bg.png');">
                Ogrodzenia
            </div>

            <div class="galeria">
                <div class="galeria__text">
                    W naszej ofercie znajdą Państwo nie tylko barierki na schody czy balustrady ze stali kwasoodpornej, lecz także wysokiej jakości daszki szklane i nierdzewne, które będą zarówno osłoną schodów, jak i elegancką oraz nowoczesną ozdobą domu. <br><br>
                    Konstrukcję zadaszeń wykonujemy ze stali zwykłej cynkowanej, malowanej lub ze stali nierdzewnej. Zadaszenia mogą być z poliwęglanu, szkła bezpiecznego o różnej grubości lub innych materiałów, które spełniają wymogi bezpieczeństwa
                </div>
            <div class="grid__galeria">
              <?php
                include_once "../include/connection.php";
       

                $sql = "SELECT * from ogrodzenia";
        
                $stmt = mysqli_stmt_init($conn);
        
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: loggedin.php?error=mysqlError");
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $rowCount = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    
                    for($i = 0; $i<15; $i++) {
                        $z = $i+1;
                        $sql2 = "SELECT * FROM ogrodzenia WHERE id='$z';";
                        $stmt2 = mysqli_stmt_init($conn);
                        if(mysqli_stmt_prepare($stmt2, $sql2)){
                        mysqli_stmt_execute($stmt2);
                        $result2 = mysqli_stmt_get_result($stmt2);
                        $rowCount2 = mysqli_num_rows($result2);
                        $row2 = mysqli_fetch_assoc($result2);
                        
                        if($rowCount2 < 1 ){
                            echo "<div class='img".($i+1)." img__galeria' style='display: flex; align-items: center; justify-content: center; font-family: Oswald, sans-serif;'>
                                Brak zdjęcia
                            <div class='numerZdjecia'>".($i+1)."</div>
                        </div>";
                        }
                        else{
                            echo "<div class='img".($i+1)." img__galeria' >
                            <a href='../include/galeria/img/".$row2['nazwa']."' data-lightbox='mygallery' data-title='Obraz prezentujący przykładowe schody NR".($i+1)."'>
                                <img src='../include/galeria/img/".$row2['nazwa']."' alt='stolarka'>
                            </a>
                            <div class='numerZdjecia'>".($i+1)."</div>
                        </div>";
                        }
                        }
                    }
                }
            

               ?>
            </div>
            </div>

            <div class="table msg__tabela">
                <div class="galeria__msg">    
                    Zainteresowany/a? Napisz wiadomość! <br>
                    <form action="mailto:inoxbud@inoxbud.com" method="post" enctype="text/plain">
                        <button type='submit'>technolog@inoxbud.pl</button>
                    </form>
                </div>
            </div>

            <div class="galeria__opis">
                <div class="galeria__fragment">
                    <span class="galeria__opis__title">
                        Galeria
                    </span> <br>
                    W galerii widocznej na stronie znajduje się zestaw zdjęć z produktami naszej firmy.
                </div>
                <div class="galeria__fragment">
                    <span class="galeria__opis__title">
                        Masz coś na oku?
                    </span> <br>
                    Jeżeli któryś z naszych produktów przykuł Twoją uwagę i chciałbyś/chciałabyś zrealizować go w swoim projekcie - przy wycenie podaj numer, który znajduje się w lewym dolnym rogu zdjecia.
                </div>
                <div class="galeria__fragment">
                    <span class="galeria__opis__title">
                        W jaki sposób otrzymasz wycenę?
                    </span> <br>
                    W celu otrzymania wstępnej wyceny prosimy o napisanie numeru ze zdjecia lub załączyć własne zdjęcie lub projekt. <br><br>
                    Aby wstępne wycena była jak najbardziej zbliżona do ostatecznej prosmy uwzględnić, czy:
                    <ul>
                        <li>balustrady i schody mają być na zewnątrz czy wewnątrz budynku,</li>
                        <li>rodzaj materiały, stal zwykła malowana czy nierdzewna,</li>
                        <li>orientacyjna ilość w metrach lub sztukach,</li>
                        <li>adres montażu i telefon kontaktowy,</li>
                        <li>zdjęcia miejsca, w którym ma odbyć się montaż (jeżeli są).</li>
                    </ul>
                </div>

            </div>
            <div class="table ask__table">
                <div class="galeria__ask">
                    Masz pytania? <br>
                    Napisz lub zadzwoń do nas! <br>
                    <div class="ask__con">
                        <img src="../ASSETS/local_phone.png" alt="schody" title="telefon" class='phone'>
                        <span class='galeria__nr'>510 530 252</span>
                    </div>
                    <div class="ask__con">
                        <img src="../ASSETS/local_phone.png" alt="Warszawa" title="telefon" class='phone'>
                        <span class='galeria__nr'>506 130 134</span>
                    </div>
                    <div class="ask__con">
                        <img src="../ASSETS/email.png" alt="Na zamówienie" title="email" class='mail'>
                        <span >inoxbud@inoxbud.pl</span> 
                    </div>
                </div>
            </div>
            
        </article>


    <section class='find__section'>
        <div class='map__container'>
            <img src="../ASSETS/mapka.png" alt="" class='mapka'>
        </div>
        
        <div class="find__container">
            <div class="findus">
                <span>Znajdź nas tutaj!</span>
                <div class="findus-left adresy">
                    <p>
                        INOXBUD <br>
                        ul. Tołostoja 1/99 <br>
                        01-910 Warszawa
                    </p>
                    <div class="facebook">
                        <a href='https://www.facebook.com/inoxbud/'  target='_blank'>
                            <img src='../ASSETS/facebook-inoxbud-d.png'alt="balustrady" title="www.facebook.com/inoxbud" class='fb'> 
                        </a>
                    </div>
                </div>
                <div class="findus-right adresy">
                    <p>
                        PRACOWNIA <br>
                        ul. Warszawska 249 <br>
                        05-082 Stare Babice
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer id='gotoFooter'>
        <div class="footer__container">
            <div class="footerinfo footerinfo-left">
                <span class='ftitle'>Dane kontaktowe</span>
                <div class='ctname'>
                    Grzegosz Mieszkowski <br>
                    ul. Tołostoja 1/199 <br>
                    01-910 Warszawa <br>
                    <p>NIP: 566-151-41-87</p>
                </div>
            </div>
            <div class="footerinfo footerinfo-mid">
                <span class='ftitle'>Telefony kontaktowe </span>
                <div class='ctname'>
                    Grzegorz Mieszkowski <br>
                    <span>510 530 252</span> <br>
                    Technolog <br>
                    <span>technolog@inoxbud.pl</span> <br>
                    <span>506 130 134</span>
                </div>
            </div>
            <div class="footerinfo footerinfo-right">
                <span class='ftitle'>Kontakt e-mail</span>
                <div class='ctname'>
                    inoxbud@inoxbud.pl <br>
                    <a href='mailto:inoxbud@inoxbud.pl' class='fade'>
                        <span>Napisz wiadomość</span>
                    </a>    
                </div>
                    <div class="facebook__white">
                        <a href='https://www.facebook.com/inoxbud/' target='_blank'>
                            <img src='../ASSETS/facebook-inoxbud-w.png' alt="bramy" class='fb'>
                        </a>
                    </div>
            </div>
        </div>
    </footer>

<!-- Skrypty -->
<script>
    /* SCROLL */
    $("#goto").click(function() {
    $('html,body').animate({
        scrollTop: $(".1234").offset().top},
        'slow');
        });

    /* STICKY */
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });

    $("#gotoSchody").click(function() {
    $('html').animate({
        scrollTop: $("#gotoFooter").offset().top},
        'slow');
        }); 
    
</script>
 <script src='JS/cookies.js'></script>
   
</body>
</html>