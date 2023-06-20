<?php

require_once '../model/loginModel.php';
require_once '../model/consultaModel.php';
require_once '../model/keyValue.php';
require_once '../model/seguimientoModel.php';
require_once '../model/ingresoModel.php';
require_once '../model/keyValue.php';

if(!isset($_SESSION))session_start();


if( isset($_GET['reporte']) ){

    
date_default_timezone_set("America/Lima");

$fechaHora = date("Y-m-d_h.m.s");

header('Content-type:application/xls;charset=ISO-8859-1');
header('Content-Disposition: attachment; filename=base-datos-ingresos-'.$fechaHora.'.xls');

$model = new ingresoModel();

$datos = $model->getBaseDatos();

    if($datos!=null){
        ?>

        <table border="1">
            <tr>
                <th>A&ntilde;o</th>
                <th>Departamento</th>
                <th>Provincia</th>
                <th>Municipalidad</th>
                <th>Fuente</th>
                <th>Rubro</th>
                <th>Tipo de recurso</th>
                <th>Gen&eacute;rica</th>
                <th>Subgen&eacute;rica</th>
                <th>Detalle subgen&eacute;rica</th>
                <th>Espec&iacute;fica</th>
                <th>Detalle espec&iacute;fica</th>
                <th>Mes</th>
                <th>PIA</th>
                <th>PIM</th>
                <th>Recaudado</th>
            </tr>
            <?php foreach($datos as $r){ ?>
            <tr>
                    <td> <?php echo $r['ANIO']; ?> </td>
                    <td> <?php echo $r['DEPARTAMENTO']; ?> </td>
                    <td> <?php echo $r['PROVINCIA']; ?> </td>
                    <td> <?php echo $r['MUNICIPALIDAD']; ?> </td>
                    <td> <?php echo $r['FUENTE']; ?> </td>
                    <td> <?php echo $r['RUBRO']; ?> </td>
                    <td> <?php echo $r['TIPO_RECURSO']; ?> </td>
                    <td> <?php echo $r['GENERICA']; ?> </td>
                    <td> <?php echo $r['SUBGENERICA']; ?> </td>
                    <td> <?php echo $r['DETALLE_SUBGENERICA']; ?> </td>
                    <td> <?php echo $r['ESPECIFICA']; ?> </td>
                    <td> <?php echo $r['DETALLE_ESPECIFICA']; ?> </td>
                    <td> <?php echo $r['MES']; ?> </td>
                    <td> <?php echo $r['PIA']; ?> </td>
                    <td> <?php echo $r['PIM']; ?> </td>
                    <td> <?php echo $r['RECAUDADO']; ?> </td>
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
    
    if(isset($_SESSION['query_ingreso_muni'])){
        unset($_SESSION['query_ingreso_muni']);
    }
    
    if(isset($_SESSION['filtro_ingreso'])){

        foreach($_SESSION['filtro_ingreso'] as $row){
            ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=false;</script>
                <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
            <?php
        }
        unset($_SESSION['filtro_ingreso']);
    }
}

else if ( isset($_POST['resultado']) ){
    
    $anio = $_POST['anio'];
    limpiarFiltros();
    
    /* get mes actual */
    $cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActual('tb_ingreso',$anio);
    $mesActualFiltro=$datosMesActual['MES'];
    
    /* totales previos */
    $arrayTotales = array();
    if(isset($_POST['t_pia'])){
        $arrayTotales = array($_POST['t_pia'],
                              $_POST['t_pim'],
                              $_POST['t_recaudado']
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
    $cabecera = $_POST['ultimaColumna'];
    $quitar = $_POST['quitar'];
    
    
    /* lista key */
    $transferenciaModel = new ingresoModel();
    
    $resultadoT = $transferenciaModel->getTotales($anio,$dpto,$prov,$muni,$mesActualFiltro);
    
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
        $key->setAtributoC($resultadoT[0]['RECAUDADO']);
        
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        
        $key->setAtributoA($resultadoT[1]['PIA']);
        $key->setAtributoB($resultadoT[1]['PIM']);
        $key->setAtributoC($resultadoT[1]['RECAUDADO']);
        
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        
        $key->setAtributoA($resultadoT[2]['PIA']);
        $key->setAtributoB($resultadoT[2]['PIM']);
        $key->setAtributoC($resultadoT[2]['RECAUDADO']);
        
        $listaKey[]=$key;
    }
    if($muni!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        
        $key->setAtributoA($resultadoT[3]['PIA']);
        $key->setAtributoB($resultadoT[3]['PIM']);
        $key->setAtributoC($resultadoT[3]['RECAUDADO']);
        
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
            if($cabecera=="FUENTE"){ $tipoVista="1"; }
            if($cabecera=="RUBRO"){ $tipoVista="2"; }
            if($cabecera=="TIPO_RECURSO"){ $tipoVista="3"; }
            if($cabecera=="GENERICA"){ $tipoVista="4"; }
            if($cabecera=="SUBGENERICA"){ $tipoVista="5"; }
            if($cabecera=="DETALLE_SUBGENERICA"){ $tipoVista="6"; }
            if($cabecera=="ESPECIFICA"){ $tipoVista="7"; }
            if($cabecera=="DETALLE_ESPECIFICA"){ $tipoVista="8"; }
            if($cabecera=="MES"){ $tipoVista="9"; }
            if($cabecera=="TRIMESTRE"){ $tipoVista="10"; }
            
        }
        else{
            /* limpiar busqueda por muni */
            if(isset($_SESSION['query_ingreso_muni'])){
                unset($_SESSION['query_ingreso_muni']);
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
            $textoCabecera="FUENTE";
            $ultimaBusqueda="FUENTE";
            $boton="btnFuente";
            $label="lbFuente";
        }
        else if($tipoVista=="2"){
            $textoCabecera="RUBRO";
            $ultimaBusqueda="RUBRO";
            $boton="btnRubro";
            $label="lbRubro";
        }
        else if($tipoVista=="3"){
            $textoCabecera="TIPO_RECURSO";
            $ultimaBusqueda="TIPO_RECURSO";
            $boton="btnTipoRecurso";
            $label="lbTipoRecurso";
        }
        else if($tipoVista=="4"){
            $textoCabecera="GENERICA";
            $ultimaBusqueda="GENERICA";
            $boton="btnGenerica";
            $label="lbGenerica";
        }
        else if($tipoVista=="5"){
            $textoCabecera="SUBGENERICA";
            $ultimaBusqueda="SUBGENERICA";
            $boton="btnSubgenerica";
            $label="lbSubgenerica";
        }
        else if($tipoVista=="6"){
            $textoCabecera="DETALLE_SUBGENERICA";
            $ultimaBusqueda="DETALLE_SUBGENERICA";
            $boton="btnDetalleSubgenerica";
            $label="lbDetalleSubgenerica";
        }
        else if($tipoVista=="7"){
            $textoCabecera="ESPECIFICA";
            $ultimaBusqueda="ESPECIFICA";
            $boton="btnEspecifica";
            $label="lbEspecifica";
        }
        else if($tipoVista=="8"){
            $textoCabecera="DETALLE_ESPECIFICA";
            $ultimaBusqueda="DETALLE_ESPECIFICA";
            $boton="btnDetalleEspecifica";
            $label="lbDetalleEspecifica";
        }
        else if($tipoVista=="9"){
            $textoCabecera="MES";
            $ultimaBusqueda="MES";
            $boton="btnMes";
            $label="lbMes";
            
            $mesActualFiltro="";
        }
        else if($tipoVista=="10"){
            $textoCabecera="TRIMESTRE";
            $ultimaBusqueda="TRIMESTRE";
            $boton="btnTrimestre";
            $label="lbTrimestre";
            
        }
        
    }
    /* */
    
    
    /* ver si hay radio marcado -> agregar filtro*/
    if($radioSel!="" && $quitar==""){
        
        if($cabecera=="MUNICIPALIDAD"){
            
            $_SESSION['query_ingreso_muni'] = " AND MUNICIPALIDAD='".$radioSel."'";
        }
        
        $listaFiltros = array();
        if(isset($_SESSION['filtro_ingreso'])){
            $listaFiltros = $_SESSION['filtro_ingreso'];
        }
        $listaFiltros[] = array($cabecera,$radioSel,$boton,$label,$textoCabecera,$arrayTotales,str_replace("_"," ",$cabecera));
        
        $_SESSION['filtro_ingreso']=$listaFiltros;
        
        
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
            
            /* quitar mes actual si se ha filtrado por un mes */
            if($row[0]=="MES"){
                $mesActualFiltro="";
            }
            
        }
        
    }
    /* */
    
    /* filtros cuando se quita filtro */
    if($quitar!=""){
        
        $listaFiltros = $_SESSION['filtro_ingreso'];
        
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
            
            /* quitar mes actual si se ha filtrado por un mes */
            if($row[0]=="MES"){
                $mesActualFiltro="";
            }
            
        }
    }
    /* */
    
    /* boton ver resultado presionado  */
    if($radioSel=="" && $quitar==""){
        unset($_SESSION['filtro_ingreso']);
    }
    
    /* ver si mantiene filtro por muni */
    if(isset($_SESSION['query_ingreso_muni'])){
            $queryExtra .= $_SESSION['query_ingreso_muni'];
        }
    /* */
    
    $resultado = $transferenciaModel->getReporte($anio,$dpto,$prov,$muni,$muniFiltrada,$tipoVista,$queryExtra,$mesActualFiltro);
 
    ?>
      <script> //alert("<?php //echo $resultado[1]; ?>"); </script>
    <?php  
      
    $lista = $resultado[0];
    
    //var_dump($_SESSION['filtro_transferencia']);
    
    if($lista!=null){
        
        
        /* hallar totales */
        $totalPIA=0;
        $totalPIM=0;
        $totalRecaudado=0;
        
        foreach($lista as $r){
            $totalPIA+=$r['PIA'];
            $totalPIM+=$r['PIM'];
            $totalRecaudado+=$r['RECAUDADO'];
        }  
        
        
      ?>
      
      <div class="col-md-12">
      <div class="col-md-12">
          
        <div class="col-md-12">&nbsp;</div>    
        <div class="col-md-12">    
          <div class="table-responsive">

          <table border="1" style="width:60%;font-size: 16px;">  
              <tr style="background: #002747!important;color:white!important">
                  <td class="text-center"><b>Filtro</b></td>
                  <td class="text-center"><b>Valor</b></td>
                  <td class="text-center"><b>PIA</b></td>
                  <td class="text-center"><b>PIM</b></td>
                  <td class="text-center"><b>RECAUDADO</b></td>
              </tr>

              <?php foreach($listaKey as $k){ ?>
              <tr style="background:white;font-size: 14px!important;">
                  <td><b><?php echo $k->key ?></b></td>
                  <td><?php echo $k->value ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoA) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoB) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoC) ?></td>
                  
              </tr>    
              <?php } ?>

              <?php if(isset($_SESSION['filtro_ingreso'])){
                      foreach($_SESSION['filtro_ingreso'] as $fila){

                          if($fila[0]=="MUNICIPALIDAD"){
                              if(!existeKey($listaKey,"MUNICIPALIDAD")){
                                  ?>
                                  <tr style="background:white;font-size: 14px!important;">
                                      <td><b><?php echo $fila[6]; ?></b></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][0]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][1]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][2]; ?></td>
                                  </tr>
                                  <?php
                              }
                          }
                          else{
                               ?>
                               <tr style="background:white;font-size: 14px!important;">
                                    <td><b><?php echo $fila[6]; ?></b></td>
                                    <td><?php echo $fila[1]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][0]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][1]; ?></td>
                                    <td class="text-right"><?php echo $fila[5][2]; ?></td>
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
                        
                        <th class="text-right"> <label style="color:black!important" id=""><?php echo number_format($totalPIA); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id=""><?php echo number_format($totalPIM); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id=""><?php echo number_format($totalRecaudado); ?></label> </th>
                    </tr>
                    
                    <tr style="background-color: #002747;">
                        <th style="color:black;font-weight:bold;background-color: #002747;"></th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" align="center">N°</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center"> 
                            <?php echo $textoCabecera ?>
                            <input type="hidden" id="ultimaColumna" style="color:black!important" value="<?php echo $ultimaBusqueda ?>"> 
                        </th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">PIA</th>           
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Recaudado</th>
                    </tr>
                </thead>
            <tbody>
                        <?php $n=1; foreach($lista as $r){ ?>
                         <tr style="height:auto">
                             
                          <td>
                              <input type="radio" data-num="<?php echo $n ?>" data-name="<?php echo $r['CAMPO']; ?>" name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">
                          </td>
                             
                          <td class="align-middle text-left content-table"> <?php echo $n; ?> </td>          
                          <td class="align-middle text-left content-table"> <?php echo $r['CAMPO'] ?> </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="pia_<?php echo $n?>" value="<?php echo number_format($r['PIA']); ?>"/>
                              <?php echo number_format($r['PIA']); ?> 
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="pim_<?php echo $n?>" value="<?php echo number_format($r['PIM']); ?>"/>
                              <?php echo number_format($r['PIM']); ?> 
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="recaudado_<?php echo $n?>" value="<?php echo number_format($r['RECAUDADO']); ?>"/>
                              <?php echo number_format($r['RECAUDADO']); ?> 
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
    $total = count($_SESSION['filtro_ingreso']);
    $lista = $_SESSION['filtro_ingreso'];
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
    $lista = $_SESSION['filtro_ingreso'];
    
    foreach($lista as $row){
        if( $row[4]!=$filtro ){
            $lista2[]=$row;
        }
        else{
            $coincidencia = $row;
        }
    }
    
    $_SESSION['filtro_ingreso'] = $lista2;
    
    return $coincidencia;
}

    
function limpiarFiltros(){

    if(isset($_SESSION['filtro_ingreso'])){
        
        $listaFiltros = $_SESSION['filtro_ingreso'];
        
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

