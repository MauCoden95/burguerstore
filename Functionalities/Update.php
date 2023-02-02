<?php
    require_once('../Config/Connection.php');
    session_start();

    $id = $_SESSION['identity']['id'];


    // $query = mysqli_query($connection,"SELECT * FROM users WHERE id = $id");
    // $user = mysqli_fetch_assoc($query);


    if ($_POST) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';


        $password_secure = password_hash($password,PASSWORD_BCRYPT,['cost'=>5]);


    
        $save = "UPDATE users SET email = '$email', dni = $dni, address = '$address', password = '$password_secure' WHERE id = $id;";

        $save_query = mysqli_query($connection, $save);

        
        if ($save_query) {
            $_SESSION['user_update'] = "Usuario actualizado con exito!!!";
        }else{
            $_SESSION['user_update'] = "Error al actualizar usuario";
        }

    }


    header('Location: http://localhost/BurguerStore/Index.php');
    
?>