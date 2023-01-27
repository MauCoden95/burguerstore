<?php
    require_once('../Config/Connection.php');
    session_start();

    if ($_POST) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';


        $password_crypt = password_hash($password,PASSWORD_BCRYPT,['cost' => 5]);

        $sql = "INSERT INTO users VALUES(NULL,'$email',$dni,'$address','$password_crypt');";
        $query = mysqli_query($connection,$sql);

        if ($query) {
            $_SESSION['register_success'] = "Registro exitoso!!!";
        }else{
            $_SESSION['register_failed'] = "Registro fallido";
        }
    }

    header('Location: ../Index.php');

?>