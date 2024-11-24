<?php
include('../../config.php');

$rol = $_POST['rol'];

    
    $stmt = $pdo->prepare("INSERT INTO tb_roles (rol, fyh_creacion) VALUES (:rol,:fyh_creacion)");


    $stmt->bindParam(':rol', $rol);
    $stmt->bindParam(':fyh_creacion', $fechaHora);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['mensaje'] = "El rol se registro con exito";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles');

    } else {
     

    //echo "Las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje'] = "El usuario no se pudo regitar";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/create.php');}
?>
<?php include ('../layout/mensajes.php');?>