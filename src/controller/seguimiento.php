<?php

require_once '../model/loginModel.php';
require_once '../model/consultaModel.php';
require_once '../model/keyValue.php';
require_once '../model/seguimientoModel.php';
require_once '../model/keyValue.php';

if(!isset($_SESSION))session_start();


if( isset($_GET['situacion_inversion']) ){
    
    date_default_timezone_set("America/Lima");

    $fechaHora = date("Y-m-d_h.m.s");

    header('Content-type:application/xls;charset=ISO-8859-1');
    header('Content-Disposition: attachment; filename=situacion-inversion-'.$fechaHora.'.xls');


    $encriptado = $_GET['encriptado'];
    $proyecto = base64_decode($encriptado);
    
    $model = new seguimientoModel();
    
    $lista = $model->getSituacionInversion($proyecto);
    
    if($lista!=null){
        ?>

    <style>
        td { 
        padding: 10px;
    }
    </style>

    <table border="1">
        <tr style="background:#004B66;color: white;text-align: center">
            <td colspan='2'>HISTORIAL DE SITUACION DE LA INVERSION</td>
        </tr>
        <tr style="background:#004B66;color: white;text-align: center">
            <td>FECHA DE MODIFICACION</td>
            <td>SITUACION DE LA INVERSION</td>
        </tr>
        <?php foreach($lista as $r){ ?>
        <tr style='background:#F2F2F2;color: black'>
            <td><?php echo $r['FECHAMODIFICACION']; ?></td>
            <td><?php echo $r['SITUACION']; ?> </td>
        </tr>    
        <?php } ?>
        
    </table>

    <?php
    }
    
    exit();
}

else if( isset($_POST['situacion_inversion']) ){
    
    $proyecto = $_POST['proyecto'];
    $encriptado = base64_encode($proyecto);
    
    $model = new seguimientoModel();
    
    $lista = $model->getSituacionInversion($proyecto);
    
    if($lista!=null){
        ?>

    <style>
        td { 
        padding: 10px;
    }
    </style>

    <br>
    <a href="../../../consultas/src/controller/seguimiento.php?situacion_inversion=1&encriptado=<?php echo $encriptado ?>">
    <img src="icono-descargar-excel.png" style="width:35px"/>
    </a>
    <br><br>
    <table border="1">
        <tr style="background:#004B66;color: white;text-align: center">
            <td colspan='2'>Historial de Situación de la inversión</td>
        </tr>
        <tr style="background:#004B66;color: white;text-align: center">
            <td>Fecha de modificación</td>
            <td>Situación de la inversión</td>
        </tr>
        
        <?php foreach($lista as $r){ ?>
        <tr style='background:#F2F2F2;color: black'>
            <td><?php echo $r['FECHAMODIFICACION']; ?></td>
            <td><?php echo $r['SITUACION']; ?> </td>
        </tr>    
        <?php } ?>
        
    </table>


        <?php
    }
    
}


else if( isset($_POST['historico_devengado']) ){
    
    $proyecto = $_POST['proyecto'];
    
    $model = new seguimientoModel();
    
    $lista = $model->getHistoricoDevengado($proyecto);
    
    if($lista!=null){
        ?>

    <style>
        td { 
        padding: 10px;
    }
    </style>

    <br>
    <table border="1" style="width:100%!important">
        
        <tr style="background:#004B66;color: white;text-align: center">
            <td>Específica de gasto</td>
            <td><?php echo date('Y')-4 ?></td>
            <td><?php echo date('Y')-3 ?></td>
            <td><?php echo date('Y')-2 ?></td>
            <td><?php echo date('Y')-1 ?></td>
            <td><?php echo date('Y') ?></td>
            <td>Total</td>
        </tr>
        
        <?php foreach($lista as $r){ ?>
        <tr style='background:#F2F2F2;color: black'>
            <td><?php echo $r['ITEM']; ?></td>
            <td align="right"><?php echo $r['ANIO1']; ?> </td>
            <td align="right"><?php echo $r['ANIO2']; ?> </td>
            <td align="right"><?php echo $r['ANIO3']; ?> </td>
            <td align="right"><?php echo $r['ANIO4']; ?> </td>
            <td align="right"><?php echo $r['ANIO5']; ?> </td>
            <td align="right"><?php echo $r['TOTAL']; ?> </td>
        </tr>    
        <?php } ?>
        
    </table>


        <?php
    }
    
}


else if( isset($_GET['reporte']) ){

    
date_default_timezone_set("America/Lima");

$fechaHora = date("Y-m-d_h.m.s");

header('Content-type:application/xls;charset=ISO-8859-1');
header('Content-Disposition: attachment; filename=base-datos-seguimiento-'.$fechaHora.'.xls');

$model = new seguimientoModel();

$datos = $model->getBaseDatos();

    if($datos!=null){
        ?>

        <table border="1">
            <tr>
                <th>A&ntilde;o</th>
                <th>Departamento</th>
                <th>Provincia</th>
                <th>Municipalidad</th>
                <th>Funci&oacute;n</th>
                <th>Proyecto</th>
                <th>Fuente</th>
                <th>Rubro</th>
                <th>URL</th>
                <th>Costo</th>
                <th>Ejecuci&oacute;n A&ntilde;o 1</th>
                <th>Ejecuci&oacute;n A&ntilde;o 2</th>
                <th>Ejecuci&oacute;n A&ntilde;o Actual</th>
                <th>PIA</th>
                <th>PIM</th>
                <th>Devengado</th>
                <th>Ejecuci&oacute;n Total</th>
                <th>Avance Total</th>
            </tr>
            <?php foreach($datos as $r){ ?>
            <tr>
                    <td> <?php echo $r['ANIO']; ?> </td>
                    <td> <?php echo $r['DEPARTAMENTO']; ?> </td>
                    <td> <?php echo $r['PROVINCIA']; ?> </td>
                    <td> <?php echo $r['MUNICIPALIDAD']; ?> </td>
                    <td> <?php echo $r['FUNCION']; ?> </td>
                    <td> <?php echo $r['PROYECTO']; ?> </td>
                    <td> <?php echo $r['FUENTE']; ?> </td>
                    <td> <?php echo $r['RUBRO']; ?> </td>
                    <td> <?php echo $r['URL']; ?> </td>
                    <td> <?php echo $r['COSTO']; ?> </td>
                    <td> <?php echo $r['EJECUCION_ANIO_A']; ?> </td>
                    <td> <?php echo $r['EJECUCION_ANIO_B']; ?> </td>
                    <td> <?php echo $r['EJECUCION_ANIO_ACTUAL']; ?> </td>
                    <td> <?php echo $r['PIA']; ?> </td>
                    <td> <?php echo $r['PIM']; ?> </td>
                    <td> <?php echo $r['DEVENGADO']; ?> </td>
                    <td> <?php echo $r['EJECUCION_TOTAL']; ?> </td>
                    <td> <?php echo $r['AVANCE_TOTAL']; ?> </td>
            </tr>
            <?php }?>
        </table>

        <?php

        exit();
    }

}

if( isset($_POST['provincia']) ){
    
    $dpto = $_POST['departamento'];
    
    $consultaModel=new consultaModel();
    $lista = $consultaModel->listarProvincia($dpto);
    
    ?>
        <option value="-1">TODOS</option>
    <?php
    
    foreach($lista as $r){
        ?>
        <option><?php echo $r['PROVINCIA']; ?></option>
        <?php 
    }
}

else if ( isset($_POST['muni']) ){
    
    $dpto = $_POST['dpto'];
    $prov = $_POST['prov'];
    
    $consultaModel=new consultaModel();
    $lista = $consultaModel->listarMunicipalidad($dpto,$prov);
    
    ?>
        <option value="-1">TODOS</option>
    <?php
    
    foreach($lista as $r){
        ?>
        <option><?php echo $r['NOMBRE']; ?></option>
        <?php 
    }
}

else if ( isset($_POST['limpiar_muni']) ){
    
    ?>
      <option value="-1">TODOS</option>  
    <?php    
}

else if (isset($_POST['borrarFiltro'])){
    
    if(isset($_SESSION['query_seguimiento_muni'])){
        unset($_SESSION['query_seguimiento_muni']);
    }
    
    if(isset($_SESSION['filtro_seguimiento'])){

        foreach($_SESSION['filtro_seguimiento'] as $row){
            ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=false;</script>
                <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
            <?php
        }
        unset($_SESSION['filtro_seguimiento']);
    }
}

else if ( isset($_POST['resultado']) ){
    
    limpiarFiltros();
    
    /* totales previos */
    $arrayTotales = array();
    if(isset($_POST['t_costo'])){
        $arrayTotales = array($_POST['t_costo'],
                              $_POST['t_ejecucionA'],
                              $_POST['t_ejecucionB'],
                              $_POST['t_pia'],
                              $_POST['t_pim'],
                              $_POST['t_devengado'],
                              $_POST['t_ejecucionTotal'],
                              $_POST['t_avanceTotal']
                              );
    }
    /* *************** */
   
    $queryExtra = "";
    $anio = $_POST['anio'];
    $prov = $_POST['prov'];
    $dpto = $_POST['dpto'];
    $muni = $_POST['mun'];
    $muniFiltrada = $_POST['muniFiltrada'];
   
    $radioSel = $_POST['radioSel'];
    $tipoVista = $_POST['tipoVista'];
    $cabecera = $_POST['ultimaColumna'];
    $quitar = $_POST['quitar'];
    
    $anioA = $anio-1;
    $anioB = $anio-2;
    
    /* lista key */
    $seguimiendoModel = new seguimientoModel();
    $resultadoT = $seguimiendoModel->getTotales($anio,$dpto,$prov,$muni);
    
    if($resultadoT!=null){
        $resultadoT = $resultadoT[0];
    }
    
    $listaKey=array();
    
    if($anio!=="-1"){
        $key=new keyValue();
        $key->setKey("AÑO");
        $key->setValue($anio);
        
        $key->setAtributoA($resultadoT[0]['COSTO']);
        $key->setAtributoB($resultadoT[0]['EJECUCION_ANIO_A']);
        $key->setAtributoC($resultadoT[0]['EJECUCION_ANIO_B']);
        $key->setAtributoD($resultadoT[0]['EJECUCION_ANIO_ACTUAL']);
        $key->setAtributoE($resultadoT[0]['PIA']);
        $key->setAtributoF($resultadoT[0]['PIM']);
        $key->setAtributoG($resultadoT[0]['DEVENGADO']);
        $key->setAtributoH($resultadoT[0]['EJECUCION_TOTAL']);
        $key->setAtributoI($resultadoT[0]['AVANCE_TOTAL']);
        
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        
        $key->setAtributoA($resultadoT[1]['COSTO']);
        $key->setAtributoB($resultadoT[1]['EJECUCION_ANIO_A']);
        $key->setAtributoC($resultadoT[1]['EJECUCION_ANIO_B']);
        $key->setAtributoD($resultadoT[1]['EJECUCION_ANIO_ACTUAL']);
        $key->setAtributoE($resultadoT[1]['PIA']);
        $key->setAtributoF($resultadoT[1]['PIM']);
        $key->setAtributoG($resultadoT[1]['DEVENGADO']);
        $key->setAtributoH($resultadoT[1]['EJECUCION_TOTAL']);
        $key->setAtributoI($resultadoT[1]['AVANCE_TOTAL']);
        
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        
        $key->setAtributoA($resultadoT[2]['COSTO']);
        $key->setAtributoB($resultadoT[2]['EJECUCION_ANIO_A']);
        $key->setAtributoC($resultadoT[2]['EJECUCION_ANIO_B']);
        $key->setAtributoD($resultadoT[2]['EJECUCION_ANIO_ACTUAL']);
        $key->setAtributoE($resultadoT[2]['PIA']);
        $key->setAtributoF($resultadoT[2]['PIM']);
        $key->setAtributoG($resultadoT[2]['DEVENGADO']);
        $key->setAtributoH($resultadoT[2]['EJECUCION_TOTAL']);
        $key->setAtributoI($resultadoT[2]['AVANCE_TOTAL']);
        
        $listaKey[]=$key;
    }
    if($muni!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        
        $key->setAtributoA($resultadoT[3]['COSTO']);
        $key->setAtributoB($resultadoT[3]['EJECUCION_ANIO_A']);
        $key->setAtributoC($resultadoT[3]['EJECUCION_ANIO_B']);
        $key->setAtributoD($resultadoT[3]['EJECUCION_ANIO_ACTUAL']);
        $key->setAtributoE($resultadoT[3]['PIA']);
        $key->setAtributoF($resultadoT[3]['PIM']);
        $key->setAtributoG($resultadoT[3]['DEVENGADO']);
        $key->setAtributoH($resultadoT[3]['EJECUCION_TOTAL']);
        $key->setAtributoI($resultadoT[3]['AVANCE_TOTAL']);
        
        $listaKey[]=$key;
    }
    /* ********* */
    
    
    /* quitar filtro */
    if($quitar!=""){
        $coincidencia = eliminarFiltro($quitar);
        
        if($coincidencia!=null){
            
            /* si filtro a eliminar contiene where muni -> mantenerlo */
            //if($coincidencia[0]=="MUNICIPALIDAD"){
            //    $queryExtra .= " AND ".$coincidencia[0]."='".$coincidencia[1]."'";
            //}
            
            ?>
                <script>document.getElementById("<?php echo $coincidencia[2] ?>").disabled=false;</script>
                <script>document.getElementById("<?php echo $coincidencia[3] ?>").style.display='none';</script>
            <?php
        }
        
        $ultimo = hallarTipoVista();
        
        if($ultimo!=null){
            $cabecera = $ultimo[4];
            if($cabecera=="FUNCION"){ $tipoVista="1"; }
            if($cabecera=="PROYECTO"){ $tipoVista="2"; }
            if($cabecera=="FUENTE"){ $tipoVista="3"; }
            if($cabecera=="RUBRO"){ $tipoVista="4"; }
        }
        else{
            /* limpiar busqueda por muni */
            if(isset($_SESSION['query_seguimiento_muni'])){
                unset($_SESSION['query_seguimiento_muni']);
            }
        }
    }
    
    
    /* hallar cabecera */
    $textoCabecera="MUNICIPALIDAD";
    $ultimaBusqueda="MUNICIPALIDAD";
    $boton="";
    $label="";
    
    if($tipoVista!==""){
        if($tipoVista=="1"){
            $textoCabecera="FUNCION";
            $ultimaBusqueda="FUNCION";
            $boton="btnFuncion";
            $label="lbFuncion";
        }
        else if($tipoVista=="2"){
            $textoCabecera="PROYECTO";
            $ultimaBusqueda="PROYECTO";
            $boton="btnProyecto";
            $label="lbProyecto";
        }
        else if($tipoVista=="3"){
            $textoCabecera="FUENTE";
            $ultimaBusqueda="FUENTE";
            $boton="btnFuente";
            $label="lbFuente";
        }
        else if($tipoVista=="4"){
            $textoCabecera="RUBRO";
            $ultimaBusqueda="RUBRO";
            $boton="btnRubro";
            $label="lbRubro";
        }
    }
    /* */
    
    
    /* ver si hay radio marcado -> agregar filtro*/
    if($radioSel!="" && $quitar==""){
        
        if($cabecera=="MUNICIPALIDAD"){
            
            $_SESSION['query_seguimiento_muni'] = " AND MUNICIPALIDAD='".$radioSel."'";
        }
        
        $listaFiltros = array();
        if(isset($_SESSION['filtro_seguimiento'])){
            $listaFiltros = $_SESSION['filtro_seguimiento'];
        }
        $listaFiltros[] = array($cabecera,$radioSel,$boton,$label,$textoCabecera,$arrayTotales,str_replace("_"," ",$cabecera));
        
        $_SESSION['filtro_seguimiento']=$listaFiltros;
        
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=true;</script>
            <?php
            
            if($vK==$vTotal){
                ?>
                    <script>document.getElementById("<?php echo $row[3] ?>").style.display='block';</script>
                <?php     
            }
            else{
                ?>
                    <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
                <?php 
            }
            
            $vK++;
        }
        
    }
    /* */
    
    /* filtros cuando se quita filtro */
    if($quitar!=""){
        
        $listaFiltros = $_SESSION['filtro_seguimiento'];
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=true;</script>
            <?php
            
            if($vK==$vTotal){
                ?>
                    <script>document.getElementById("<?php echo $row[3] ?>").style.display='block';</script>
                <?php     
            }
            else{
                ?>
                    <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
                <?php 
            }
            
            $vK++;
        }
    }
    /* */
    
    /* boton ver resultado presionado  */
    if($radioSel=="" && $quitar==""){
        unset($_SESSION['filtro_seguimiento']);
    }
    
    /* ver si mantiene filtro por muni */
    if(isset($_SESSION['query_seguimiento_muni'])){
            $queryExtra .= $_SESSION['query_seguimiento_muni'];
        }
    /* */
    
    $url=0;
    if($tipoVista=="2"){ /* por proyecto */
        $url=1;
    }
    
    $resultado = $seguimiendoModel->getReporte($anio,$dpto,$prov,$muni,$muniFiltrada,$tipoVista,$queryExtra,$url);
 
    //var_dump($resultado);exit();
    
    ?>
      <script> //alert("<?php //echo $resultado[1]; ?>"); </script>
    <?php  
      
    $lista = $resultado[0];
    
    if($lista!=null){
        
        
        /* hallar totales */
        $totalAnioA=0;
        $totalAnioB=0;
        $totalPIM=0;
        $totalPIA=0;
        $totalDevengado=0;
        $totalEjecucion=0;

        foreach($lista as $r){
            $totalAnioA+=$r['EJECUCION_ANIO_A'];
            $totalAnioB+=$r['EJECUCION_ANIO_B'];
            $totalPIM+=$r['PIM'];
            $totalPIA+=$r['PIA'];
            $totalDevengado+=$r['DEVENGADO'];
            $totalEjecucion+=$r['EJECUCION_TOTAL'];
        }  
        
        
      ?>
      
      <div class="col-md-12">
      <div class="col-md-12">
          
        <div class="col-md-12">&nbsp;</div>    
        <div class="col-md-12">    
          <div class="table-responsive">

          <table border="1" style="width:100%;font-size: 16px;">  
              
              <tr style="background: #002747!important;color:white!important">
                  <td class="text-center" colspan="4"><b></b></td>
                  <td class="text-center" colspan="4"><b><?php echo $anio; ?></b></td>
              </tr>
              
              <tr style="background: #002747!important;color:white!important">
                  <td rowspan="2" class="text-center"><b>Variable</b></td>
                  <td rowspan="2" class="text-center"><b>Datos Generales</b></td>
                  <td rowspan="2" class="text-center"><b>Ejecución al año <?php echo $anioB ?></b></td>
                  <td rowspan="2" class="text-center"><b>Ejecución al año <?php echo $anioA ?></b></td>
              </tr>

              <tr style="background: #002747!important;color:white!important">
                  <td class="text-center"><b>PIA</b></td>
                  <td class="text-center"><b>PIM</b></td>
                  <td class="text-center"><b>Devengado</b></td>
                  <td class="text-center"><b>Ejecución Total</b></td>
              </tr>

              <?php foreach($listaKey as $k){ ?>
              <tr style="background:white;font-size: 14px!important;">
                  <td><b><?php echo $k->key ?></b></td>
                  <td><?php echo $k->value ?></td>
                  <!--<td class="text-right"><?php //echo number_format($k->atributoA) ?></td>-->
                  <td class="text-right"><?php echo number_format($k->atributoB) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoC) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoD) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoF) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoG) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoH) ?></td>
                  <!--<td class="text-right"><?php //echo number_format($k->atributoI,1) ?></td>-->
              </tr>    
              <?php } ?>

              <?php if(isset($_SESSION['filtro_seguimiento'])){
                      foreach($_SESSION['filtro_seguimiento'] as $fila){

                          if($fila[0]=="MUNICIPALIDAD"){
                              if(!existeKey($listaKey,"MUNICIPALIDAD")){
                                  ?>
                                  <tr style="background:white;font-size: 14px!important;">
                                      <td><b><?php echo $fila[6]; ?></b></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <!--<td class="text-right"><?php //echo $fila[5][0]; ?></td>-->
                                      <td class="text-right"><?php echo $fila[5][1]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][2]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][3]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][4]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][5]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][6]; ?></td>
                                      <!--<td class="text-right"><?php //echo $fila[5][7]."%"; ?></td>-->
                                  </tr>
                                  <?php
                              }
                          }
                          else{
                               ?>
                               <tr style="background:white;font-size: 14px!important;">
                                    <td><b><?php echo $fila[6]; ?></b></td>
                                    <td><?php echo $fila[1]; ?></td>
                                    <!--<td class="text-right"><?php //echo $fila[5][0]; ?></td>-->
                                    <td class="text-right"><?php echo $fila[5][1]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][2]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][3]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][4]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][5]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][6]; ?></td>
                                    <!--<td class="text-right"><?php //echo $fila[5][7]."%"; ?></td>-->
                               </tr>
                               <?php
                          }   
                      }
              } ?>
          </table>

          </div>  
        </div>    
        <div class="col-md-12">&nbsp;</div>
          
          
      <div class="col-md-12">
        
        <div class="table-responsive table-responsive-data2">
            <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                    
                    <tr style="background:white!important;border:none!important">
                        <th colspan="3"> <label style="color:black!important"> TOTALES </label> </th>
                        
                        <th class="text-right"> <label style="color:black!important" id="total_PIA"><?php echo number_format($totalAnioA); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id="total_PIM"><?php echo number_format($totalAnioB); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id="total_Certificacion"><?php echo number_format($totalPIA); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id="total_Compromiso"><?php echo number_format($totalPIM); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id="total_Atencion"><?php echo number_format($totalDevengado); ?></label> </th>
                        <!--
                        <th class="text-right"> <label style="color:black!important" id="total_Devengado"><?php echo number_format($totalEjecucion); ?></label> </th>
                        -->
                        <th> </th>
                    </tr>
                    <tr style="background-color: #002747;">
                        <th rowspan="2" style="color:black;font-weight:bold; background-color: #002747;"></th>
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" align="center">N°</th>
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center"> 
                            <?php echo $textoCabecera ?>
                            <input type="hidden" id="ultimaColumna" style="color:black!important" value="<?php echo $ultimaBusqueda ?>"> 
                        </th>
                        <!--
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Costo</th>
                        -->
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Ejecución al año <?php echo $anioB ?></th>
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Ejecución al año <?php echo $anioA ?></th>
                        
                        <th colspan="3" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center"><?php echo $anio ?></th>      
                        
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Ejecución Total</th>
                        <!--
                        <th rowspan="2" style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Avance % Total</th>
                        -->
                    </tr>
                    <tr style="background-color: #002747;">
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;;" class="text-center">PIA</th>           
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Devengado</th>
                    </tr>
                </thead>
            <tbody>
                        <?php $n=1; foreach($lista as $r){ ?>
                         <tr style="height:auto">
                             
                          <td>
                              <input type="radio" data-num="<?php echo $n ?>" data-name="<?php echo $r['CAMPO']; ?>" name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">
                          </td>
                             
                          <td class="align-middle text-left content-table"> <?php echo $n; ?> </td>          
                          <td class="align-middle text-left content-table"> 
                              <?php echo $r['CAMPO'] ?> 
                              <?php if($url==1 && isset($r['IDDATOS'])){
                                  if($r['A_LINKFORMATO12B']!=""){
                                      echo "<br><a href='".$r['A_LINKFORMATO12B']."' target='_blank'>".$r['A_LINKFORMATO12B']."</a>";
                                  }
                              }
                              
                              if(isset($r['IDDATOS'])){
                                  
                                  $cadena = $r['A_PROGRAMADOPMI'].";;;".
                                            $r['A_LINKBANCOINVERSIONES'].";;;".
                                            $r['A_SITUACION'].";;;".
                                            $r['A_FECHAVIABILIDAD'].";;;".
                                            $r['A_COSTOINVERSION'].";;;".
                                            $r['A_BENEFICIARIOS'].";;;".
                                            $r['A_EXPEDIENTE'].";;;".
                                            $r['A_REGISTROSEGUIMIENTO'].";;;".
                                            $r['A_REGISTROCIERRE'].";;;".
                                            $r['A_FECHAINICIOEJECUCION'].";;;".
                                            $r['A_FECHAFINEJECUCION'].";;;".
                                            $r['A_COSTOINVERSIONACTUALIZADO'].";;;".
                                            $r['A_COSTOINVERSIONTOTAL'].";;;".
                                            $r['A_LINKFORMATO7'].";;;".
                                            $r['A_LINK'].";;;".
                                            $r['B_COSTOINVERSION'].";;;".
                                            $r['B_FECHAPRIMER'].";;;".
                                            $r['B_FECHAULTIMO'].";;;".
                                            $r['C_ULTIMAMODIFICACION'].";;;".
                                            $r['C_LINKAVANCEINVERSION'].";;;".
                                            $r['C_AVANCEEJECUCION'].";;;".
                                            $r['C_AVANCEFISICO'].";;;".
                                            $r['D_LINKPROCEDIMIENTO'].";;;".
                                            $r['D_LINKCONTRACTUAL'].";;;".
                                            $r['D_CONSULTORIAS'].";;;".
                                            $r['A_LINKFORMATO12B'].";;;".
                                            $r['A_LINKFORMATO8A'].";;;".
                                            $r['C_INICIOFISICA'].";;;".
                                            $r['C_FINFISICA'].";;;".
                                            $r['C_FECHADECLARACION'].";;;".
                                            $r['C_LINKDETALLEAVANCE'].";;;".
                                            $r['C_SITUACION'].";;;".
                                            $r['C_PROBLEMATICA'].";;;".
                                            $r['C_COSTOACTUALIZADO'].";;;".
                                            $r['C_DEVENGADOACUMULADO'].";;;".
                                            $r['C_PRIMERDEVENGADO'].";;;".
                                            $r['C_PROGRAMACIONFINANCIERA'].";;;".
                                            $r['C_ULTIMODEVENGADO'].";;;".
                                            $r['D_NUMEROOBRAS'];
                                          
                                          
                                  echo "<br> <button class='btn btn-default btn-sm' onclick='mostrarInfo(".$r['IDDATOS'].")' data-toggle='modal' data-target='#exampleModal'>Ver datos adicionales</button>";
                                  ?>
                                  <input type='hidden' id="<?php echo "hp_".$r['IDDATOS'];?>" value="<?php echo $cadena ?>">
                                      <input type='hidden' id="<?php echo "hp_proyecto_".$r['IDDATOS'];?>" value="<?php echo $r['CAMPO'] ?>">
                                  <?php 
                              }
                              
                              ?>
                          </td>
                          <!--
                          <td class="align-middle text-right"> 
                              <input type="hidden" id="costo_<?php echo $n?>" value="<?php echo number_format($r['COSTO']); ?>"/> 
                              <?php //echo number_format($r['COSTO']); ?> 
                          </td>
                          -->
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="ejecucionA_<?php echo $n?>" value="<?php echo number_format($r['EJECUCION_ANIO_A']); ?>"/>
                              <?php echo number_format($r['EJECUCION_ANIO_A']); ?> 
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="ejecucionB_<?php echo $n?>" value="<?php echo number_format($r['EJECUCION_ANIO_B']); ?>"/> 
                              <?php echo number_format($r['EJECUCION_ANIO_B']); ?>
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="pia_<?php echo $n?>" value="<?php echo number_format($r['PIA']); ?>"/> 
                              <?php echo number_format($r['PIA']); ?>
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="pim_<?php echo $n?>" value="<?php echo number_format($r['PIM']); ?>"/> 
                              <?php echo number_format($r['PIM']); ?> 
                          </td>
                          <td class="align-middle text-right content-table">
                              <input type="hidden" id="devengado_<?php echo $n?>" value="<?php echo number_format($r['DEVENGADO']); ?>"/>
                              <?php echo number_format($r['DEVENGADO']); ?>
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="ejecucionTotal_<?php echo $n?>" value="<?php echo number_format($r['EJECUCION_TOTAL']); ?>"/>
                              <?php echo number_format($r['EJECUCION_TOTAL']); ?>
                          </td>
                          <!--
                          <td class="align-middle text-right"> 
                              <input type="hidden" id="avanceTotal_<?php echo $n?>" value="<?php echo number_format($r['AVANCE_TOTAL'],1)                                                                                         ?>"/>
                              <?php //echo $r['AVANCE_TOTAL'] ?>
                          </td> 
                         -->
                         </tr> 
                        <?php $n++; } ?>
                </tbody>
            </table>
        </div>
      </div>
      </div>
      </div>
      
      
        <script>
          $(document).ready(function() {
              $('#tablaDatos').DataTable( {
                  "iDisplayLength": 50,  
                  dom: 'fBrtlp',
                              buttons: [ {extend: 'excel',text: 'Descargar Excel',className: 'btn-success botonExcelDescarga'} ]
              } );
          } );

          (function () {
              $(".wrapper1").scroll(function () {
                  $(".wrapper2")
                          .scrollLeft($(".wrapper1").scrollLeft());
              });
              $(".wrapper2").scroll(function () {
                  $(".wrapper1")
                          .scrollLeft($(".wrapper2").scrollLeft());
              });
          });
      </script>
        
    <?php  
    }
    else{
    ?>

    <div class="col-md-12">  
    <div class="col-md-6" style="margin-top:10px!important">                                                                
        <div class="alert alert-danger" role="alert" style="background:#F76744!important;color:white!important;font-size:18px!important">
            No se encontraron resultados
        </div>
    </div>    
    </div>    
        
    <?php }
    
    
} 


function hallarTipoVista(){
    
    $cont = 1;
    $total = count($_SESSION['filtro_seguimiento']);
    $lista = $_SESSION['filtro_seguimiento'];
    $final=null;
    
    foreach($lista as $row){
        if($cont==$total){
            $final=$row;
        }
        $cont++;
    }
    
    return $final;
}    
    
    
function eliminarFiltro($filtro){
    
    $coincidencia = null;
    $lista2 = array();
    $lista = $_SESSION['filtro_seguimiento'];
    
    foreach($lista as $row){
        if($row[4]!=$filtro){
            $lista2[]=$row;
        }
        else{
            $coincidencia = $row;
        }
    }
    
    $_SESSION['filtro_seguimiento'] = $lista2;
    
    return $coincidencia;
}

    
function limpiarFiltros(){

    if(isset($_SESSION['filtro_seguimiento'])){
        
        $listaFiltros = $_SESSION['filtro_seguimiento'];
        
        foreach($listaFiltros as $row){
        
             ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=false;</script>
                <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
             <?php 
        }
        
    }
}

function existeKey($listaKey,$cad){
    
    foreach($listaKey as $row){
        if($row->key==$cad){
            return true;
        }
    }
    
    return false;
}



