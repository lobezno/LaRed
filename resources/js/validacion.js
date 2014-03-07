

function validarFormulario(){
	var usuario = document.getElementById('user');
	if (usuario.validity.valueMissing) {
		usuario.setCustomValidity("Te falta el usuario!");
	}

	if (nombre.value == "" || nombre.value == null) {
		nombre.setCustomValidity("Te falta el nombre!");
	};

	if (mail.value == "" || mail.value == null) {
		mail.setCustomValidity("Te falta el mail!");
	};

	if (pass.value != passb.value) {
		passb.setCustomValidity("Las contraseñas no coinciden!!");
	};
}