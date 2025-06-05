function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}



///////////////////////////////////////////////////////////////////////////
function ing_nombre_modulo(){
	var t1, contenedor, input_t1;
	contenedor = document.getElementById('respuesta_ing_nombre_modulo');
	t1 = document.getElementById('nombre_modulo').value;
	
	var input_t1=document.getElementById("nombre_modulo");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id=ing_modulo_colegiopro&action=ing_nombre",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("nombre_modulo="+t1);
	input_t1.value="";//pone en blanco la caja de texto
}
////////////////////////////////////////////////////////////////////////////////////////////////
function ing_nombre_modulo_panel(){
	var t1, contenedor, input_t1;
	contenedor = document.getElementById('respuesta_ing_nombre_modulo');
	t1 = document.getElementById('nombre_modulo').value;
	
	var input_t1=document.getElementById("nombre_modulo");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id=ing_modulo&action=ing_nombre",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("nombre_modulo="+t1);
	input_t1.value="";//pone en blanco la caja de texto
}
////////////////////////////////////////////////////////////////////////////////////////////////
function cargarContenido(){
	var t1, t2, t3, t4, t5, contenedor, input_t1;
	contenedor = document.getElementById('contenedor');
	t1 = document.getElementById('id_modulo').value;
	t2 = document.getElementById('titulo_modulo').value;
	t3 = document.getElementById('archivo_modulo').value;
	t4 = document.getElementById('head_modulo').value;
	t5 = document.getElementById('moduloid').value;
	
	var input_t1=document.getElementById("id_modulo");
	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id=ing_modulo&action=ing",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("modulo_id="+t1+"&modulo_titulo="+t2+"&modulo_archivo="+t3+"&modulo_head="+t4+"&moduloid="+t5);
	input_t1.value="";//pone en blanco la caja de texto

}

/////////////////////////////////////////////////////////////////////
function ingresar5(div_respuesta,id_page,action_name){
	var t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, contenedor, input_t1, div_respuesta, id_page, action_name;
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	t1 = document.getElementById('texto_1').value;
	t2 = document.getElementById('texto_2').value;
	t3 = document.getElementById('texto_3').value;
	t4 = document.getElementById('texto_4').value;
	t5 = document.getElementById('texto_5').value;
	//t6 = document.getElementById('texto_6').value;
	//t7 = document.getElementById('texto_7').value;
	//t8 = document.getElementById('texto_8').value;
	//t9 = document.getElementById('texto_9').value;
	//t10 = document.getElementById('texto_10').value;
	//t11 = document.getElementById('texto_11').value;
	//t12 = document.getElementById('texto_12').value;
	
	var input_t1=document.getElementById("texto1");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id="+id_page+"&action="+action_name,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("texto1="+t1+"&texto2="+t2+"&texto3="+t3+"&texto4="+t4+"&texto5="+encodeURIComponent(t5)+"&texto6="+t6+"&texto7="+t7+"&texto8="+t8+"&texto9="+t9+"&texto10="+t10+"&texto11="+t11+"&texto12="+t12);
	//t1.value="eee";
	//document.getElementById("texto_1").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_2").value="";//pone en blanco la caja de texto
	document.getElementById("texto_3").value="";//pone en blanco la caja de texto
	document.getElementById("texto_4").value="";//pone en blanco la caja de texto
	document.getElementById("texto_5").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_6").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_7").value="";//pone en blanco la caja de texto
}
///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
function ingresar6(div_respuesta,id_page,action_name){
	var t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, contenedor, input_t1, div_respuesta, id_page, action_name;
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	t1 = document.getElementById('texto_1').value;
	t2 = document.getElementById('texto_2').value;
	t3 = document.getElementById('texto_3').value;
	t4 = document.getElementById('texto_4').value;
	t5 = document.getElementById('texto_5').value;
	t6 = document.getElementById('texto_6').value;
	//t7 = document.getElementById('texto_7').value;
	//t8 = document.getElementById('texto_8').value;
	//t9 = document.getElementById('texto_9').value;
	//t10 = document.getElementById('texto_10').value;
	//t11 = document.getElementById('texto_11').value;
	//t12 = document.getElementById('texto_12').value;
	
	var input_t1=document.getElementById("texto1");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id="+id_page+"&action="+action_name,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("texto1="+t1+"&texto2="+t2+"&texto3="+t3+"&texto4="+t4+"&texto5="+encodeURIComponent(t5)+"&texto6="+t6+"&texto7="+t7+"&texto8="+t8+"&texto9="+t9+"&texto10="+t10+"&texto11="+t11+"&texto12="+t12);
	//t1.value="eee";
	//document.getElementById("texto_1").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_2").value="";//pone en blanco la caja de texto
	document.getElementById("texto_3").value="";//pone en blanco la caja de texto
	document.getElementById("texto_4").value="";//pone en blanco la caja de texto
	document.getElementById("texto_5").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_6").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_7").value="";//pone en blanco la caja de texto
}
///////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
function eliminar_item(div_respuesta,id_page,action_name,valor){
	var t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, valor, contenedor, input_t1, div_respuesta, id_page, action_name;
	div_respuesta=div_respuesta;
	valor=valor;
	contenedor = document.getElementById(div_respuesta);
	//t1 = document.getElementById('texto_1').value;
	//t2 = document.getElementById('texto_2').value;
	//t3 = document.getElementById('texto_3').value;
	//t4 = document.getElementById('texto_4').value;
	//t5 = document.getElementById('texto_5').value;
	//t6 = document.getElementById('texto_6').value;
	//t7 = document.getElementById('texto_7').value;
	//t8 = document.getElementById('texto_8').value;
	//t9 = document.getElementById('texto_9').value;
	//t10 = document.getElementById('texto_10').value;
	//t11 = document.getElementById('texto_11').value;
	//t12 = document.getElementById('texto_12').value;
	
	var input_t1=document.getElementById("texto1");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id="+id_page+"&action="+action_name,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("valor="+valor);
	//t1.value="eee";
	//document.getElementById("texto_1").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_2").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_3").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_4").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_5").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_6").value="";//pone en blanco la caja de texto
	//document.getElementById("texto_7").value="";//pone en blanco la caja de texto
}
///////////////////////////////////////////////////////////////////////////////////////////////