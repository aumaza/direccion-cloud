// ESTRUCTURA TABLE WORKS

 $(document).ready(function(){
      
      $('#worksTable').DataTable({
        "order": [[0, "asc"]],
        "responsive":     true,
        "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "deferRender": true,
        "dom":  "Bfrtip",
        buttons: [
            
            {
                extend: 'excel',
                text: 'Exportar Excel',
                messageTop: 'Listado de Documentos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'csv',
                text: 'Exportar CSV',
                messageTop: 'Listado de Documentos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'pdf',
                text: 'Exportar PDF',
                messageTop: 'Listado de Documentos',
                exportOptions: { columns: ':visible',}
            },
            {
                extend: 'print', 
                text: 'Imprimir',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '8pt' );
                                                
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: 'Listado de Documentos',
                autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                }
                
            },
            
              'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: true
        } ],
        "fixedColumns": true,
      "language":{
        "lengthMenu": "Display _MENU_ records",
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


// ========================================================================================================================================= //

/*
** FORMATEO DE TABLA USERS SHARE
*/
$(document).ready(function(){
      $('#userShareTable').DataTable({
      "order": [[1, "asc"]],
      "responsive": true,
      "scrollY":        "300px",
        "scrollX":        true,
        "scrollCollapse": true,
        "paging":         true,
        "fixedColumns": true,
        "deferRender": true,
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

// ========================================================================================================================================= //

// NUEVO DOCUMENTO
$(document).ready(function(){
    $('#save_work').click(function(){
        //e.preventDefault();
        const form = document.querySelector('#fr_save_work_ajax');
        
        const user_id = document.querySelector('#user_id');
        const document_name = document.querySelector('#document_name');
        const document_text = CKEDITOR.instances.editor1.getData();
        var text = document_text.toString();
    
        console.log("Texto del Documento: " + document_text);
    
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        //console.log(values);
        
        formData.append('user_id', user_id.value);
        formData.append('document_name', document_name.value);
        formData.append('editor1', text);
                
            
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../modules/works/save_document.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> El Documento ha sido guardado Exitosamente</p></div>`;
                    document.getElementById('messageDocument').innerHTML = mensaje;
                    console.log("================================================================================================================");
                    console.log("Message Code: (" +r + ") Document Save Successfully");
                    console.log(values);
                    console.log("================================================================================================================");
                    setTimeout(function() { $(".close").click(); }, 4000);
                    //window.location.href = window.location.href;
                    }else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error. Hubo un problema al intentar guardar el documento</p></div>`;
                        document.getElementById('messageDocument').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r + ") It was a problem while attemp save document");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>`;
                        document.getElementById('messageDocument').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") There is some fields empty");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Documento Existente, Cambie el Nombre del mismo!!</p></div>`;
                        document.getElementById('messageDocument').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Document Already Exists. Modified the Document Name!");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 13){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error de conexion!!</p></div>`;
                        document.getElementById('messageDocument').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Error General Conection");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 9){
                        var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tengo Datos!!</p></div>`;
                        document.getElementById('messageDocument').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Tengo Datos");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
                    
            },
            
        });

        return false;
    });
});


// ========================================================================================================================================= //

// NUEVO COMPARTICION DE DOCUMENTO
$(document).ready(function(){
    $('#share_work').click(function(){
        //e.preventDefault();
        const form = document.querySelector('#fr_share_work_ajax');
        
        const document_id = document.querySelector('#document_id');
        const share = document.querySelector('#share');
        const type_share = document.querySelector('#type_share');
        const share_user_id = document.querySelector('#share_user_id');
        
        const formData = new FormData(form);
        const values = [...formData.entries()];
        //console.log(values);
        
        formData.append('document_id', document_id.value);
        formData.append('share', share.value);
        formData.append('type_share', type_share.value);
        formData.append('share_user_id', share_user_id.value);
                
            
               
         jQuery.ajax({
            type:"POST",
            method:"POST",
            url:"../modules/works/add_shares.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success:function(r){
                if(r == 1){
                    var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> El Documento ha sido actualizado y compartido Exitosamente. Aguarde un Instante</p></div>`;
                    document.getElementById('messageDocumentShare').innerHTML = mensaje;
                    $('#type_share').val('');
                    $('#share_user_id').val('');
                    $('#share').focus();
                    console.log("================================================================================================================");
                    console.log("Message Code: (" +r + ") Document Share and update Successfully");
                    console.log(values);
                    console.log("================================================================================================================");
                    setTimeout(function() { $(".close").click(); }, 4000);
                    setTimeout(() => {
                        document.location.reload();
                    }, 3000);

                    }else if(r == -1){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error. Hubo un problema al intentar actualizar y comparir el documento</p></div>`;
                        document.getElementById('messageDocumentShare').innerHTML = mensaje;
                        $('#type_share').val('');
                        $('#share_user_id').val('');
                        $('#share').focus();
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r + ") It was a problem while attemp update and share the document");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 5){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Error, Hay campos sin completar!!</p></div>`;
                        document.getElementById('messageDocumentShare').innerHTML = mensaje;
                        $('#type_share').val('');
                        $('#share_user_id').val('');
                        $('#share').focus();
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") There is some fields empty");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 7){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Este documento ya está compartido con el usuario seleccionado!!</p></div>`;
                        document.getElementById('messageDocumentShare').innerHTML = mensaje;
                        $('#type_share').val('');
                        $('#share_user_id').val('');
                        $('#share').focus();
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Document Already share with user selected!");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 13){
                        var mensaje = `<br><div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Error de conexion!!</p></div>`;
                        document.getElementById('messageDocumentShare').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Error General Conection");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    else if(r == 9){
                        var mensaje = `<br><div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <p align=center><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tengo Datos!!</p></div>`;
                        document.getElementById('messageDocumentShare').innerHTML = mensaje;
                        console.log("================================================================================================================");
                        console.log("Message Code: (" +r+ ") Tengo Datos");
                        console.log(values);
                        console.log("================================================================================================================");
                        setTimeout(function() { $(".close").click(); }, 4000);
                    }
                    
                    
            },
            
        });

        return false;
    });
});

// ========================================================================================================================================= //

$(document).ready(function(){
    CKEDITOR.replace( 'editor1' );
});


// ========================================================================================================================================= //

