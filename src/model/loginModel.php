<?php 

require_once "../../config/conexion.php";

class loginModel{
    
    
    private $con;
    
    public function __construct(){
    }

    function agregarUsuario($datos){
        
        $nombre = $datos['nombre'];
        $paterno = $datos['paterno'];
        $materno = $datos['materno'];
        $dni = $datos['dni'];
        $correo = $datos['correo'];
        $clave = $datos['clave'];
        $muni = $datos['muni'];
        $otro = $datos['otro'];
        $telefono = $datos['telefono'];
        
        $this->con = connect();
        
        $sql = "INSERT INTO tb_usuario(NOMBRE,PATERNO,MATERNO,CORREO,CLAVE,IDMUNICIPALIDAD,OTRO,TELEFONO,DNI)".
                " VALUES('".$nombre."','".$paterno."','".$materno."','".$correo."','".$clave."',$muni,'".$otro."','".$telefono."','".$dni."')";
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
        /*
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
        mysqli_free_result($res);
        */
    }
    
    
    public function obtenerClave($correo){
        
        $this->con = connect();
        
        $sql = "SELECT CLAVE FROM tb_usuario WHERE CORREO='".$correo."'";
               
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        if($lista==null){
            return null;
        }
        else{
            return $lista[0];
        }    
    }
    
    public function validarUsuario($correo,$clave){
        
        $this->con = connect();
        
        $sql = "SELECT * FROM tb_usuario WHERE CORREO='".$correo."' AND CLAVE='".$clave."'";
               
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        if($lista==null){
            return null;
        }
        else{
            return $lista[0];
        }    
    }
    
    
    public function validarCorreo($correo){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_usuario WHERE UPPER(CORREO)=UPPER('".$correo."')";
               
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
}

?>