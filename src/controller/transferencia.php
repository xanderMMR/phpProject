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
header('Content-Disposition: attachment; filename=base-datos-transferencia-'.$fechaHora.'.xls');

$model = new transferenciaModel();

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
                <th>Recurso</th>
                <th>Mes</th>
                <th>Acreditado</th>
                <th>Autorizado</th>
            </tr>
            <?php foreach($datos as $r){ ?>
            <tr>
                    <td> <?php echo $r['ANIO']; ?> </td>
                    <td> <?php echo $r['DEPARTAMENTO']; ?> </td>
                    <td> <?php echo $r['PROVINCIA']; ?> </td>
                    <td> <?php echo $r['MUNICIPALIDAD']; ?> </td>
                    <td> <?php echo $r['FUENTE']; ?> </td>
                    <td> <?php echo $r['RUBRO']; ?> </td>
                    <td> <?php echo $r['RECURSO']; ?> </td>
                    <td> <?php echo $r['MES']; ?> </td>
                    <td> <?php echo $r['ACREDITADO']; ?> </td>
                    <td> <?php echo $r['AUTORIZADO']; ?> </td>
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
    
    if(isset($_SESSION['query_transferencia_muni'])){
        unset($_SESSION['query_transferencia_muni']);
    }
    
    if(isset($_SESSION['filtro_transferencia'])){

        foreach($_SESSION['filtro_transferencia'] as $row){
            ?>
                <script>document.getElementById("<?php echo $row[2] ?>").disabled=false;</script>
                <script>document.getElementById("<?php echo $row[3] ?>").style.display='none';</script>
            <?php
        }
        unset($_SESSION['filtro_transferencia']);
    }
}

else if ( isset($_POST['resultado']) ){
    
    $anio = $_POST['anio'];
    limpiarFiltros();
    
    /* get mes actual */
    /*$cModelMes = new consultaModel();
    $datosMesActual=$cModelMes->getMesActual('tb_transferencia',$anio);
    $mesActualFiltro=$datosMesActual['MES'];
    */
    $mesActualFiltro="";
    
    /* totales previos */
    $arrayTotales = array();
    if(isset($_POST['t_autorizado'])){
        $arrayTotales = array($_POST['t_autorizado'],
                              $_POST['t_acreditado']
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
    
    $transferenciaModel = new transferenciaModel();
    
    $resultadoT = $transferenciaModel->getTotales($anio,$dpto,$prov,$muni);
    
    if($resultadoT!=null){
        $resultadoT = $resultadoT[0];
    }
    
    $listaKey=array();
    
    if($anio!=="-1"){
        $key=new keyValue();
        $key->setKey("AÑO");
        $key->setValue($anio);
        
        $key->setAtributoA($resultadoT[0]['AUTORIZADO']);
        $key->setAtributoB($resultadoT[0]['ACREDITADO']);
        
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        
        $key->setAtributoA($resultadoT[1]['AUTORIZADO']);
        $key->setAtributoB($resultadoT[1]['ACREDITADO']);
        
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        
        $key->setAtributoA($resultadoT[2]['AUTORIZADO']);
        $key->setAtributoB($resultadoT[2]['ACREDITADO']);
        
        $listaKey[]=$key;
    }
    if($muni!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        
        $key->setAtributoA($resultadoT[3]['AUTORIZADO']);
        $key->setAtributoB($resultadoT[3]['ACREDITADO']);
        
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
            if($cabecera=="RECURSO"){ $tipoVista="3"; }
            if($cabecera=="MES"){ $tipoVista="4"; }
        }
        else{
            /* limpiar busqueda por muni */
            if(isset($_SESSION['query_transferencia_muni'])){
                unset($_SESSION['query_transferencia_muni']);
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
            $textoCabecera="RECURSO";
            $ultimaBusqueda="RECURSO";
            $boton="btnRecurso";
            $label="lbRecurso";
        }
        else if($tipoVista=="4"){
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
            
            $_SESSION['query_transferencia_muni'] = " AND MUNICIPALIDAD='".$radioSel."'";
        }
        
        $listaFiltros = array();
        if(isset($_SESSION['filtro_transferencia'])){
            $listaFiltros = $_SESSION['filtro_transferencia'];
        }
        $listaFiltros[] = array($cabecera,$radioSel,$boton,$label,$textoCabecera,$arrayTotales,str_replace("_"," ",$cabecera));
        
        $_SESSION['filtro_transferencia']=$listaFiltros;
        
        
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
        
        $listaFiltros = $_SESSION['filtro_transferencia'];
        
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
        unset($_SESSION['filtro_transferencia']);
    }
    
    /* ver si mantiene filtro por muni */
    if(isset($_SESSION['query_transferencia_muni'])){
            $queryExtra .= $_SESSION['query_transferencia_muni'];
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
        $totalAutorizado=0;
        $totalAcreditado=0;

        foreach($lista as $r){
            $totalAutorizado+=$r['AUTORIZADO'];
            $totalAcreditado+=$r['ACREDITADO'];
        }  
        
        
      ?>
      
      <div class="col-md-12">
      <div class="col-md-12">
      
        <div class="col-md-12">&nbsp;</div>    
        <div class="col-md-12">    
          <div class="table-responsive">

          <table border="1" style="width:50%;font-size: 16px;">  
              <tr style="background: #002747!important;color:white!important">
                  <td class="text-center"><b>Variable</b></td>
                  <td class="text-center"><b>Datos Generales</b></td>
                  <td class="text-center"><b>Autorizado</b></td>
                  <td class="text-center"><b>Acreditado</b></td>
              </tr>

              <?php foreach($listaKey as $k){ ?>
              <tr style="background:white;font-size: 14px!important;">
                  <td><b><?php echo $k->key ?></b></td>
                  <td><?php echo $k->value ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoA) ?></td>
                  <td class="text-right"><?php echo number_format($k->atributoB) ?></td>
              </tr>    
              <?php } ?>

              <?php if(isset($_SESSION['filtro_transferencia'])){
                      foreach($_SESSION['filtro_transferencia'] as $fila){

                          if($fila[0]=="MUNICIPALIDAD"){
                              if(!existeKey($listaKey,"MUNICIPALIDAD")){
                                  ?>
                                  <tr style="background:white;font-size: 14px!important;">
                                      <td><b><?php echo $fila[6]; ?></b></td>
                                      <td><?php echo $fila[1]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][0]; ?></td>
                                      <td class="text-right"><?php echo $fila[5][1]; ?></td>
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
                        
                        <th class="text-right"> <label style="color:black!important" id=""><?php echo number_format($totalAutorizado); ?></label> </th>
                        <th class="text-right"> <label style="color:black!important" id=""><?php echo number_format($totalAcreditado); ?></label> </th>
                    </tr>
                    
                    <tr style="background-color: #002747;">
                        <th style="color:black;font-weight:bold;color:white;background-color: #002747;"></th>
                        <th style="color:black;font-weight:bold;color:white;background-color: #002747;">N°</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center"> 
                            <?php echo $textoCabecera ?>
                            <input type="hidden" id="ultimaColumna" style="color:black!important" value="<?php echo $ultimaBusqueda ?>"> 
                        </th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Monto Autorizado</th>           
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important; background-color: #002747;" class="text-center">Monto Acreditado</th>
                    </tr>
                </thead>
            <tbody>
                        <?php $n=1; foreach($lista as $r){ ?>
                         <tr style="height:auto">
                             
                          <td>
                              <input type="radio" data-num="<?php echo $n ?>" data-name="<?php echo $r['CAMPO']; ?>" name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">
                          </td>
                          <td class="align-middle text-left content-table"> <?php echo $n ?> </td>
                          <td class="align-middle text-left content-table"> <?php echo $r['CAMPO'] ?> </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="autorizado_<?php echo $n?>" value="<?php echo number_format($r['AUTORIZADO']); ?>"/>
                              <?php echo number_format($r['AUTORIZADO']); ?> 
                          </td>
                          <td class="align-middle text-right content-table"> 
                              <input type="hidden" id="acreditado_<?php echo $n?>" value="<?php echo number_format($r['ACREDITADO']); ?>"/>
                              <?php echo number_format($r['ACREDITADO']); ?> 
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
    $total = count($_SESSION['filtro_transferencia']);
    $lista = $_SESSION['filtro_transferencia'];
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
    $lista = $_SESSION['filtro_transferencia'];
    
    foreach($lista as $row){
        if( $row[4]!=$filtro ){
            $lista2[]=$row;
        }
        else{
            $coincidencia = $row;
        }
    }
    
    $_SESSION['filtro_transferencia'] = $lista2;
    
    return $coincidencia;
}

    
function limpiarFiltros(){

    if(isset($_SESSION['filtro_transferencia'])){
        
        $listaFiltros = $_SESSION['filtro_transferencia'];
        
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

