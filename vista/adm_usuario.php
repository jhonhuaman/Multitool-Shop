<?php
session_start();
if ($_SESSION['us_tipo']==1) {
    include_once('../vista/layouts/header.php');
?>

  <title>Admin | Editar Datos</title>

<?php
include_once('../vista/layouts/nav.php');
?>
  <!-- Modal cambiar contraseña -->
  <div class="modal fade" id="dnicontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel" >Editar DNI y CONTRA</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img src="../source/avatar.png" alt="" class="profile-user-img img-fluid img-circle" >
          </div>
          <div class="text-center">
            <b>
              <?php 
                echo $_SESSION['nombre_us'];
              ?>
            </b>
          </div>
          <form id="form-dni-con" >
            <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user" ></i></span>
              </div>
              <input id="ident" type="text" class="form-control" placeholder="Ingrese dni" >
            </div>
            <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock" ></i></span>
              </div>
              <input id="con" type="text" class="form-control" placeholder="Ingrese contraseña" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn bg-gradient-primary">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal usuario new-->
  <div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="card card-warning">
            <div class="card-header">
                <h3  class="card-title">Crear Usuario</h3>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form id="form-crear">
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" type="text" class="form-control" placeholder="Ingrese apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Nacimiento</label>
                        <input id="edad" type="date" class="form-control" placeholder="Ingrese nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" type="text" class="form-control" placeholder="Ingrese DNI" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input id="pass" type="password" class="form-control" placeholder="Ingrese password" required>
                    </div>
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-gradient-success float-right m-1">Guardar</button>
                <button type="button" data-dismiss="modal" aria-label="close" class="btn btn-outline-secondary float-right m-1">Cancelar</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion de usuarios <button type="button" data-toggle="modal" data-target="#crearusuario" class="btn bg-gradient-primary ml-5">Crear Usuario</button></h1>
                
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion_usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Buscar usuario</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left" placeholder="Ingrese nombre de usuario">
                        <div class="input-group-append">
                            <button class="btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div>

                </div>
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%"> # </th>
                        <th style="width: 15%">Nombre de usuario</th>
                        <th style="width: 15%">Avatar</th>x
                        <th>Correo</th>
                        <th style="width: 15%">DNI</th>
                        <th style="width: 15%" class="text-center">Tipo de usuario</th>
                        
                      </tr>
                    </thead>
                    <tbody id="usuarios" >
                      <!-- body-->
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </section>
  </div>

<?php
include_once('../vista/layouts/footer.php');
?>
<?php
}
else{
    header('Location: ../login.php');
}
?>
<script src="../js/gestion_usuario.js" ></script>