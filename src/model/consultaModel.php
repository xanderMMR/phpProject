<?php

require_once "../../config/conexion.php";


class consultaModel {
    
    private $con;
    
    public function __construct(){
    }
    
    
    public function validaRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                         $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                         $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                         $detalleEspecifica,$tipoDato,$mes){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_registro WHERE TIPO_DATO=$tipoDato AND ".
               "ANIO='$anio' AND ".
               "MES='$mes' AND ".
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
                         $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance,$tipoDato,$mes){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_registro(ANIO,DEPARTAMENTO,PROVINCIA,MUNICIPALIDAD,NIVEL_GOBIERNO,GOBIERNO_LOCAL,".
                "FUNCION,DIVISION_FUNCIONAL,GRUPO_FUNCIONAL,CATEGORIA_PRESUPUESTAL,PROYECTO,FUENTE,RUBRO,TIPO_RECURSO,".
                "GENERICA,SUBGENERICA,DETALLE_SUBGENERICA,ESPECIFICA,DETALLE_ESPECIFICA,PIA,PIM,CERTIFICACION,".
                "COMPROMISO,ATENCION,DEVENGADO,GIRADO,AVANCE,TIPO_DATO,MES)".
                "VALUES('$anio','$departamento','$provincia','$municipalidad','$nivelGobierno','$gobiernoLocal',".
                        "'$funcion','$divisionFuncional','$grupoFuncional','$categoriaPresupuestal','$proyecto',".
                        "'$fuente','$rubro','$tipoRecurso','$generica','$subgenerica','$detalleSubgenerica','$especifica',".
                        "'$detalleEspecifica',$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance,$tipoDato,'$mes')";
               
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function     actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                         $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                         $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                         $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance,$tipoDato,$mes){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_registro SET TIPO_DATO=$tipoDato, ".
               "PIA=$pia,PIM=$pim,CERTIFICACION=$certificacion,COMPROMISO=$compromiso,".
               "ATENCION=$atencion,DEVENGADO=$devengado,GIRADO=$girado,AVANCE=$avance,FECHAUPDATE=CURRENT_TIMESTAMP ".
               " WHERE ".
               "ANIO='$anio' AND ".
               "MES='$mes' AND ".
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
               "DETALLE_ESPECIFICA='$detalleEspecifica' ";
               
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
    
    
    
    
    public function getMesActualEjecucionGasto($tabla,$anio,$numero){
        
        $this->con = connect();
        
        $sql = " SELECT CASE WHEN MAX(NOMBRE)=1 THEN 'Enero' 
			WHEN MAX(NOMBRE)=2 THEN 'Febrero' 
			WHEN MAX(NOMBRE)=3 THEN 'Marzo' 
			WHEN MAX(NOMBRE)=4 THEN 'Abril' 
			WHEN MAX(NOMBRE)=5 THEN 'Mayo' 
			WHEN MAX(NOMBRE)=6 THEN 'Junio' 
			WHEN MAX(NOMBRE)=7 THEN 'Julio' 
			WHEN MAX(NOMBRE)=8 THEN 'Agosto' 
			WHEN MAX(NOMBRE)=9 THEN 'Setiembre' 
			WHEN MAX(NOMBRE)=10 THEN 'Octubre' 
			WHEN MAX(NOMBRE)=11 THEN 'Noviembre' 
			ELSE 'Diciembre' END MES 
				
                    FROM
                    (
                        SELECT 
                        CASE WHEN MES='Enero' THEN 1
                             WHEN MES='Febrero' THEN 2
                             WHEN MES='Marzo' THEN 3
                             WHEN MES='Abril' THEN 4
                             WHEN MES='Mayo' THEN 5
                             WHEN MES='Junio' THEN 6
                             WHEN MES='Julio' THEN 7
                             WHEN MES='Agosto' THEN 8
                             WHEN MES='Setiembre' THEN 9
                             WHEN MES='Octubre' THEN 10
                             WHEN MES='Noviembre' THEN 11
                             ELSE 12 END AS NOMBRE
                        FROM $tabla WHERE ANIO='$anio' AND TIPO_DATO=$numero GROUP BY MES
                    ) INFO ";
        
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
    
    
    
    public function getMesActual($tabla,$anio){
        
        $this->con = connect();
        
        $sql = " SELECT CASE WHEN MAX(NOMBRE)=1 THEN 'Enero' 
			WHEN MAX(NOMBRE)=2 THEN 'Febrero' 
			WHEN MAX(NOMBRE)=3 THEN 'Marzo' 
			WHEN MAX(NOMBRE)=4 THEN 'Abril' 
			WHEN MAX(NOMBRE)=5 THEN 'Mayo' 
			WHEN MAX(NOMBRE)=6 THEN 'Junio' 
			WHEN MAX(NOMBRE)=7 THEN 'Julio' 
			WHEN MAX(NOMBRE)=8 THEN 'Agosto' 
			WHEN MAX(NOMBRE)=9 THEN 'Setiembre' 
			WHEN MAX(NOMBRE)=10 THEN 'Octubre' 
			WHEN MAX(NOMBRE)=11 THEN 'Noviembre' 
			ELSE 'Diciembre' END MES 
				
                    FROM
                    (
                        SELECT 
                        CASE WHEN MES='Enero' THEN 1
                             WHEN MES='Febrero' THEN 2
                             WHEN MES='Marzo' THEN 3
                             WHEN MES='Abril' THEN 4
                             WHEN MES='Mayo' THEN 5
                             WHEN MES='Junio' THEN 6
                             WHEN MES='Julio' THEN 7
                             WHEN MES='Agosto' THEN 8
                             WHEN MES='Setiembre' THEN 9
                             WHEN MES='Octubre' THEN 10
                             WHEN MES='Noviembre' THEN 11
                             ELSE 12 END AS NOMBRE
                        FROM $tabla WHERE ANIO='$anio' GROUP BY MES
                    ) INFO ";
        
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
    
    
    
    public function datosMixtos($anio,$muni,$mes){
        
        $this->con = connect();
        
        $sql = " SELECT
                (SELECT SUM(AUTORIZADO) AUTORIZADO FROM tb_transferencia WHERE ANIO='$anio' AND MES='$mes' AND MUNICIPALIDAD='$muni') AUTORIZADO,
                (SELECT SUM(ACREDITADO) ACREDITADO FROM tb_transferencia WHERE ANIO='$anio' AND MES='$mes' AND MUNICIPALIDAD='$muni') ACREDITADO,
                (SELECT SUM(PIA) PIA FROM tb_ingreso WHERE ANIO='$anio' AND MES='$mes' AND MUNICIPALIDAD='$muni') PIA,
                (SELECT SUM(PIM) PIM FROM tb_ingreso WHERE ANIO='$anio' AND MES='$mes' AND MUNICIPALIDAD='$muni') PIM,
                (SELECT SUM(RECAUDADO) FROM tb_ingreso WHERE ANIO='$anio' AND MES='$mes' AND MUNICIPALIDAD='$muni') RECAUDADO ";
        
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
    
    
    
    public function presupuestoEjecucionAvance($anio,$muni,$mes){
        
        $this->con = connect();
        
        $sql = " SELECT CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.PIA) AS DECIMAL(10,0)) INICIAL, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE, ";
        $sql.= " CAST( SUM(R.CERTIFICACION) AS DECIMAL(10,0)) CERTIFICACION, ";
        $sql.= " CAST( SUM(R.COMPROMISO) AS DECIMAL(10,0)) COMPROMISO, ";
        $sql.= " CAST( SUM(R.GIRADO) AS DECIMAL(10,0)) GIRADO ";
        $sql.= " FROM tb_registro R WHERE R.TIPO_DATO=1 ";
        $sql.= " AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.MUNICIPALIDAD='$muni';";
        
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
    
    
    public function resumenMunicipalidad($anio,$mes){
        
        $this->con = connect();
        
        $sql = " SELECT  
                MUNIS.MUNICIPALIDAD,MUNIS.DEPARTAMENTO,MUNIS.PROVINCIA,MUNIS.PRESUPUESTO,MUNIS.EJECUCION,MUNIS.AVANCE,PROYECTOS.CANTIDAD
                FROM
                (

                SELECT R.MUNICIPALIDAD,R.DEPARTAMENTO,R.PROVINCIA, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION,
                                 CASE WHEN SUM(R.DEVENGADO)>0 THEN
                                 CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2))
                                 ELSE 0 END AVANCE FROM tb_registro R
                                 WHERE R.TIPO_DATO=1 AND  R.ANIO='$anio' AND R.MES='$mes'
                                 GROUP BY R.MUNICIPALIDAD,R.DEPARTAMENTO,R.PROVINCIA ORDER BY R.MUNICIPALIDAD
                )
                MUNIS
                LEFT JOIN
                (
                    SELECT DATOS.MUNICIPALIDAD,COUNT(*) CANTIDAD FROM (
                        SELECT seg.MUNICIPALIDAD,seg.PROYECTO FROM tb_registro seg
                        WHERE seg.ANIO='$anio' and seg.PROYECTO<>''and seg.TIPO_DATO=1  AND seg.MES='$mes'
                        GROUP BY seg.MUNICIPALIDAD,seg.PROYECTO
                    ) DATOS
                    GROUP BY DATOS.MUNICIPALIDAD
                )    
                PROYECTOS
                ON MUNIS.MUNICIPALIDAD=PROYECTOS.MUNICIPALIDAD";
        
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
        
        $sql = " SELECT IDMUNICIPALIDAD,DEPARTAMENTO,PROVINCIA,DISTRITO,MONTO_CRITERIO AS MONTO,ARCHIVO_LINEA AS ARCHIVO FROM tb_municipalidad "
                . " WHERE NOMBRE='$nombre'";
        
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
    
    
    public function proyectosPriorizados($anio,$dpto,$prov,$mun,$mes){
        
        $this->con = connect();
        
        $sql = "SELECT PROYECTO,MUNICIPALIDAD, (SELECT A.MONTO_CRITERIO FROM tb_municipalidad A WHERE A.NOMBRE=MUNICIPALIDAD) MONTO ";
        $sql.= ", CAST(SUM(PIA) AS DECIMAL(10,0)) PIA, CAST(SUM(PIM) AS DECIMAL(10,0)) PIM, CAST(SUM(CERTIFICACION) AS DECIMAL(10,0)) CERTIFICACION, CAST(SUM(COMPROMISO) AS DECIMAL(10,0)) COMPROMISO,".
                " CAST(SUM(ATENCION) AS DECIMAL(10,0)) ATENCION, CAST(SUM(DEVENGADO) AS DECIMAL(10,0)) DEVENGADO,CAST(SUM(GIRADO) AS DECIMAL(10,0)) GIRADO, CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE FROM tb_registro ";
        $sql.= "WHERE ANIO = '".$anio."' AND TIPO_DATO=2 ";
        
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
        
        $sql.= " AND MES='$mes' ";
        
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
    
    
    public function resumenMuniDetalle($anio,$muni,$campo,$mes){
        
        $this->con = connect();
        
        if($campo=="FUNCION"){
            
            $sql = "SELECT
                    DATOS.MUNICIPALIDAD, DATOS.FUNCION, DATOS.PRESUPUESTO, DATOS.EJECUCION, DATOS.AVANCE, PRO.CANTIDAD_PROYECTOS
                    FROM
                    (
                    SELECT R.MUNICIPALIDAD, R.FUNCION, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION,
                                     CASE WHEN SUM(R.DEVENGADO)>0 THEN
                                     CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2))
                                     ELSE 0 END AVANCE FROM tb_registro R
                                     WHERE R.TIPO_DATO=1 AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.MUNICIPALIDAD='".$muni."'
                                     GROUP BY R.MUNICIPALIDAD, R.FUNCION 
                    )
                    DATOS
                    LEFT JOIN 
                    (
                        SELECT
                        PROY.MUNICIPALIDAD,PROY.FUNCION,COUNT(*) CANTIDAD_PROYECTOS FROM
                        (
                            SELECT
                            R.MUNICIPALIDAD,R.FUNCION,R.PROYECTO
                            FROM tb_registro R
                            WHERE R.MUNICIPALIDAD='".$muni."' AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.TIPO_DATO=1
                            AND R.FUNCION<>'' AND R.PROYECTO<>''
                            GROUP BY R.MUNICIPALIDAD,R.FUNCION,R.PROYECTO
                        ) PROY
                        GROUP BY 
                        PROY.MUNICIPALIDAD,PROY.FUNCION
                    )
                    PRO
                    ON DATOS.MUNICIPALIDAD=PRO.MUNICIPALIDAD AND DATOS.FUNCION=PRO.FUNCION
                    ORDER BY DATOS.PRESUPUESTO DESC";
            
        }
        else{
            
            $sql = " SELECT R.$campo, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION,
                     CASE WHEN SUM(R.DEVENGADO)>0 THEN
                     CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2))
                     ELSE 0 END AVANCE FROM tb_registro R
                     WHERE R.TIPO_DATO=1 AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.MUNICIPALIDAD='".$muni."' AND R.$campo<>''
                     GROUP BY R.$campo ORDER BY 2 DESC ";
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
    
    
    
    public function proyectosPorMuniFuncionAnio($anio,$muni,$funcion){
        
        $this->con = connect();
        
        $sql = " SELECT PROYECTO FROM tb_registro WHERE MUNICIPALIDAD='$muni' ".
               " AND ANIO='$anio' AND FUNCION='$funcion' AND TIPO_DATO=1 GROUP BY PROYECTO ";
        
        $res = mysqli_query($this->con,$sql);

        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    
    public function resumenMuniTopFuncion($anio,$muni,$presupuesto,$mes){
        
        $this->con = connect();
        
        $sql = " SELECT R.FUNCION, (  CAST(SUM(R.PIM) AS DECIMAL(10,0))*100/$presupuesto  ) PRESUPUESTO ";
        $sql.= " FROM tb_registro R";
        $sql.= " WHERE R.TIPO_DATO=1 AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.MUNICIPALIDAD='".$muni."' ";
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
    
    
    public function resumenMuniDetalleTop($anio,$muni,$campo,$mes){
        
        $this->con = connect();
        
        $sql = " SELECT R.$campo, CAST( SUM(R.PIM) AS DECIMAL(10,0)) PRESUPUESTO, CAST( SUM(R.DEVENGADO) AS DECIMAL(10,0)) EJECUCION, ";
        $sql.= " CASE WHEN SUM(R.DEVENGADO)>0 THEN ";
        $sql.= " CAST( (SUM(R.DEVENGADO)/SUM(R.PIM)*100) AS DECIMAL(12,2)) ";
        $sql.= " ELSE 0 END AVANCE FROM tb_registro R";
        $sql.= " WHERE R.TIPO_DATO=1 AND R.ANIO='".$anio."' AND R.MES='$mes' AND R.MUNICIPALIDAD='".$muni."' ";
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
            $campo="FUNCION";
        }
        else if($tipoVista=="2"){
            $campo="CATEGORIA_PRESUPUESTAL";
        }
        else if($tipoVista=="3"){
            $campo="PROYECTO";
        }
        else if($tipoVista=="4"){
            $campo="DIVISION_FUNCIONAL";
        }
        else if($tipoVista=="5"){
            $campo="GRUPO_FUNCIONAL";
        }
        else if($tipoVista=="6"){
            $campo="FUENTE";
        }
        else if($tipoVista=="7"){
            $campo="RUBRO";
        }
        else if($tipoVista=="8"){
            $campo="TIPO_RECURSO";
        }
        else if($tipoVista=="9"){
            $campo="GENERICA";
        }
        else if($tipoVista=="10"){
            $campo="SUBGENERICA";
        }
        else if($tipoVista=="11"){
            $campo="DETALLE_SUBGENERICA";
        }
        else if($tipoVista=="12"){
            $campo="ESPECIFICA";
        }
        else if($tipoVista=="13"){
            $campo="DETALLE_ESPECIFICA";
        }
        else if($tipoVista=="14"){
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
        
        
        $sql.= "SUM(PIA) PIA, ".
               "SUM(PIM) PIM, ".
               "SUM(CERTIFICACION) CERTIFICACION, ".
               "SUM(COMPROMISO) COMPROMISO, ".
               "SUM(ATENCION) ATENCION, ".
               "SUM(DEVENGADO) DEVENGADO, ".
               "SUM(GIRADO) GIRADO, ".
               "CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE ".
               "FROM ".
               "tb_registro ";
        $sql.= "WHERE TIPO_DATO=1 AND ANIO IN ('$anio') ";
        
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
    
    
    
    public function getTotalesActividad($anio,$dpto,$prov,$mun,$mes){
        
        
        $this->con = connect();
        
        $sql = "SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=3 AND ANIO IN ('$anio') AND MES='$mes'
                        AND DEPARTAMENTO=CASE WHEN '$dpto'<>'-1' then '$dpto' else DEPARTAMENTO END
                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=3 AND ANIO IN ('$anio') AND MES='$mes'
                AND DEPARTAMENTO='$dpto'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=3 AND ANIO IN ('$anio') AND MES='$mes'
                AND DEPARTAMENTO='$dpto' AND PROVINCIA='$prov'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=3 AND ANIO IN ('$anio') AND MES='$mes'
                AND DEPARTAMENTO='$dpto' AND PROVINCIA='$prov'
                AND MUNICIPALIDAD='$mun'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return array($lista,$sql);
        
    }
    
    
    
    
    public function getTotales($anio,$dpto,$prov,$mun,$mes){
        
        
        $this->con = connect();
        
        $sql = "SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=1 AND ANIO IN ('$anio') AND MES='$mes'
                    AND DEPARTAMENTO=CASE WHEN '$dpto'<>'-1' then '$dpto' else DEPARTAMENTO END

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=1 AND ANIO IN ('$anio') AND MES='$mes'
                AND DEPARTAMENTO='$dpto'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=1 AND ANIO IN ('$anio')  and MES='$mes' 
                AND DEPARTAMENTO='$dpto' AND PROVINCIA='$prov'

                UNION ALL

                SELECT 
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end  PIM,
                CASE WHEN SUM(CERTIFICACION) is null then 0 ELSE SUM(CERTIFICACION) end CERTIFICACION,
                CASE WHEN SUM(COMPROMISO) is null then 0 ELSE SUM(COMPROMISO) end COMPROMISO,
                CASE WHEN SUM(ATENCION) is null then 0 ELSE SUM(ATENCION) end ATENCION,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(GIRADO) is null then 0 ELSE SUM(GIRADO) end GIRADO,
                CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE
                FROM tb_registro WHERE TIPO_DATO=1 AND ANIO IN ('$anio') and MES='$mes' 
                AND DEPARTAMENTO='$dpto' AND PROVINCIA='$prov'
                AND MUNICIPALIDAD='$mun'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return array($lista,$sql);
        
    }
    
    
    
    public function getReporteActividad($anio,$dpto,$prov,$mun,$muniFiltrada,$tipoVista,$queryExtra,$mes){
        
        
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
        if($tipoVista=="6"){
            $campo="FUENTE";
        }
        else if($tipoVista=="7"){
            $campo="RUBRO";
        }
        
        /* tipo vista */
        if($tipoVista!=""){
                $group.= ",".$campo;
        }
        
        /* *********************** QUERY *************************/
        
        $sql = "SELECT ".
               $campo." AS CAMPO, ".
               "SUM(PIA) PIA, ".
               "SUM(PIM) PIM, ".
               "SUM(CERTIFICACION) CERTIFICACION, ".
               "SUM(COMPROMISO) COMPROMISO, ".
               "SUM(ATENCION) ATENCION, ".
               "SUM(DEVENGADO) DEVENGADO, ".
               "SUM(GIRADO) GIRADO, ".
               "CASE WHEN SUM(PIM)>0 THEN CAST( (SUM(DEVENGADO)/SUM(PIM)*100) AS DECIMAL(12,2)) ELSE 0 END AVANCE ".
               "FROM ".
               "tb_registro ";
        $sql.= "WHERE TIPO_DATO=3 AND ANIO IN ('$anio') ";
        
        $sql.= $where." ";
        $sql.= $queryExtra;
        
        $sql.= " AND MES='$mes' ";
        
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
    
    
    public function getBaseDatos(){
        
        
        $this->con = connect();
        
        $sql = "SELECT
                CASE WHEN TIPO_DATO='1' THEN 'S&oacute;lo Proyectos' WHEN TIPO_DATO='2' THEN 'Proyectos priorizados' ELSE 'Actividades/Proyectos' END TIPO_DATO,
                ANIO,
                DEPARTAMENTO,
                PROVINCIA,
                MUNICIPALIDAD,
                NIVEL_GOBIERNO,
                GOBIERNO_LOCAL,
                FUNCION,
                DIVISION_FUNCIONAL,
                GRUPO_FUNCIONAL,
                CATEGORIA_PRESUPUESTAL,
                PROYECTO,
                FUENTE,
                RUBRO,
                TIPO_RECURSO,
                GENERICA,
                DETALLE_SUBGENERICA,
                ESPECIFICA,
                DETALLE_ESPECIFICA,
                MES,
                PIA,
                PIM,
                CERTIFICACION,
                COMPROMISO,
                ATENCION,
                DEVENGADO,
                GIRADO,
                AVANCE
                FROM
                tb_registro order by IDREGISTRO";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }

    
    public function listarProyectosDatosAdicionales($dpto,$prov,$muni){
        
        
        $this->con = connect();
        
        $sql = "SELECT
                PROY.PIM,
                PROY.PROYECTO,
                DP.A_LINKFORMATO12B,
                DP.A_LINKFORMATO7,
                DP.A_LINKFORMATO8A
		FROM (
                    SELECT PROYECTO,SUM(PIM) PIM FROM tb_seguimiento 
                    WHERE DEPARTAMENTO = CASE WHEN '$dpto'<>'' THEN '$dpto' ELSE DEPARTAMENTO END AND
                          PROVINCIA = CASE WHEN '$prov'<>'' THEN '$prov' ELSE PROVINCIA END AND
                          MUNICIPALIDAD = CASE WHEN '$muni'<>'' THEN '$muni' ELSE MUNICIPALIDAD END
                    GROUP BY PROYECTO
                    ) PROY
		LEFT JOIN
		(
                    SELECT  
                    PROYECTO,
                    A_LINKFORMATO12B,
                    A_LINKFORMATO7,
                    A_LINKFORMATO8A
                    FROM 
                    tb_datosproyecto
                ) DP
                ON PROY.PROYECTO=DP.PROYECTO WHERE PROY.PROYECTO<>''";
       
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
