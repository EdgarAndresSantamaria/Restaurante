function validacion(campo) {
                       var valor = campo.value;
                       if( valor == null || valor.length==0 ){
                           alert("El campo no puede estar vacío");
                           campo.focus();
                           return false;
                       }
                       return true;
                   }
function validacionLista(campo) {
                        var valor = campo.value;
                        if( valor == null || valor == 0 || valor == "0"){
                            alert("El campo tiene que tener una opción seleccionada");
                            campo.focus();
                            return false;
                        }
                        return true;
                    }
function validacionHora(campo) {
                        var valor = campo.value;
                        if( valor == null || valor == 99 ){
                            alert("El campo tiene que tener una opción seleccionada");
                            campo.focus();
                            return false;
                        }
                        return true;
                    }
function validarTodo(){
            var bien=true;
            var frm = document.getElementById("form1");
            for (var i=0;i<frm.elements.length;i++)
            { 
                if(frm.elements[i].value=="" || frm.elements[i].value==99){
                    bien=false;
                    alert("Tienes que rellenar todos los campos.");
                    frm.elements[i].focus();
                    return false;
                }  
            }
            if(bien==true){
                form1.submit();
                return true;
            }
            
        }
function mostrarDias(dias){
    var dias28 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28');
    var dias31 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
    var dias30 = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30');
    
    var i = document.form1.mes.selectedIndex;
    
    var x = document.getElementById("dia");
    //Borrar lista
    for(var k=0;k<=31;k++){
       x.remove(x[k]);        
    }
   
    switch(i){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            var eleccion= dias31;
            //rellenar lista
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.value = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            break;
        case 2:
            var eleccion= dias28;
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.text = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            var eleccion= dias30;
            for(var j=0;j<eleccion.length;j++){
                    var opcion = document.createElement("option");
                    if(j<9){
                        opcion.text = "0"+eleccion[j];
                        opcion.text = "0"+eleccion[j];
                    }
                    else{
                        opcion.text = eleccion[j];
                        opcion.value = eleccion[j];
                    }
                    x.add(opcion,x[j]);

            }
            break;
        case 0:
                    var opcion = document.createElement("option");
                    opcion.text = "Dia";
                    opcion.value = "0";
                    x.add(opcion);

               break;
        default:
            document.write("Se ha producido un error en el listado para la fecha");
            break;
    }
    document.form1.dia.selectedIndex=dias-1;
} 