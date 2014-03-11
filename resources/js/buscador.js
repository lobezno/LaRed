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
        	alert(miTexto);
        }
    }

var buscar = function(){
  
    datosPost="texto="+entrada.value;
    //Objeto XMLHttpRequest creado por la función.
    objetoAjax=creaObjetoAjax();
    //Preparar el envio  con Open
    objetoAjax.open("POST","../controller/controladorUsuarios.php?action=search",true);
    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    objetoAjax.setRequestHeader("Cache-Control", "no-cache");
    objetoAjax.onreadystatechange=recogeDatos;
    objetoAjax.send(datosPost); 
}

window.onload = function(){
	var entrada = document.getElementById('entrada');
	entrada.addEventListener('input', buscar);

}