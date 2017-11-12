function validacion(campo) {
            var valor = campo.value;
            if( valor == null || valor.length==0 ){
                alert("El campo no puede estar vacío");
                campo.focus();
                return false;
            }
            return true;
        }
function validacionEntero(campo) {
            var valor = campo.value;
            if( !(/^[0-9]{1,5}(\.[0-9]{0,2})?$/.test(valor))){
                alert("El precio introducido no es valido. Los decimales se representan con puntos.");
                campo.value="";
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
function validarTodo(){ 
            var bien=true;
            var frm = document.getElementById("form1");
            for (var i=0;i<frm.elements.length;i++)
            { 
                if(frm.elements[i].value=="" || frm.elements[i].value==0){
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
