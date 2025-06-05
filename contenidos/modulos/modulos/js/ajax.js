
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


/////////////////////////////////////////////////////////////////////
function ingresar4_var(div_respuesta,id_page, action_name, identificador){
	var t1, t2, t3, t4, contenedor, input_t1, div_respuesta, id_page, action_name, identificador;
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	t1 = document.getElementById('texto_1'+identificador).value;
	t2 = document.getElementById('texto_2'+identificador).value;
	t3 = document.getElementById('texto_3'+identificador).value;
	t4 = document.getElementById('texto_4'+identificador).value;

	contenedor.innerHTML = '<p class="text-center"><div class="spinner-border text-dark"></div></p>';
	var input_t1=document.getElementById("texto1");	
	
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id="+id_page+"&action="+action_name,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText 
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send("texto1="+t1+"&texto2="+t2+"&texto3="+t3+"&texto4="+t4+"&ident="+identificador);
	//input_t1.value="";//pone en blanco la caja de texto
} 
/////////////////////////////////////////////////////////////////////				
function mostrar_mod1(db_tabla,db_columna,db_columnaid,v_id,div_respuesta,id_page,action_name){
	var db_tabla, db_columna, db_columnaid, v_id, div_respuesta, id_page, action_name;
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	
	
	ajax=nuevoAjax();
	ajax.open("GET", "contenedor_ajax.php?id="+id_page+"&action="+action_name+"&db_tabla="+db_tabla+"&db_columna="+db_columna+"&db_columnaid="+db_columnaid+"&v_id="+v_id+"&div_respuesta="+div_respuesta+"&id_page="+id_page,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();

}

/////////////////////////////////////////////////////////////////////
function form_mod1(db_tabla,db_columna,db_columnaid,v_id,div_respuesta,id_page,input_name, action_name){
	var db_tabla, db_columna, db_columnaid, v_id, div_respuesta, id_page, input_name, action_name;
	
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	input_valor = document.getElementById(input_name).value;
	contenedor.innerHTML = '<p class="text-center"><div class="spinner-border text-dark"></div></p>';
	
	ajax=nuevoAjax();
	ajax.open("GET", "contenedor_ajax.php?id="+id_page+"&action="+action_name+"&db_tabla="+db_tabla+"&db_columna="+db_columna+"&db_columnaid="+db_columnaid+"&v_id="+v_id+"&div_respuesta="+div_respuesta+"&id_page="+id_page+"&input_name="+input_name+"&input_valor="+encodeURIComponent(input_valor),true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			contenedor.innerHTML = ajax.responseText
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send();
	//t1.value="eee";
	//document.getElementById("texto_1").value="";//pone en blanco la caja de texto
}

/////////////////////////////////////////////////////////////////////
function ing(div_respuesta,id_page, action_name, identificador, add){
	var t1, add, elementos, maximo, contenedor, numero, div_respuesta, id_page, action_name, identificador;
	maximo = 20; 
	cadena = '';
	div_respuesta=div_respuesta;
	contenedor = document.getElementById(div_respuesta);
	
	for (var i=1; i <= maximo; i++) {
	  var nombre_input ="texto_"+ i+identificador;  
	  var nombre_var="texto"+ i;
	  		if(document.getElementById(nombre_input)){
			var valor_input = document.getElementById(nombre_input).value;
						if (document.getElementById(nombre_input).checked)//si es que es un check
						{
						var valor_input = '1';
						}
			cadena = cadena+nombre_var+"="+valor_input+"&";
			
				if(add==1){
				document.getElementById(nombre_input).disabled = true;
				document.getElementById(nombre_input).value = 'Cargando ...';
				}
			}	  
   }//add 1 aumenta el div al final, no lo reemplaza y borra los inputs
   //add 11 aumenta el div al inicio, no lo reemplaza y NO borra los inputs
   //add 12 reemplaza div y NO borra los inputs
	//var combo = document.getElementById("producto");
	//var selected = combo.options[combo.selectedIndex].text;
	//-----------    Selects
	/**
	for (var i=1; i <= maximo; i++) {
	  var nombre_input ="texto_"+ i+identificador;  
	  var nombre_var="texto"+ i;
	  		if(document.getElementById(nombre_input)){
			var valor_input = document.getElementById(nombre_input).value;
			cadena = cadena+nombre_var+"="+valor_input+"&";
			}	  
   }
   */
   
	
   
   if(add==1){
	   
   }else{
	   if(add==11){
		   
	   }else{
	contenedor.innerHTML = '<p class="text-center"><div class="spinner-border text-dark"></div></p>';
	   }
   }
   
	ajax=nuevoAjax();
	ajax.open("POST", "contenedor_ajax.php?id="+id_page+"&action="+action_name,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			if(add==1){
			contenedor.innerHTML = contenedor.innerHTML+ajax.responseText;
			
			}else{
				if(add==11){
				contenedor.innerHTML = ajax.responseText+contenedor.innerHTML;
				}else{
				contenedor.innerHTML = ajax.responseText ;
				}
			}
	 	}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(cadena+"ident="+identificador);	
	
	if(add==1){//Borra los inputs
			for (var i=1; i <= maximo; i++) {
			  var nombre_input ="texto_"+ i+identificador;  
			  var nombre_var="texto"+ i;
					if(document.getElementById(nombre_input)){
					
					document.getElementById(nombre_input).disabled = false;
					document.getElementById(nombre_input).value = '';
					}	  
		   }
	}

}
/////////////////////////////////////////////////////////////////////				
function show(bloq) {
obj = document.getElementById(bloq);
obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
}
/////////////////////////////////////////////////////////////////////	 parseFloat			
