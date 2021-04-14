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
    <meta name="keywords" content="INOXBUD,Warszawa,schody,schody z drewna,drewno,balustrady,poręcze,bramy,daszki,ogrodzenia,ul.Tołostoja 1/199,Tołostoja Warszawa, ul.Warszawska 249, Warszawska Warszawa, drewania schody, Babice Warszawa,schody na wymiar, schody na zamówienie,balustrady na zamówienie,balustrady na wymiar, poręcze na zamówienie,poręcze na wymiar, bramy na zamówienie,bramy na wymiar, daszki na zamówienie,daszki na wymiar, ogrodzenia na zamówienie, ogrodzenie na wymiar">
    <meta name="theme-color" content="#3D9CEA">
    <link rel="icon" type="image/png" sizes="32x32" href="ASSETS/favicon.png">
    <link rel="stylesheet" href="CSS/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.0.js"></script>
    <title>INOXBUD</title>
    
    
</head>
<body>
    
    <div class='modal__con' id='modal__con'>
        <div class="modal__t">
            <div class="modal__top">
                <span>
                    Wycena <br>
                </span>
                Jeżeli któryś z naszych porduktów przykuł Twoją uwagę i chciałbyś/chciałabyś zrealizować go w swoim projekcie - przy wysyłaniu do nas maila podaj numer, który znajduje się w lewym dolnym rogu zdjecia. Znajdziesz je wchodząc przez kategorie widoczne w menu na górze strony.
                
            </div>
            <div class="modal__middle">
                <span>
                    W jaki sposób otrzymasz wycenę? <br>
                </span>
                W celu otrzymania wstępnej wyceny prosimy o napisanie numeru ze zdjęcia lub załączyć własne zdjęcie lub projekt.
                <p>
                    Aby wstępna wycena była jak najbardziej zbliżona do ostatecznej prosimy uwzględnić, czy:
                    <ul>
                        <li>balustrady i schody mają być na zewnątrz czy wewnątrz budynku,</li>
                        <li>rodzaj materiału, stal zwykła malowana czy nierdzewna</li>
                        <li>orientacyjna ilość w metrach lub sztukach,</li>
                        <li>adres montażu i telefon kontaktowy,</li>
                        <li>zdjęcia miejsca, w którym ma odbyć się montaż (jeżeli są).</li>
                    </ul>
                </p>
            </div>
            <div class='modal__bottom'>
                <span>
                    Masz pytania?<br>
                    Napisz lub zadzwoń do nas!
                </span>
                <div class="mdl__nr__tel">
                    <img src="ASSETS/local_phone.png" alt="Waszawa" title="telefon">
                    <span>
                        510 530 252
                    </span>
                </div>
                <div class="mdl__nr__tel">
                    <img src="ASSETS/local_phone.png" alt="schody" title="komórka">
                    <span>
                        506 130 134
                    </span>
                </div>
                <div class="mdl__mailimg">
                    <img src="ASSETS/email.png" alt="drewno" title="kopeta" />
                </div>
                <div class='mdl__mail'>
                    <span>
                        technolog@inoxbud.pl
                    </span>
                </div> <br>
                <div id='close__modal' class='fade'>
                    <img src='ASSETS/button-zamknij.png' alt="poręcze" title="zamknij">
                </div>

                
            </div>
        </div>
    </div>
  
    <div class="up">
       <div class='sticky'>
            <section class="news">
                

                <?php

                    require "include/connection.php";

                    $sql = "SELECT * FROM aktualnosci";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: index.php?error=MysqlError");
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


            </section>
            <header>
                <div id='navbar'>
                    <img src="ASSETS/inoxbud-logo.svg" alt="brama" title="logo" class='logo'>
                    <input type="checkbox" id="nav-toggle" class="nav-toggle">
                   <nav>
                        <ul>
                          <li><a href="../schody-inoxbud" class='menu-underline'>Schody</a></li>
                            <li><a href="../balustrady-inoxbud" class='menu-underline'>Balustrady</a></li>
                            <li><a href="../zadaszenia-inoxbud" class='menu-underline'>Daszki i zabudowy</a></li>
                            <li><a href="../porecze-inoxbud" class='menu-underline'>Poręcze</a></li>
                            <li><a href="../ogrodzenia-inoxbud" class='menu-underline'>Ogrodzenia</a></li>
                            <li><a href="../inne-inoxbud" class='menu-underline'>Inne</a></li>
                            <li><a href="../inwestycje-inoxbud" class='menu-underline'>Duże inwestycje</a></li>
                            <li><span class='menu-underline' id='gotoSchody'>Kontakt</span></li>
                        </ul>
                    </nav>
                    <label for="nav-toggle" class="nav-toggle-label">
                        <img src="ASSETS/hamburger.png" alt="daszki" class='hamburger'>
                    </label>
                </div>
                
            </header>
            
        </div>
        <article>
            <div class="int">
              <span>Robimy schody <br> i balustrady jak dla siebie </span>
                <p class='int-text'>Nasze produkty charakteryzują się wysoką jakością wykonania, trwałością oraz stanowią elegancką dekorację domu. Firma INOXBUD zajmuje się produkcją barierek na schody, nowoczesnych balustrad balkonowych, bram, ogrodzeń, zadaszeń, poręczy i wielu więcej!   </p> 
                <div class="next__button">
                    <div class="fade" id='wycena__button'>
                        <img src="ASSETS/button-wycena.png" alt="schody na zamówienie" title="wycena" class='wycena__button' >
                    </div>


                    <div class="opacity" id='goto'>
                        <img src="ASSETS/button-oferta.png" alt="schody na wymiar" title="oferta" class='lub__button'>
                       
                    </div>
                </div>
            </div>
            <div class='karaiby__container' >
                <div class='karaiby'>
                    <img src="ASSETS/g_stairs.png" alt="schody na karaibach" title="schody">
                </div>
              
            </div>
           
        </article>
        
    </div>
   
    <hr> <div class="nasza__oferta" id='nasza__oferta'>Nasza oferta
        <div class='1234' style='position: relative; bottom: 225px;'></div>
    </div>
    <main id='main'>
        <div class="oferta of1">
            <div class='oferta__title balustrady'>
                Balustrady
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    zewnętrzne, wewnętrzne, rurowe, ze stali nierdzewnej, ze stali zwykłej, malowane proszkowo, ocynkowane, połączone z drewnem i szkłem<br><br>
                    <a href="podstrony/balustrady.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>
        <div class="oferta of2">
            <div class='oferta__title porecze'>
                Poręcze
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    ze stali,<br>drewniane,<br>połączenie stali i drewna<br><br>
                    <a href="podstrony/porecze.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>
        <div class="oferta of3">
            <div class='oferta__title schody'>
                Schody
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    ze stali nierdzewnej, malowanej, ze stali zwykłej, malowanej proszkowo ocynkowane, połączeone z drewnem, szkłem,
                    kamieniem, z kraty Wema<br><br>
                    <a href="podstrony/schody.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>
        <div class="oferta of4">
            <div class='oferta__title zadaszenia'>
                Zadaszenia
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    ze szkła,<br>z poliwęglanu<br><br>
                    <a href="podstrony/daszki.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>
        <div class="oferta of5">
            <div class='oferta__title bramy' >
                Ogrodzenia
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    ocynkowane, <br> malowane <br> <br>
                    <a href="podstrony/ogrodzenia.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>
        <div class="oferta o6">
            <div class='oferta__title inne'>
            Inne
            </div>
            <div class='oferta__zawartosc'>
                <div class='oferta__middle'>
                    cokoły, kominki,  elementy stalowe do kominków,  orurowanie tuningowe, konstrukcje stalowe,  stoły gastronomiczne, podjazdy dla niepełnosprawnych, drabiny i wiele więcej <br><br>
                    <a href="podstrony/inne.php" class='fade'>Zobacz galerię</a>
                </div>
            </div>
        </div>

        </div>
    </main>
    <section class='find__section'>
        <div class='map__container' id='map'>
           
        </div>
        
        <div class="find__container">
            <div class="findus">
                <span>Znajdź nas tutaj!</span>
                <div class="findus-left adresy">
                    <p>
                        PRACOWNIA <br>
                        ul. Warszawska 249 <br>
                        05-082 Stare Babice
                    </p>
                    <div class="facebook">
                        <a href='https://www.facebook.com/inoxbud/' target='_blank'>
                            <img src='ASSETS/facebook-inoxbud-d.png' class='fb' alt="inoxbud Warszawa" title="www.facebook.com/inoxbud"> 
                        </a>
                    </div>
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
                    ul. Tołstoja 1/199 <br>
                    01-910 Warszawa <br>
                    <p>NIP: 566-151-41-87</p>
                </div>
            </div>
            <div class="footerinfo footerinfo-mid">
                <span class='ftitle'>Telefony kontaktowe </span>
                <div class='ctname'>
                    Technolog <br>
                    <span>506 130 134</span> <br>
                    <span>technolog@inoxbud.pl</span> <br>
                    Właściciel <br>
                    
                    <span> 510 530 252</span>
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
                            <img src='ASSETS/facebook-inoxbud-w.png' class='fb'alt="inoxbud Warszawa" title="www.facebook.com/inoxbud">
                        </a>
                    </div>
            </div>
        </div>
    </footer>

<!-- Skrypty -->
<script>
    /* SCROLL */
    $("#goto").click(function() {
    $('html').animate({
        scrollTop: $(".1234").offset().top},
        'slow');
        });

    $("#gotoSchody").click(function() {
    $('html').animate({
        scrollTop: $("#gotoFooter").offset().top},
        'slow');
        });

    /* STICKY */
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });

    /* CHANGE COLOR */
        $(function () {
        $(document).scroll(function () {
        var $chgclr = $(".sticky");
        var $asd = $(".news");
        $chgclr.toggleClass('chgclr', $(this).scrollTop() > $asd.height());
    });
    });

    /* MODAL */  
    var modal__con = document.getElementById("modal__con");
    var open__modal = document.getElementById("wycena__button");
    var close__modal = document.getElementById("close__modal");

    open__modal.onclick = function(){
        modal__con.style.display = "block";
    }
    window.onclick = function(event){
        if (event.target == modal__con){
            modal__con.style.display = "none";
        }
    }
    close__modal.onclick = function(){
        modal__con.style.display = 'none';
    }

    

    
</script>
<script>
function initMap() {
  var location = {lat: 52.250225, lng: 20.827436};
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 18, center: location});
  var marker = new google.maps.Marker({position: location, map: map});
}</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAl_8NIKJgSGbuTmwSTFRH3gta_MitFio&callback=initMap";>
</script>
<script src='JS/slideshow.js'></script>

<script src='JS/cookies.js'></script>
   
</body>
</html>