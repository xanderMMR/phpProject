<?php

require_once '../model/consultaModel.php';
require_once '../model/seguimientoModel.php';
require_once '../model/transferenciaModel.php';
require_once '../model/ingresoModel.php';


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        

if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}


$content = trim(file_get_contents("php://input"));


$json = json_decode( $content , true);


if(!is_array($json)){
    throw new Exception('JSON Invalido');
}


$tipoWS = $json['TIPO_WS'];



if($tipoWS=="DISCOVERY_INSERT"){
    
        $nombre = $json['NOMBRE_CLIENTE'];
        $clave = $json['CLAVE_ACCESO'];
        $estado = $json['ESTADO'];
        
        $model=new ingresoModel();


        $row = $model->insertarDiscovery($nombre,$clave,$estado);

        $resultado=0;

        if($row!=null){
            $resultado=1;
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
}

else if($tipoWS=="DISCOVERY_SELECT"){
    
        $clave = $json['CLAVE_ACCESO'];
        
        $model=new ingresoModel();

        $row = $model->buscarDiscovery($clave);


        if($row!=null){
            
            /* respuesta */
            header('Content-Type: application/json');
            echo json_encode($row[0]);
        }
        else
        {
            /* respuesta */
            header('Content-Type: application/json');
            echo json_encode("0");
        }
    
}

else if($tipoWS=='SITUACION_INVERSION'){
    
    /** 
    $content='{
        "TIPO_WS":"SITUACION_INVERSION",
        "CODIGOPROYECTO":"2000028: APOYO A LA COMUNICACION COMUNAL",
        "FECHAMODIFICACION":"14/10/2021 10:40:57 a.m.",
        "SITUACION":"EL PROYECTO DE INVERSION PUBLICA SE ENCUENTRA EN EJECUCION FISICA DESDE EL 02 DE FEBRERO, mismo que no presenta incovenientes"
        }';
    **/
    
        $CODIGOPROYECTO = $json['CODIGOPROYECTO'];
        $FECHAMODIFICACION = $json['FECHAMODIFICACION'];
        $SITUACION = $json['SITUACION'];
        
        $model=new seguimientoModel();


        $row = $model->validarSituacionInversion($CODIGOPROYECTO,$FECHAMODIFICACION,$SITUACION);

        $resultado=0;

        if($row==null){

            $registro = $model->insertarSituacionInversion($CODIGOPROYECTO,$FECHAMODIFICACION,$SITUACION);
            if($registro){
                $resultado=1;
            }
        }
        else{
            $resultado=1;
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
        
}

else if($tipoWS=='DEVENGADO_HISTORICO'){
    
    /** 
    $content='{
        "TIPO_WS":"DEVENGADO_HISTORICO",
        "CODIGOPROYECTO":"2000028: APOYO A LA COMUNICACION COMUNAL",
        "ITEM":"2.6.8 ELABORACIÓN DE EXPEDIENTES TÉCNICOS",
        "ANIO1":"100",
        "ANIO2":"200",
        "ANIO3":"300",
        "ANIO4":"400",
        "ANIO5":"500",
        "TOTAL":"1200"
        }';
    **/
    
        $CODIGOPROYECTO = $json['CODIGOPROYECTO'];
        $ITEM = $json['ITEM'];
        $ANIO1 = $json['ANIO1'];
        $ANIO2 = $json['ANIO2'];
        $ANIO3 = $json['ANIO3'];
        $ANIO4 = $json['ANIO4'];
        $ANIO5 = $json['ANIO5'];
        $TOTAL = $json['TOTAL'];
        
        $model=new seguimientoModel();


        $row = $model->validarItemDevengado($CODIGOPROYECTO,$ITEM,$ANIO1,$ANIO2,$ANIO3,$ANIO4,$ANIO5,$TOTAL);

        $resultado=0;

        if($row==null){

            $registro = $model->insertarItemDevengado($CODIGOPROYECTO,$ITEM,$ANIO1,$ANIO2,$ANIO3,$ANIO4,$ANIO5,$TOTAL);
            if($registro){
                $resultado=1;
            }
        }
        else{
            $resultado=1;
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
        
}


else if($tipoWS=='DATOS_PROYECTO'){
    
    /** 
    $content='{
        "TIPO_WS":"DATOS_PROYECTO",
        "PROYECTO":"01 - PROYECTO X",
        "A_PROGRAMADOPMI":"SI",
        "A_LINKBANCOINVERSIONES":"WWW.GOOGLE.COM",
        "A_SITUACION":"VIABLE",
        "A_FECHAVIABILIDAD":"10-10-22",
        "A_COSTOINVERSION":"123.24",
        "A_BENEFICIARIOS":"241",
        "A_EXPEDIENTE":"NO",
        "A_REGISTROSEGUIMIENTO":"SI",
        "A_LINKFORMATO12B":"WWW.GOOGLE.COM",
        "A_REGISTROCIERRE":"NO",
        "A_FECHAINICIOEJECUCION":"10-10-22",
        "A_FECHAFINEJECUCION":"10-10-22",
        "A_COSTOINVERSIONACTUALIZADO":"123.44",
        "A_COSTOINVERSIONTOTAL":"123.45",
        "A_LINKFORMATO7":"WWW.GOOGLE.COM",
        "A_LINK":"WWW.GOOGLE.COM",
        "A_LINKFORMATO8A":"WWW.GOOGLE.COM",
        "B_COSTOINVERSION":"122.33",
        "B_FECHAPRIMER":"DIC-2020",
        "B_FECHAULTIMO":"ENE-2021",
        "C_INICIOFISICA":"02/02/2020",
        "C_FINFISICA":"02/10/2021",
        "C_FECHADECLARACION":"22/04/2022",
        "C_LINKDETALLEAVANCE":"WWW.GOOGLE.COM",
        "C_SITUACION":"SITUACION....",
        "C_PROBLEMATICA":"PROBLEMATICA...",
        "C_COSTOACTUALIZADO":"S/ 234,132.43",
        "C_DEVENGADOACUMULADO":"S/ 45,123.54",
        "C_PRIMERDEVENGADO":"SET-2020",
        "C_ULTIMODEVENGADO":"AGO-2021",
        "C_ULTIMAMODIFICACION":"21/10/22",
        "C_LINKAVANCEINVERSION":"WWW.GOOGLE.COM",
        "C_AVANCEEJECUCION":"34.5 %",
        "C_AVANCEFISICO":"23.5 %",
        "C_PROGRAMACIONFINANCIERA": "S/ 234,34.12",
        "D_LINKPROCEDIMIENTO":"WWW.GOOGLE.COM",
        "D_LINKCONTRACTUAL":"WWW.GOOGLE.COM",
        "D_CONSULTORIAS":"3",
        "D_NUMEROOBRAS":"4"
        }';
    **/
    
        $PROYECTO = $json['PROYECTO'];
        $A_PROGRAMADOPMI = $json['A_PROGRAMADOPMI'];
        $A_LINKBANCOINVERSIONES = $json['A_LINKBANCOINVERSIONES'];
        $A_SITUACION = $json['A_SITUACION'];
        $A_FECHAVIABILIDAD = $json['A_FECHAVIABILIDAD'];
        $A_COSTOINVERSION = $json['A_COSTOINVERSION'];  if($A_COSTOINVERSION==""){$A_COSTOINVERSION=0;}
        $A_BENEFICIARIOS = $json['A_BENEFICIARIOS'];    if($A_BENEFICIARIOS==""){$A_BENEFICIARIOS="NULL";}
        $A_EXPEDIENTE = $json['A_EXPEDIENTE'];
        $A_REGISTROSEGUIMIENTO = $json['A_REGISTROSEGUIMIENTO'];
        $A_LINKFORMATO12B = $json['A_LINKFORMATO12B'];
        $A_REGISTROCIERRE = $json['A_REGISTROCIERRE'];
        $A_FECHAINICIOEJECUCION = $json['A_FECHAINICIOEJECUCION'];
        $A_FECHAFINEJECUCION = $json['A_FECHAFINEJECUCION'];
        $A_COSTOINVERSIONACTUALIZADO = $json['A_COSTOINVERSIONACTUALIZADO'];   if($A_COSTOINVERSIONACTUALIZADO==""){$A_COSTOINVERSIONACTUALIZADO=0;}
        $A_COSTOINVERSIONTOTAL = $json['A_COSTOINVERSIONTOTAL'];    if($A_COSTOINVERSIONTOTAL==""){$A_COSTOINVERSIONTOTAL=0;}
        $A_LINKFORMATO7 = $json['A_LINKFORMATO7'];
        $A_LINK = $json['A_LINK'];
        $A_LINKFORMATO8A = $json['A_LINKFORMATO8A'];
        $B_COSTOINVERSION = $json['B_COSTOINVERSION'];      if($B_COSTOINVERSION==""){$B_COSTOINVERSION=0;}
        $B_FECHAPRIMER = $json['B_FECHAPRIMER'];
        $B_FECHAULTIMO = $json['B_FECHAULTIMO'];
        $C_INICIOFISICA = $json['C_INICIOFISICA'];
        $C_FINFISICA = $json['C_FINFISICA'];
        $C_FECHADECLARACION = $json['C_FECHADECLARACION'];
        $C_LINKDETALLEAVANCE = $json['C_LINKDETALLEAVANCE'];
        $C_SITUACION = $json['C_SITUACION'];
        $C_PROBLEMATICA = $json['C_PROBLEMATICA'];
        $C_COSTOACTUALIZADO = $json['C_COSTOACTUALIZADO'];
        $C_DEVENGADOACUMULADO = $json['C_DEVENGADOACUMULADO'];
        $C_PRIMERDEVENGADO = $json['C_PRIMERDEVENGADO'];
        $C_ULTIMODEVENGADO = $json['C_ULTIMODEVENGADO'];
        $C_ULTIMAMODIFICACION = $json['C_ULTIMAMODIFICACION'];
        $C_LINKAVANCEINVERSION = "";
        $C_AVANCEEJECUCION = $json['C_AVANCEEJECUCION'];
        $C_AVANCEFISICO = $json['C_AVANCEFISICO'];
        $C_PROGRAMACIONFINANCIERA = $json['C_PROGRAMACIONFINANCIERA'];
        $D_LINKPROCEDIMIENTO = $json['D_LINKPROCEDIMIENTO'];
        $D_LINKCONTRACTUAL = $json['D_LINKCONTRACTUAL'];
        $D_CONSULTORIAS = $json['D_CONSULTORIAS'];      if($D_CONSULTORIAS==""){$D_CONSULTORIAS="NULL";}
        $D_NUMEROOBRAS = $json['D_NUMEROOBRAS'];        if($D_NUMEROOBRAS==""){$D_NUMEROOBRAS="NULL";}
        
        $model=new seguimientoModel();


        $row = $model->validaRegistroProyecto($PROYECTO);

        $resultado=0;

        if($row==null){

            $registro = $model->insertarRegistroProyecto($PROYECTO,$A_PROGRAMADOPMI,$A_LINKBANCOINVERSIONES,$A_SITUACION,$A_FECHAVIABILIDAD,$A_COSTOINVERSION,
                                             $A_BENEFICIARIOS,$A_EXPEDIENTE,$A_REGISTROSEGUIMIENTO,$A_LINKFORMATO12B,$A_REGISTROCIERRE,$A_FECHAINICIOEJECUCION,
                                             $A_FECHAFINEJECUCION,$A_COSTOINVERSIONACTUALIZADO,$A_COSTOINVERSIONTOTAL,$A_LINKFORMATO7,$A_LINK,$A_LINKFORMATO8A,
                                             $B_COSTOINVERSION,$B_FECHAPRIMER,$B_FECHAULTIMO,$C_ULTIMAMODIFICACION,$C_LINKAVANCEINVERSION,
                                             $C_AVANCEEJECUCION,$C_AVANCEFISICO,$D_LINKPROCEDIMIENTO,$D_LINKCONTRACTUAL,$D_CONSULTORIAS,
                                             $C_INICIOFISICA,$C_FINFISICA,$C_FECHADECLARACION,$C_LINKDETALLEAVANCE,$C_SITUACION,$C_PROBLEMATICA,$C_COSTOACTUALIZADO,
                                             $C_DEVENGADOACUMULADO,$C_PRIMERDEVENGADO,$C_ULTIMODEVENGADO,$C_PROGRAMACIONFINANCIERA,$D_NUMEROOBRAS);
           
            if($registro){
                $resultado=1;
            }
        }
        else{

            $registro = $model->actualizarRegistroProyecto($PROYECTO,$A_PROGRAMADOPMI,$A_LINKBANCOINVERSIONES,$A_SITUACION,$A_FECHAVIABILIDAD,$A_COSTOINVERSION,
                                             $A_BENEFICIARIOS,$A_EXPEDIENTE,$A_REGISTROSEGUIMIENTO,$A_LINKFORMATO12B,$A_REGISTROCIERRE,$A_FECHAINICIOEJECUCION,
                                             $A_FECHAFINEJECUCION,$A_COSTOINVERSIONACTUALIZADO,$A_COSTOINVERSIONTOTAL,$A_LINKFORMATO7,$A_LINK,$A_LINKFORMATO8A,
                                             $B_COSTOINVERSION,$B_FECHAPRIMER,$B_FECHAULTIMO,$C_ULTIMAMODIFICACION,$C_LINKAVANCEINVERSION,
                                             $C_AVANCEEJECUCION,$C_AVANCEFISICO,$D_LINKPROCEDIMIENTO,$D_LINKCONTRACTUAL,$D_CONSULTORIAS,
                                             $C_INICIOFISICA,$C_FINFISICA,$C_FECHADECLARACION,$C_LINKDETALLEAVANCE,$C_SITUACION,$C_PROBLEMATICA,$C_COSTOACTUALIZADO,
                                             $C_DEVENGADOACUMULADO,$C_PRIMERDEVENGADO,$C_ULTIMODEVENGADO,$C_PROGRAMACIONFINANCIERA,$D_NUMEROOBRAS);

            if($registro){
                $resultado=1;
            }
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
        
}

else if($tipoWS=="PRESUPUESTO"){

        /*
        $content = '{
        "TIPO_WS":"PRESUPUESTO",
        "ANIO":"2020",
        "DEPARTAMENTO":"HUANUCO",
        "PROVINCIA":"PUERTO INCA",
        "MUNICIPALIDAD":"MUNICIPALIDAD DISTRITAL DE CODO DE POZUZO",
        "NIVEL_GOBIERNO":"M: GOBIERNOS LOCALES",
        "GOBIERNO_LOCAL":"M: MUNICIPALIDADES",
        "FUNCION":"03: PLANEAMIENTO, GESTION Y RESERVA DE CONTINGENCIA",
        "DIVISION_FUNCIONAL":"004: PLANEAMIENTO GUBERNAMENTAL",
        "GRUPO_FUNCIONAL":"0005: PLANEAMIENTO INSTITUCIONAL",
        "CATEGORIA_PRESUPUESTAL":"9001: ACCIONES CENTRALES",
        "PROYECTO":"3999999: SIN PRODUCTO",
        "FUENTE":"5: RECURSOS DETERMINADOS",
        "RUBRO":"07: FONDO DE COMPENSACION MUNICIPAL",
        "TIPO_RECURSO":"A: SUB CUENTA - FONCOMUN",
        "GENERICA":"5-21: PERSONAL Y OBLIGACIONES SOCIALES",
        "SUBGENERICA":"1: RETRIBUCIONES Y COMPLEMENTOS EN EFECTIVO",
        "DETALLE_SUBGENERICA":"1: PERSONAL ADMINISTRATIVO",
        "ESPECIFICA":"1: PERSONAL ADMINISTRATIVO",
        "DETALLE_ESPECIFICA":"9: PERSONAL DE CONFIANZA (RÉGIMEN LABORAL PÚBLICO)",
        "PIA":0.0,
        "PIM":0.0,
        "CERTIFICACION":0.0,
        "COMPROMISO":0.0,
        "ATENCION":3000.0,
        "DEVENGADO":3000.0,
        "GIRADO":3000.0,
        "AVANCE":0.0,
        "MES":"Enero",
        "TIPO_DATO": 1
        }';
        */
    
        $anio = $json['ANIO'];
        $departamento = $json['DEPARTAMENTO'];
        $provincia = $json['PROVINCIA'];
        $municipalidad = $json['MUNICIPALIDAD'];
        $nivelGobierno = $json['NIVEL_GOBIERNO'];
        $gobiernoLocal = $json['GOBIERNO_LOCAL'];
        $funcion = $json['FUNCION'];
        $divisionFuncional = $json['DIVISION_FUNCIONAL'];
        $grupoFuncional = $json['GRUPO_FUNCIONAL'];
        $categoriaPresupuestal = $json['CATEGORIA_PRESUPUESTAL'];
        $proyecto = $json['PROYECTO'];
        $fuente = $json['FUENTE'];
        $rubro = $json['RUBRO'];
        $tipoRecurso = $json['TIPO_RECURSO'];
        $generica = $json['GENERICA'];
        $subgenerica = $json['SUBGENERICA'];
        $detalleSubgenerica = $json['DETALLE_SUBGENERICA'];
        $especifica = $json['ESPECIFICA'];
        $detalleEspecifica = $json['DETALLE_ESPECIFICA'];
        $pia = $json['PIA'];
        $pim = $json['PIM'];
        $certificacion = $json['CERTIFICACION'];
        $compromiso = $json['COMPROMISO'];
        $atencion = $json['ATENCION'];
        $devengado = $json['DEVENGADO'];
        $girado = $json['GIRADO'];
        $avance = $json['AVANCE'];
        $mes = $json['MES'];
        $tipoDato = $json['TIPO_DATO'];
        
        
        $model=new consultaModel();


        $row = $model->validaRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                                 $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                                 $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                                 $detalleEspecifica,$tipoDato,$mes);

        $resultado=0;

        if($row==null){

            $registro = $model->insertarRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                                 $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                                 $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                                 $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance,$tipoDato,$mes);
            if($registro){
                $resultado=1;
            }
        }
        else{

            $registro = $model->actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$nivelGobierno,$gobiernoLocal,
                                 $funcion,$divisionFuncional,$grupoFuncional,$categoriaPresupuestal,$proyecto,
                                 $fuente,$rubro,$tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,
                                 $detalleEspecifica,$pia,$pim,$certificacion,$compromiso,$atencion,$devengado,$girado,$avance,$tipoDato,$mes);

            if($registro){
                $resultado=1;
            }
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
    
}
else if($tipoWS=="SEGUIMIENTO"){
 
        
        /*
        $content = '{
        "TIPO_WS":"SEGUIMIENTO",
        "ANIO":"2020",
        "DEPARTAMENTO":"HUANUCO",
        "PROVINCIA":"PUERTO INCA",
        "MUNICIPALIDAD":"MUNICIPALIDAD DISTRITAL DE CODO DE POZUZO",
        "FUNCION":"004: PLANEAMIENTO GUBERNAMENTAL",
        "PROYECTO":"0005: PLANEAMIENTO INSTITUCIONAL",
        "FUENTE":"9001: ACCIONES CENTRALES",
        "RUBRO":"3999999: SIN PRODUCTO",
        "COSTO":80,
        "EJECUCION_ANIO_A":70,
        "EJECUCION_ANIO_B":60,
        "EJECUCION_ANIO_ACTUAL":50,
        "PIA":40,
        "PIM":30,
        "DEVENGADO":20,
        "EJECUCION_TOTAL":10,
        "AVANCE_TOTAL":0.0,
        "URL": www.google.com.pe
        }';
        */
    
        $anio = $json['ANIO'];
        $departamento = $json['DEPARTAMENTO'];
        $provincia = $json['PROVINCIA'];
        $municipalidad = $json['MUNICIPALIDAD'];
        $funcion = $json['FUNCION'];
        $proyecto = $json['PROYECTO'];
        $fuente = $json['FUENTE'];
        $rubro = $json['RUBRO'];
        $costo = $json['COSTO'];
        $ejecucionAnioA = $json['EJECUCION_ANIO_A'];
        $ejecucionAnioB = $json['EJECUCION_ANIO_B'];
        $ejecucionAnioActual = $json['EJECUCION_ANIO_ACTUAL'];
        $pia = $json['PIA'];
        $pim = $json['PIM'];
        $devengado = $json['DEVENGADO'];
        $ejecucionTotal = $json['EJECUCION_TOTAL'];
        $avance = $json['AVANCE_TOTAL'];
        $url = $json['URL'];

        $model=new seguimientoModel();


        $row = $model->validaRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url);
                           
        $resultado=0;

        if($row==null){

            $registro = $model->insertarRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url);
            if($registro){
                $resultado=1;
            }
        }
        else{

            $registro = $model->actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$funcion,
                                   $proyecto,$fuente,$rubro,$costo,$ejecucionAnioA,$ejecucionAnioB,$ejecucionAnioActual,
                                   $pia,$pim,$devengado,$ejecucionTotal,$avance,$url);

            if($registro){
                $resultado=1;
            }
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
    
}
else if($tipoWS=="TRANSFERENCIA"){
 
        
        /*
        $content = '{
        "TIPO_WS":"TRANSFERENCIA",
        "ANIO":"2022",
        "TIPO_RECURSO":"RECURSOS AUTORIZADOS",
        "DEPARTAMENTO":"HUANUCO",
        "PROVINCIA":"PUERTO INCA",
        "MUNICIPALIDAD":"MUNICIPALIDAD DISTRITAL DE CODO DE POZUZO",
        "FUENTE":"004: PLANEAMIENTO GUBERNAMENTAL",
        "RUBRO":"0005: PLANEAMIENTO INSTITUCIONAL",
        "RECURSO":"9001: ACCIONES CENTRALES",
        "MES":"Enero",
        "AUTORIZADO":80,
        "ACREDITADO":70
        }';
        */
    
        $anio = $json['ANIO'];
        $tipoRecurso = $json['TIPO_RECURSO'];
        $departamento = $json['DEPARTAMENTO'];
        $provincia = $json['PROVINCIA'];
        $municipalidad = $json['MUNICIPALIDAD'];
        $fuente = $json['FUENTE'];
        $rubro = $json['RUBRO'];
        $recurso = $json['RECURSO'];
        $mes = $json['MES'];
        $autorizado = $json['AUTORIZADO'];
        $acreditado = $json['ACREDITADO'];

        $model=new transferenciaModel();


        $row = $model->validaRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes);
                           
        $resultado=0;

        if($row==null){

            $registro = $model->insertarRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes,$autorizado,$acreditado);
            if($registro){
                $resultado=1;
            }
        }
        else{

            $registro = $model->actualizarRegistro($anio,$tipoRecurso,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $recurso,$mes,$autorizado,$acreditado);

            if($registro){
                $resultado=1;
            }
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
    
}
else if($tipoWS=="INGRESO"){
 
        
        /*
        $content = '{
        "TIPO_WS":"INGRESO",
        "ANIO":"2022",
        "DEPARTAMENTO":"HUANUCO",
        "PROVINCIA":"PUERTO INCA",
        "MUNICIPALIDAD":"MUNICIPALIDAD DISTRITAL DE CODO DE POZUZO",
        "FUENTE":"004: PLANEAMIENTO GUBERNAMENTAL",
        "RUBRO":"0005: PLANEAMIENTO INSTITUCIONAL",
        "TIPO_RECURSO":"9001: ACCIONES CENTRALES",
        "GENERICA":"5-21: PERSONAL Y OBLIGACIONES SOCIALES",
        "SUBGENERICA":"1: RETRIBUCIONES Y COMPLEMENTOS EN EFECTIVO",
        "DETALLE_SUBGENERICA":"1: PERSONAL ADMINISTRATIVO",
        "ESPECIFICA":"1: PERSONAL ADMINISTRATIVO",
        "DETALLE_ESPECIFICA":"9: PERSONAL DE CONFIANZA (RÉGIMEN LABORAL PÚBLICO)",
        "MES":"Enero",
        "TRIMESTRE":"I TRIMESTRE",
        "PIA":80,
        "PIM":70,
        "RECAUDADO":10,
        }';
        */
        
        $anio = $json['ANIO'];
        $departamento = $json['DEPARTAMENTO'];
        $provincia = $json['PROVINCIA'];
        $municipalidad = $json['MUNICIPALIDAD'];
        $fuente = $json['FUENTE'];
        $rubro = $json['RUBRO'];
        $tipoRecurso = $json['TIPO_RECURSO'];
        $generica = $json['GENERICA'];
        $subgenerica = $json['SUBGENERICA'];
        $detalleSubgenerica = $json['DETALLE_SUBGENERICA'];
        $especifica = $json['ESPECIFICA'];
        $detalleEspecifica = $json['DETALLE_ESPECIFICA'];
        $mes = $json['MES'];
        $trimestre = $json['TRIMESTRE'];
        $pia = $json['PIA'];
        $pim = $json['PIM'];
        $recaudado = $json['RECAUDADO'];
        
        $model=new ingresoModel();


        $row = $model->validaRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                      $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                       $mes,$trimestre);
                           
        $resultado=0;

        if($row==null){

            $registro = $model->insertarRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                       $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                       $mes,$trimestre,$pia,$pim,$recaudado);
            if($registro){
                $resultado=1;
            }
        }
        else{

            $registro = $model->actualizarRegistro($anio,$departamento,$provincia,$municipalidad,$fuente,$rubro,
                                       $tipoRecurso,$generica,$subgenerica,$detalleSubgenerica,$especifica,$detalleEspecifica,
                                       $mes,$trimestre,$pia,$pim,$recaudado);

            if($registro){
                $resultado=1;
            }
        }

        /* respuesta */
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
    
}

else{
    throw new Exception('Valor invalido del parametro TIPO_WS');
}




