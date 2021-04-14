<?php

    if(isset($_POST['removeSubmit'])) {

        $id = $_POST['id'];

        require "connection.php";

        $sql = "DELETE FROM aktualnosci WHERE id='$id';";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header('Location: ../podstrony_cms/loggedin.php?error=StatementError');
            exit();
        } else {
            mysqli_stmt_execute($stmt);
            header('Location: ../podstrony_cms/loggedin.php?remove=RemovingSuccedd');
            exit();
        }

    } else {
        header('Location: ../podstrony_cms/loggedin.php');
        exit();
    }

?>