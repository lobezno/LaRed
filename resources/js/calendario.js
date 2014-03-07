	
	var divContenedorCalendario;
	var divCalendario;
	var hoy = new Date();
	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	var diasMes = [31,28,31,30,31,30,31,31,30,31,30,31];
	var diasSemana = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
	var diaNum = hoy.getDay();
	var mesNum = hoy.getMonth();
	var anoNum = hoy.getFullYear();
	var diaPostit;

function sumaMes(){
	if (mesNum < 11) {
 		mesNum ++;
 		pinta();
	}else{
		mesNum = 0;
		anoNum++;
 		pinta();
	}
}

function restaMes(){
	if (mesNum > 0) {
 		mesNum --
 		pinta();
	}else{
		mesNum = 11;
		anoNum--;
 		pinta();
	}
}

function verCita(dia){
	var elemento = document.getElementById(dia);
	var postit = document.getElementById('postit');
	var dayStorage = localStorage.getItem(dia);
	
	if (dayStorage) {
		//elemento.className = "diaConEvento";
		postit.textContent = dayStorage;
	}else{
		postit.textContent = dia;
	}

	
	postit.className = "postit_visible";
}

function editarCita(dia){
	var elemento = document.getElementById(dia);
	var postit = document.getElementById('postit');
	diaPostit = dia;
	var textoPostit =  document.createElement('input');
	textoPostit.setAttribute('type','text');
	textoPostit.setAttribute('id','textoPostit');
	postit.appendChild(textoPostit);
	var botonPostit =  document.createElement('input');
	botonPostit.setAttribute('type','button');
	botonPostit.setAttribute('value','Guardar');
	botonPostit.addEventListener('click',guardarPostit,false);
	postit.appendChild(botonPostit);
	postit.className = "postit_visible";
	elemento.removeEventListener('mouseleave',oculta,false);
}

var oculta = function() {
	//var elemento = document.getElementById(dia);
	var postit = document.getElementById('postit');
	postit.className = "postit_oculto";
}

var guardarPostit = function(){

	var texto = document.getElementById('textoPostit').value;
	console.log("Texto del postit: " + texto);
	localStorage.setItem(diaPostit,texto);
	document.getElementById('textoPostit').value = "";
	oculta();
}


var pinta = function(){
	var contaDias = 0;
	if(calendario) divContenedorCalendario.innerHTML = "";
	console.log("Mesnum:" + mesNum + "\nanoNum: " + anoNum);
	console.log("Dias mes: "+diasMes[mesNum]);

	var dateAux = new Date; 
	dateAux.setYear(anoNum)
	
	dateAux.setMonth(mesNum);

	dateAux.setDate(1);


	var botonera = document.createElement('div');
	console.log("Dia inicio: " + dateAux.getDay());
	var botonera = document.createElement('div');
	botonera.className = "botonera_calendario";
	var botonMenos = document.createElement('button');
	var textoBotonMenos = document.createTextNode("<");
	botonMenos.setAttribute('onclick','javascript:restaMes();');
	botonMenos.appendChild(textoBotonMenos);
	botonera.appendChild(botonMenos);
	var botonMedio = document.createElement('button');
	var textoBotonMedio = document.createTextNode(meses[mesNum] + " de " + anoNum);
	botonMedio.appendChild(textoBotonMedio);
	botonera.appendChild(botonMedio);
	var botonMas = document.createElement('button');
	var textoBotonMas = document.createTextNode(">");
	botonMas.setAttribute('onclick','javascript:sumaMes();');
	botonMas.appendChild(textoBotonMas);
	botonera.appendChild(botonMas);
	divContenedorCalendario.appendChild(botonera);
	
	for (var i = 0; i < 7; i++) {
		for (var j = 0; j < 7; j++) {
			var nodo = document.createElement('div');
			nodo.className = "caja_calendario";
			if (i < 1) {
				nodo.className = "caja_calendario_headers";
				var texto = document.createTextNode(diasSemana[j]);
			}else if (i==1 && j == dateAux.getDay() - 1) {
				 contaDias = 1;
				var texto = document.createTextNode(contaDias);
			}else if (i==1 && j < dateAux.getDay() || contaDias >= diasMes[mesNum]) {
				var texto = document.createTextNode("");
				nodo.className = "caja_calendario_hidden";
			}else{
				contaDias++;
				var texto = document.createTextNode(contaDias);
				diaFormateado = contaDias + "-" + (dateAux.getMonth() + 1) + "-" + dateAux.getFullYear();
			nodo.setAttribute('id',diaFormateado);
			nodo.addEventListener('click',function(){ editarCita(this.getAttribute('id')) });
			nodo.addEventListener('mouseenter',function(){ verCita(this.getAttribute('id')) });
			nodo.addEventListener('mouseleave',oculta,false);

			}

			nodo.appendChild(texto);
			divContenedorCalendario.appendChild(nodo);
		};
		var nodo2 = document.createElement('br');
		divContenedorCalendario.appendChild(nodo2);	
	};
}

window.onload = function(){
	divContenedorCalendario = document.getElementById('contenedor_calendario');
	divCalendario = document.getElementById('calendario');
	pinta();
}

