$(document).ready(function(){
    buscar_datos();
    var funcion;
    function buscar_datos(consulta) {
        funcion='buscar_usuarios_adm';
        $.post('../controlador/UserController.php',{consulta,funcion},(response)=>{
            const usuarios = JSON.parse(response);
            let template='';
            usuarios.forEach(usuario=>{
                template+=`
                <tr>
                    <td class="">${usuario}</td>
                    <td class="text-center">${usuario.nombre}</td>
                    <td class=""><div><img src="${usuario.avatar}" class="image-circle img-fluid" alt="Avatar"></div></td>
                    location.reload();
                    console.log('Ruta de la imagen: ' + usuario.avatar);

                    <td class="">${usuario.correo}</td>
                    <td class="">${usuario.dni}</td>
                    <td class="text-center td-sm badge badge-success">${usuario.tipo}</td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#dnicontra" href="#"><i class="fas fa-pencil-alt"></i> Editar</a>
                      <a id="drop" class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash"></i> Eliminar</a>
                    </td>
                </tr>             
                `;
            }) 
            $('#usuarios').html(template);
        });
    }
    $(document).on('keyup','#buscar',function(){
        let valor = $(this).val();
        if (valor!="") {
            buscar_datos(valor);
        }
        else{
            buscar_datos();
        }
    })
})