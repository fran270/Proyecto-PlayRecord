//funciones de la peticion asincrona
function objetoXHR()
{
	if (window.XMLHttpRequest)
	{
		// El navegador implementa la interfaz XHR de forma nativa
		return new XMLHttpRequest();
	} 
	else if (window.ActiveXObject)
	{
		var versionesIE = new Array('Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0',
		'Msxml2.XMLHTTP.3.0', 'Msxml2.XMLHTTP', 'Microsoft.XMLHTTP'); 
		 
		for (var i = 0; i < versionesIE.length; i++) 
		{ 
			try  
			{ 

			return new ActiveXObject(versionesIE[i]); 

			}  
			catch (errorControlado) {}//Capturamos el error,
		} 
	} 

    throw new Error("No se pudo crear el objeto XMLHttpRequest"); 

}



var crearEvento = function()
{
	function w3c_crearEvento(elemento, evento, mifuncion)
	{
		elemento.addEventListener(evento, mifuncion, false);
	}
	
	function ie_crearEvento(elemento, evento, mifuncion)
	{
		var fx = function()
		{
			mifuncion.call(elemento); 
		};
		
		
		elemento.attachEvent('on' + evento, fx);
	}

	if (typeof window.addEventListener !== 'undefined')
	{
		return w3c_crearEvento;
	}
	
	else if (typeof window.attachEvent !== 'undefined')
	{
		return ie_crearEvento;
	}
}();	


/////////////////////////////////////////////////////////
// Funcion cross-browser para modificar el contenido
// de un DIV
/////////////////////////////////////////////////////////
function textoDIV(nodo, texto)
{
	//var nodo = document.getElementById(idObjeto); 
	
	while (nodo.firstChild)
		nodo.removeChild(nodo.firstChild); // Eliminamos todos los hijos de ese objeto.
	// Cuando ya no tenga hijos, agregamos un hijo con el texto que recibe la funci�n.
	nodo.appendChild(document.createTextNode(texto)); 
}