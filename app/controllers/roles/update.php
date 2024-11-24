<?php
include('../../config.php');

// Validate and sanitize input
$id_rol = filter_var($_POST['id_rol'], FILTER_SANITIZE_STRING);
$rol = filter_var($_POST['rol'], FILTER_SANITIZE_STRING);


        $fechaHora = date('Y-m-d H:i:s');
        $stmt = $pdo->prepare("UPDATE tb_roles
            SET rol=:rol,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_rol=:id_rol");
    
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':fyh_actualizacion', $fechaHora);
        $stmt->bindParam(':id_rol', $id_rol);

        if ($stmt->execute()) {
            session_start();
            $_SESSION['mensaje'] = "El Rol se Actualizo con exito";
            $_SESSION['icono'] = "success";
            header('Location: ' . $URL . '/roles');
            
        }else{ 
            session_start();
            $_SESSION['mensaje'] = "Erro ,no se pudo actualizar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: ' . $URL . '/roles/update.php?id=' . $id_rol);
        }


        
        
