var validarFormulario = function(){

	var cajaUsuario = document.getElementById('user');
	var cajaPass = document.getElementById('pass');
	var cajaPassb = document.getElementById('passb');
	var cajaNombre = document.getElementById('nombre');
	var cajaMail = document.getElementById('mail');

	if (!cajaUsuario.value) {
		cajaUsuario.setCustomValidity("Te falta el usuario!");
	} else {
		cajaUsuario.setCustomValidity("");
	}

	if (!cajaPass.value) {
		cajaPass.setCustomValidity("Te falta la contraseña!");
	}else{
		cajaPass.setCustomValidity("");
	}


	if (cajaPass.value != cajaPassb.value) {
		cajaPassb.setCustomValidity("Las contraseñas no coinciden!!");
	}else{
		cajaPassb.setCustomValidity("");
	}

	if (!cajaNombre.value) {
		cajaNombre.setCustomValidity("Te falta el nombre!");
	}else{
		cajaNombre.setCustomValidity("");
	}


	if (!cajaMail.value) {
		cajaMail.setCustomValidity("Te falta el e-mail!");
	}else{
		cajaMail.setCustomValidity("");
	}
	
	
}

