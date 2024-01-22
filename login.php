<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap" rel="stylesheet">
    <link rel="stylesheet" tipe="text/css"  href="stylesheet/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@600&family=IBM+Plex+Serif:wght@100&family=Rubik+Glitch&display=swap" rel="stylesheet">
    <link rel="stylesheet" tipe="text/css"  href="stylesheet/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css" rel="stylesheet">
    
</head>
<?php 
session_start();
if (!empty($_SESSION['us_tipo'])) {
        header('Location: ../controlador/LoginCotroller.php');
}
else {
session_destroy();
?>
<body>
    <video class="agente" id="video-background" autoplay muted loop>
        <source class="agente" src="source/22.mp4" type="video/mp4">
    </video>

    <div class="contenedor" >
        <div class="img">
            <img src="source/shooped.svg" alt="">
        </div>
        <div class="content-loged">
            <form action="/controlador/LoginCotroller.php" method="post">
                <img src="source/logo2.png" alt="">
                <h2>Multitool Shop</h2>
                <div class="input-div dni">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>User</h5>
                        <input type="text" name="user" class="input" autocomplete="off" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="pass" class="input" required>
                    </div>
                </div>
                <div class="Rem">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Recuerdame</label>
                    </div>
                </div>
                <a href="">¿Olvidaste tu contraseña?</a>
                <input type="submit" class="btn" value="Iniciar Sesion">
            </form>

        </div>
    </div>
    
</body>
<script src="js/login.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>
</html> 
<?php
}

?>