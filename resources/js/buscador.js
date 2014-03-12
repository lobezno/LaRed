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

function devuelveBusqueda() {
    if (objetoAjax.readyState==4 && objetoAjax.status==200) {
        var foo = JSON.parse(objetoAjax.responseText);
        var dataList = document.getElementById('buscaUsuarios');
        if (foo.length > 0) {
            for (var i = 0; i < foo.length; i++) {
                var nodo = document.createElement('option');
                
                nodo.setAttribute('value',foo[i]['usuario']);
                dataList.appendChild(nodo);
            };    
        }else{
            var nodo = document.createElement('option');
                nodo.setAttribute('value','No hay usuarios con ese nombre :(');
                dataList.appendChild(nodo);
        }
        
        
        	
        }
    }


    function visitarUsuario(user){

        //window.location = user.value+".php";
    }

var buscar = function(){
    document.getElementById('buscaUsuarios').innerHTML = "";
    datosPost="texto="+entrada.value;
    //Objeto XMLHttpRequest creado por la función.
    objetoAjax=creaObjetoAjax();
    //Preparar el envio  con Open
    objetoAjax.open("POST","../controller/controladorUsuarios.php?action=search",true);
    objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    objetoAjax.setRequestHeader("Cache-Control", "no-cache");
    objetoAjax.onreadystatechange=devuelveBusqueda;
    objetoAjax.send(datosPost); 
}

window.onload = function(){
	var entrada = document.getElementById('entrada');
	entrada.addEventListener('input', buscar);

}