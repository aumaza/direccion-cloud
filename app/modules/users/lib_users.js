// ACTUALIZAR PASSWORD
$(document).ready(function(){
    $('#update_password').click(function(e){
        
        const form = document.querySelector('#fr_update_password_ajax');
        const formData = new FormData(e.target.form);
        e.preventDefault();
        
        const id = document.querySelector('#id');
        const password_1 = document.querySelector('#pwd_1');
        const password_2 = document.querySelector('#pwd_2');
        
        //const formData = new FormData(form);
        const values = [...formData.entries()];
        console.log(values);
        
        formData.append('id', id.value);
        formData.append('password_1', password_1.value);
        formData.append('password_2', password_2.value);
        
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../modules/users/update_password.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Password Actualizado Exitosamente</p></div>`;
                    document.getElementById('messagePass').innerHTML = mensaje;
                     $('#pwd_1').val('');
                     $('#pwd_2').val('');
                    console.log(r);
                    //console.log(values);
                    setTimeout(function() { $(".close").click(); }, 4000);
                    }else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error. Hubo un problema al intentar actualizar el Password</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                        console.log(r);
                        //console.log(values);
                         $('#pwd_1').val('');
                         $('#pwd_2').val('');
                         $('#pwd_1').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                        console.log(r);
                        //console.log(formData);
                         $('#pwd_1').val('');
                         $('#pwd_2').val('');
                         $('#pwd_1').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Error de conexion dentro de la funcion principal!!</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                        console.log(r);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 13){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error de conexion!!</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                        console.log(r);
                        //console.log(values);
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 11){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Los Passwords no Coinciden!!</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                         console.log(r);
                         //console.log(values);
                         $('#pwd_1').val('');
                         $('#pwd_2').val('');
                         $('#pwd_1').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 17){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> El Password no puede tener menos ni más de 15 caracteres!!</p></div>`;
                        document.getElementById('messagePass').innerHTML = mensaje;
                         console.log(r);
                         //console.log(values);
                         $('#pwd_1').val('');
                         $('#pwd_2').val('');
                         $('#pwd_1').focus();
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
            },
            
        });

        return false;
    });
});




/*
 * * CAMBIAR PERMISOS DE USUARIOS
 */
$(document).ready(function(){
    $('#cambiar_permiso').click(function(){
        //var datos=$('#frm_user_allow').serialize();
        var datos=$('form').serialize();
        $.ajax({
            type:"POST",
            url:"../modules/users/cambiar_permiso_usuario.php",
            data:datos,
            success:function(r){
                if(r==1){
                    alert("Permiso de Usuario Cambiado Exitosamente!!");
                    console.log("Datos: " + datos);
                     window.location.reload();
                }else if(r==-1){
                    alert("Hubo un problema al intentar cambiar el Permiso de Usuario");
                }
            }
        });

        return false;
    });
});


/*
** FORMATEO DE TABLA
*/
$(document).ready(function(){
      $('#usersTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search": "Buscar:",
        "zeroRecords":    "No se encontraron registros coincidentes",
        "paginate": {
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      }
    });

  });


$(document).ready(function(e) {
  $('#modalUserAllow').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data().id;
    $(e.currentTarget).find('#bookId').val(id);
  });
});

