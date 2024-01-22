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
  <div class="modal fade" id="cambiocontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel" >Cambio de Contraseña</h1>
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
          <form id="form-pass" >
            <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-unlock" ></i></span>
              </div>
              <input id="antiguacon" type="password" class="form-control" placeholder="Ingrese contraseña actual" >
            </div>
            <div class="input-group mb-3" >
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock" ></i></span>
              </div>
              <input id="nuevacon" type="text" class="form-control" placeholder="Ingrese nueva contraseña" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn bg-gradient-success">Aplicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal cambiar foto-->
  <div class="modal fade" id="cambiarphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title" id="exampleModalLabel" >Cambio de Contraseña</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img id="avatar1" src="../source/avatar.png" alt="" class="profile-user-img img-fluid img-circle" >
          </div>
          <div class="text-center">
            <b>
              <?php 
                echo $_SESSION['nombre_us'];
              ?>
            </b>
          </div>
          <form id="form-photo" enctype="multipart/form-data" >
            <div class="input-group mb-3 ml-5 mt-2" >
              <input type="file" name="photo" class="input-group">
              <input type="hidden" name="funcion" value="cambiar_foto" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn bg-gradient-success">Aplicar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Datos Personales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/vista/adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Datos_Personales</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section>
        <div class="content" >
            <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-3" >
                        <div class="card card-success card-outline" >
                            <div class="card-body box-profile" >
                              <div class="text-center" >
                                <img id="avatar2" src="../source/avatar.png" class="profile-user-img img-fluid img-circle">     
                              </div>
                              <div class="text-center mt-2">
                                <button type="button" data-toggle="modal" data-target="#cambiarphoto" class="btn btn-warning btn-sm">Cambiar avatar</button>
                              </div>
                              <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']?>" >
                              <h3 id="nombre_us" class="profile-username text-center text-success">Nombre</h3>
                              <p id="apellido_us" class="text-muted text-center">Apellidos</p>
                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b style="color:green;" >Edad:</b><a id="edad" class="float-right" >12</a>
                                </li>
                                <li class="list-group-item">
                                  <b style="color:green;" >DNI:</b><a id="dni_us" class="float-right" >12</a>
                                </li>
                                <li class="list-group-item">
                                  <b style="color:green;" >Tipo de usuario:</b>
                                  <span id="us_tipo" class="float-right badge badge-primary"></span>
                                </li>
                                <button data-toggle="modal" data-target="#cambiocontra" type="button" class="btn btn-block bg-gradient-info btn-sm" >Cambiar password</button>
                              </ul>
                            </div>
                        </div>
                        <div class="card card-success" >
                          <div class="card-header">
                            <h3 class="card-title">Sobre mi</h3>
                          </div>
                          <div class="card-body">
                            <strong style="color:green;" >
                            <i class="fas fa-phone mr-1"></i>Telefono
                            </strong>
                            <p id="telefono_us" class="text-muted">952654789</p>
                            <strong style="color:green;" >
                            <i class="fas fa-map-marker-alt mr-1"></i>Residencia
                            </strong>
                            <p id="residencia_us" class="text-muted">952654789</p>
                            <strong style="color:green;" >
                            <i class="fas fa-at mr-1"></i>Correo
                            </strong>
                            <p id="correo_us" class="text-muted">952654789</p>
                            <strong style="color:green;" >
                            <i class="fas fa-smile-wink mr-1"></i>Sexo
                            </strong>
                            <p id="sexo_us" class="text-muted">952654789</p>
                            <strong style="color:green;" >
                            <i class="fas fa-pencil-alt mr-1"></i>Informacion adicional
                            </strong>
                            <p id="adicional_us" class="text-muted">952654789</p>
                            <button class="edit btn btn-block bg-gradient-danger" >Editar</button>
                          </div>
                          <div class="card-footer">
                            <p class="text-muted">Click para Editar</p>
                          </div>
                          

                        </div>
                    </div>
                    <div class="col-md-9">
                      <div class="card card-danger">
                        <div class="card-header">
                          <h3 class="card-title">Editar datos personales</h3>
                        </div>
                        <div class="card-body">
                          <div class="alert alert-success text-center" id="editado" style='display: none;' >
                              <span><i class="fas fa-check mg-2" ></i>Editado</span>
                          </div>
                          <div class="alert alert-warning text-center" id="noeditado" style='display: none;' >
                              <span><i class="fas fa-times mg-2" ></i> Edicion desabilitado</span>
                          </div>
                          <form id="form-usuario" class="form-horizontal">
                            <div class="form-group row" required>
                              <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                              <div class="col-sm-10">
                                <input type="number" id="telefono" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="residencia" class="col-sm-2 col-form-label">Residencia</label>
                              <div class="col-sm-10">
                                <input type="text" id="residencia" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                              <div class="col-sm-10">
                                <input type="text" id="correo" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                              <div class="col-sm-10">
                                <input type="text" id="sexo" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="adicional" class="col-sm-2 col-form-label">Informacion adicional</label>
                              <div class="col-sm-10">
                               <textarea class="form-control" id="adicional" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10 float-right">
                                <button class="btn btn-block btn-outline-success">Guardar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="card-footer">
                          <p class="text-muted">No ingresar datos erroneos</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php
include_once('../vista/layouts/footer.php');
?>
<?php
}
else{
    header('Location: ../login.php');
}
?>
<script src="../js/usuario.js" ></script>