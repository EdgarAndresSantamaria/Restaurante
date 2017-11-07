//<!-- Begin Script
// les damos 120 días de vida a las cookies
var validez = 120;
var caduca = new Date(); 
caduca.setTime(caduca.getTime() + (validez*24*60*60*1000));

function getCookie(name){
  var cname = name + "=";               
  var dc = document.cookie;             
  if (dc.length > 0) {              
    begin = dc.indexOf(cname);       
    if (begin != -1) {           
      begin += cname.length;       
      end = dc.indexOf(";", begin);
      if (end == -1) end = dc.length;
        return unescape(dc.substring(begin, end));
    } 
  }
  return null;
}

function setCookie(name, value, expires, path, domain, secure) {
  document.cookie = name + "=" + escape(value) + 
  ((expires == null) ? "" : "; expires=" + expires.toGMTString()) +
  ((path == null) ? "" : "; path=" + path) +
  ((domain == null) ? "" : "; domain=" + domain) +
  ((secure == null) ? "" : "; secure");
}


function Bienvenido(info){
  //Quién eres?
    var Visitante = getCookie('Visitante');
    if (Visitante == null) {
      Visitante = prompt("¿Puedes darme tu nombre?", "Amigo");
      setCookie ('Visitante ', Visitante, caduca);
    }
  return Visitante;
}


function cambiaNombre() {
  var validez = 120; /* 120 dias */
  var caduca = new Date(); 
  caduca.setTime(caduca.getTime() + (validez*24*60*60*1000));
  var Visitante = prompt("¿Puedes darme tu nombre?", "Amigo");
    setCookie ('Visitante ', Visitante, caduca);
}


function Contador(info){
	// Cuántas veces
	var cuenta = getCookie('Veces');
	if ( cuenta== null) {
		cuenta = 0;
	}
	else{
		cuenta++;
	}
	setCookie ('Veces', cuenta, caduca);
	return cuenta+1;
}



function CuandoOriginal(info){
	// Cuándo me visitas
	var ahora = new Date();
	var tiempo = 0;
	tiempo = getCookie('Cuando');
	tiempo = tiempo * 1;
	var ultimaVezFormateado = new Date(tiempo);  // pasa de número a fecha
	var intLastVisit = (ultimaVezFormateado.getYear() * 10000)+(ultimaVezFormateado.getMonth() * 100) + ultimaVezFormateado.getDate();
	var ultimaVezEnFecha = "" + ultimaVezFormateado;  // se usan funciones substring
	var diaSemana = ultimaVezEnFecha.substring(0,3);
	var fechaMes = ultimaVezEnFecha.substring(4,11);
	var horaDia = ultimaVezEnFecha.substring(11,16);
	var anio = ultimaVezEnFecha.substring(23,25);
	var texto = diaSemana + ", " + fechaMes + " a las " +horaDia;// lo muestra
	setCookie ("Cuando", ahora.getTime(), caduca);
	return texto;
}


function Cuando(info){
	// Cuándo me visitas
	var ahora = new Date();
	var tiempo = 0;
	
	// leer el valor del coockie
	tiempo = getCookie('Cuando'); 
	tiempo = tiempo * 1; // para convertir en numero
	
	// escribir el nuevo valor del coockie
	setCookie ("Cuando", ahora.getTime(), caduca); 
	
	// formatear la salida, la fecha al castellano
	var ultimaVez = new Date(tiempo);  // pasa de número a fecha
	var texto=FechaEnCastellano(ultimaVez);
	return texto;
}



// --------------------------------------------------------------
// funciones para formatear una fecha al castellano 
// --------------------------------------------------------------
         

// carga una matriz (array) con valores
function Item(){
     this.length = Item.arguments.length; 
     for (var i = 0; i < this.length; i++)
     this[i] = Item.arguments[i];
}


//-------------------------------------------------------------
// recibe una fecha (21/01/2004 21:21)
// devuelve  -- Miercoles, 21 de Enero de 2004 a las 12:31.
//-------------------------------------------------------------
function FechaEnCastellano(pfecha){
   var ndia = new Item('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
   var nmes = new Item('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
   //var fecha = new Date(document.lastModified);
   var fecha = new Date(pfecha);
   var dia=fecha.getDate(fecha);
   var diaSemana = fecha.getDay(fecha); //  0=Domingo, 1=lunes, etc
   var mes=fecha.getMonth(fecha);
   var anyo=fecha.getYear(fecha);
	 
	 var Hora=fecha.getHours(fecha);
   var Minutos=fecha.getMinutes(fecha);

   var anyoCorregido;
   var FechaSalida;
   if (anyo<10) {
        anyoCorregido = "200" + eval(anyo);
      }
      else if (anyo<=99) {
           // ano tiene 2 dígitos 20xx (menor de 80)
           anyoCorregido = "20" + anyo;
      }
      else if (anyo<1000) {
            // ano tiene 3 dígitos (100 es 2000)
           anyoCorregido = eval(anyo) + eval(1900);
      }
      else {// anyo tiene 4 dígitos
           anyoCorregido = anyo;
      }
  
   //FechaSalida=" "+dia+" / "+mes+" / "+ anyoCorregido +" "
   FechaSalida= ndia[diaSemana ] + ", " + dia + " de " + nmes[mes] + " de " + anyoCorregido + " a las " +  Hora + ":" + Minutos;
   //document.write(FechaSalida)
   return FechaSalida;
   //document.write(" "+dia+" / "+mes+" / "+ anyoCorregido +" ")
} 






//  End Script -->