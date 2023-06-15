<?php

require_once "../../config/conexion.php";


class consultaModel {
    
    private $con;
    
    public function __construct(){
    }
    
    
    public function validaRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                         $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                         $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                         $detalleEspecifica){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_registro WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "NIVEL_GOBIERNO='$nivelGobierno' and ".
               "GOBIERNO_LOCAL='$gobiernoLocal' and ".
               "FUNCION='$funcion' and ".
               "DIVISION_FUNCIONAL='$divisionFuncional' and ".
               "GRUPO_FUNCIONAL='$grupoFuncional' and ".
               "CATEGORIA_PRESUPUESTAL='$categoriaPresupuestal' and ".
               "PROYECTO='$proyecto' and ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "TIPO_RECURSO='$tipoRecurso' and ".
               "GENERICA='$generica' and ".
               "SUBGENERICA='$subgenerica' and ".
               "DETALLE_SUBGENERICA='$detalleSubgenerica' and ".
               "ESPECIFICA='$especifica' and ".
               "DETALLE_ESPECIFICA='$detalleEspecifica'";
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    public function insertarRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                         $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                         $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                         $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_registro(ANIO,DEPARTAMENTO,PROVINCIA,MUNICIPALIDAD,NIVEL_GOBIERNO,GOBIERNO_LOCAL,".
                "FUNCION,DIVISION_FUNCIONAL,GRUPO_FUNCIONAL,CATEGORIA_PRESUPUESTAL,PROYECTO,FUENTE,RUBRO,TIPO_RECURSO,".
                "GENERICA,SUBGENERICA,DETALLE_SUBGENERICA,ESPECIFICA,DETALLE_ESPECIFICA,PIA,PIM,CERTIFICACION,".
                "COMPROMISO,ATENCION,DEVENGADO,GIRADO,AVANCE)".
                "VALUES('$anio','$departamento','$provincia','$municipalidad','$nivelGobierno','$gobiernoLocal',".
                        "'$funcion','$divisionFuncional','$grupoFuncional','$categoriaPresupuestal','$proyecto',".
                        "'$fuente','$rubro','$tipoRecurso','$generica','$subgenerica','$detalleSubgenerica','$especifica',".
                        "'$detalleEspecifica',$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance)";
               
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                         $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                         $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                         $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_registro SET ".
               "PIA=$pia,PIM=$pim,CERTIFICACION=$certificacion,COMPROMISO=$compromiso,".
               "ATENCION=$atencion,DEVENGADO=$devengado,GIRADO=$girado,AVANCE=$avance".
               " WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "NIVEL_GOBIERNO='$nivelGobierno' and ".
               "GOBIERNO_LOCAL='$gobiernoLocal' and ".
               "FUNCION='$funcion' and ".
               "DIVISION_FUNCIONAL='$divisionFuncional' and ".
               "GRUPO_FUNCIONAL='$grupoFuncional' and ".
               "CATEGORIA_PRESUPUESTAL='$categoriaPresupuestal' and ".
               "PROYECTO='$proyecto' and ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro' and ".
               "TIPO_RECURSO='$tipoRecurso' and ".
               "GENERICA='$generica' and ".
               "SUBGENERICA='$subgenerica' and ".
               "DETALLE_SUBGENERICA='$detalleSubgenerica' and ".
               "ESPECIFICA='$especifica' and ".
               "DETALLE_ESPECIFICA='$detalleEspecifica'";
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    public function listarMunicipalidad($dep,$prov){
        
        $this->con = connect();
        
        $sql = "SELECT IDMUNICIPALIDAD,NOMBRE FROM tb_municipalidad WHERE DEPARTAMENTO='".$dep."' AND PROVINCIA='".$prov."' GROUP BY NOMBRE ORDER BY NOMBRE";
        
        if($dep=="-1" && $prov=="-1"){
            $sql = "SELECT IDMUNICIPALIDAD,NOMBRE FROM tb_municipalidad GROUP BY NOMBRE ORDER BY NOMBRE;";
        }
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    public function listarProvincia($dep){
        
        $this->con = connect();
        
        $sql = "SELECT PROVINCIA FROM tb_municipalidad WHERE DEPARTAMENTO='".$dep."' GROUP BY PROVINCIA ORDER BY PROVINCIA";
               
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    public function listarDepartamento(){
        
        $this->con = connect();
        
        $sql = "SELECT DEPARTAMENTO FROM tb_municipalidad GROUP BY DEPARTAMENTO ORDER BY DEPARTAMENTO";
               
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    
    public function presupuestoEjecucionAvance($anio,$muni){
        
        $this->con = connect();
        
        $sql = " SELECT CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE, ";
        $sql.= " CAST( SUM(R.CERTIFICACION) AS DECIMAL(10,0)) CERTIFICACION, ";
        $sql.= " CAST( SUM(R.COMPROMISO) AS DECIMAL(10,0)) COMPROMISO, ";
        $sql.= " CAST( SUM(R.GIRADO) AS DECIMAL(10,0)) GIRADO ";
        $sql.= " FROM tb_registro R";
        $sql.= " WHERE R.ANIO='".$anio."' AND R.MUNICIPALIDAD='$muni';";
        
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
    
    
    public function resumenMunicipalidad($anio){
        
        $this->con = connect();
        
        $sql = " SELECT R.MUNICIPALIDAD, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE FROM tb_registro R";
        $sql.= " WHERE R.ANIO='".$anio."'";
        $sql.= " GROUP BY R.MUNICIPALIDAD ORDER BY R.MUNICIPALIDAD ";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
 
    
    public function buscarDatosMunicipalidad($nombre){
        
        $this->con = connect();
        
        $sql = " SELECT IDMUNICIPALIDAD,DEPARTAMENTO,PROVINCIA,DISTRITO,MONTO_CRITERIO AS MONTO,ARCHIVO_LINEA AS ARCHIVO FROM tb_municipalidad WHERE NOMBRE='$nombre'";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);
        
        if($lista!=null){
            return $lista[0];
        }
        else{
            return null;
        }
    }
    
    
    public function proyectosPriorizados($anio,$dpto,$prov,$mun){
        
        $this->con = connect();
        
        $sql = "SELECT PROYECTO,MUNICIPALIDAD, (SELECT A.MONTO_CRITERIO FROM tb_municipalidad A WHERE A.NOMBRE=MUNICIPALIDAD) MONTO ";
        $sql.= ", CAST(SUM(PIA) AS DECIMAL(10,0)) PIA, CAST(SUM(PIM) AS DECIMAL(10,0)) PIM, CAST(SUM(CERTIFICACION) AS DECIMAL(10,0)) CERTIFICACION, CAST(SUM(COMPROMISO) AS DECIMAL(10,0)) COMPROMISO,".
                " CAST(SUM(ATENCION) AS DECIMAL(10,0)) ATENCION, CAST(SUM(DEVENGADO) AS DECIMAL(10,0)) DEVENGADO,CAST(SUM(GIRADO) AS DECIMAL(10,0)) GIRADO, CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE FROM tb_registro ";
        $sql.= "WHERE ANIO = '".$anio."' ";
        
        if ($dpto !== "-1") { 
            $sql.=" AND DEPARTAMENTO='".$dpto."' ";
        }
        if ($prov !== "-1") { 
            $sql.=" AND PROVINCIA='".$prov."' ";
        }
        if ($dpto !== "-1" && $prov !== "-1") { /* municipalidad todos o alguno */
            
            if($mun!=="-1"){
                $sql.=" AND MUNICIPALIDAD='".$mun."' ";
            }
            else{
                $sql.=" AND MUNICIPALIDAD = MUNICIPALIDAD ";
            }
        }
        
        $sql.= " GROUP BY PROYECTO,MUNICIPALIDAD ";
        
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
            
             if( $f['PIM']>$f['MONTO'] ){
                $lista[]=$f;
             }
        }
      
        mysqli_free_result($res);
        
        if($lista==null){
            mysqli_close($this->con);
        }
        
        return $lista;
    }
    
    
    public function resumenMuniDetalle($anio,$muni,$campo){
        
        $this->con = connect();
        
        $sql = " SELECT R.$campo, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE FROM tb_registro R";
        $sql.= " WHERE R.ANIO='".$anio."' AND R.MUNICIPALIDAD='".$muni."' ";
        $sql.= " GROUP BY R.$campo ORDER BY 2 DESC ";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    
    public function proyectosPorMuniFuncionAnio($anio,$muni,$funcion){
        
        $this->con = connect();
        
        $sql = " SELECT PROYECTO FROM tb_registro WHERE MUNICIPALIDAD='$muni' ".
               " AND ANIO='$anio' AND FUNCION='$funcion' GROUP BY PROYECTO ";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    
    public function resumenMuniTopFuncion($anio,$muni,$presupuesto){
        
        $this->con = connect();
        
        $sql = " SELECT R.FUNCION, (  CAST(SUM(R.PIM) AS DECIMAL(10,0))*100/$presupuesto  ) PRESUPUESTO ";
        $sql.= " FROM tb_registro R";
        $sql.= " WHERE R.ANIO='".$anio."' AND R.MUNICIPALIDAD='".$muni."' ";
        $sql.= " GROUP BY R.FUNCION ";
        $sql.= " ORDER BY 2 DESC ";
        $sql.= " LIMIT 3 ";
        
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
            return $lista;
        }
    }
    
    
    public function resumenMuniDetalleTop($anio,$muni,$campo){
        
        $this->con = connect();
        
        $sql = " SELECT R.$campo, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE FROM tb_registro R";
        $sql.= " WHERE R.ANIO='".$anio."' AND R.MUNICIPALIDAD='".$muni."' ";
        $sql.= " GROUP BY R.$campo ORDER BY 2 DESC LIMIT 1";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    public function verDatos($anio,$dpto,$prov,$mun,$campoActual,$ultimoBusqueda,$whereQuery,$grupoFuncion,$grupoCategoria,
                             $grupoProyecto,$grupoDivisionFuncional,$grupoCategoriaFuncional,$grupoFuente,$grupoRubro,$grupoTipoRecurso,
                             $grupoGenerica,$grupoSubgenerica,$grupoDetaleSubgenerica,$grupoEspecifica,$grupoDetalleEspecifica,
                             $previaFuncion,$previaCategoriaPresupuestal,$previaProyecto,$previaDivisionFuncional,
                             $previaGrupoFuncional,$previaFuente,$previaRubro,$previaTipoRecurso,
                             $previaGenerica,$previaSubgenerica,$previaDetalleSubgenerica,
                             $previaEspecifica,$previaDetalleEspecifica,$muniFiltrada){
        
        $this->con = connect();
        
        // ultimo cambio 
        //$campo = "ANIO";
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
        
        /* radio button marcado */
        if($whereQuery!=null && $whereQuery!=='' &&
                ($grupoFuncion==='1'||$grupoCategoria==='1'||$grupoProyecto==='1'||$grupoDivisionFuncional==='1'||
                 $grupoCategoriaFuncional==='1'||$grupoFuente==='1'||$grupoRubro==='1'||$grupoTipoRecurso==='1'||
                 $grupoGenerica==='1'||$grupoSubgenerica==='1'||$grupoDetaleSubgenerica==='1'||
                 $grupoEspecifica==='1'||$grupoDetalleEspecifica==='1')
          ){
            
            $campo = $campoActual;
            $where.= " AND '".$whereQuery."'="."".$ultimoBusqueda." ";
            
            if($grupoFuncion=='1'){
                $group.= ",FUNCION";
            }
            if($grupoCategoria=='1'){
                $group.= ",CATEGORIA_PRESUPUESTAL";
            }
            if($grupoProyecto=='1'){
                $group.= ",PROYECTO";
            }
            if($grupoDivisionFuncional=='1'){
                $group.= ",DIVISION_FUNCIONAL";
            }
            if($grupoCategoriaFuncional=='1'){
                $group.= ",GRUPO_FUNCIONAL";
            }
            if($grupoFuente=='1'){
                $group.= ",FUENTE";
            }
            if($grupoRubro=='1'){
                $group.= ",RUBRO";
            }
            if($grupoTipoRecurso=='1'){
                $group.= ",TIPO_RECURSO";
            }
            if($grupoGenerica=='1'){
                $group.= ",GENERICA";
            }
            if($grupoSubgenerica=='1'){
                $group.= ",SUBGENERICA";
            }
            if($grupoDetaleSubgenerica=='1'){
                $group.= ",DETALLE_SUBGENERICA";
            }
            if($grupoEspecifica=='1'){
                $group.= ",ESPECIFICA";
            }
            if($grupoDetalleEspecifica=='1'){
                $group.= ",DETALLE_ESPECIFICA";
            }
        }
        /* ******************** */
        
        /* previa busqueda */
        if($previaFuncion!==""){
            $where.= " AND FUNCION='".$previaFuncion."'";
        }
        if($previaCategoriaPresupuestal!==""){
            $where.= " AND CATEGORIA_PRESUPUESTAL='".$previaCategoriaPresupuestal."'";
        }
        if($previaProyecto!==""){
            $where.= " AND PROYECTO='".$previaProyecto."'";
        }
        if($previaDivisionFuncional!==""){
            $where.= " AND DIVISION_FUNCIONAL='".$previaDivisionFuncional."'";
        }
        if($previaGrupoFuncional!==""){
            $where.= " AND GRUPO_FUNCIONAL='".$previaGrupoFuncional."'";
        }
        if($previaFuente!==""){
            $where.= " AND FUENTE='".$previaFuente."'";
        }
        if($previaRubro!==""){
            $where.= " AND RUBRO='".$previaRubro."'";
        }
        if($previaTipoRecurso!==""){
            $where.= " AND TIPO_RECURSO='".$previaTipoRecurso."'";
        }
        if($previaGenerica!==""){
            $where.= " AND GENERICA='".$previaGenerica."'";
        }
        if($previaSubgenerica!==""){
            $where.= " AND SUBGENERICA='".$previaSubgenerica."'";
        }
        if($previaDetalleSubgenerica!==""){
            $where.= " AND DETALLE_SUBGENERICA='".$previaDetalleSubgenerica."'";
        }
        if($previaEspecifica!==""){
            $where.= " AND ESPECIFICA='".$previaEspecifica."'";
        }
        if($previaDetalleEspecifica!==""){
            $where.= " AND DETALLE_ESPECIFICA='".$previaDetalleEspecifica."'";
        }
        /* ************** */
        if($muniFiltrada!==""){
            $where.= " AND MUNICIPALIDAD='".$muniFiltrada."'";
        }
        
        $sql = "SELECT ".$campo." AS CAMPO";
        $sql.= ", CAST(SUM(PIA) AS DECIMAL(10,0)) PIA, CAST(SUM(PIM) AS DECIMAL(10,0)) PIM, CAST(SUM(CERTIFICACION) AS DECIMAL(10,0)) CERTIFICACION, CAST(SUM(COMPROMISO) AS DECIMAL(10,0)) COMPROMISO,".
                " CAST(SUM(ATENCION) AS DECIMAL(10,0)) ATENCION, CAST(SUM(DEVENGADO) AS DECIMAL(10,0)) DEVENGADO,CAST(SUM(GIRADO) AS DECIMAL(10,0)) GIRADO, CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE FROM tb_registro ";
        $sql.= "WHERE ANIO IN ('$anio') ";
        $sql.= $where." ";
        
        // ultimo cambio 
        //$sql.= " GROUP BY ANIO".$group;
        $sql.= " GROUP BY MUNICIPALIDAD".$group;
        
        
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
