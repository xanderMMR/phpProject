<?php
if(!isset($_SESSION))session_start();

require_once '../model/loginModel.php';
require_once '../model/consultaModel.php';
require_once '../model/seguimientoModel.php';
// require_once '../service/mailService.php';


if( isset($_POST['recuperar_clave']) ){
    
    $correo = $_POST['correo'];
    
    $model = new loginModel();
    $datos = $model->obtenerClave($correo);
    
    if($datos!=null){
        
            $clave=$datos['CLAVE'];
            $clave = base64_decode($clave);
            
            $mail=new mailService();
            $resultado = $mail->enviarMail($correo,$clave);
            
            ?>
            <script>document.getElementById("buttonRecuperar").style.display='block';alert("En breve recibirá un correo en la dirección ingresada");</script>
            <?php
    }
    else{
            ?>
            <script>document.getElementById("buttonRecuperar").style.display='block';alert("Correo no registrado")</script>
            <?php
    }
}

else if( isset($_POST['registro']) ){

    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $muni = $_POST['muni'];
    $otro = $_POST['otro'];
    $telefono = $_POST['telefono'];
    $clave = base64_encode($_POST['clave']);
    
    $datos=array("nombre"=>$nombre,
                 "paterno"=>$paterno,
                 "materno"=>$materno,
                 "dni"=>$dni,
                 "correo"=>$correo,
                 "clave"=>$clave,
                 "muni"=>$muni,
                 "otro"=>$otro,
                 "telefono"=>$telefono
                );
    
    $model = new loginModel();
    
    $usuarios = $model->validarCorreo($correo);
    
    if($usuarios==null){
            
        $p = $model->agregarUsuario($datos);
    
        if($p){
            ?>
            <script> registroCorrecto(); </script>
            <?php    
        }
        else{
            ?>
            <script> errorRegistro(); </script>
            <?php    
        }
    }
    else{
        ?>
        <script> existeUsuario(); </script>
        <?php
    }
}

else if(isset($_POST['correo'])){
    
    $correo = $_POST['correo'];
    $clave = base64_encode($_POST['clave']);
    $movil = $_POST['movil'];
    
    $movil="";
    if(isset($_GET['movil'])){
        $movil="1";
    }
    
    if($movil=="1"){
        $_SESSION['movil']=1;
    }
    
    $model=new loginModel();
    $datos = $model->validarUsuario($correo, $clave);
    
    if($datos==null){
        
        $_SESSION['msj_login']="Credenciales incorrectas";
        
        header("location: ../../form/acceso.php");
         
    }
    else{
        
        $consultaModel=new consultaModel();
        $_SESSION['cboDpto']=$consultaModel->listarDepartamento();
        $_SESSION['acceso_usuario']=true;
        $_SESSION['flag_linea']=$datos['FLAG_LINEA'];
        
        /* fecha update */
        /*
        $seguimiento = new seguimientoModel();
        $fechas=$seguimiento->getFechaUpdate();
        $fecha=$fechas[0];
        $_SESSION['fecha_update']=$fecha['FECHA'];
        */
        
        header("location: ../../form/consulta.php");
    }
}

else if( isset($_POST['listaMuni']) ){
    
    $model=new consultaModel();
    
    $lista = $model->listarMunicipalidad("-1", "-1");
    
    if($lista!=null){
        ?>
            <option value="-1">Seleccione una municipalidad</option>
            <?php foreach($lista as $r){ ?>
            <option value="<?php echo $r['IDMUNICIPALIDAD'] ?>"><?php echo $r['NOMBRE']; ?></option>
            <?php } ?>    
            <option value="-2">OTRO</option>
        <?php
    }
    
}