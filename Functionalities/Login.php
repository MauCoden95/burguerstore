<?php
    require_once('../Config/Connection.php');
    session_start();

    if ($_POST) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $sql = "SELECT * FROM users WHERE '$email' = email limit 1;";
        $query = mysqli_query($connection,$sql);

      

        if ($query && mysqli_num_rows($query) == 1) {
            $query_fetch = mysqli_fetch_assoc($query);
            //var_dump($query_fetch);


            $verify = password_verify($password,$query_fetch['password']);
            if ($verify) {
                $_SESSION['identity'] = $query_fetch;
                var_dump($_SESSION['identity']);
            }else{
                $_SESSION['login_failed'] = "Contraseña incorrecta";
            }


        }else{
            $_SESSION['login_failed'] = "No hay usuarios con ese mail";
        }


        
    }


    header('Location: http://localhost/BurguerStore/Index.php');

?>