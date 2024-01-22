<?php 
include_once('../modulos/Usuario.php');
session_start();
$user = isset($_POST['user']) ? $_POST['user'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$usuario = new Usuario();

if (!empty($_SESSION['us_tipo'])) {
    $_SESSION['us_tipo'] = (int)$_SESSION['us_tipo'];
    switch ($_SESSION['us_tipo']) {
         case '1':
            header('Location: /vista/adm_catalogo.php');
             break;
            
         case '2':
            header('Location: /vista/tec_catalogo.php');
            break;
            
    }
}
else{
    $usuario->Loguearse($user, $pass);
    if(!empty($usuario->objetos)){
        foreach ($usuario->objetos as $objeto) {
            $_SESSION['usuario'] = $objeto['id_usuario'];
            $_SESSION['us_tipo'] = $objeto['us_tipo'];
            $_SESSION['nombre_us'] = $objeto['nombre_us'];
        }
        $_SESSION['us_tipo'] = (int)$_SESSION['us_tipo'];
        switch ($_SESSION['us_tipo']) {
            case '1':
                header('Location: /vista/adm_catalogo.php');
                break;
            
            case '2':
                header('Location: /vista/tec_catalogo.php');
                break;
            
        }
    }
    else {
        header('Location: ../login.php');
    }
}


