<?php
session_start () ;
if(isset($_SESSION['sesion email'])){
   // echo"si exite session de ".$_SESSION['sesion email'];
   $email_sesion = ($_SESSION['sesion email']);
   $sql = "SELECT * FROM tb_usuarios WHERE email='$email_sesion'";
   $query = $pdo->prepare($sql);
   $query->execute();
   $usuarios = $query->fetchAll( fetch_style: PDO::FETCH_ASSOC);
   foreach ($usuarios as $usuario) {
        
        $nombres_sesion = $usuario ['nombres'];
        
   
   }
}else{
 echo"no existe seccion";
 header('Location: '.$URL.'/login');
}
?>