<?php

    if(isset($_POST['loginSubmit'])) {
        require 'connection.php';

        $name = $_POST['login'];
        $pwd = $_POST['pwd'];

        if(empty($name) || empty($pwd) ){
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM usrs WHERE usrName=?";
            $stmt = mysqli_stmt_init($conn);
            
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../login.php?error=sql");
                exit ();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $name);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($pwd, $result['usrPwd']);

                    if($pwdCheck == false) {
                        header("Location: ../login.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true) {
                        session_start();
                        $_SESSION['User'] = true;
                        header("Location: ../podstrony_cms/loggedin.php");
                        exit();
                    }
                    else{
                        header("Location: ../login.php?error=wrongpassword");
                        exit ();
                    }

                }
                else {
                    header("Location: ../login.php?error=nouser");
                    exit();
                }

            }

        }

    }
    else {
        header("Location: ../login.php");
        exit();
    }

?>