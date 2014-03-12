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



function validarLogin(){
	var user = document.getElementById('user');
	if (user.value == "") {
		console.log("Te falta el usuario!");
		user.setCustomValidity("Te falta el usuario!");
	} else {
		console.log("");
		user.setCustomValidity("");
	}
	login();


}

function retorno() {
    if (objetoAjax.readyState==4 && objetoAjax.status==200) {
        miTexto=objetoAjax.responseText;
        	document.write(miTexto);
        }
    }

function login(){
	
	var user= document.getElementById('user').value; //
	var pass=document.getElementById('pass').value; //
	
	datosPost="user="+user+"&pass="+pass;
	objetoAjax=creaObjetoAjax();
	objetoAjax.open("POST","../controller/controladorUsuarios.php?action=login",false);
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.onreadystatechange=retorno;
	objetoAjax.send(datosPost); 
   }


window.onload = function(){
	var user = document.getElementById('user');
	var pass = document.getElementById('pass');
}