var validarFormulario = function(){

	var cajaUsuario = document.getElementById('user');
	var cajaPass = document.getElementById('pass');
	var cajaPassb = document.getElementById('passb');
	var cajaNombre = document.getElementById('nombre');
	var cajaMail = document.getElementById('mail');

	if (!cajaUsuario.value) {
		console.log("dentro");
		cajaUsuario.setCustomValidity("Te falta el usuario!");
	} else {
		cajaUsuario.setCustomValidity(null);
	}
	if (cajaNombre.validity.valueMissing) {
		cajaNombre.setCustomValidity("Te falta el nombre!");
	}
	if (cajaMail.validity.valueMissing) {
		cajaMail.setCustomValidity("Te falta el mail!");
	}
	if (cajaPass.value != cajaPassb.value) {
		cajaPassb.setCustomValidity("Las contraseñas no coinciden!!");
	};

	
	
}

