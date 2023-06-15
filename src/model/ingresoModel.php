<?php

require_once "../../config/conexion.php";


class ingresoModel {
    
    private $con;
    
    public function __construct(){
    }
    
    
    
    public function insertarDiscovery($nombre,$clave,$estado){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_discovery(NOMBRE_CLIENTE,CLAVE_ACCESO,ESTADO)".
                "VALUES('$nombre','$clave','$estado')";
        
       
        $res = mysqli_query($this->con,$sql);
        
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function buscarDiscovery($clave){
        
        
        $this->con = connect();
        
        $sql = "SELECT ID,NOMBRE_CLIENTE,ESTADO FROM tb_discovery where CLAVE_ACCESO='$clave'";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }

 
    public function validaRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                   $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                   $mes,$trimestre){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_ingreso WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "TIPO_RECURSO='$tipoRecurso' and ".
               "GENERICA='$generica' and ".
               "SUBGENERICA='$subgenerica' and ".
               "DETALLE_SUBGENERICA='$detalleSubgenerica' and ".
               "ESPECIFICA='$especifica' and ".
               "DETALLE_ESPECIFICA='$detalleEspecifica' and ".
               "MES='$mes' and ".
               "TRIMESTRE='$trimestre'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
 
    
    public function insertarRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                     $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                     $mes,$trimestre,$pia,$pim,$recaudado){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_ingreso(ANIO,DEPARTAMENTO,PROVINCIA,MUNICIPALIDAD".
                ",FUENTE,RUBRO,TIPO_RECURSO,GENERICA,SUBGENERICA,DETALLE_SUBGENERICA,ESPECIFICA,DETALLE_ESPECIFICA,MES,TRIMESTRE,".
                "PIA,PIM,RECAUDADO)".
                "VALUES('$anio','$departamento','$provincia','$municipalidad',".
                        "'$fuente','$rubro','$tipoRecurso','$generica','$subgenerica','$detalleSubgenerica','$especifica','$detalleEspecifica',".
                        "'$mes','$trimestre',$pia,$pim,$recaudado)";
        
        
        $res = mysqli_query($this->con,$sql);
        
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    public function actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                     $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                     $mes,$trimestre,$pia,$pim,$recaudado){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_ingreso SET ".
               "PIA=$pia,PIM=$pim,RECAUDADO=$recaudado,FECHAUPDATE=CURRENT_TIMESTAMP ".
               " WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "TIPO_RECURSO='$tipoRecurso' and ".
               "GENERICA='$generica' and ".
               "SUBGENERICA='$subgenerica' and ".
               "DETALLE_SUBGENERICA='$detalleSubgenerica' and ".
               "ESPECIFICA='$especifica' and ".
               "DETALLE_ESPECIFICA='$detalleEspecifica' and ".
               "MES='$mes' and ".
               "TRIMESTRE='$trimestre'";
        
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
            $campo="TIPO_RECURSO";
        }
        else if($tipoVista=="4"){
            $campo="GENERICA";
        }
        else if($tipoVista=="5"){
            $campo="SUBGENERICA";
        }
        else if($tipoVista=="6"){
            $campo="DETALLE_SUBGENERICA";
        }
        else if($tipoVista=="7"){
            $campo="ESPECIFICA";
        }
        else if($tipoVista=="8"){
            $campo="DETALLE_ESPECIFICA";
        }
        else if($tipoVista=="9"){
            $campo="MES";
        }
        else if($tipoVista=="10"){
            $campo="TRIMESTRE";
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
        
        $sql.= "SUM(PIA) PIA, ".
               "SUM(PIM) PIM, ".
               "SUM(RECAUDADO) RECAUDADO ".
               "FROM ".
               "tb_ingreso ";
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
        
        //var_dump($sql);
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
                ANIO,
                DEPARTAMENTO,
                PROVINCIA,
                MUNICIPALIDAD,
                FUENTE,
                RUBRO,
                TIPO_RECURSO,
                GENERICA,
                SUBGENERICA,
                DETALLE_SUBGENERICA,
                ESPECIFICA,
                DETALLE_ESPECIFICA,
                MES,
                PIA,
                PIM,
                RECAUDADO
                FROM tb_ingreso order by IDINGRESO";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }
    
    
     public function getTotales($anio,$dpto,$prov,$mun,$mes){
        
        
        $this->con = connect();
        
        $sql = "SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(RECAUDADO) is null then 0 ELSE SUM(RECAUDADO) end RECAUDADO
                FROM tb_ingreso WHERE ANIO IN ('$anio') AND MES='$mes' AND DEPARTAMENTO=CASE WHEN '$dpto'<>'-1' THEN '$dpto' ELSE DEPARTAMENTO END

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(RECAUDADO) is null then 0 ELSE SUM(RECAUDADO) end RECAUDADO
                FROM tb_ingreso WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto' AND MES='$mes'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(RECAUDADO) is null then 0 ELSE SUM(RECAUDADO) end RECAUDADO
                FROM tb_ingreso WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto' AND MES='$mes'
                AND PROVINCIA='$prov'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(RECAUDADO) is null then 0 ELSE SUM(RECAUDADO) end RECAUDADO
                FROM tb_ingreso WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto' AND MES='$mes'
                AND PROVINCIA='$prov' and MUNICIPALIDAD='$mun'";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return array($lista,$sql);
        
    }
    
    
}