<?php
include('../../config.php');

$id_usuario = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);

    $stmt = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario=:id_usuario");

    $stmt->bindParam(':id_usuario', $id_usuario);

    if ($stmt->execute()) 
        session_start();
        $_SESSION['mensaje'] = "El usuario se elimino con exito";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '/usuarios');
        exit;
    
