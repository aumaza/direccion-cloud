/*
** FUNCION QUE BLOQUEA EL BOTON BACK DEL NAVEGADOR
*/
function nobackbutton(){

    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    
    window.onhashchange = function(){
        window.location.hash = "no-back-button";
    }
    
}

/*
** CALL EXPLORER
**  Funcion que llama a Explorer en ventana independiente
*/
function callExplorer(){
    
    let params = `scrollbars=yes,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1300,height=550,left=200,top=200`;
    
    open("../modules/explorer/index.php", "explorer", params);
 
}