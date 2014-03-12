function creaObjetoAjax () { 
     var xhr;
     if (window.XMLHttpRequest) {
        xhr=new XMLHttpRequest();
        }
     else { 
        xhr=new ActiveXObject(Microsoft.XMLHTTP);
        }
     return xhr;
     }

function recogeDatos() {
    if (objetoAjax.readyState==4 && objetoAjax.status==200) {
        miTexto=objetoAjax.responseText;
        //alert(miTexto);
        console.log("DEBUG: " + miTexto);

            // if (!miTexto) {
            //     alert("Solo un like por persona! No seas avaricioso ;)");
            // }else{
            //     console.log("dentro");
           
               document.write(miTexto);
            // }
        	
        }
    }

function meGusta(idusuario,idpost) {
    datosPost="id="+idpost+"&idusuario="+idusuario;
    //Objeto XMLHttpRequest creado por la función.
    objetoAjax=creaObjetoAjax();
    //Preparar el envio  con Open
    objetoAjax.open("POST","../controller/controladorPosts.php?action=like",true);
    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    objetoAjax.setRequestHeader("Cache-Control", "no-cache");
    objetoAjax.onreadystatechange=recogeDatos;
    objetoAjax.send(datosPost); 
    
}

