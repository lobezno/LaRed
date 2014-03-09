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

	if (user.value == "" || user == null) {
		console.log("Te falta el user");
	}else if (pass.value == "" || pass == null) {
			console.log("Te falta la pass");
	}else{
		console.log("TODO OK :)");
		login();
	}

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
	objetoAjax.open("POST","../controller/controladorUsuarios.php?action=login",true);
	objetoAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	objetoAjax.onreadystatechange=retorno;
	objetoAjax.send(datosPost); 
   }


window.onload = function(){
	var user = document.getElementById('user');
	var pass = document.getElementById('pass');
}