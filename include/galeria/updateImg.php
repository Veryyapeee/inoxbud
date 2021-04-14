<?php

    if(isset($_POST['submit'])) {
        $podstrona = $_POST['strona'];
        $file = $_FILES['file'];
        $id = $_POST['id']; 
        $tabela = $_POST['kategoria'];
        //wszystkie info o zdjęciu
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileTempName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileSize = $file["size"];

        

        //rozszerzenie
        $fileExt = explode(".",$fileName);

        //zmiena na małe litery rozszerzenia
        $fileActualExt = strtolower(end($fileExt));

        //dozwolone pliki
        $allowed = array("jpg", "jpeg", "png", "svg");

        //czy dobry jest plik
        if(in_array($fileActualExt, $allowed)) {
            //czy jest jakiś error
            if($fileError === 0) {
                
                //czy plik nie za duży
                if($fileSize < 8000000){
                    
                    //nadanie nazwy z uniq ID i rozszerzeniem
                    $imageFullName = uniqid("", true).".".$fileActualExt;
                    //ścieżka pliku
                    $fileDestination = "img/".$imageFullName;

                    include_once "../connection.php";

                    //czy ktoś w ogóle to zrobił
                    if(empty($_FILES['file']))
                    {
                        header('Location:../../podstrony_cms/'.$podstrona.'?error=error');
                        exit();
                    } else {
                        //tu już się wszystko dzieje kek

                        
                        $stmt = mysqli_stmt_init($conn);
                        $sql2 = "SELECT * FROM $tabela WHERE id='$id'"; 
                        if(!mysqli_stmt_prepare($stmt, $sql2)) {
                            header('Location: ../../podstrony_cms/'.$podstrona.'?error=StatementError');
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result2 = mysqli_stmt_get_result($stmt);
                            $rowCount2 = mysqli_num_rows($result2);
                            if($rowCount2 > 0){
                                $row2 = mysqli_fetch_assoc($result2);
                                $updateName = $row2['nazwa'];
                                $sql3 = "UPDATE $tabela SET nazwa='$imageFullName' WHERE nazwa='$updateName';";
                                unlink("img/$updateName");
                                $rez4 = mysqli_query($conn, $sql3);
                                
                                mysqli_stmt_execute($stmt);
                                move_uploaded_file($fileTempName, $fileDestination);
                                header('Location: ../../podstrony_cms/'.$podstrona.'?update=success');
                                exit();
                              
                            }
                            else{
                                $sql = "SELECT * FROM $tabela;";
                                $stmt = mysqli_stmt_init($conn);
    
                                if(!mysqli_stmt_prepare($stmt, $sql)) {
                                    header('Location: ../../podstrony_cms/'.$podstrona.'?error=StatementError');
                                    exit();
                                } else {
    
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    $rowCount = mysqli_num_rows($result);
                                    $sql = "INSERT INTO $tabela (id, nazwa) VALUES(?, ?);";
                                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                                        header('Location: ../../podstrony_cms/'.$podstrona);
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "ss", $id, $imageFullName);
                                        mysqli_stmt_execute($stmt);
    
                                        move_uploaded_file($fileTempName, $fileDestination);
    
                                        header('Location: ../../podstrony_cms/'.$podstrona);
                                        exit();
                                        
                                    }
                                }
                            }
                        }




                    

                    }

                } else {
                    header('Location: ../../podstrony_cms/'.$podstrona.'error=zaduzyplik');
                    exit ();
                }

            } else {
               header('Location: ../../podstrony_cms/'.$podstrona.'?error=mysqlerror');
                exit ();
            }
        }
        else {
            header('Location: ../../podstrony_cms/'.$podstrona.'?error=blad');
            exit ();
        }

    }

?>