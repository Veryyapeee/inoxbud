<?php

    if(isset($_POST['delete'])) {

        require "../connection.php";
        $tabela = $_POST['kategoria'];
        $id = $_POST['delete_img'];
        $podstrona = $_POST['strona'];
        $sql1 = "SELECT * FROM $tabela WHERE id='$id'"; 

        
        $stmt2 = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $sql1 )) {
            header('Location: ../../podstrony_cms/'.$podstrona.'?error=StatementError1');
            exit();
        } else {

            mysqli_stmt_execute($stmt2);
            $result1 = mysqli_stmt_get_result($stmt2);
            $row = mysqli_fetch_assoc($result1);
            $img = $row['nazwa'];

            unlink("img/$img");
                    
            
            $sql2 = "DELETE FROM $tabela WHERE id='$id'"; 
            if(!mysqli_stmt_prepare($stmt2, $sql2)) {
                header('Location: ../../podstrony_cms/'.$podstrona.'?error=StatementError2');
                exit();
            } else {
                mysqli_stmt_execute($stmt2);
                header('Location: ../../podstrony_cms/'.$podstrona.'?message=Succed');
                exit();
            }

        }
        

    } else {
        header('Location: ../../podstrony_cms/'.$podstrona);
        exit();
    }

?>