$(document).ready(function(){
    var funcion='';
    var id_usuario =$('#id_usuario').val();
    var edit=false;
    buscar_usuario(id_usuario);
    function buscar_usuario(dato) {
        funcion = 'buscar_usuario';
        $.post('../controlador/UserController.php',{dato,funcion},(response)=>{
            let nombre='';
            let apellido='';
            let edad='';
            let dni='';
            let tipo='';
            let telefono='';
            let residencia='';
            let correo='';
            let sexo='';
            let adicional='';

            const usuario = JSON.parse(response);
            nombre+=`${usuario.nombre}`;
            apellido+=`${usuario.apellido}`;
            edad+=`${usuario.edad}`;
            dni+=`${usuario.dni}`;
            tipo+=`${usuario.tipo}`;
            telefono+=`${usuario.telefono}`;
            residencia+=`${usuario.residencia}`;
            correo+=`${usuario.correo}`;
            sexo+=`${usuario.sexo}`;
            adicional+=`${usuario.adicional}`;

            $('#nombre_us').html(nombre);
            $('#apellido_us').html(apellido);
            $('#dni_us').html(dni);
            $('#edad').html(edad);
            $('#us_tipo').html(tipo);
            $('#telefono_us').html(telefono);
            $('#residencia_us').html(residencia);
            $('#correo_us').html(correo);
            $('#sexo_us').html(sexo);
            $('#adicional_us').html(adicional);

        }) 
    }
    $(document).on('click','.edit',(e)=>{
        funcion='capturar_datos';
        edit=true;
        $.post('../controlador/UserController.php', {funcion,id_usuario},(response)=>{
            const usuario = JSON.parse(response);
            $('#telefono').val(usuario.telefono);
            $('#residencia').val(usuario.residencia);
            $('#correo').val(usuario.correo);
            $('#sexo').val(usuario.sexo);
            $('#adicional').val(usuario.adicional);
        })
    })
    $('#form-usuario').submit(e=>{
        if (edit==true) {
            let telefono=$('#telefono').val();
            let residencia=$('#residencia').val();
            let correo=$('#correo').val();
            let sexo=$('#sexo').val();
            let adicional=$('#adicional').val();
            funcion='editar_usuario';
            $.post('../controlador/UserController.php', {id_usuario,funcion,telefono,residencia,correo,sexo,adicional},(response)=>{
                if (response=='editado') {
                    $('#editado').hide('slow');
                    $('#editado').show(1000);
                    $('#editado').hide(2000);
                    $('#form-usuario').trigger('reset');
                } 
                edit=false;
                buscar_usuario(id_usuario);
            })
        }
        else{
            $('#noeditado').hide('slow');
            $('#noeditado').show(1000);
            $('#noeditado').hide(2000);
            $('#form-usuario').trigger('reset');
        };
        e.preventDefault();
    })

    $('#form-pass').submit(e=>{
        let antiguacon=$('#antiguacon').val();
        let nuevacon=$('#nuevacon').val();
        funcion='cambiar_contra';
        $.post('../controlador/UserController.php',{id_usuario,funcion,antiguacon,nuevacon},(response)=>{
            if (response=='update') {
                alert('Contraseña cambiado con éxito');
            } else{
                alert('Contraseña incorrecta');
            }
        });
        e.preventDefault();
        
    })
    $('#form-photo').submit(e=>{
        let formData = new FormData($('#form-photo')[0]);
        $.ajax({
            url:'../controlador/UserController.php',
            type:'POST',
            data:formData,
            cache:false,
            processData:false,
            contentType:false,
        }).done(function(response){
            const json = JSON.parse(response);
            if (json.alert=='edit') {
                $('#avatar1').attr('src',json.ruta);
                alert('Se cambio el avatar');
                $('#form-photo').trigger('reset');
            } else{
                alert('Formato no soportado');
                $('#form-photo').trigger('reset');  
            }
            
            $('#avatar2').attr('src',json.ruta);
        });
        e.preventDefault();
    })
    
})