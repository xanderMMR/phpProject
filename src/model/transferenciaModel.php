<?php

require_once "../../config/conexion.php";


class transferenciaModel {
    
    private $con;
    
    public function __construct(){
    }

 
    public function validaRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_transferencia WHERE ".
               "ANIO='$anio' AND ".
               "TIPO_RECURSO='$tipoRecurso' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "RECURSO='$recurso' and ".
               "MES='$mes'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
 
    
    public function insertarRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes,$autorizado,$acreditado){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_transferencia(ANIO,TIPO_RECURSO,DEPARTAMENTO,PROVINCIA,MUNICIPALIDAD".
                ",FUENTE,RUBRO,RECURSO,MES,AUTORIZADO,ACREDITADO)".
                "VALUES('$anio','$tipoRecurso','$departamento','$provincia','$municipalidad',".
                        "'$fuente','$rubro','$recurso','$mes',".
                        "$autorizado,$acreditado)";
        
        
        $res = mysqli_query($this->con,$sql);
        
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    public function actualizarRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes,$autorizado,$acreditado){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_transferencia SET ".
               "AUTORIZADO=$autorizado,ACREDITADO=$acreditado,FECHAUPDATE=CURRENT_TIMESTAMP ".
               " WHERE ".
               "ANIO='$anio' AND ".
               "TIPO_RECURSO='$tipoRecurso' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "RECURSO='$recurso' and ".
               "MES='$mes' "; 
        
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function getReporte($anio,$dpto,$prov,$mun,$muniFiltrada,$tipoVista,$queryExtra,$mesActual){
        
        
        $this->con = connect();
        
        $campo ="MUNICIPALIDAD";
        
        $where = "";
        $group = "";
        if ($dpto !== "-1") { 
            $campo = "MUNICIPALIDAD"; 
            $where .= "AND DEPARTAMENTO='".$dpto."' ";
            $group .= ",MUNICIPALIDAD";
        }
        if ($prov !== "-1") { 
            $campo = "MUNICIPALIDAD"; 
            $where .= "AND PROVINCIA='".$prov."' ";
            $group .= ",MUNICIPALIDAD";
        }
        if ($dpto !== "-1" && $prov !== "-1") { /* municipalidad todos o alguno */
            $campo = "MUNICIPALIDAD"; 
            if($mun!=="-1"){
                $where .= "AND MUNICIPALIDAD='".$mun."' ";
            }
            else{
                if($muniFiltrada==""){
                    $where .= "AND MUNICIPALIDAD=MUNICIPALIDAD ";
                }   
            }
            $group .= ",MUNICIPALIDAD";
        }
        
        /* tipo vista */
        if($tipoVista=="1"){
            $campo="FUENTE";
        }
        else if($tipoVista=="2"){
            $campo="RUBRO";
        }
        else if($tipoVista=="3"){
            $campo="RECURSO";
        }
        else if($tipoVista=="4"){
            $campo="MES";
        }
        
        /* tipo vista */
        
        if($tipoVista!=""){
                $group.= ",".$campo;
        }
        
        /* *********************** QUERY *************************/
        
        $sql = "SELECT ";
        
        if($campo=="MES"){
            $sql.= $campo." AS CAMPO, CASE WHEN $campo='Enero' THEN 1 "
                                         ." WHEN $campo='Febrero' THEN 2 "
                                         ." WHEN $campo='Marzo' THEN 3 "
                                         ." WHEN $campo='Abril' THEN 4 "
                                         ." WHEN $campo='Mayo' THEN 5 "
                                         ." WHEN $campo='Junio' THEN 6 "
                                         ." WHEN $campo='Julio' THEN 7 "
                                         ." WHEN $campo='Agosto' THEN 8 "
                                         ." WHEN $campo='Setiembre' THEN 9 "
                                         ." WHEN $campo='Octubre' THEN 10 "
                                         ." WHEN $campo='Noviembre' THEN 11 "
                                         ." WHEN $campo='Diciembre' THEN 12 ELSE 0 END AS NUM_MES ,";
                                        
        }
        else{
            $sql.= $campo." AS CAMPO,";
        }
        
         $sql.="SUM(AUTORIZADO) AUTORIZADO, ".
               "SUM(ACREDITADO) ACREDITADO ".
               "FROM ".
               "tb_transferencia ";
        $sql.= "WHERE ANIO IN ('$anio') ";
        
        $sql.= $where." ";
        $sql.= $queryExtra;
        
        if($mesActual!=""){
            $sql.= " AND MES='$mesActual' ";
        }
        
        $sql.= " GROUP BY MUNICIPALIDAD".$group;
        
        if($campo=="MES"){
            $sql.= " ORDER BY 2";
        }
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return array($lista,$sql);
        
    }
    
    
     public function getTotales($anio,$dpto,$prov,$mun){
        
        
        $this->con = connect();
        
        $sql = "SELECT 
                CASE WHEN SUM(AUTORIZADO) is null then 0 ELSE SUM(AUTORIZADO) end AUTORIZADO,
                CASE WHEN SUM(ACREDITADO) is null then 0 ELSE SUM(ACREDITADO) end ACREDITADO
                FROM tb_transferencia WHERE ANIO IN ('$anio') AND DEPARTAMENTO= CASE WHEN '$dpto'<>'-1' THEN '$dpto' ELSE DEPARTAMENTO END

                UNION ALL

                SELECT 
                CASE WHEN SUM(AUTORIZADO) is null then 0 ELSE SUM(AUTORIZADO) end AUTORIZADO,
                CASE WHEN SUM(ACREDITADO) is null then 0 ELSE SUM(ACREDITADO) end ACREDITADO
                FROM tb_transferencia WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'

                UNION ALL

                SELECT 
                CASE WHEN SUM(AUTORIZADO) is null then 0 ELSE SUM(AUTORIZADO) end AUTORIZADO,
                CASE WHEN SUM(ACREDITADO) is null then 0 ELSE SUM(ACREDITADO) end ACREDITADO
                FROM tb_transferencia WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'
                AND PROVINCIA='$prov'

                UNION ALL

                SELECT 
                CASE WHEN SUM(AUTORIZADO) is null then 0 ELSE SUM(AUTORIZADO) end AUTORIZADO,
                CASE WHEN SUM(ACREDITADO) is null then 0 ELSE SUM(ACREDITADO) end ACREDITADO
                FROM tb_transferencia WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'
                AND PROVINCIA='$prov' AND MUNICIPALIDAD='$mun'";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return array($lista,$sql);
        
    }
    
    
    public function getBaseDatos(){
        
        
        $this->con = connect();
        
        $sql = "SELECT
                TIPO_RECURSO,
                ANIO,
                DEPARTAMENTO,
                PROVINCIA,
                MUNICIPALIDAD,
                FUENTE,
                RUBRO,
                RECURSO,
                MES,
                AUTORIZADO,
                ACREDITADO
                FROM
                tb_transferencia order by IDTRANSFERENCIA";
       
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