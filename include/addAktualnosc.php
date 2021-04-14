<?php

    session_start();
    if(isset($_POST['addSubmit'])){

        $tresc = $_POST['addAktualnosc'];


        require "connection.php";

        if(empty($tresc))
        {
            header("Location: ../podstrony_cms/loggedin.php?error=EmptyField");
            $_SESSION['emptyAkt'] = "Proszę uzupełnić wymagane pole.";
            exit();
        } else {

            $sql = "INSERT INTO aktualnosci (tresc) VALUES(?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../podstrony_cms/loggedin.php?error=StatementError");
                exit();
            } else {

                mysqli_stmt_bind_param($stmt, "s", $tresc);
                mysqli_execute($stmt);
                header("Location: ../podstrony_cms/loggedin.php?Adding=Success");
                exit();

            }

        }

    } else {
        header('Location: ../podstrony_cms/loggedin.php');
        exit();
    }


?>