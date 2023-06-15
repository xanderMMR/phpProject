
$(document).ready(function() {
        
        
    $("#buttonRecuperar").click(function(){
        
        cleanControlsRecuperar();
        
        var correo = $("#correoRegistrado").val().trim();
        
        if(correo===""){
         
            $("#correoRegistrado").css("border-color","red");
            $("#l_correoRegistrado").html("Debe completar este campo");
            $("#l_correoRegistrado").show();
           
        }
        else{
         
            document.getElementById("buttonRecuperar").style.display='none';
         
            $("#divlogin").load( "../src/controller/login.php", 
                { recuperar_clave: '1',
                  correo: correo 
                } 
            );
    
        }
        
    });    
        
        
    $("#buttonRegister").click(function(){
        
        cleanControls();
        
        var nom = $("#nombre").val().trim();
        var pat = $("#paterno").val().trim();
        var mat = $("#materno").val().trim();
        var dni = $("#dni").val().trim();
        var cor = $("#correo").val().trim();
        var cla = $("#clave").val().trim();
        var mun = $("#municipalidad").val().trim();
        var otro = "-";
        if(mun==="-2"){
            otro = $("#otro").val().trim();
        }
        
        var error=0;
        if(nom===""){
            $("#nombre").css("border-color","red");
            $("#l_nombre").html("Este campo es obligatorio");
            $("#l_nombre").show();
            error++;
        }
        if(pat===""){
            $("#paterno").css("border-color","red");
            $("#l_paterno").html("Este campo es obligatorio");
            $("#l_paterno").show();
            error++;
        }
        if(mat===""){
            $("#materno").css("border-color","red");
            $("#l_materno").html("Este campo es obligatorio");
            $("#l_materno").show();
            error++;
        }
        if(dni===""){
            $("#dni").css("border-color","red");
            $("#l_dni").html("Este campo es obligatorio");
            $("#l_dni").show();
            error++;
        }
        else{
            if(dni.length!==8){
                $("#dni").css("border-color","red");
                $("#l_dni").html("El DNI debe tener 8 dígitos");
                $("#l_dni").show();
                error++;
            }
        }
        if(cor===""){
            $("#correo").css("border-color","red");
            $("#l_correo").html("Este campo es obligatorio");
            $("#l_correo").show();
            error++;
        }
        if(cla===""){
            $("#clave").css("border-color","red");
            $("#l_clave").html("Este campo es obligatorio");
            $("#l_clave").show();
            error++;
        }
        if(mun==="-1"){
            $("#municipalidad").css("border-color","red");
            $("#l_muni").html("Este campo es obligatorio");
            $("#l_muni").show();
            error++;
        }
        if(otro===""){
            $("#otro").css("border-color","red");
            $("#l_otro").html("Este campo es obligatorio");
            $("#l_otro").show();
            error++;
        }
        
        var continuar=0;
        if(error===0){
            if( $("#clave").val().trim().length<5 ){
                
                validaClave();
            }
            else{
                continuar=1;
            }
        }
        
        if(continuar===1){
            
            $("#divlogin").load( "../src/controller/login.php", 
                { registro: 'registro',
                  nombre: $("#nombre").val().trim(), 
                  paterno: $("#paterno").val().trim(),
                  materno: $("#materno").val().trim(),
                  dni: $("#dni").val().trim(),
                  correo: $("#correo").val().trim(),
                  clave: $("#clave").val(),
                  muni: $("#municipalidad").val(),
                  otro: $("#otro").val(),
                  telefono: $("#telefono").val()
                } 
            );
        }
    });
    
    
    function validaClave(){
        $("#clave").css("border-color","red");
        $("#l_clave").html("La clave debe tener mínimo 5 caracteres");
        $("#l_clave").show();
    }
    
    
    $("#nombre").blur(function(){
        if( $("#nombre").val().trim()!=="" ){
            $("#nombre").css("border-color","#ced4da");
            $("#l_nombre").hide();
        }
    });
    
    $("#paterno").blur(function(){
        if( $("#paterno").val().trim()!=="" ){
            $("#paterno").css("border-color","#ced4da");
            $("#l_paterno").hide();
        }
    });
    
    $("#materno").blur(function(){
        if( $("#materno").val().trim()!=="" ){
            $("#materno").css("border-color","#ced4da");
            $("#l_materno").hide();
        }
    });
    
    $("#otro").blur(function(){
        if( $("#otro").val().trim()!=="" ){
            $("#otro").css("border-color","#ced4da");
            $("#l_otro").hide();
        }
    });
    
    $("#correo").blur(function(){
        if( $("#correo").val().trim()!=="" ){
            
            $("#correo").css("border-color","#ced4da");
            $("#l_correo").hide();
            
            var boolean = checkEmail($("#correo").val());
            if(!boolean){
                $("#l_correo").html("Por favor ingresar un correo válido. Ejemplo: alguien@ejemplo.com");
                $("#l_correo").show();
                $("#correo").css("border-color","red");
                $("#correo").val("");
            }
            
        }
    });
    
    $("#clave").blur(function(){
        if( $("#clave").val().trim()!=="" ){
            
            if( $("#clave").val().trim().length<5 ){
                validaClave();
            }
            else{
                $("#clave").css("border-color","#ced4da");
                $("#l_clave").hide();
            }   
        }
    });
    
    $("#municipalidad").blur(function(){
        if( $("#municipalidad").val().trim()!=="-1" ){
            $("#municipalidad").css("border-color","#ced4da");
            $("#l_muni").hide();
        }
    });
    
    $("#municipalidad").change(function(){
        if( $("#municipalidad").val().trim()==="-2" ){
            $("#divOtro").show();
            $("#otro").focus();
        }
        else{
            $("#divOtro").hide();
            $("#otro").val("");
        }
    });
    
    
    
    $("#controlDpto").change(function(){
        $("#controlProv").load( "../src/controller/consulta.php", 
                { provincia: 'provincia',
                  departamento: $("#controlDpto").val()
              } 
            );
    
        /* limpiar munis */
        $("#controlMuni").load( "../src/controller/consulta.php", 
                { limpiar_muni: '1'
              } 
            );
    });

    $("#controlProv").change(function(){
        $("#controlMuni").load( "../src/controller/consulta.php", 
                { muni: 'muni',
                  prov: $("#controlProv").val(),
                  dpto: $("#controlDpto").val()
              } 
            );
    });


});


    



/* functions */

    function existeUsuario(){
        
        $("#l_correo").html("Este correo ya se encuentra registrado");
        $("#l_correo").show();
        $("#correo").css("border-color","red");
    }
    
    
    function errorRegistro(){
        
        $("#cerrarModal").trigger('click');
        
        setTimeout(
        function() {
          $('#info').trigger('click');
        }, 500);
        
    }
    
    
    function registroCorrecto(){
        
        $("#cerrarModal").trigger('click');
        
        setTimeout(
        function() {
          $('#info').trigger('click');
        }, 500);
        
    }

    function checkEmail(email) {
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ( !expr.test(email) )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function telefono(e) { 
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " 1234567890-";
        especiales = "8-37-39-46";
        tecla_especial = false;
        for(var i in especiales){
              if(key === especiales[i]){
                  tecla_especial = true;
                  break;
              }
        }
        if(letras.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    } 

    function alfanum(e) { 
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890-()/.,@_";
        especiales = "8-37-39-46";
        tecla_especial = false;
        for(var i in especiales){
            if(key === especiales[i]){
                 tecla_especial = true;
                 break;
            }
        }
        if(letras.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    }

    function letra(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";
       tecla_especial = false;
       for(var i in especiales){
            if(key === especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        }
    }

    function numero(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " 1234567890";
       especiales = "8-37-39-46";
       tecla_especial = false;
       for(var i in especiales){
            if(key === especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)===-1 && !tecla_especial){
            return false;
        } 
    }


    
    function cleanControlsRecuperar(){

        $("#correoRegistrado").css("border-color","#ced4da");
        $("#l_correoRegistrado").hide();
    }
    
    
    function cleanControls(){

        $("#nombre").css("border-color","#ced4da");
        $("#paterno").css("border-color","#ced4da");
        $("#materno").css("border-color","#ced4da");
        $("#correo").css("border-color","#ced4da");
        $("#clave").css("border-color","#ced4da");
        $("#municipalidad").css("border-color","#ced4da");
        $("#otro").css("border-color","#ced4da");

        $("#l_nombre").hide();
        $("#l_paterno").hide();
        $("#l_materno").hide();
        $("#l_correo").hide();
        $("#l_clave").hide();
        $("#l_muni").hide();
        $("#l_otro").hide();
    }



