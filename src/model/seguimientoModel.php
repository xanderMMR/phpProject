<?php

require_once "../../config/conexion.php";


class seguimientoModel {
    
    private $con;
    
    public function __construct(){
    }

 
    public function validaRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_seguimiento WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUNCION='$funcion' and ".
               "PROYECTO='$proyecto' and ".
               "FUENTE='$fuente' and ".
               "RUBRO='$rubro'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
 
    
    public function validaRegistroProyecto($proyecto){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_datosproyecto WHERE ".
               "PROYECTO='$proyecto'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    public function validarSituacionInversion($CODIGOPROYECTO,$FECHAMODIFICACION,$SITUACION){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_situacioninversion WHERE ".
               "CODIGOPROYECTO='$CODIGOPROYECTO' AND FECHAMODIFICACION='$FECHAMODIFICACION' ".
               "AND SITUACION='$SITUACION'";
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    public function validarItemDevengado($CODIGOPROYECTO,$ITEM,$ANIO1,$ANIO2,$ANIO3,$ANIO4,$ANIO5,$TOTAL){
        
        $this->con = connect();
        
        $sql = "SELECT 1 FROM tb_devengadohistorico WHERE ".
               "CODIGOPROYECTO='$CODIGOPROYECTO' AND ITEM='$ITEM' ".
               "AND ANIO1='$ANIO1' AND ANIO2='$ANIO2' AND ANIO3='$ANIO3' AND ANIO4='$ANIO4' AND ANIO5='$ANIO5' AND TOTAL='$TOTAL' ";
        
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
    }
    
    
    
    public function insertarSituacionInversion($CODIGOPROYECTO,$FECHAMODIFICACION,$SITUACION){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_situacioninversion(CODIGOPROYECTO,FECHAMODIFICACION,SITUACION)";
               $sql.= "VALUES('$CODIGOPROYECTO','$FECHAMODIFICACION','$SITUACION')";
        
        $res = mysqli_query($this->con,$sql);
        
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    
    public function insertarItemDevengado($CODIGOPROYECTO,$ITEM,$ANIO1,$ANIO2,$ANIO3,$ANIO4,$ANIO5,$TOTAL){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_devengadohistorico(CODIGOPROYECTO,ITEM,ANIO1,ANIO2,ANIO3,ANIO4,ANIO5,TOTAL)";
               $sql.= "VALUES('$CODIGOPROYECTO','$ITEM','$ANIO1','$ANIO2','$ANIO3','$ANIO4','$ANIO5','$TOTAL')";
        
        $res = mysqli_query($this->con,$sql);
        
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function insertarRegistroProyecto($PROYECTO,$A_PROGRAMADOPMI,$A_LINKBANCOINVERSIONES,$A_SITUACION,$A_FECHAVIABILIDAD,$A_COSTOINVERSION,
                                             $A_BENEFICIARIOS,$A_EXPEDIENTE,$A_REGISTROSEGUIMIENTO,$A_LINKFORMATO12B,$A_REGISTROCIERRE,$A_FECHAINICIOEJECUCION,
                                             $A_FECHAFINEJECUCION,$A_COSTOINVERSIONACTUALIZADO,$A_COSTOINVERSIONTOTAL,$A_LINKFORMATO7,$A_LINK,$A_LINKFORMATO8A,
                                             $B_COSTOINVERSION,$B_FECHAPRIMER,$B_FECHAULTIMO,$C_ULTIMAMODIFICACION,$C_LINKAVANCEINVERSION,
                                             $C_AVANCEEJECUCION,$C_AVANCEFISICO,$D_LINKPROCEDIMIENTO,$D_LINKCONTRACTUAL,$D_CONSULTORIAS,
                                             $C_INICIOFISICA,$C_FINFISICA,$C_FECHADECLARACION,$C_LINKDETALLEAVANCE,$C_SITUACION,$C_PROBLEMATICA,$C_COSTOACTUALIZADO,
                                             $C_DEVENGADOACUMULADO,$C_PRIMERDEVENGADO,$C_ULTIMODEVENGADO,$C_PROGRAMACIONFINANCIERA,$D_NUMEROOBRAS){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_datosproyecto(PROYECTO,A_PROGRAMADOPMI,A_LINKBANCOINVERSIONES,A_SITUACION,A_FECHAVIABILIDAD,A_COSTOINVERSION,
                                            A_BENEFICIARIOS,A_EXPEDIENTE,A_REGISTROSEGUIMIENTO,A_LINKFORMATO12B,A_REGISTROCIERRE,A_FECHAINICIOEJECUCION,
                                            A_FECHAFINEJECUCION,A_COSTOINVERSIONACTUALIZADO,A_COSTOINVERSIONTOTAL,A_LINKFORMATO7,A_LINK,A_LINKFORMATO8A,
                                            B_COSTOINVERSION,B_FECHAPRIMER,B_FECHAULTIMO,C_ULTIMAMODIFICACION,C_LINKAVANCEINVERSION,
                                            C_AVANCEEJECUCION,C_AVANCEFISICO,D_LINKPROCEDIMIENTO,D_LINKCONTRACTUAL,D_CONSULTORIAS,
                                            C_INICIOFISICA,C_FINFISICA,C_FECHADECLARACION,C_LINKDETALLEAVANCE,C_SITUACION,C_PROBLEMATICA,C_COSTOACTUALIZADO,
                                            C_DEVENGADOACUMULADO,C_PRIMERDEVENGADO,C_ULTIMODEVENGADO,C_PROGRAMACIONFINANCIERA,D_NUMEROOBRAS
                                            )";
               $sql.= "VALUES('$PROYECTO','$A_PROGRAMADOPMI','$A_LINKBANCOINVERSIONES','$A_SITUACION','$A_FECHAVIABILIDAD',$A_COSTOINVERSION, ";
               $sql.= " $A_BENEFICIARIOS,'$A_EXPEDIENTE','$A_REGISTROSEGUIMIENTO','$A_LINKFORMATO12B','$A_REGISTROCIERRE','$A_FECHAINICIOEJECUCION', ";
               $sql.= " '$A_FECHAFINEJECUCION',$A_COSTOINVERSIONACTUALIZADO,$A_COSTOINVERSIONTOTAL,'$A_LINKFORMATO7','$A_LINK','$A_LINKFORMATO8A', ";
               $sql.= " $B_COSTOINVERSION,'$B_FECHAPRIMER','$B_FECHAULTIMO','$C_ULTIMAMODIFICACION','$C_LINKAVANCEINVERSION', ";
               $sql.= " '$C_AVANCEEJECUCION','$C_AVANCEFISICO','$D_LINKPROCEDIMIENTO','$D_LINKCONTRACTUAL',$D_CONSULTORIAS, ";
               $sql.= " '$C_INICIOFISICA','$C_FINFISICA','$C_FECHADECLARACION','$C_LINKDETALLEAVANCE','$C_SITUACION','$C_PROBLEMATICA','$C_COSTOACTUALIZADO', ";
               $sql.= " '$C_DEVENGADOACUMULADO','$C_PRIMERDEVENGADO','$C_ULTIMODEVENGADO','$C_PROGRAMACIONFINANCIERA',$D_NUMEROOBRAS)";
        
               
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function actualizarRegistroProyecto($PROYECTO,$A_PROGRAMADOPMI,$A_LINKBANCOINVERSIONES,$A_SITUACION,$A_FECHAVIABILIDAD,$A_COSTOINVERSION,
                                             $A_BENEFICIARIOS,$A_EXPEDIENTE,$A_REGISTROSEGUIMIENTO,$A_LINKFORMATO12B,$A_REGISTROCIERRE,$A_FECHAINICIOEJECUCION,
                                             $A_FECHAFINEJECUCION,$A_COSTOINVERSIONACTUALIZADO,$A_COSTOINVERSIONTOTAL,$A_LINKFORMATO7,$A_LINK,$A_LINKFORMATO8A,
                                             $B_COSTOINVERSION,$B_FECHAPRIMER,$B_FECHAULTIMO,$C_ULTIMAMODIFICACION,$C_LINKAVANCEINVERSION,
                                             $C_AVANCEEJECUCION,$C_AVANCEFISICO,$D_LINKPROCEDIMIENTO,$D_LINKCONTRACTUAL,$D_CONSULTORIAS,
                                             $C_INICIOFISICA,$C_FINFISICA,$C_FECHADECLARACION,$C_LINKDETALLEAVANCE,$C_SITUACION,$C_PROBLEMATICA,$C_COSTOACTUALIZADO,
                                             $C_DEVENGADOACUMULADO,$C_PRIMERDEVENGADO,$C_ULTIMODEVENGADO,$C_PROGRAMACIONFINANCIERA,$D_NUMEROOBRAS){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_datosproyecto SET ";
        $sql.= "A_PROGRAMADOPMI='$A_PROGRAMADOPMI',A_LINKBANCOINVERSIONES='$A_LINKBANCOINVERSIONES',";
        $sql.= "A_SITUACION='$A_SITUACION',A_FECHAVIABILIDAD='$A_FECHAVIABILIDAD',A_COSTOINVERSION=$A_COSTOINVERSION,";
        $sql.= "A_BENEFICIARIOS='$A_BENEFICIARIOS',A_EXPEDIENTE='$A_EXPEDIENTE',A_REGISTROSEGUIMIENTO='$A_REGISTROSEGUIMIENTO',";
        $sql.= "A_REGISTROCIERRE='$A_REGISTROCIERRE',A_LINKFORMATO12B='$A_LINKFORMATO12B',A_FECHAINICIOEJECUCION='$A_FECHAINICIOEJECUCION',";
        $sql.= "A_FECHAFINEJECUCION='$A_FECHAFINEJECUCION',A_COSTOINVERSIONACTUALIZADO=$A_COSTOINVERSIONACTUALIZADO,";
        $sql.= "A_COSTOINVERSIONTOTAL=$A_COSTOINVERSIONTOTAL,A_LINKFORMATO7='$A_LINKFORMATO7',A_LINK='$A_LINK',A_LINKFORMATO8A='$A_LINKFORMATO8A',";
        $sql.= "B_COSTOINVERSION=$B_COSTOINVERSION,B_FECHAPRIMER='$B_FECHAPRIMER',B_FECHAULTIMO='$B_FECHAULTIMO',";
        $sql.= "C_ULTIMAMODIFICACION='$C_ULTIMAMODIFICACION',C_LINKAVANCEINVERSION='$C_LINKAVANCEINVERSION',";
        $sql.= "C_AVANCEEJECUCION='$C_AVANCEEJECUCION',C_AVANCEFISICO='$C_AVANCEFISICO',D_LINKPROCEDIMIENTO='$D_LINKPROCEDIMIENTO',";
        $sql.= "D_LINKCONTRACTUAL='$D_LINKCONTRACTUAL',D_CONSULTORIAS=$D_CONSULTORIAS, ";
        $sql.= "C_INICIOFISICA='$C_INICIOFISICA',C_FINFISICA='$C_FINFISICA',C_FECHADECLARACION='$C_FECHADECLARACION',";
        $sql.= "C_LINKDETALLEAVANCE='$C_LINKDETALLEAVANCE',C_SITUACION='$C_SITUACION',C_PROBLEMATICA='$C_PROBLEMATICA',C_COSTOACTUALIZADO='$C_COSTOACTUALIZADO',";
        $sql.= "C_DEVENGADOACUMULADO='$C_DEVENGADOACUMULADO',C_PRIMERDEVENGADO='$C_PRIMERDEVENGADO',C_ULTIMODEVENGADO='$C_ULTIMODEVENGADO',C_PROGRAMACIONFINANCIERA='$C_PROGRAMACIONFINANCIERA', ";
        $sql.= "D_NUMEROOBRAS=$D_NUMEROOBRAS ";
        $sql.= "WHERE ";
        $sql.= "PROYECTO='$PROYECTO'";
        
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function insertarRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url){
        
        $this->con = connect();
        
        $sql = " INSERT INTO tb_seguimiento(ANIO,DEPARTAMENTO,PROVINCIA,MUNICIPALIDAD,FUNCION,PROYECTO,FUENTE,URL,RUBRO,COSTO,EJECUCION_ANIO_A,EJECUCION_ANIO_B,EJECUCION_ANIO_ACTUAL,PIA,PIM,
                                            DEVENGADO,EJECUCION_TOTAL,AVANCE_TOTAL)";
               $sql.= "VALUES('$anio','$departamento','$provincia','$municipalidad','$funcion','$proyecto','$fuente','$url','$rubro',$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,$pia,$pim,";
               $sql.= " $devengado,$ejecucionTotal,$avance)";
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    public function actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url){
        
        $this->con = connect();
        
        $sql = "UPDATE tb_seguimiento SET ".
               "COSTO=$costo,EJECUCION_ANIO_A=$ejecucionAnioA,EJECUCION_ANIO_B=$ejecucionAnioB,EJECUCION_ANIO_ACTUAL=$ejecucionAnioActual,".
               "PIA=$pia,PIM=$pim,DEVENGADO=$devengado,EJECUCION_TOTAL=$ejecucionTotal,AVANCE_TOTAL=$avance,FECHAUPDATE=CURRENT_TIMESTAMP ".
               " WHERE ".
               "ANIO='$anio' AND ".
               "DEPARTAMENTO='$departamento' AND ".
               "PROVINCIA='$provincia' AND ".
               "MUNICIPALIDAD='$municipalidad' AND ".
               "FUNCION='$funcion' and ".
               "PROYECTO='$proyecto' and ".
               "FUENTE='$fuente' and ".
               "URL='$url' and ".
               "RUBRO='$rubro'";  
        
        
        $res = mysqli_query($this->con,$sql);
        
        mysqli_close($this->con);
        
        return $res;
    }
    
    
    
    public function getReporte($anio,$dpto,$prov,$mun,$muniFiltrada,$tipoVista,$queryExtra,$url){
        
        
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
            $campo="tb_seguimiento.PROYECTO";
        }
        else if($tipoVista=="3"){
            $campo="FUENTE";
        }
        else if($tipoVista=="4"){
            $campo="RUBRO";
        }
        
        /* tipo vista */
        
        if($tipoVista!=""){
                $group.= ",".$campo;
        }
        
        /* QUERY X PROYECTO */
        $join=""; $camposJoin="";
        if($campo=='tb_seguimiento.PROYECTO'){
            $join = " LEFT JOIN tb_datosproyecto d on d.proyecto = tb_seguimiento.PROYECTO ";
            $camposJoin=" d.id as IDDATOS , d.A_PROGRAMADOPMI, d.A_LINKBANCOINVERSIONES, d.A_SITUACION, d.A_FECHAVIABILIDAD, d.A_COSTOINVERSION, d.A_BENEFICIARIOS, ".
                        " d.A_EXPEDIENTE, d.A_REGISTROSEGUIMIENTO, d.A_LINKFORMATO12B, d.A_REGISTROCIERRE, d.A_FECHAINICIOEJECUCION, d.A_FECHAFINEJECUCION, d.A_COSTOINVERSIONACTUALIZADO, ".
                        " d.A_COSTOINVERSIONTOTAL, d.A_LINKFORMATO7, d.A_LINK, d.A_LINKFORMATO8A, d.B_COSTOINVERSION, d.B_FECHAPRIMER, d.B_FECHAULTIMO, d.C_ULTIMAMODIFICACION, ".
                        " d.C_LINKAVANCEINVERSION, d.C_AVANCEEJECUCION, d.C_AVANCEFISICO, d.D_LINKPROCEDIMIENTO, d.D_LINKCONTRACTUAL, d.D_CONSULTORIAS, ".
                        " d.C_INICIOFISICA, d.C_FINFISICA, d.C_FECHADECLARACION, d.C_LINKDETALLEAVANCE, d.C_SITUACION, d.C_PROBLEMATICA, d.C_COSTOACTUALIZADO, ".
                        " d.C_DEVENGADOACUMULADO, d.C_PRIMERDEVENGADO, d.C_ULTIMODEVENGADO, d.C_PROGRAMACIONFINANCIERA, d.D_NUMEROOBRAS, ";
        }
        /* **************** */
        
        /* *********************** QUERY *************************/
        
        $sql = "SELECT ";
               if($url==1){
                   $sql.="URL, "; 
               }
          $sql.=$campo." AS CAMPO, $camposJoin".
               "SUM(COSTO) COSTO, ".
               "SUM(EJECUCION_ANIO_A) EJECUCION_ANIO_A, ".
               "SUM(EJECUCION_ANIO_B) EJECUCION_ANIO_B, ".
               "SUM(EJECUCION_ANIO_ACTUAL) EJECUCION_ANIO_ACTUAL, ". 
               "SUM(PIA) PIA, ".
               "SUM(PIM) PIM, ".
               "SUM(DEVENGADO) DEVENGADO, ".
               "SUM(EJECUCION_TOTAL) EJECUCION_TOTAL, ".
               "SUM(AVANCE_TOTAL) AVANCE_TOTAL ".
               "FROM ".
               "tb_seguimiento ".$join;
            $sql.= "WHERE ANIO IN ('$anio') ";
        
        $sql.= $where." ";
        $sql.= $queryExtra;
        
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
                ANIO,
                DEPARTAMENTO,
                PROVINCIA,
                MUNICIPALIDAD,
                FUNCION,
                PROYECTO,
                FUENTE,
                RUBRO,
                URL,
                COSTO,
                EJECUCION_ANIO_A,
                EJECUCION_ANIO_B,
                EJECUCION_ANIO_ACTUAL,
                PIA,
                PIM,
                DEVENGADO,
                EJECUCION_TOTAL,
                AVANCE_TOTAL
                FROM
                tb_seguimiento order by IDSEGUIMIENTO";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }
    
    
    
    public function getTotales($anio,$dpto,$prov,$mun){
        
        
        $this->con = connect();
        
        $sql = "SELECT 
                CASE WHEN SUM(COSTO) is null then 0 ELSE SUM(COSTO) end COSTO,
                CASE WHEN SUM(EJECUCION_ANIO_A) is null then 0 ELSE SUM(EJECUCION_ANIO_A) end EJECUCION_ANIO_A,
                CASE WHEN SUM(EJECUCION_ANIO_B) is null then 0 ELSE SUM(EJECUCION_ANIO_B) end EJECUCION_ANIO_B,
                CASE WHEN SUM(EJECUCION_ANIO_ACTUAL) is null then 0 ELSE SUM(EJECUCION_ANIO_ACTUAL) end EJECUCION_ANIO_ACTUAL,
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(EJECUCION_TOTAL) is null then 0 ELSE SUM(EJECUCION_TOTAL) end EJECUCION_TOTAL,
                CASE WHEN SUM(AVANCE_TOTAL) is null then 0 ELSE SUM(AVANCE_TOTAL) end AVANCE_TOTAL
                FROM tb_seguimiento WHERE ANIO IN ('$anio')

                UNION ALL

                SELECT 
                CASE WHEN SUM(COSTO) is null then 0 ELSE SUM(COSTO) end COSTO,
                CASE WHEN SUM(EJECUCION_ANIO_A) is null then 0 ELSE SUM(EJECUCION_ANIO_A) end EJECUCION_ANIO_A,
                CASE WHEN SUM(EJECUCION_ANIO_B) is null then 0 ELSE SUM(EJECUCION_ANIO_B) end EJECUCION_ANIO_B,
                CASE WHEN SUM(EJECUCION_ANIO_ACTUAL) is null then 0 ELSE SUM(EJECUCION_ANIO_ACTUAL) end EJECUCION_ANIO_ACTUAL,
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(EJECUCION_TOTAL) is null then 0 ELSE SUM(EJECUCION_TOTAL) end EJECUCION_TOTAL,
                CASE WHEN SUM(AVANCE_TOTAL) is null then 0 ELSE SUM(AVANCE_TOTAL) end AVANCE_TOTAL
                FROM tb_seguimiento WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'

                UNION ALL

                SELECT 
                CASE WHEN SUM(COSTO) is null then 0 ELSE SUM(COSTO) end COSTO,
                CASE WHEN SUM(EJECUCION_ANIO_A) is null then 0 ELSE SUM(EJECUCION_ANIO_A) end EJECUCION_ANIO_A,
                CASE WHEN SUM(EJECUCION_ANIO_B) is null then 0 ELSE SUM(EJECUCION_ANIO_B) end EJECUCION_ANIO_B,
                CASE WHEN SUM(EJECUCION_ANIO_ACTUAL) is null then 0 ELSE SUM(EJECUCION_ANIO_ACTUAL) end EJECUCION_ANIO_ACTUAL,
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(EJECUCION_TOTAL) is null then 0 ELSE SUM(EJECUCION_TOTAL) end EJECUCION_TOTAL,
                CASE WHEN SUM(AVANCE_TOTAL) is null then 0 ELSE SUM(AVANCE_TOTAL) end AVANCE_TOTAL
                FROM tb_seguimiento WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'
                AND PROVINCIA='$prov'

                UNION ALL

                SELECT 
                CASE WHEN SUM(COSTO) is null then 0 ELSE SUM(COSTO) end COSTO,
                CASE WHEN SUM(EJECUCION_ANIO_A) is null then 0 ELSE SUM(EJECUCION_ANIO_A) end EJECUCION_ANIO_A,
                CASE WHEN SUM(EJECUCION_ANIO_B) is null then 0 ELSE SUM(EJECUCION_ANIO_B) end EJECUCION_ANIO_B,
                CASE WHEN SUM(EJECUCION_ANIO_ACTUAL) is null then 0 ELSE SUM(EJECUCION_ANIO_ACTUAL) end EJECUCION_ANIO_ACTUAL,
                CASE WHEN SUM(PIA) is null then 0 ELSE SUM(PIA) end PIA,
                CASE WHEN SUM(PIM) is null then 0 ELSE SUM(PIM) end PIM,
                CASE WHEN SUM(DEVENGADO) is null then 0 ELSE SUM(DEVENGADO) end DEVENGADO,
                CASE WHEN SUM(EJECUCION_TOTAL) is null then 0 ELSE SUM(EJECUCION_TOTAL) end EJECUCION_TOTAL,
                CASE WHEN SUM(AVANCE_TOTAL) is null then 0 ELSE SUM(AVANCE_TOTAL) end AVANCE_TOTAL
                FROM tb_seguimiento WHERE ANIO IN ('$anio') AND DEPARTAMENTO='$dpto'
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
    
    
    
    public function getSituacionInversion($CODIGOPROYECTO){
        
        
        $this->con = connect();
        
        $sql = "SELECT FECHAMODIFICACION,SITUACION FROM tb_situacioninversion WHERE CODIGOPROYECTO='$CODIGOPROYECTO'";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }
    
     public function getHistoricoDevengado($CODIGOPROYECTO){
        
        
        $this->con = connect();
        
        $sql = "SELECT ITEM,ANIO1,ANIO2,ANIO3,ANIO4,ANIO5,TOTAL FROM tb_devengadohistorico WHERE CODIGOPROYECTO='$CODIGOPROYECTO'";
       
        $res = mysqli_query($this->con,$sql);
        
        $lista=null;
        while($f=  mysqli_fetch_assoc($res)){
             $lista[]=$f;
        }
      
        mysqli_free_result($res);
        mysqli_close($this->con);

        return $lista;
        
    }
    
    
    public function getFechaUpdate(){
        
        
        $this->con = connect();
        
        $sql = "SELECT DATE_FORMAT(INFO.FECHA,'%d/%m/%Y') AS FECHA FROM (
				SELECT
                MIN(FECHA) FECHA FROM
                (

                SELECT MIN(FECHAUPDATE) FECHA FROM tb_registro
                UNION ALL
                SELECT MIN(FECHAUPDATE) FROM tb_seguimiento
                UNION ALL
                SELECT MIN(FECHAUPDATE) FROM tb_ingreso
                UNION ALL
                SELECT MIN(FECHAUPDATE) FROM tb_transferencia

                ) DATOS
                    ) INFO";
       
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