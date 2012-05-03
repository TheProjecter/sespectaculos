function muestra_oculta(id){
	if (document.getElementById){ //se obtiene el id
	var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
	el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
	}
	}
	window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
	muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
	}

	
function funcion1a(){
	
	muestra_oculta('tabla2');
			
}	

function vacio(q) {  
    for ( i = 0; i < q.length; i++ ) {  
            if ( q.charAt(i) != " " ) {  
                    return true ; 
            }  
    }  
    return false;  
} 

function passwordLevel (p){
	l = 0;
	v1 = 'aeiou1234567890';
	v2 = 'AEIOUbcdfghjklmnpqrst';
	v3 = 'vxyzBCDFGHJKLMNPQRST';
	v4 = 'VXYZ$@#';
	for (i = 0; i < p.length; i++){
	if (v1.indexOf(p[i]) != -1) l += 1;
	else if (v2.indexOf(p[i]) != -1) l += 2;
	else if (v3.indexOf(p[i]) != -1) l += 3;
	else if (v4.indexOf(p[i]) != -1) l += 4;
	else l += 5;
	}
	l *= 3;
	if(l > 100)l = 100;
	return l;
	}

function valida(F) {
	
	var p1 = F.contrasenha.value;
	var p2 = F.pass.value;
	
    if( vacio(F.usuario.value) == false ) {  
            alert("El campo usuario no puede ser vacio.") ; 
            return false;
    }
    if (F.usuario.value.length < 4) {
		alert("Escriba por lo menos 4 caracteres en el campo.");
		F.usuario.focus();
		return false;
	}    
    if( vacio(F.contrasenha.value) == false ) {  
        alert("El campo contrasenha no puede ser vacio.") ; 
        return false;
    }
    if (F.contrasenha.value.length < 6) {
		alert("Escriba por lo menos 6 caracteres en el campo.");
		F.contrasenha.focus();
		return false;
	}
    if( vacio(F.pass.value) == false ) {  
        alert("El campo contrasenha no puede ser vacio.") ; 
        return false;
    }
    if (F.pass.value.length < 6) {
		alert("Escriba por lo menos 6 caracteres en el campo.");
		F.contrasenha.focus();
		return false;
	}
    if (p1 != p2) {
    	  alert("Las passwords deben de coincidir");
    	  return false;
	}
    if( vacio(F.email.value) == false ) {  
        alert("El campo email no puede ser vacio.") ; 
        return false;
    }
    if((F.email.value.indexOf ('@', 0) == -1)||(F.email.value.length < 5)){
    	alert("Escriba una direccion de correo valida en el campo.");
    	F.email.focus();
    	return false;
   	}
    if( vacio(F.nombre.value) == false ) {  
        alert("El campo nombre no puede ser vacio.") ; 
        return false;
    }
    if( vacio(F.dni.value) == false ) {  
        alert("El campo dni no puede ser vacio.") ; 
        return false;
    }
    if( vacio(F.telefono.value) == false ) {  
        alert("El campo telefono no puede ser vacio.") ; 
        return false;
    }
    if( vacio(F.direccion.value) == false ) {  
        alert("El campo direccion no puede ser vacio.") ; 
        return false;
    }
    if (passwordLevel(F.contrasenha.value) < 20){ 
    	alert('La contrasenha es demasiado simple'); 
    	return false; 
	}else {  
            alert("Los datos se introduciran correctamente");
            return true;
    }      
    
} 

// select asociados

function elijo_espectaculo(){
	var espectaculo=new Array("Opera","Tragedia","Comedia","Entremes","Drama","Sainete","Auto Sacramental", "Farsa", "Zarzuela", "Opereta","Revista"); 
	var espectaculo1=new Array(" ","Liga","Copa","Uefa","Champions League","Selecciones","Amistoso");
	//tomo el valor del select del pais elegido 
   	var pais ;
   	pais = document.form1.tipos.value ;
   	
   	//miro a ver si el espectaculo está definido 
   	if (pais == "Futbol" ) { 
   		
     	 //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
     	 //selecciono el array de provincia adecuado 
     	 mis_provincias=eval("espectaculo1") ;
     	 //calculo el numero de provincias 
     	 num_provincias = mis_provincias.length ;
     	 //marco el número de provincias en el select 
     	 document.form1.genero.length = num_provincias ;
     	 //para cada provincia del array, la introduzco en el select 
     	 for(i=0;i<num_provincias;i++){ 
        	 document.form1.genero.options[i].value=mis_provincias[i]; 
        	 document.form1.genero.options[i].text=mis_provincias[i]; 
     	 }
   	}else{
   	if (pais == "Teatro" ) { 
   		
      	 //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
      	 //selecciono el array de provincia adecuado 
      	 mis_provincias=eval("espectaculo") ;
      	 //calculo el numero de provincias 
      	 num_provincias = mis_provincias.length ;
      	 //marco el número de provincias en el select 
      	 document.form1.genero.length = num_provincias ;
      	 //para cada provincia del array, la introduzco en el select 
      	 for(i=0;i<num_provincias;i++){ 
         	 document.form1.genero.options[i].value=mis_provincias[i]; 
         	 document.form1.genero.options[i].text=mis_provincias[i]; 
      	 }
   	
   	}else{ 
      	 //si no había provincia seleccionada, elimino las provincias del select 
      	 document.form1.genero.length = 1 ;
      	 //coloco un guión en la única opción que he dejado 
      	 document.form1.genero.options[0].value = " " ;
      	 document.form1.genero.options[0].text = " " ;
   	} 
   	//marco como seleccionada la opción primera de provincia 
   	document.f1.genero.options[0].selected = true ;
}}

