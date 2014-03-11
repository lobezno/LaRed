//función creación del objeto XMLHttpRequest. 
function creaObjetoAjax () { 
	//Mayoría de navegadores
     var xhr;
     if (window.XMLHttpRequest) {
        xhr=new XMLHttpRequest();
        }
     else { //para IE 5 y IE 6
        xhr=new ActiveXObject(Microsoft.XMLHTTP);
        }
     return xhr;
     }



function enviar() {

	//Recoger datos del formulario:
	var idusuario= document.getElementById('user').value; //
	var texto=document.getElementById('post').value; //
	var imagen =document.getElementById('imagen');

	var formData = new FormData();
      /* Add the file */ 
     formData.append("imagen", imagen.files[0]);
     formData.append("user", idusuario);
     formData.append("post", texto);

	//datos para el envio por POST:
	datosPost="user="+idusuario+"&post="+texto+formData;

	datosPost = formData;
	
	//Objeto XMLHttpRequest creado por la función.
	objetoAjax=creaObjetoAjax();
	//Preparar el envio  con Open
	objetoAjax.open("POST","../controller/controladorPosts.php?action=send",true);
	//Enviar cabeceras para que acepte POST:
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.setRequestHeader("Cache-Control", "no-cache");
	

	objetoAjax.setRequestHeader("X-File-Name", 'imagen');
	objetoAjax.setRequestHeader("X-File-Size", imagen.fileSize);
	objetoAjax.setRequestHeader("Content-Type", "multipart/form-data");
	objetoAjax.onreadystatechange=recogeDatos;
	objetoAjax.send(datosPost); //pasar datos como parámetro
	console.log("Salida de enviar: " + datosPost);
		alert("aqui");
   }


