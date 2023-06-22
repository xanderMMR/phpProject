<?php

require_once '../model/loginModel.php';
require_once '../model/consultaModel.php';
require_once '../model/keyValue.php';
require_once '../model/seguimientoModel.php';
require_once '../model/transferenciaModel.php';
require_once '../model/keyValue.php';

if(!isset($_SESSION))session_start();


if( isset($_GET['reporte']) ){

    
date_default_timezone_set("America/Lima");

$fechaHora = date("Y-m-d_h.m.s");

header('Content-type:application/xls;charset=ISO-8859-1');
header('Content-Disposition: attachment; filename=base-datos-ejecucion-gasto-'.$fechaHora.'.xls');

$model = new consultaModel();

$datos = $model->getBaseDatos();

    if($datos!=null){
        ?>

<table border="1">
    <tr>
        <th>A&ntilde;o</th>
        <th>Tipo Registro</th>
        <th>Departamento</th>
        <th>Provincia</th>
        <th>Municipalidad</th>
        <th>Funci&oacute;n</th>
        <th>Divisi&oacute;n Funcional</th>
        <th>Grupo Funcional</th>
        <th>Categor&iacute;a Presupuestal</th>
        <th>Proyecto</th>
        <th>Fuente</th>
        <th>Rubro</th>
        <th>Tipo recurso</th>
        <th>Gen&eacute;rica</th>
        <th>Detalle subgen&eacute;rica</th>
        <th>Espec&iacute;fica</th>
        <th>Detalle espec&iacute;fica</th>
        <th>Mes</th>
        <th>PIA</th>
        <th>PIM</th>
        <th>Certificaci&oacute;n</th>
        <th>Compromiso</th>
        <th>Atenci&oacute;n</th>
        <th>Devengado</th>
        <th>Girado</th>
        <th>Avance</th>
    </tr>
    <?php foreach($datos as $r){ ?>
    <tr>
        <td> <?php echo $r['ANIO']; ?> </td>
        <td> <?php echo $r['TIPO_DATO']; ?> </td>
        <td> <?php echo $r['DEPARTAMENTO']; ?> </td>
        <td> <?php echo $r['PROVINCIA']; ?> </td>
        <td> <?php echo $r['MUNICIPALIDAD']; ?> </td>
        <td> <?php echo $r['FUNCION']; ?> </td>
        <td> <?php echo $r['DIVISION_FUNCIONAL']; ?> </td>
        <td> <?php echo $r['GRUPO_FUNCIONAL']; ?> </td>
        <td> <?php echo $r['CATEGORIA_PRESUPUESTAL']; ?> </td>
        <td> <?php echo $r['PROYECTO']; ?> </td>
        <td> <?php echo $r['FUENTE']; ?> </td>
        <td> <?php echo $r['RUBRO']; ?> </td>
        <td> <?php echo $r['TIPO_RECURSO']; ?> </td>
        <td> <?php echo $r['GENERICA']; ?> </td>
        <td> <?php echo $r['DETALLE_SUBGENERICA']; ?> </td>
        <td> <?php echo $r['ESPECIFICA']; ?> </td>
        <td> <?php echo $r['DETALLE_ESPECIFICA']; ?> </td>
        <td> <?php echo $r['MES']; ?> </td>
        <td> <?php echo $r['PIA']; ?> </td>
        <td> <?php echo $r['PIM']; ?> </td>
        <td> <?php echo $r['CERTIFICACION']; ?> </td>
        <td> <?php echo $r['COMPROMISO']; ?> </td>
        <td> <?php echo $r['ATENCION']; ?> </td>
        <td> <?php echo $r['DEVENGADO']; ?> </td>
        <td> <?php echo $r['GIRADO']; ?> </td>
        <td> <?php echo $r['AVANCE']; ?> </td>
    </tr>
    <?php }?>
</table>

<?php

        exit();
    }

}


else if( isset($_POST['web_proyectos']) ){
    
    
    $dpto = $_POST['web_dpto']; if($dpto=='-1'){$dpto='';}
    $prov = $_POST['web_prov']; if($prov=='-1'){$prov='';}
    $muni = $_POST['web_muni']; if($muni=='-1'){$muni='';}
    
    $consultaModel=new consultaModel();
    $lista = $consultaModel->listarProyectosDatosAdicionales($dpto,$prov,$muni);
 
    if($lista!=null){
    ?>

<div class="col-md-12">
    <div class="col-md-12">


        <div class="table-responsive table-responsive-data2" style="margin-top:0px">
            <table id="tablaDatosP" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr style="background-color: #002747">
                        <th style="font-weight:bold;color:white; background-color: #002747;">N°</th>
                        <th style="font-weight:bold;color:white; background-color: #002747;" class="text-center">PROYECTO</th>
                        <th style="font-weight:bold;color:white; background-color: #002747;" class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white; background-color: #002747;" class="text-center">FORMATO 12B</th>
                        <th style="font-weight:bold;color:white; background-color: #002747;" class="text-center">FORMATO 7A</th>
                        <th style="font-weight:bold;color:white; background-color: #002747;" class="text-center">FORMATO 8A</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($lista as $r){ ?>
                    <tr style="height:auto">
                        <td class="align-middle text-left content-table"> <?php echo $n; ?> </td>
                        <td class="align-middle text-left content-table"> <?php echo $r['PROYECTO'] ?> </td>
                        <td class="align-middle text-left content-table"> <?php echo number_format($r['PIM']) ?> </td>
                        <td class="align-middle text-center content-table">
                            <?php if($r['A_LINKFORMATO12B']!=""){ ?>
                            <a href="<?php echo $r['A_LINKFORMATO12B'] ?>" target="_blank">
                                <?php echo $r['A_LINKFORMATO12B'] ?>
                            </a>
                            <?php } ?>
                        </td>
                        <td class="align-middle text-center content-table">
                            <?php if($r['A_LINKFORMATO7']!=""){ ?>
                            <a href="<?php echo $r['A_LINKFORMATO7'] ?>" target="_blank">
                                <?php echo $r['A_LINKFORMATO7'] ?>
                            </a>
                            <?php } ?>
                        </td>
                        <td class="align-middle text-center content-table">
                            <?php if($r['A_LINKFORMATO8A']!=""){ ?>
                            <a href="<?php echo $r['A_LINKFORMATO8A'] ?>" target="_blank">
                                <?php echo $r['A_LINKFORMATO8A'] ?>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $n++; } ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $('#tablaDatosP').DataTable({
        "iDisplayLength": 50,
        /* dom: 'frtlp',*/
        dom: 'fBrtlp',
        buttons: [{
            extend: 'excel',
            text: 'Descargar Excel',
            className: 'btn-success botonExcelDescarga'
        }]
    });
});
</script>


<?php
    }
}


else if( isset($_POST['provincia']) ){
    
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
    
    /* SOLO PROYECTO */
    
    if(isset($_SESSION['query_consulta_muni'])){
        unset($_SESSION['query_consulta_muni']);
    }
    
    if(isset($_SESSION['filtro_consulta'])){

        foreach($_SESSION['filtro_consulta'] as $row){
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php
        }
        unset($_SESSION['filtro_consulta']);
    }
    
    
    /* ACTIVIDAD/PROYECTO */
    
    if(isset($_SESSION['query_actividad_muni'])){
        unset($_SESSION['query_actividad_muni']);
    }
    
    if(isset($_SESSION['filtro_actividad'])){

        foreach($_SESSION['filtro_actividad'] as $row){
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php
        }
        unset($_SESSION['filtro_actividad']);
    }
    
    
}

else if ( isset($_POST['resultado']) ){
    
    $anio = $_POST['anio'];
    limpiarFiltros();
    
    /* get mes actual */
    $cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActualEjecucionGasto('tb_registro',$anio,1);
    $mesActualFiltro=$datosMesActual['MES'];
    
    
    /* totales previos */
    $arrayTotales = array();
    if(isset($_POST['t_pia'])){
        $arrayTotales = array($_POST['t_pia'],
                              $_POST['t_pim'],
                              $_POST['t_certificacion'],
                              $_POST['t_compromiso'],
                              $_POST['t_atencion'],
                              $_POST['t_devengado'],
                              $_POST['t_girado'],
                              $_POST['t_avance']
                              );
    }
    /* *************** */
    
    $queryExtra = "";
    $prov = $_POST['prov'];
    $dpto = $_POST['dpto'];
    $muni = $_POST['mun'];
    $muniFiltrada = $_POST['muniFiltrada'];
   
    $radioSel = $_POST['radioSel'];
    $tipoVista = $_POST['tipoVista'];
    $cabecera="";
    if(isset($_POST['ultimaColumna'])){
        $cabecera = $_POST['ultimaColumna'];
    }
    $quitar = $_POST['quitar'];
    
    
    /* lista key */
    $consultaModel=new consultaModel();
    $resultadoT = $consultaModel->getTotales($anio,$dpto,$prov,$muni,$mesActualFiltro);
    
    if($resultadoT!=null){
        $resultadoT = $resultadoT[0];
    }
    
    $listaKey=array();
    if($anio!=="-1"){
        $key=new keyValue();
        $key->setKey("AÑO");
        $key->setValue($anio);
        
        $key->setAtributoA($resultadoT[0]['PIA']);
        $key->setAtributoB($resultadoT[0]['PIM']);
        $key->setAtributoC($resultadoT[0]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[0]['COMPROMISO']);
        $key->setAtributoE($resultadoT[0]['ATENCION']);
        $key->setAtributoF($resultadoT[0]['DEVENGADO']);
        $key->setAtributoG($resultadoT[0]['GIRADO']);
        $key->setAtributoH($resultadoT[0]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        
        $key->setAtributoA($resultadoT[1]['PIA']);
        $key->setAtributoB($resultadoT[1]['PIM']);
        $key->setAtributoC($resultadoT[1]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[1]['COMPROMISO']);
        $key->setAtributoE($resultadoT[1]['ATENCION']);
        $key->setAtributoF($resultadoT[1]['DEVENGADO']);
        $key->setAtributoG($resultadoT[1]['GIRADO']);
        $key->setAtributoH($resultadoT[1]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        
        $key->setAtributoA($resultadoT[2]['PIA']);
        $key->setAtributoB($resultadoT[2]['PIM']);
        $key->setAtributoC($resultadoT[2]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[2]['COMPROMISO']);
        $key->setAtributoE($resultadoT[2]['ATENCION']);
        $key->setAtributoF($resultadoT[2]['DEVENGADO']);
        $key->setAtributoG($resultadoT[2]['GIRADO']);
        $key->setAtributoH($resultadoT[2]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($muni!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        
        $key->setAtributoA($resultadoT[3]['PIA']);
        $key->setAtributoB($resultadoT[3]['PIM']);
        $key->setAtributoC($resultadoT[3]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[3]['COMPROMISO']);
        $key->setAtributoE($resultadoT[3]['ATENCION']);
        $key->setAtributoF($resultadoT[3]['DEVENGADO']);
        $key->setAtributoG($resultadoT[3]['GIRADO']);
        $key->setAtributoH($resultadoT[3]['AVANCE']);
        
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
<script>
document.getElementById("<?php echo $coincidencia[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $coincidencia[3] ?>").style.display = 'none';
</script>
<?php
        }
        
        $ultimo = hallarTipoVista();
        
        if($ultimo!=null){
            $cabecera = $ultimo[4];
            if($cabecera=="FUNCION"){ $tipoVista="1"; }
            if($cabecera=="CATEGORIA_PRESUPUESTAL"){ $tipoVista="2"; }
            if($cabecera=="PROYECTO"){ $tipoVista="3"; }
            if($cabecera=="DIVISION_FUNCIONAL"){ $tipoVista="4"; }
            if($cabecera=="GRUPO_FUNCIONAL"){ $tipoVista="5"; }
            if($cabecera=="FUENTE"){ $tipoVista="6"; }
            if($cabecera=="RUBRO"){ $tipoVista="7"; }
            if($cabecera=="TIPO_RECURSO"){ $tipoVista="8"; }
            if($cabecera=="GENERICA"){ $tipoVista="9"; }
            if($cabecera=="SUBGENERICA"){ $tipoVista="10"; }
            if($cabecera=="DETALLE_SUBGENERICA"){ $tipoVista="11"; }
            if($cabecera=="ESPECIFICA"){ $tipoVista="12"; }
            if($cabecera=="DETALLE_ESPECIFICA"){ $tipoVista="13"; }
            if($cabecera=="MES"){ $tipoVista="14"; }
            
        }
        else{
            /* limpiar busqueda por muni */
            if(isset($_SESSION['query_consulta_muni'])){
                unset($_SESSION['query_consulta_muni']);
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
            $textoCabecera="CATEGORIA_PRESUPUESTAL";
            $ultimaBusqueda="CATEGORIA_PRESUPUESTAL";
            $boton="btnCategoriaPresupuestal";
            $label="lbCategoriaPresupuestal";
        }
        else if($tipoVista=="3"){
            $textoCabecera="PROYECTO";
            $ultimaBusqueda="PROYECTO";
            $boton="btnProyecto";
            $label="lbProyecto";
        }
        else if($tipoVista=="4"){
            $textoCabecera="DIVISION_FUNCIONAL";
            $ultimaBusqueda="DIVISION_FUNCIONAL";
            $boton="btnDivisionFuncional";
            $label="lbDivisionFuncional";
        }
        else if($tipoVista=="5"){
            $textoCabecera="GRUPO_FUNCIONAL";
            $ultimaBusqueda="GRUPO_FUNCIONAL";
            $boton="btnGrupoFuncional";
            $label="lbGrupoFuncional";
        }
        else if($tipoVista=="6"){
            $textoCabecera="FUENTE";
            $ultimaBusqueda="FUENTE";
            $boton="btnFuente";
            $label="lbFuente";
        }
        else if($tipoVista=="7"){
            $textoCabecera="RUBRO";
            $ultimaBusqueda="RUBRO";
            $boton="btnRubro";
            $label="lbRubro";
        }
        else if($tipoVista=="8"){
            $textoCabecera="TIPO_RECURSO";
            $ultimaBusqueda="TIPO_RECURSO";
            $boton="btnTipoRecurso";
            $label="lbTipoRecurso";
        }
        else if($tipoVista=="9"){
            $textoCabecera="GENERICA";
            $ultimaBusqueda="GENERICA";
            $boton="btnGenerica";
            $label="lbGenerica";
        }
        else if($tipoVista=="10"){
            $textoCabecera="SUBGENERICA";
            $ultimaBusqueda="SUBGENERICA";
            $boton="btnSubgenerica";
            $label="lbSubgenerica";
        }
        else if($tipoVista=="11"){
            $textoCabecera="DETALLE_SUBGENERICA";
            $ultimaBusqueda="DETALLE_SUBGENERICA";
            $boton="btnDetalleSubgenerica";
            $label="lbDetalleSubgenerica";
        }
        else if($tipoVista=="12"){
            $textoCabecera="ESPECIFICA";
            $ultimaBusqueda="ESPECIFICA";
            $boton="btnEspecifica";
            $label="lbEspecifica";
        }
        else if($tipoVista=="13"){
            $textoCabecera="DETALLE_ESPECIFICA";
            $ultimaBusqueda="DETALLE_ESPECIFICA";
            $boton="btnDetalleEspecifica";
            $label="lbDetalleEspecifica";
        }
        else if($tipoVista=="14"){
            $textoCabecera="MES";
            $ultimaBusqueda="MES";
            $boton="btnMes";
            $label="lbMes";
            
            $mesActualFiltro="";
        }
    }
    /* */
    
    
    /* ver si hay radio marcado -> agregar filtro*/
    if($radioSel!="" && $quitar==""){
        
        if($cabecera=="MUNICIPALIDAD"){
            
            $_SESSION['query_consulta_muni'] = " AND MUNICIPALIDAD='".$radioSel."'";
        }
        
        $listaFiltros = array();
        if(isset($_SESSION['filtro_consulta'])){
            $listaFiltros = $_SESSION['filtro_consulta'];
        }
        $listaFiltros[] = array($cabecera,$radioSel,$boton,$label,$textoCabecera,$arrayTotales,str_replace("_"," ",$cabecera));
        
        $_SESSION['filtro_consulta']=$listaFiltros;
        
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = true;
</script>
<?php
            
            if($vK==$vTotal){
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'block';
</script>
<?php     
            }
            else{
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php 
            }
            
            $vK++;
            
            /* quitar mes actual si se ha filtrado por un mes */
            if($row[0]=="MES"){
                $mesActualFiltro="";
            }
        }
        
    }
    /* */
    
    /* filtros cuando se quita filtro */
    if($quitar!=""){
        
        $listaFiltros = $_SESSION['filtro_consulta'];
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = true;
</script>
<?php
            
            if($vK==$vTotal){
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'block';
</script>
<?php     
            }
            else{
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php 
            }
            
            $vK++;
            
            /* quitar mes actual si se ha filtrado por un mes */
            if($row[0]=="MES"){
                $mesActualFiltro="";
            }
            
        }
    }
    /* */
    
    /* boton ver resultado presionado  */
    if($radioSel=="" && $quitar==""){
        unset($_SESSION['filtro_consulta']);
    }
    
    /* ver si mantiene filtro por muni */
    if(isset($_SESSION['query_consulta_muni'])){
            $queryExtra .= $_SESSION['query_consulta_muni'];
        }
    /* */
    
    
    $resultado = $consultaModel->getReporte($anio,$dpto,$prov,$muni,$muniFiltrada,$tipoVista,$queryExtra,$mesActualFiltro);
 
    ?>
<script>
//alert("<?php //echo $resultado[1]; ?>"); 
</script>
<?php  
      
    $lista = $resultado[0];
    
    //var_dump($_SESSION['filtro_transferencia']);
    
    if($lista!=null){
        
        
        /* hallar totales */
        $totalPIA=0;
        $totalPIM=0;
        $totalCertificacion=0;
        $totalCompromisoAnual=0;
        $totalCompromisoMensual=0;
        $totalDevengado=0;
        $totalGirado=0;
        
        foreach($lista as $r){
            $totalPIA+=$r['PIA'];
            $totalPIM+=$r['PIM'];
            $totalCertificacion+=$r['CERTIFICACION'];
            $totalCompromisoAnual+=$r['COMPROMISO'];
            $totalCompromisoMensual+=$r['ATENCION'];
            $totalDevengado+=$r['DEVENGADO'];
            $totalGirado+=$r['GIRADO'];
        }  
        
        
        
      ?>


<div class="col-md-12">
    <div class="col-md-12">
        <div class="col-md-12">

            <div class="col-md-12">&nbsp;</div>
            <div class="table-responsive">

                <table border="1" style="width:100%;font-size: 16px;">
                    <tr style="background-color: #002747!important;color:white!important">
                        <td class="text-center"><b>Filtro</b></td>
                        <td class="text-center"><b>Valor</b></td>
                        <td class="text-center"><b>PIA</b></td>
                        <td class="text-center"><b>PIM</b></td>
                        <td class="text-center"><b>Certificación</b></td>
                        <td class="text-center"><b>Compromiso Anual</b></td>
                        <td class="text-center"><b>Atención de compromiso anual</b></td>
                        <td class="text-center"><b>Devengado</b></td>
                        <td class="text-center"><b>Girado</b></td>
                        <td class="text-center"><b>Avance</b></td>
                    </tr>

                    <?php foreach($listaKey as $k){ ?>
                    <tr style="background:white;font-size: 14px!important;">
                        <td><b><?php echo $k->key ?></b></td>
                        <td><?php echo $k->value ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoA) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoB) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoC) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoD) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoE) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoF) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoG) ?></td>
                        <td class="text-right"><?php echo number_format($k->atributoH,1)."%" ?></td>
                    </tr>
                    <?php } ?>

                    <?php if(isset($_SESSION['filtro_consulta'])){
                      foreach($_SESSION['filtro_consulta'] as $fila){

                          if($fila[0]=="MUNICIPALIDAD"){
                              if(!existeKey($listaKey,"MUNICIPALIDAD")){
                                  ?>
                    <tr style="background:white;font-size:14px!important">
                        <td><b><?php echo $fila[6]; ?></b></td>
                        <td><?php echo $fila[1]; ?></td>
                        <td class="text-right"><?php echo $fila[5][0]; ?></td>
                        <td class="text-right"><?php echo $fila[5][1]; ?></td>
                        <td class="text-right"><?php echo $fila[5][2]; ?></td>
                        <td class="text-right"><?php echo $fila[5][3]; ?></td>
                        <td class="text-right"><?php echo $fila[5][4]; ?></td>
                        <td class="text-right"><?php echo $fila[5][5]; ?></td>
                        <td class="text-right"><?php echo $fila[5][6]; ?></td>
                        <td class="text-right"><?php echo $fila[5][7]."%"; ?></td>
                    </tr>
                    <?php
                              }
                          }
                          else{
                               ?>
                    <tr style="background:white;font-size:14px!important">
                        <td><b><?php echo $fila[6]; ?></b></td>
                        <td><?php echo $fila[1]; ?></td>
                        <td class="text-right"><?php echo $fila[5][0]; ?></td>
                        <td class="text-right"><?php echo $fila[5][1]; ?></td>
                        <td class="text-right"><?php echo $fila[5][2]; ?></td>
                        <td class="text-right"><?php echo $fila[5][3]; ?></td>
                        <td class="text-right"><?php echo $fila[5][4]; ?></td>
                        <td class="text-right"><?php echo $fila[5][5]; ?></td>
                        <td class="text-right"><?php echo $fila[5][6]; ?></td>
                        <td class="text-right"><?php echo $fila[5][7]."%"; ?></td>
                    </tr>
                    <?php
                          }   
                      }
              } ?>
                </table>

            </div>
            <div class="col-md-12">&nbsp;</div>
            
            <link rel="stylesheet" href="../../dom/css/global.css">
            
            

            <div class="table-responsive table-responsive-data2">
                <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr style="background:white!important;border:none!important">
                            <th colspan="3"> <label style="color:black!important"> TOTALES </label> </th>

                            <th class="text-right"> <label style="color:black!important"
                                    id="total_PIA"><?php echo number_format($totalPIA); ?></label> </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_PIM"><?php echo number_format($totalPIM); ?></label> </th>
                            <th class="text-right"> </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_Certificacion"><?php echo number_format($totalCertificacion); ?></label>
                            </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_Compromiso"><?php echo number_format($totalCompromisoAnual); ?></label>
                            </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_Atencion"><?php echo number_format($totalCompromisoMensual); ?></label>
                            </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_Devengado"><?php echo number_format($totalDevengado); ?></label> </th>
                            <th class="text-right"> <label style="color:black!important"
                                    id="total_Girado"><?php echo number_format($totalGirado); ?></label> </th>
                            <th class="text-right"> </th>
                        </tr>
                        <tr style="background-color: #002747;">
                            <th style="color:black;font-weight:bold;background-color: #002747;"></th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                align="center">N°</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">
                                <?php echo $textoCabecera ?>
                                <input type="hidden" id="ultimaColumna" style="color:black!important"
                                    value="<?php echo $ultimaBusqueda ?>">
                            </th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">PIA</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">PIM</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center"> % PIM</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Certificación</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Compromiso Anual</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Atención de compromiso anual</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Devengado</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Girado</th>
                            <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important;background-color: #002747;"
                                class="text-center">Avance de Ejecución %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n=1; foreach($lista as $r){ ?>
                        <tr style="height:auto">
                            <td>
                                <input type="radio" data-num="<?php echo $n ?>" data-name="<?php echo $r['CAMPO']; ?>"
                                    name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">
                            </td>
                            <td class="align-middle text-left content-table"> <?php echo $n; ?> </td>
                            <td class="align-middle text-left content-table"> <?php echo $r['CAMPO'] ?> </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="pia_<?php echo $n?>"
                                    value="<?php echo number_format($r['PIA']); ?>" />
                                <?php echo number_format($r['PIA']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="pim_<?php echo $n?>"
                                    value="<?php echo number_format($r['PIM']); ?>" />
                                <?php echo number_format($r['PIM']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <?php if($totalPIM>0) echo number_format( ($r['PIM']*100/$totalPIM) ,2 )."%"; else 0;  ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="certificacion_<?php echo $n?>"
                                    value="<?php echo number_format($r['CERTIFICACION']); ?>" />
                                <?php echo number_format($r['CERTIFICACION']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="compromiso_<?php echo $n?>"
                                    value="<?php echo number_format($r['COMPROMISO']); ?>" />
                                <?php echo number_format($r['COMPROMISO']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="atencion_<?php echo $n?>"
                                    value="<?php echo number_format($r['ATENCION']); ?>" />
                                <?php echo number_format($r['ATENCION']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="devengado_<?php echo $n?>"
                                    value="<?php echo number_format($r['DEVENGADO']); ?>" />
                                <?php echo number_format($r['DEVENGADO']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="girado_<?php echo $n?>"
                                    value="<?php echo number_format($r['GIRADO']); ?>" />
                                <?php echo number_format($r['GIRADO']); ?>
                            </td>
                            <td class="align-middle text-right content-table">
                                <input type="hidden" id="avance_<?php echo $n?>"
                                    value="<?php echo number_format($r['AVANCE'],1); ?>" />
                                <?php echo number_format($r['AVANCE'],1); ?>
                            </td>
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
    $('#tablaDatos').DataTable({
        "iDisplayLength": 50,
        dom: 'fBrtlp',
        buttons: [{
            extend: 'excel',
            text: 'Descargar Excel',
            className: 'btn-success botonExcelDescarga'
        }]
    });
});

(function() {
    $(".wrapper1").scroll(function() {
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function() {
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
        <div class="alert alert-danger" role="alert"
            style="background:#F76744!important;color:white!important;font-size:18px!important">
            No se encontraron resultados
        </div>
    </div>
</div>

<?php }
    
    ?>
<script>
$("#divBloque1").show();
$("#divBloque2").show();
$("#divBloque3").show();
$("#divBloque4").show();
</script>
<script>
$("#divTipoRecurso").show();
</script>

<?php  
} 



else if ( isset($_POST['resultado_actividad']) ){
    
    $anio = $_POST['anio'];
    
    /* get mes actual */
    $cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActualEjecucionGasto('tb_registro',$anio,3);
    $mesActualFiltro=$datosMesActual['MES'];
    
    
    limpiarFiltrosActividad();
    
    /* totales previos */
    $arrayTotales = array();
    if(isset($_POST['t_pia'])){
        $arrayTotales = array($_POST['t_pia'],
                              $_POST['t_pim'],
                              $_POST['t_certificacion'],
                              $_POST['t_compromiso'],
                              $_POST['t_atencion'],
                              $_POST['t_devengado'],
                              $_POST['t_girado'],
                              $_POST['t_avance']
                              );
    }
    /* *************** */
    
    $queryExtra = "";
    $prov = $_POST['prov'];
    $dpto = $_POST['dpto'];
    $muni = $_POST['mun'];
    $muniFiltrada = $_POST['muniFiltrada'];
   
    $radioSel = $_POST['radioSel'];
    $tipoVista = $_POST['tipoVista'];
    $cabecera="";
    if(isset($_POST['ultimaColumna'])){
        $cabecera = $_POST['ultimaColumna'];
    }
    $quitar = $_POST['quitar'];
    
    
    /* lista key */
    $consultaModel=new consultaModel();
    
    $resultadoT = $consultaModel->getTotalesActividad($anio,$dpto,$prov,$muni,$mesActualFiltro);
    
    if($resultadoT!=null){
        $resultadoT = $resultadoT[0];
    }
    
    $listaKey=array();
    if($anio!=="-1"){
        $key=new keyValue();
        $key->setKey("AÑO");
        $key->setValue($anio);
        
        $key->setAtributoA($resultadoT[0]['PIA']);
        $key->setAtributoB($resultadoT[0]['PIM']);
        $key->setAtributoC($resultadoT[0]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[0]['COMPROMISO']);
        $key->setAtributoE($resultadoT[0]['ATENCION']);
        $key->setAtributoF($resultadoT[0]['DEVENGADO']);
        $key->setAtributoG($resultadoT[0]['GIRADO']);
        $key->setAtributoH($resultadoT[0]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        
        $key->setAtributoA($resultadoT[1]['PIA']);
        $key->setAtributoB($resultadoT[1]['PIM']);
        $key->setAtributoC($resultadoT[1]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[1]['COMPROMISO']);
        $key->setAtributoE($resultadoT[1]['ATENCION']);
        $key->setAtributoF($resultadoT[1]['DEVENGADO']);
        $key->setAtributoG($resultadoT[1]['GIRADO']);
        $key->setAtributoH($resultadoT[1]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        
        $key->setAtributoA($resultadoT[2]['PIA']);
        $key->setAtributoB($resultadoT[2]['PIM']);
        $key->setAtributoC($resultadoT[2]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[2]['COMPROMISO']);
        $key->setAtributoE($resultadoT[2]['ATENCION']);
        $key->setAtributoF($resultadoT[2]['DEVENGADO']);
        $key->setAtributoG($resultadoT[2]['GIRADO']);
        $key->setAtributoH($resultadoT[2]['AVANCE']);
        
        $listaKey[]=$key;
    }
    if($muni!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        
        $key->setAtributoA($resultadoT[3]['PIA']);
        $key->setAtributoB($resultadoT[3]['PIM']);
        $key->setAtributoC($resultadoT[3]['CERTIFICACION']);
        $key->setAtributoD($resultadoT[3]['COMPROMISO']);
        $key->setAtributoE($resultadoT[3]['ATENCION']);
        $key->setAtributoF($resultadoT[3]['DEVENGADO']);
        $key->setAtributoG($resultadoT[3]['GIRADO']);
        $key->setAtributoH($resultadoT[3]['AVANCE']);
        
        $listaKey[]=$key;
    }
    /* ********* */
    
    
    /* quitar filtro */
    if($quitar!=""){
        $coincidencia = eliminarFiltroActividad($quitar);
        
        if($coincidencia!=null){
            
            ?>
<script>
document.getElementById("<?php echo $coincidencia[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $coincidencia[3] ?>").style.display = 'none';
</script>
<?php
        }
        
        $ultimo = hallarTipoVistaActividad();
        
        if($ultimo!=null){
            $cabecera = $ultimo[4];
            if($cabecera=="FUENTE"){ $tipoVista="6"; }
            if($cabecera=="RUBRO"){ $tipoVista="7"; }
        }
        else{
            /* limpiar busqueda por muni */
            if(isset($_SESSION['query_actividad_muni'])){
                unset($_SESSION['query_actividad_muni']);
            }
        }
    }
    
    
    /* hallar cabecera */
    $textoCabecera="MUNICIPALIDAD";
    $ultimaBusqueda="MUNICIPALIDAD";
    $boton="";
    $label="";
    
    if($tipoVista!==""){
        if($tipoVista=="6"){
            $textoCabecera="FUENTE";
            $ultimaBusqueda="FUENTE";
            $boton="btnFuente";
            $label="lbFuente";
        }
        else if($tipoVista=="7"){
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
            
            $_SESSION['query_actividad_muni'] = " AND MUNICIPALIDAD='".$radioSel."'";
        }
        
        $listaFiltros = array();
        if(isset($_SESSION['filtro_actividad'])){
            $listaFiltros = $_SESSION['filtro_actividad'];
        }
        $listaFiltros[] = array($cabecera,$radioSel,$boton,$label,$textoCabecera,$arrayTotales,str_replace("_"," ",$cabecera));
        
        $_SESSION['filtro_actividad']=$listaFiltros;
        
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = true;
</script>
<?php
            
            if($vK==$vTotal){
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'block';
</script>
<?php     
            }
            else{
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php 
            }
            
            $vK++;
        }
        
    }
    /* */
    
    /* filtros cuando se quita filtro */
    if($quitar!=""){
        
        $listaFiltros = $_SESSION['filtro_actividad'];
        
        $vTotal = count($listaFiltros);
        $vK=1;
        
        foreach($listaFiltros as $row){
            $queryExtra .= " AND ".$row[0]."='".$row[1]."'";
            ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = true;
</script>
<?php
            
            if($vK==$vTotal){
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'block';
</script>
<?php     
            }
            else{
                ?>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php 
            }
            
            $vK++;
        }
    }
    /* */
    
    /* boton ver resultado presionado  */
    if($radioSel=="" && $quitar==""){
        unset($_SESSION['filtro_actividad']);
    }
    
    /* ver si mantiene filtro por muni */
    if(isset($_SESSION['query_actividad_muni'])){
            $queryExtra .= $_SESSION['query_actividad_muni'];
        }
    /* */
    
    $resultado = $consultaModel->getReporteActividad($anio,$dpto,$prov,$muni,$muniFiltrada,$tipoVista,$queryExtra,$mesActualFiltro);
 
    ?>
<script>
//alert("<?php //echo $resultado[1]; ?>"); 
</script>
<?php  
      
    $lista = $resultado[0];
    
    //var_dump($_SESSION['filtro_actividad']);
    
    if($lista!=null){
        
        
        /* hallar totales */
        $totalPIA=0;
        $totalPIM=0;
        $totalCertificacion=0;
        $totalCompromisoAnual=0;
        $totalCompromisoMensual=0;
        $totalDevengado=0;
        $totalGirado=0;
        
        foreach($lista as $r){
            $totalPIA+=$r['PIA'];
            $totalPIM+=$r['PIM'];
            $totalCertificacion+=$r['CERTIFICACION'];
            $totalCompromisoAnual+=$r['COMPROMISO'];
            $totalCompromisoMensual+=$r['ATENCION'];
            $totalDevengado+=$r['DEVENGADO'];
            $totalGirado+=$r['GIRADO'];
        }  
        
        
      ?>

<div class="col-md-12">
    <div class="col-md-12">

        <div class="col-md-12">&nbsp;</div>
        <div class="table-responsive">

            <table border="1" style="width:100%;font-size: 16px;">
                <tr style="background: #002747!important;color:white!important">
                    <td class="text-center"><b>Filtro</b></td>
                    <td class="text-center"><b>Valor</b></td>
                    <td class="text-center"><b>PIA</b></td>
                    <td class="text-center"><b>PIM</b></td>
                    <td class="text-center"><b>Certificación</b></td>
                    <td class="text-center"><b>Compromiso Anual</b></td>
                    <td class="text-center"><b>Atención de compromiso anual</b></td>
                    <td class="text-center"><b>Devengado</b></td>
                    <td class="text-center"><b>Girado</b></td>
                    <td class="text-center"><b>Avance</b></td>
                </tr>

                <?php foreach($listaKey as $k){ ?>
                <tr style="background:white;font-size: 14px;">
                    <td><b><?php echo $k->key ?></b></td>
                    <td><?php echo $k->value ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoA) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoB) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoC) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoD) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoE) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoF) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoG) ?></td>
                    <td class="text-right"><?php echo number_format($k->atributoH,1)."%" ?></td>
                </tr>
                <?php } ?>

                <?php if(isset($_SESSION['filtro_actividad'])){
                      foreach($_SESSION['filtro_actividad'] as $fila){

                          if($fila[0]=="MUNICIPALIDAD"){
                              if(!existeKey($listaKey,"MUNICIPALIDAD")){
                                  ?>
                <tr style="background:white;font-size: 14px;">
                    <td><b><?php echo $fila[6]; ?></b></td>
                    <td><?php echo $fila[1]; ?></td>
                    <td class="text-right"><?php echo $fila[5][0]; ?></td>
                    <td class="text-right"><?php echo $fila[5][1]; ?></td>
                    <td class="text-right"><?php echo $fila[5][2]; ?></td>
                    <td class="text-right"><?php echo $fila[5][3]; ?></td>
                    <td class="text-right"><?php echo $fila[5][4]; ?></td>
                    <td class="text-right"><?php echo $fila[5][5]; ?></td>
                    <td class="text-right"><?php echo $fila[5][6]; ?></td>
                    <td class="text-right"><?php echo $fila[5][7]."%"; ?></td>
                </tr>
                <?php
                              }
                          }
                          else{
                               ?>
                <tr style="background:white;font-size: 14px;">
                    <td><b><?php echo $fila[6]; ?></b></td>
                    <td><?php echo $fila[1]; ?></td>
                    <td class="text-right"><?php echo $fila[5][0]; ?></td>
                    <td class="text-right"><?php echo $fila[5][1]; ?></td>
                    <td class="text-right"><?php echo $fila[5][2]; ?></td>
                    <td class="text-right"><?php echo $fila[5][3]; ?></td>
                    <td class="text-right"><?php echo $fila[5][4]; ?></td>
                    <td class="text-right"><?php echo $fila[5][5]; ?></td>
                    <td class="text-right"><?php echo $fila[5][6]; ?></td>
                    <td class="text-right"><?php echo $fila[5][7]."%"; ?></td>
                </tr>
                <?php
                          }   
                      }
              } ?>
            </table>

        </div>
        <div class="col-md-12">&nbsp;</div>


        <div class="table-responsive table-responsive-data2">
            <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr style="background:white!important;border:none!important">
                        <th colspan="3"> <label style="color:black!important"> TOTALES </label> </th>

                        <th class="text-right"> <label style="color:black!important"
                                id="total_PIA"><?php echo number_format($totalPIA); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_PIM"><?php echo number_format($totalPIM); ?></label> </th>
                        <th class="text-right"> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Certificacion"><?php echo number_format($totalCertificacion); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Compromiso"><?php echo number_format($totalCompromisoAnual); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Atencion"><?php echo number_format($totalCompromisoMensual); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Devengado"><?php echo number_format($totalDevengado); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Girado"><?php echo number_format($totalGirado); ?></label> </th>
                        <th class="text-right"> </th>
                    </tr>
                    <tr style="background-color: #002747;">
                        <th style="color:black;font-weight:bold"></th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            align="center">N°</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">
                            <?php echo $textoCabecera ?>
                            <input type="hidden" id="ultimaColumna" style="color:black!important"
                                value="<?php echo $ultimaBusqueda ?>">
                        </th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">PIA</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center"> % PIM</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Certificación</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Compromiso Anual</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Atención de compromiso anual</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Devengado</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Girado</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important"
                            class="text-center">Avance de Ejecución %</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($lista as $r){ ?>
                    <tr style="height:auto">
                        <td>
                            <input type="radio" data-num="<?php echo $n ?>" data-name="<?php echo $r['CAMPO']; ?>"
                                name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">
                        </td>
                        <td class="align-middle text-left"> <?php echo $n; ?> </td>
                        <td class="align-middle text-left"> <?php echo $r['CAMPO'] ?> </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="pia_<?php echo $n?>"
                                value="<?php echo number_format($r['PIA']); ?>" />
                            <?php echo number_format($r['PIA']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="pim_<?php echo $n?>"
                                value="<?php echo number_format($r['PIM']); ?>" />
                            <?php echo number_format($r['PIM']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <?php if($totalPIM>0) echo number_format( ($r['PIM']*100/$totalPIM) ,2 )."%"; else 0;  ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="certificacion_<?php echo $n?>"
                                value="<?php echo number_format($r['CERTIFICACION']); ?>" />
                            <?php echo number_format($r['CERTIFICACION']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="compromiso_<?php echo $n?>"
                                value="<?php echo number_format($r['COMPROMISO']); ?>" />
                            <?php echo number_format($r['COMPROMISO']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="atencion_<?php echo $n?>"
                                value="<?php echo number_format($r['ATENCION']); ?>" />
                            <?php echo number_format($r['ATENCION']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="devengado_<?php echo $n?>"
                                value="<?php echo number_format($r['DEVENGADO']); ?>" />
                            <?php echo number_format($r['DEVENGADO']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="girado_<?php echo $n?>"
                                value="<?php echo number_format($r['GIRADO']); ?>" />
                            <?php echo number_format($r['GIRADO']); ?>
                        </td>
                        <td class="align-middle text-right">
                            <input type="hidden" id="avance_<?php echo $n?>"
                                value="<?php echo number_format($r['AVANCE'],1); ?>" />
                            <?php echo number_format($r['AVANCE'],1); ?>
                        </td>
                    </tr>
                    <?php $n++; } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $('#tablaDatos').DataTable({
        "iDisplayLength": 50,
        dom: 'fBrtlp',
        buttons: [{
            extend: 'excel',
            text: 'Descargar Excel',
            className: 'btn-success botonExcelDescarga'
        }]
    });
});

(function() {
    $(".wrapper1").scroll(function() {
        $(".wrapper2")
            .scrollLeft($(".wrapper1").scrollLeft());
    });
    $(".wrapper2").scroll(function() {
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
        <div class="alert alert-danger" role="alert"
            style="background:#F76744!important;color:white!important;font-size:18px!important">
            No se encontraron resultados
        </div>
    </div>
</div>

<?php }
      
    ?>
<script>
$("#divBloque1").hide();
$("#divBloque2").show();
$("#divBloque3").hide();
$("#divBloque4").hide();
</script>
<script>
$("#divTipoRecurso").hide();
</script>
<?php
} 


else if ( isset($_POST['resultado_proyecto']) ){
    
    $anio = $_POST['anio'];
    
    /* get mes actual */
    $cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActualEjecucionGasto('tb_registro',$anio,2);
    $mesActualFiltro=$datosMesActual['MES'];
    
    
    $dpto = $_POST['dpto'];
    $prov = $_POST['prov'];
    $mun = $_POST['mun'];

    $model=new consultaModel();
    
    $lista = $model->proyectosPriorizados($anio, $dpto, $prov, $mun,$mesActualFiltro);
    
    if($lista==null){
        
        ?>

<div class="col-md-12">
    <div class="col-md-6" style="margin-top:10px!important">
        <div class="alert alert-danger" role="alert"
            style="background:#F76744!important;color:white!important;font-size:18px!important">
            No se encontraron resultados
        </div>
    </div>
</div>

<?php
    }
    else{
        
        /* hallar totales */
        $totalPIA=0;
        $totalPIM=0;
        $totalCertificacion=0;
        $totalCompromisoAnual=0;
        $totalCompromisoMensual=0;
        $totalDevengado=0;
        $totalGirado=0;
        
        foreach($lista as $r){
            $totalPIA+=$r['PIA'];
            $totalPIM+=$r['PIM'];
            $totalCertificacion+=$r['CERTIFICACION'];
            $totalCompromisoAnual+=$r['COMPROMISO'];
            $totalCompromisoMensual+=$r['ATENCION'];
            $totalDevengado+=$r['DEVENGADO'];
            $totalGirado+=$r['GIRADO'];
        }
        
        ?>

<div class="col-md-12">
    <div class="col-md-12">


        <div class="table-responsive table-responsive-data2" style="margin-top:40px">
            <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr style="background:white!important;border:none!important">
                        <th colspan="3"> <label style="color:black!important"> TOTALES </label> </th>

                        <th class="text-right"> <label style="color:black!important"
                                id="total_PIA"><?php echo number_format($totalPIA); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_PIM"><?php echo number_format($totalPIM); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Certificacion"><?php echo number_format($totalCertificacion); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Compromiso"><?php echo number_format($totalCompromisoAnual); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Atencion"><?php echo number_format($totalCompromisoMensual); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Devengado"><?php echo number_format($totalDevengado); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important"
                                id="total_Girado"><?php echo number_format($totalGirado); ?></label> </th>
                        <th class="text-right"> </th>
                    </tr>
                    <tr style="background-color: #002747">
                        <th style="font-weight:bold;color:white">N°</th>
                        <th style="font-weight:bold;color:white" class="text-center">MUNICIPALIDAD</th>
                        <th style="font-weight:bold;color:white" class="text-center">PROYECTO</th>
                        <th style="font-weight:bold;color:white" class="text-center">PIA</th>
                        <th style="font-weight:bold;color:white" class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white" class="text-center">Certificación</th>
                        <th style="font-weight:bold;color:white" class="text-center">Compromiso Anual</th>
                        <th style="font-weight:bold;color:white" class="text-center">Atención de compromiso anual</th>
                        <th style="font-weight:bold;color:white" class="text-center">Devengado</th>
                        <th style="font-weight:bold;color:white" class="text-center">Girado</th>
                        <th style="font-weight:bold;color:white" class="text-center">Avance de Ejecución %</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n=1; foreach($lista as $r){ ?>
                    <tr style="height:auto">
                        <td class="align-middle text-left"> <?php echo $n; ?> </td>
                        <td class="align-middle text-left"> <?php echo $r['MUNICIPALIDAD'] ?> </td>
                        <td class="align-middle text-left"> <?php echo $r['PROYECTO'] ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['PIA']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['PIM']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['CERTIFICACION']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['COMPROMISO']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['ATENCION']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['DEVENGADO']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['GIRADO']); ?> </td>
                        <td class="align-middle text-right"> <?php echo number_format($r['AVANCE'],1); ?> </td>
                    </tr>
                    <?php $n++; } ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    $('#tablaDatos').DataTable({
        "iDisplayLength": 50,
        dom: 'fBrtlp',
        buttons: [{
            extend: 'excel',
            text: 'Descargar Excel',
            className: 'btn-success botonExcelDescarga'
        }]
    });
});
</script>

<?php
    }
    
    ?>
<script>
$("#divBloque1").hide();
$("#divBloque2").hide();
$("#divBloque3").hide();
$("#divBloque4").hide();
</script>

<?php    
}

else if( isset($_POST['resumen_municipalidad']) ){
    
    $anio = $_POST['anio'];
    
    /* get mes actual */
    $cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActual('tb_registro',$anio);
    $mesActualFiltro=$datosMesActual['MES'];
    
    
    $contador=0;
    
    $model=new consultaModel();
    
    $lista = $model->resumenMunicipalidad($anio,$mesActualFiltro);
    
    if($lista!=null){
    
        foreach($lista as $r){
         $contador=$contador+1
         ?>
<!DOCTYPE html>
<html>

<head>
    <title>Consulta</title>
    <link rel="stylesheet" href="../../dom/css/consulta.css">
    <style>
    .card-header {
        height: 40%;
    }

    .card-body {
        height: 33%;
    }
    .card-footer{
        height: 37%;
    }

    .card-body-content {
        margin-bottom: 5%;
        font-family: Arial;
        font-weight: 500;
        line-height: 1.1;
        font-size: 18px;
        color: inherit;
    }
    .thumbnail-style{
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;

    }
    .progress{
        height: 20px;
    }
    .label-avance{
        font-size: 20px;
    }
    .label-porcentaje{
        font-size: 25px;
    }
    </style>
</head>

<body>
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

        <div class="row">
            <a target="_blank"
                href="resumen.php?pre=<?php echo $r['PRESUPUESTO'] ?>&anio=<?php echo $anio ?>&mes=<?php echo $mesActualFiltro ?>&muni=<?php echo $r['MUNICIPALIDAD'] ?>">
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <div class="thumbnail thumbnail-style"
                        style="height:470px!important;background-image: url('../images/Fondo_Card<?php echo $contador?>.jpg');opacity: 0.8;">
                        <div class="caption text-center card-header">
                            <div class="position-relative">
                                <img src="../dom/img/icono-municipalidad.svg" style="width:72px;height:72px;" />
                            </div>
                            <h4 style="color:white;font-weight: bold;font-family:'Zilla Slab',Georgia,'Times New Roman',serif"
                                id="thumbnail-label"><?php echo $r['MUNICIPALIDAD']; ?></h4>
                            <div class="position-relative"
                                style="color:black!important;background:white!important;border-radius: 10px;font-size:12px!important;padding:5px!important;font-family: Arial;">
                                <b>Departamento: </b><?php echo $r['DEPARTAMENTO'] ?>
                                ,<b> Provincia: </b><?php echo $r['PROVINCIA'] ?>
                            </div>
                        </div>
                        <div class="caption text-left card-body" style="color:white;font-weight: bold">
                            <h4 class="card-body-content row">
                                <div class="col-7">
                                    <i class="glyphicon glyphicon-file light-red lighter bigger-120"></i>
                                    &nbsp;Presupuesto:

                                </div>
                                <div class="col-5">

                                    <?php echo number_format($r['PRESUPUESTO']); ?>

                                </div>


                            </h4>
                            <h4 class="card-body-content row">
                                <div class="col-7">
                                    <i class="glyphicon glyphicon glyphicon-list-alt light-red lighter bigger-120"></i>
                                    &nbsp;Ejecución:

                                </div>
                                <div class="col-5">

                                    <?php echo number_format($r['EJECUCION']); ?>

                                </div>


                            </h4>
                            <h4 class="card-body-content row">
                                <div class="col-7">
                                    <i
                                        class="glyphicon glyphicon glyphicon-folder-close light-red lighter bigger-120"></i>
                                    &nbsp;Proyectos:

                                </div>
                                <div class="col-5">

                                    <?php echo number_format($r['CANTIDAD']); ?>

                                </div>


                            </h4>


                        </div>
                        <div class="caption card-footer text-center" style="color:white;font-weight: bold">
                            <ul class="list-inline">
                                <h4 class="label-avance"> <i class="glyphicon glyphicon-signal light-red lighter bigger-120"></i>&nbsp;
                                    Avance: </h4>
                                <li></li>
                                <h2 class="label-porcentaje"> <?php echo $r['AVANCE']." %"; ?></h2>
                                <div class="progress">
                                    <div class="progress-bar-info" role="progressbar" aria-valuenow="70"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="width:<?php echo $r['AVANCE'] ?>%; background: #D1C01B !important">
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</body>

</html>


<!--            <div class="col-lg-6 d-flex align-items-stretch ftco-animate fadeInUp ftco-animated">
          	<div class="blog-entry d-flex">
          		<a href="blog-single.html" class="block-20 img" style="background-image: url('../images/Fondo_Peru2.jpg');">
              </a>
              <div class="text p-1 bg-light">
              	<div class="meta">
              		<p><span class="fa fa-calendar"></span> 23 April 2020</p>
              	</div>
                <h3 class="heading mb-3"><?php echo $r['MUNICIPALIDAD']; ?></h3>
                <p>Presupuesto: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($r['PRESUPUESTO']); ?></p>
                <a href="#" class="btn-custom">Avance:<span class="fa fa-long-arrow-right"><?php echo $r['AVANCE']." %"; ?></span></a>
                <a href=resumen.php?pre=<?php echo $r['PRESUPUESTO'] ?>&anio=<?php echo $anio ?>&muni=<?php echo $r['MUNICIPALIDAD'] ?>" target="_blank">AQUI</a>
              </div>
            </div>
          </div>                                                        -->



<?php 
        }
        
        ?> <div class="col-md-12">&nbsp;</div> <?php
    } 
    ?>

<?php
}

else if( isset($_POST['muni_resumen']) ){
    
    $anio = $_POST['anio_detalle'];
    $mes = $_POST['mes'];
    $muni = $_POST['muni_detalle'];
    $pre = $_POST['pre'];
    
    
    /* CATEGORIA PRESUPUESTAL */
    $model=new consultaModel();
    
    $datosMuni = $model->buscarDatosMunicipalidad($muni);
    
    if($datosMuni['ARCHIVO']!=null && $datosMuni['ARCHIVO']!="" && isset($_SESSION['flag_linea']) && $_SESSION['flag_linea']==1){
        ?>
<script>
$("#divLineaTiempo").show();
$("#hrefLink").attr("href", "https://marcologico.com/excel/<?php echo $datosMuni['ARCHIVO'] ?>");
</script>
<?php 
    }
    else{
        ?>
<script>
$("#divLineaTiempo").hide();
</script>
<?php 
    }
    
    if($datosMuni!=null){
        ?>
<script>
$("#labelDepartamento").html('<?php echo "DEPARTAMENTO: <br>".$datosMuni['DEPARTAMENTO']; ?>');
</script>
<script>
$("#labelProvincia").html('<?php echo "PROVINCIA: <br>".$datosMuni['PROVINCIA']; ?>');
</script>
<script>
$("#labelDistrito").html('<?php echo "DISTRITO: <br>".$datosMuni['DISTRITO']; ?>');
</script>
<?php
    }
    
    /* montos totales */
    $dMix = $model->datosMixtos($anio,$muni,$mes);
    
    if($dMix!=null){
        
        $montoAutorizado = $dMix['AUTORIZADO'];
        $montoAcreditado = $dMix['ACREDITADO'];
        
    ?>
<script>
$("#labelDatosMontos").html('<?php echo "PIA Inicial de ingreso:   S/ ".number_format($dMix['PIA'],2)."<br>"
                ."Presupuesto actualizado de ingreso:   S/ ".number_format($dMix['PIM'],2)."<br>"
                ."Monto autorizado (transferencia):   S/ ".number_format($montoAutorizado,2)."<br>"
                ."Monto acreditado (transferencia):   S/ ".number_format($montoAcreditado,2)."<br>"
                ."Recursos financieros totales (ingreso):  S/ ".number_format($dMix['RECAUDADO'],2); ?>');
</script>
<?php
    }
    
    /* indicadores */
    $datosAvance = $model->presupuestoEjecucionAvance($anio, $muni,$mes);
    if($datosAvance!=null){
        ?>

<script>
$("#labelPresupuesto").html('<?php echo "S/ ".number_format($datosAvance['PRESUPUESTO']); ?>');
</script>
<script>
$("#labelInicialInversion").html('<?php echo "S/ ".number_format($datosAvance['INICIAL']); ?>');
</script>
<script>
$("#labelEjecucion").html('<?php echo "S/ ".number_format($datosAvance['EJECUCION']); ?>');
</script>
<script>
$("#labelAvance").html('<?php echo "Avance Financiero: ".number_format($datosAvance['AVANCE'],2)."%"; ?>');
</script>

<?php 
    }
    
    $mayorProyecto = $model->resumenMuniDetalleTop($anio, $muni,"PROYECTO",$mes);
   
    if($mayorProyecto!=null){
        $mayorProyecto = $mayorProyecto[0];
        if($pre>0){
            $porMayorPro = number_format( ($mayorProyecto['PRESUPUESTO']*100/$pre), 2);
        }
        else{
            $porMayorPro = 0;
        }
        
        
        ?>

<script>
$("#labelInversionPIM").html(
    '<?php echo "<u>Nombre de la Inversión con más PIM:</u> <br> S/".number_format($mayorProyecto['PRESUPUESTO'])." ($porMayorPro% del total) <br>".$mayorProyecto['PROYECTO']." <br>"; ?>'
    );
</script>

<?php 
    }
    
    $funcionesLista = $model->resumenMuniTopFuncion($anio, $muni,$datosAvance['PRESUPUESTO'],$mes);
    
    if($funcionesLista!=null){
        $cadena = "";
        foreach($funcionesLista as $r){
            
            $arregloPro = $model->proyectosPorMuniFuncionAnio($anio, $muni, $r['FUNCION'],$mes);
            $arregloProCantidad = count($arregloPro);
            $cadenaEvaluar = "proyectos";
            if($arregloProCantidad==1){
                $cadenaEvaluar = "proyecto";
            }
            
            $cadena.= "(".number_format( $r['PRESUPUESTO'], 0)."%)  ".$r['FUNCION']." ( $arregloProCantidad $cadenaEvaluar ) <br>";
        }
        ?>
<script>
$("#presupuestoFuncion").html('<?php echo strtolower($cadena); ?>');
</script>
<?php
    }
    
    /* listas */
    $listaCategoria = $model->resumenMuniDetalle($anio, $muni,"CATEGORIA_PRESUPUESTAL",$mes);
    $listaRubro = $model->resumenMuniDetalle($anio, $muni,"RUBRO",$mes);
    
    if($listaRubro!=null){
        $cadena = "";
        foreach($listaRubro as $r){
            if($pre>0){
                $cadena.= "(".number_format( ($r['PRESUPUESTO']*100/$pre), 0)."%)  ".$r['RUBRO']." <br>";
            }
            else{
                $cadena.= "(0%)  ".$r['RUBRO']." <br>";
            }
        }
        ?>
<script>
$("#labelRubros").html('<?php echo strtolower($cadena); ?>');
</script>
<?php
    }
    
    $listaFuncion = $model->resumenMuniDetalle($anio, $muni,"FUNCION",$mes);
    $listaProyecto = $model->resumenMuniDetalle($anio, $muni,"PROYECTO",$mes);
    
    $info = calcularNumeroProyectoSupera($listaProyecto,$datosMuni['MONTO']);
   
    $numProyectoSupera = $info[0];
    $presupuestoProyectoSupera = $info[1];
    if($pre>0){
        $presupuestoProyectoSupera = $presupuestoProyectoSupera*100/$pre;
    }
    else{
        $presupuestoProyectoSupera = 0;
    }
    
    if($listaProyecto!=null){
        ?>
<script>
$("#labelTotalProyecto").html('<?php echo count($listaProyecto)." Total de Proyectos <br>" ?>');
</script>
<?php if($datosMuni['IDMUNICIPALIDAD']!=19){ ?>
<script>
$("#labelTotalProyecto").html(
    '<?php echo count($listaProyecto)." Total de Proyectos <br>".$numProyectoSupera." proyecto(s) >= S/ ".($datosMuni['MONTO']/1000)." mil"." (".number_format($presupuestoProyectoSupera,2)."% del total)" ; ?>'
    );
</script>
<?php } ?>
<?php
    }
    
    /* calculos finales */    
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
    ?>

<script>
$("#labelotros").html(
    '<?php echo "Cumplimiento de certificación (certificación/pim): ".number_format($cumplimientoCertificacion,2)."%"."<br>"."Cumplimiento de contrato (devengado/compromiso): ".number_format($cumplimientoContrato,2)."%"."<br>"."Cumplimiento de girado (girado/devengado): ".number_format($cumplimientoGirado,2)."%"."<br>"; ?>'
    );
</script>
<?php
    /* */
    
    resumenItem($listaProyecto,"Proyecto","PROYECTO",$pre);
    resumenItem($listaFuncion,"Función","FUNCION",$pre);
    resumenItem($listaRubro,"Fuente de financiamiento","RUBRO",$pre);
    resumenItem($listaCategoria,"Categoría Presupuestal","CATEGORIA_PRESUPUESTAL",$pre);
    
}




function resumenItem($lista,$titulo,$campoBD,$presupuestoMuni){
    
    if($lista!=null){
        ?>

<div class="col-md-12">
    <div class="divTituloResumen">
        <center>
            <?php echo "Detalle por ".$titulo ?>
        </center>
    </div>
</div>

<?php
        $contador = 1;
            
        foreach($lista as $r){
            
            if($presupuestoMuni>0){
                $p = number_format( ($r['PRESUPUESTO']*100/$presupuestoMuni), 2);
            }
            else{
                $p=0;
            }
            
            if($contador == 24){
                $contador=1;
            }
        ?>

<div class="col-xl-4 col-lg-6 col-md-12" style="display: flex;  justify-content: center; align-items: center;">
    <div class="row card-content">
        <div class="col-md-12">
            <div class="thumbnail detalle-imagen"
                style="cursor:default;font-family:tahoma!important;background-image: url('../images/Fondo_Card<?php echo $contador?>.jpg');">
                <div class="caption text-center header-caption">
                    <h5 class="header-label" id="thumbnail-label" style="text-align: justify!important;color:white!important">
                        <?php echo $r[$campoBD]; ?></h5>
                </div>
                <div class="caption text-left body-caption" >
                    <p style="color:white!important"><i
                            class="glyphicon glyphicon-file light-red lighter bigger-120"></i>
                        &nbsp;Presupuesto:  &nbsp;<?php echo number_format($r['PRESUPUESTO'],0)." ($p %)"; ?>
                    </p>
                    <p style="color:white!important">
                        <i class="glyphicon glyphicon glyphicon-list-alt light-red lighter bigger-120"></i>
                        &nbsp; Ejecución: &nbsp;<?php echo number_format($r['EJECUCION'],0); ?>
                    </p>
                    <?php if($campoBD=="FUNCION"){ ?>
                    <p style="color:white!important">
                        <i class="glyphicon glyphicon glyphicon-folder-close light-red lighter bigger-120"></i>
                        &nbsp;&nbsp;Proyectos: <?php echo $r['CANTIDAD_PROYECTOS']; ?>
                    </p>
                    <?php }?>

                </div>
                <div class="caption card-footer text-center footer-caption ">
                    <ul class="list-inline " style="color:white!important">
                        <li> <i class="glyphicon glyphicon-signal light-red lighter bigger-120"></i>&nbsp; Avance: </li>
                        <li></li>
                        <li> <?php echo $r['AVANCE']." %"; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
            $contador++;
        }
    }
    
}



function calcularNumeroProyectoSupera($listaProyecto,$monto){
    
    $cantidad=0;
    $suma=0;
    
    if($listaProyecto!=null){
        foreach($listaProyecto as $r){
            if($r['PRESUPUESTO']>$monto){
                $suma+=$r['PRESUPUESTO'];
                $cantidad++;
            }
        }
    }
    
    return array($cantidad,$suma);
}


function hallarTipoVistaActividad(){
    
    $cont = 1;
    $total = count($_SESSION['filtro_actividad']);
    $lista = $_SESSION['filtro_actividad'];
    $final=null;
    
    foreach($lista as $row){
        if($cont==$total){
            $final=$row;
        }
        $cont++;
    }
    
    return $final;
}    


function hallarTipoVista(){
    
    $cont = 1;
    $total = count($_SESSION['filtro_consulta']);
    $lista = $_SESSION['filtro_consulta'];
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
    $lista = $_SESSION['filtro_consulta'];
    
    foreach($lista as $row){
        if( $row[4]!=$filtro ){
            $lista2[]=$row;
        }
        else{
            $coincidencia = $row;
        }
    }
    
    $_SESSION['filtro_consulta'] = $lista2;
    
    return $coincidencia;
}


function eliminarFiltroActividad($filtro){
    
    $coincidencia = null;
    $lista2 = array();
    $lista = $_SESSION['filtro_actividad'];
    
    foreach($lista as $row){
        if( $row[4]!=$filtro ){
            $lista2[]=$row;
        }
        else{
            $coincidencia = $row;
        }
    }
    
    $_SESSION['filtro_actividad'] = $lista2;
    
    return $coincidencia;
}
    
function limpiarFiltros(){

    if(isset($_SESSION['filtro_consulta'])){
        
        $listaFiltros = $_SESSION['filtro_consulta'];
        
        foreach($listaFiltros as $row){
        
             ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
<?php 
        }
        
    }
}


function limpiarFiltrosActividad(){

    if(isset($_SESSION['filtro_actividad'])){
        
        $listaFiltros = $_SESSION['filtro_actividad'];
        
        foreach($listaFiltros as $row){
        
             ?>
<script>
document.getElementById("<?php echo $row[2] ?>").disabled = false;
</script>
<script>
document.getElementById("<?php echo $row[3] ?>").style.display = 'none';
</script>
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