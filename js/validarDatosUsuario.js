function validaEmail(campo) {
             var valor = campo.value;
            if(!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(valor)) ) {
                alert("El email introducido no es v�lido.");
                document.getElementById("email").focus();
                return false;
            }
            else{
                return true;
            }
        }  
function validaPass1(campo) {
            var valor = campo.value;
            if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/.test(valor)) ) {
                alert("El contrase�a introducida no es v�lida.");
                document.getElementById("password1").focus();
                return false;
            }
            else{
                return true;
            }
        } function validaPass2() {
            var valor1 = document.getElementById("password1").value;
            var valor2 = document.getElementById("password2").value;
            if(!(valor1==valor2)) {
                alert("Las contrase�as introducidas son diferentes.");
                document.getElementById("password2").focus();
                return false;
            }
            else{
                return true;
            }
        }
function validaTelefono(campo) {
            var valor = campo.value;
            if(!(/^[0-9]{2,3}-? ?[0-9]{6,7}$/.test(valor)) ) {
                alert("El tel�fono introducido no es v�lido.");
                document.getElementById("telefono").focus();
                return false;
            }
            else{
                return true;
            }
        }
function validacion(campo) {
            var valor = campo.value;
            if( valor == null || valor.length==0 ){
                alert("El campo no puede estar vac�o");
                campo.focus();
                return false;
            }
            else{
                return true;
            }
        }   
function validarTodo(){
            var bien=true;
            var frm = document.getElementById("form1");
            for (i=0;i<frm.elements.length;i++)
            {
                if(frm.elements[i].value==""){
                    alert("Tienes que rellenar todos los campos.");
                    frm.elements[i].focus();
                    bien=false;
                    return false;
                }  
            }
            if (bien==true){
                form1.submit();
                return true;
            }
            
        }
    