<?php
include('../../config.php');


$nombres = filter_var($_POST['nombres'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat']; 
$id_usuario = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);

if($password_user == ""){
    if ($password_user === $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $fechaHora = date('Y-m-d H:i:s');
    
        
        $stmt = $pdo->prepare("UPDATE tb_usuarios
            SET nombres=:nombres,
                email=:email,
                idrol=:rol,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
    
       
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':fyh_actualizacion', $fechaHora);
        $stmt->bindParam(':id_usuario', $id_usuario);
    
       
        if ($stmt->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El usuario se Actualizo con exito";
            $_SESSION['icono'] = "success";
            header('Location: ' . $URL . '/usuarios');
            exit;
        } else {
            echo "Error al registrar usuario: " . $stmt->errorInfo()[2];
        }
    } else {
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no coinciden";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/usuarios/update.php?id=' . $id_usuario);
        exit;
    }


}else {
    if ($password_user === $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $fechaHora = date('Y-m-d H:i:s');
    
        // Prepare the SQL statement
        $stmt = $pdo->prepare("UPDATE tb_usuarios
            SET nombres=:nombres,
                email=:email,
                password_user=:password_user,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_usuario=:id_usuario");
    
        // Bind parameters
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_user', $password_user);
        $stmt->bindParam(':fyh_actualizacion', $fechaHora);
        $stmt->bindParam(':id_usuario', $id_usuario);
    
        // Execute the statement
        if ($stmt->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El usuario se Actualizo con exito";
            $_SESSION['icono'] = "success";
            header('Location: ' . $URL . '/usuarios');
            exit;
        } else {
            echo "Error al registrar usuario: " . $stmt->errorInfo()[2];
        }
    } else {
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas no coinciden";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/usuarios/update.php?id=' . $id_usuario);
        exit;
    }
}

