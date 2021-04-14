<?php
    session_start();

    if(isset($_POST['submitWhole']))
    {
        require "../connection.php";

        $kategoria = $_POST['kategoria'];

        $fileName = $_FILES['galeria']['name'];
        $fileType = $_FILES['galeria']['type'];
        $fileTempName = $_FILES['galeria']['tmp_name'];
        $fileError = $_FILES['galeria']['error'];
        $fileSize = $_FILES['galeria']['size'];
        $tabela = $_POST['tabela'];

        $stmt=mysqli_stmt_init($conn);

        $allowed = array("jpg", "jpeg", "png", "svg");


        if(count($fileTempName)!=15)
        {
            header('Location: ../../podstrony_cms/'.$kategoria.'?error=WrongAmountOfFiles');
            $_SESSION['wrongAmount'] = "Wybrano nieprawidłową ilość plików.";
        exit();
        } else{
            for($i=0; $i<15; $i++){


                $name = $fileName[$i];
                $fileExt = explode(".",$name);
                $filetmp = $fileTempName[$i];
                $fileActualExt = strtolower(end($fileExt));
                $z = $i + 1;
                            $imageFullName = uniqid("", true).".".$fileActualExt;
                            $fileDestination = "img/".$imageFullName;
                            require "../connection.php";
                            if(in_array($fileActualExt, $allowed)) {
                            $stmt = mysqli_stmt_init($conn);
                            $sql = "SELECT * FROM $tabela WHERE id='$z';";
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header('Location: ../../podstrony_cms/'.$_POST['kategoria'].'?error=stmt1');
                                exit();
                            } else {
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount==1){
                                    $row = mysqli_fetch_assoc($result);
                                    $updateName = $row['nazwa'];
                                    $stmt2 = mysqli_stmt_init($conn);
                                    $sql2 = "UPDATE $tabela SET nazwa ='$imageFullName' WHERE nazwa='$updateName'";
                                    if(!mysqli_stmt_prepare($stmt2, $sql2))
                                    {
                                        header('Location: ../../podstrony_cms/'.$_POST['kategoria'].'?error=stmt1');
                                        exit();
                                    } else {
                                    unlink("img/$updateName");
                                    mysqli_stmt_execute($stmt2);
                                    move_uploaded_file($filetmp, $fileDestination);
                                    header('Location: ../../podstrony_cms/'.$_POST['kategoria']);
                                    }
                                    
                                }else{
                                    $stmt3 = mysqli_stmt_init($conn);
                                    $sql3 = "INSERT INTO $tabela (id, nazwa) VALUES(?,?);";

                                    if(!mysqli_stmt_prepare($stmt3, $sql3)){
                                        header('Location: ../../podstrony_cms/'.$_POST['kategoria'].'?error=stmt2');
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmt3, "ss", $z, $imageFullName);
                                        mysqli_stmt_execute($stmt3);
                                        move_uploaded_file($filetmp, $fileDestination);
                                        header('Location: ../../podstrony_cms/'.$_POST['kategoria']);
                                        
                                       
                                    }
                                }
                                
                            }
                        } else{
                            header('Location: ../../podstrony_cms/'.$_POST['kategoria'].'error=NoExtenssionAllowed');
                            exit();
                        }
                 
                
            }
            exit();
        }
        

    }else{
        header('Location: ../../podstrony_cms/schody.php?error=CriticalError');
        exit();
    }


?>