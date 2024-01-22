<?php
include_once('../modulos/Conexion.php');
class Usuario{
    var $objetos;
    private $acceso;
    public function __construct(){
        $db=new Conexion();
        $this->acceso = $db -> pdo;
    }
    function Loguearse($dni,$pass){
        $sql="SELECT * FROM usuario inner join tipo_us on us_tipo=id_tipo_us where dni_us=:dni and contrasena_us=:pass";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,':pass'=>$pass));
        $this->objetos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->objetos; 
    }
    function obtener_datos($id){
        $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us and id_usuario=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos = $query->fetchAll();
        return $this->objetos; 
    }
    function editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional){
        $sql="UPDATE usuario SET telefono_us=:telefono, residencia_us=:residencia, correo_us=:correo, sexo_us=:sexo, adicional_us=:adicional where id_usuario=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':telefono'=>$telefono, ':residencia'=>$residencia, ':correo'=>$correo, ':sexo'=>$sexo, ':adicional'=>$adicional));
         
    }
    function cambiar_contra($id_usuario,$antiguacon,$nuevacon){
        $sql="SELECT * FROM usuario where id_usuario=:id and contrasena_us=:antiguacon";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':antiguacon'=>$antiguacon));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            $sql="UPDATE usuario SET contrasena_us=:nuevacon where id_usuario=:id";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(":id"=>$id_usuario,':nuevacon'=>$nuevacon));
            echo 'update';
        }
        else{
            echo 'noupdate';
        }
    }
    function cambiar_photo($id_usuario,$nombre){
        $sql="SELECT avatar FROM usuario where id_usuario=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos = $query->fetchAll();
        $sql="UPDATE usuario SET avatar=:nombre where id_usuario=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(":id"=>$id_usuario,':nombre'=>$nombre));
        return $this->objetos;   
    } 
    function buscar(){
        if (!empty($_POST['consulta'])) {
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us LIKE :consulta";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us NOT LIKE '' ORDER BY id_usuario LIMIT 25";
            $query=$this->acceso->prepare($sql);
            $query->execute();
            $this->objetos = $query->fetchAll();
            return $this->objetos;
        }
    }
    function c_dni_con($id_usuario,$ident,$con){
        $sql="UPDATE usuario SET dni_us=:ident contrasena_us=:con where id_usuario=:id";
        $query=$this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':con'=>$con, ':ident'=>$ident));
        $this->objetos = $query->fetchAll();
        $query=$this->acceso->prepare($sql);
        if (!empty($this->objetos)) {
            $sql="UPDATE usuario SET dni_us=:ident contrasena_us=:con where id_usuario=:id";
            $query=$this->acceso->prepare($sql);
            $query->execute(array(":id"=>$id_usuario,':con'=>$con, ':ident'=>$ident));
            echo 'update';
        }
        else{
            echo 'noupdate';
        }
    }  
}