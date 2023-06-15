<?php

require_once '../model/consultaModel.php';
require_once '../model/loginModel.php';
require_once '../model/muniDTO.php';

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
    throw new Exception('Received content contained invalid JSON!');
}

$tipo = $json['TIPO_METODO'];

/* respuesta */
header('Content-Type: application/json');
/* ********* */

if($tipo=='LOGIN'){
    
    $correo = $json['CORREO'];
    $clave = base64_encode( $json['CLAVE'] );
    
    $loginModel=new loginModel();
    $datos = $loginModel->validarUsuario($correo, $clave);
    
    if($datos==null){
        echo json_encode("0");
    }
    else{
        echo json_encode("1");
    }
}

else if($tipo=="USUARIO_REGISTRAR"){
    
    $nombre = $json['NOMBRE'];
    $paterno = $json['PATERNO'];
    $materno = $json['MATERNO'];
    $correo = $json['CORREO'];
    $muni = $json['MUNICIPALIDAD'];
    $otro = $json['OTRO'];
    $clave = base64_encode($json['CLAVE']);
    
    $datos=array("nombre"=>$nombre,
                 "paterno"=>$paterno,
                 "materno"=>$materno,
                 "correo"=>$correo,
                 "clave"=>$clave,
                 "muni"=>$muni,
                 "otro"=>$otro,
                );
    
    $model = new loginModel();
    
    $usuarios = $model->validarCorreo($correo);
    
    if($usuarios==null){
        
        $p = $model->agregarUsuario($datos);
        
        if($p){
            echo json_encode("1");
        }
        else{
            echo json_encode("0");
        }
    }
    else{
        echo json_encode("2");
    }
}

else if($tipo=="MUNICIPALIDAD_LISTAR"){
    
    $consultaModel=new consultaModel();
    
    $lista = $consultaModel->listarMunicipalidad("-1","-1");
    
    echo json_encode($lista);
}

else if($tipo=="DEPARTAMENTO_LISTAR"){
    
    $consultaModel=new consultaModel();
    
    $lista = $consultaModel->listarDepartamento();
    
    echo json_encode($lista);
}


else if($tipo=="PROVINCIA_LISTAR"){
    
    $dep = $json['DEPARTAMENTO'];
    
    $consultaModel=new consultaModel();
    
    $lista = $consultaModel->listarProvincia($dep);
    
    echo json_encode($lista);
}

else if($tipo=="MUNICIPALIDAD_BUSCAR"){
    
    $dpto = $json['DEPARTAMENTO'];
    $prov = $json['PROVINCIA'];
    
    $consultaModel=new consultaModel();
    
    $lista = $consultaModel->listarMunicipalidad($dpto,$prov);
    
    echo json_encode($lista);
}

else if($tipo=="MUNICIPALIDAD_RESUMEN"){
    
    $anio = $json['ANIO'];
    
    $model=new consultaModel();
    
    $lista = $model->resumenMunicipalidad($anio);
    
    echo json_encode($lista);
}

else if($tipo=="MUNICIPALIDAD_DETALLE"){
    
    $muniDTO=new muniDTO();
    
    $anio = $json['ANIO'];
    $muni = $json['MUNICIPALIDAD'];
    
    $model=new consultaModel();
    
    $datosMuni = $model->buscarDatosMunicipalidad($muni);
    
        $muniDTO->setDepartamento( $datosMuni['DEPARTAMENTO'] );
        $muniDTO->setProvincia( $datosMuni['PROVINCIA'] );
        $muniDTO->setDistrito( $datosMuni['DISTRITO'] );
    
    $datosAvance = $model->presupuestoEjecucionAvance($anio, $muni);
        
        $muniDTO->setPresupuesto( $datosAvance['PRESUPUESTO'] );
        $muniDTO->setEjecucion( $datosAvance['EJECUCION'] );
        $muniDTO->setAvance( $datosAvance['AVANCE'] );
    
    $mayorProyecto = $model->resumenMuniDetalleTop($anio, $muni,"PROYECTO");
    if($mayorProyecto!=null){
        $mayorProyecto = $mayorProyecto[0];
        $mayorProyecto['PROYECTO'];
        
        $muniDTO->setInversionMasPIM($mayorProyecto['PROYECTO']);
    }    
    else{
        $muniDTO->setInversionMasPIM("");
    }
    
    
    $funcionTransporte = $model->resumenMuniTopFuncion($anio, $muni,'15: TRANSPORTE');
    $porTransporte="0";
    if($datosAvance!=null && $funcionTransporte!=null){
        $porTransporte = number_format( $funcionTransporte['PRESUPUESTO']*100/$datosAvance['PRESUPUESTO'] , 0);
    }
    
    $funcionSaneamiento = $model->resumenMuniTopFuncion($anio, $muni,'18: SANEAMIENTO');
    $porSaneamiento="0";
    if($datosAvance!=null && $funcionSaneamiento!=null){
        $porSaneamiento = number_format( $funcionSaneamiento['PRESUPUESTO']*100/$datosAvance['PRESUPUESTO'] , 0);
    }
    
    $funcionEducacion = $model->resumenMuniTopFuncion($anio, $muni,'22: EDUCACION');
    $porEducacion="0";
    if($datosAvance!=null && $funcionEducacion!=null){
        $porEducacion = number_format( $funcionEducacion['PRESUPUESTO']*100/$datosAvance['PRESUPUESTO'] , 0);
    }
    
        $muniDTO->setPorcentajeTransporte($porTransporte);
        $muniDTO->setPorcentajeEducacion($porEducacion);
        $muniDTO->setPorcentajeSaneamiento($porSaneamiento);
        
        
    $listaCategoria = $model->resumenMuniDetalle($anio, $muni,"CATEGORIA_PRESUPUESTAL");
    $listaRubro = $model->resumenMuniDetalle($anio, $muni,"RUBRO");
    $listaFuncion = $model->resumenMuniDetalle($anio, $muni,"FUNCION");
    $listaProyecto = $model->resumenMuniDetalle($anio, $muni,"PROYECTO");
    
        $muniDTO->setListaCategoria($listaCategoria);
        $muniDTO->setListaRubro($listaRubro);
        $muniDTO->setListaFuncion($listaFuncion);
        $muniDTO->setListaProyecto($listaProyecto);
        $muniDTO->setTotalProyecto(count($listaProyecto));
    
    $numProyectoSupera = calcularNumeroProyectoSupera($listaProyecto,$datosMuni['MONTO']);   
    $textoProyecto="";
    
    if($listaProyecto!=null){
        if($datosMuni['IDMUNICIPALIDAD']!=19){ 
            $textoProyecto = $numProyectoSupera." proyecto(s) >= S/ ".($datosMuni['MONTO']/1000)." mil";
        }
    }
    
        $muniDTO->setTotalProyectoTexto($textoProyecto);
        
        
    $cumplimientoCertificacion = 0;
    $cumplimientoContrato = 0;
    $cumplimientoGirado = 0;
    if($datosAvance['PRESUPUESTO']!=0){
            $cumplimientoCertificacion = $datosAvance['CERTIFICACION']*100/$datosAvance['PRESUPUESTO'];
    }
    if($datosAvance['COMPROMISO']!=0){
            $cumplimientoContrato = $datosAvance['EJECUCION']*100/$datosAvance['COMPROMISO'];
    }
    if($datosAvance['EJECUCION']!=0){
            $cumplimientoGirado = $datosAvance['GIRADO']*100/$datosAvance['EJECUCION'];
    }
    
        $muniDTO->setCumplimientoCertificacion(number_format($cumplimientoCertificacion,2));
        $muniDTO->setCumplimientoContrato(number_format($cumplimientoContrato,2));
        $muniDTO->setCumplimientoGirado(number_format($cumplimientoGirado,2));
        
    echo json_encode($muniDTO);    
}


function calcularNumeroProyectoSupera($listaProyecto,$monto){
    $cantidad=0;
    if($listaProyecto!=null){
        foreach($listaProyecto as $r){
            if($r['PRESUPUESTO']>$monto){
                $cantidad++;
            }
        }
    }
    return $cantidad;
}