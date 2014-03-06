	
	var divContenedorCalendario;
	var divCalendario;
	var hoy = new Date();
	var meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
	var diasMes = [31,28,31,30,31,30,31,31,30,31,30,31];
	var diasSemana = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
	var diaNum = hoy.getDay();
	var mesNum = hoy.getMonth();
	var anoNum = hoy.getFullYear();

function sigueme(e) {
    var x = (document.layers || !document.all)? e.pageX : event.x+document.body.scrollLeft;
    var y = (document.layers || !document.all)? e.pageY : event.y+document.body.scrollTop;
    var x2 = x + 10;
    var y2 = y + 10;
    
    document.getElementById('siguelo').style.left=x2+'px';
    document.getElementById('siguelo').style.top=y2+'px';
    
    return true
}

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
	//var elemento = document.getElementById(dia);
	alert("Raton: " + );
}

function editarCita(dia){
	//var elemento = document.getElementById(dia);
	alert("editarCita: " + dia);
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
			nodo.addEventListener('mouseover',function(){ verCita(this.getAttribute('id')) });

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

