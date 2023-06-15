<?php

require_once '../model/loginModel.php';
require_once '../model/consultaModel.php';
require_once '../model/keyValue.php';

if(!isset($_SESSION))session_start();

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

else if ( isset($_POST['resultado_proyecto']) ){
    
    $anio = $_POST['anio'];
    $dpto = $_POST['dpto'];
    $prov = $_POST['prov'];
    $mun = $_POST['mun'];

    $model=new consultaModel();
    
    $lista = $model->proyectosPriorizados($anio, $dpto, $prov, $mun);
  
    if($lista==null){
        ?>
            
        <div class="col-md-12" style="margin-top:200px!important">                                                                
            <div class="alert alert-danger" role="alert" style="background:#F76744!important;color:white!important;font-size:18px!important">
                No se encontraron resultados
            </div>
        </div> 
        
        <?php
    }
    else{
        ?>
        
        <div class="table-responsive table-responsive-data2" style="margin-top:40px">
        <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
            <thead>
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
                          <td class="align-middle text-right"> <?php echo $r['AVANCE'] ?> </td> 
                    </tr> 
                    <?php $n++; } ?>
                </tbody>

            </table>
        </div>

        <script>
            
            $(document).ready(function() {
                $('#tablaDatos').DataTable( {
                    lengthChange: false,
                    dom: 'Bfrtip',
                    buttons: [ {extend: 'excel',text: 'Descargar Excel',className: 'btn-success botonExcelDescarga'} ]
                } );
            } );
            
        </script>
        
        <?php
    }
    
    ?>
        <script> $("#divBloque1").hide(); $("#divBloque2").hide(); $("#divBloque3").hide(); </script>
    <?php    
}

else if ( isset($_POST['limpiar_muni']) ){
    
    ?>
      <option value="-1">TODOS</option>  
    <?php    
}

else if ( isset($_POST['resultado']) ){
 
    $ultimaBusqueda="";
    $valorUltimo="";
    
    $anio = $_POST['anio'];
    $dpto = $_POST['dpto'];
    $prov = $_POST['prov'];
    $mun = $_POST['mun']; 
    $muniFiltrada = $_POST['muniFiltrada'];
    
    ?>
    
        <script> $("#divBloque1").show(); $("#divBloque2").show(); $("#divBloque3").show(); </script>
    
    <?php
    
    $regreso = $_POST['regreso'];
    
    /* key value */
    $listaKey=array();
    if($anio!=="-1"){
        $key=new keyValue();
        $key->setKey("AÑO");
        $key->setValue($anio);
        $listaKey[]=$key;
    }
    if($dpto!=="-1"){
        $key=new keyValue();
        $key->setKey("DEPARTAMENTO");
        $key->setValue($_POST['dpto']);
        $listaKey[]=$key;
    }
    if($prov!=="-1"){
        $key=new keyValue();
        $key->setKey("PROVINCIA");
        $key->setValue($prov);
        $listaKey[]=$key;
    }
    if($mun!=="-1"){
        $key=new keyValue();
        $key->setKey("MUNICIPALIDAD");
        $key->setValue($_POST['mun']);
        $listaKey[]=$key;
    }
    /* ********* */
    
    /* agrupaciones */
    $campoActual=''; if(isset($_POST['campoActual'])){ $campoActual=$_POST['campoActual']; }
    $ultimoBusqueda=''; if(isset($_POST['ultimoBusqueda'])){ $ultimoBusqueda=$_POST['ultimoBusqueda']; }
    $where=''; if(isset($_POST['where'])){ $where=$_POST['where']; }
    $grupoFuncion='0'; if(isset($_POST['grupoFuncion'])){ $grupoFuncion=$_POST['grupoFuncion']; }
    $grupoCategoria='0'; if(isset($_POST['grupoCategoria'])){ $grupoCategoria=$_POST['grupoCategoria']; }
    $grupoProyecto='0'; if(isset($_POST['grupoProyecto'])){ $grupoProyecto=$_POST['grupoProyecto']; }
    $grupoDivisionFuncional='0'; if(isset($_POST['grupoDivisionFuncional'])){ $grupoDivisionFuncional=$_POST['grupoDivisionFuncional']; }
    $grupoCategoriaFuncional='0'; if(isset($_POST['grupoCategoriaFuncional'])){ $grupoCategoriaFuncional=$_POST['grupoCategoriaFuncional']; }
    $grupoFuente='0'; if(isset($_POST['grupoFuente'])){ $grupoFuente=$_POST['grupoFuente']; }
    $grupoRubro='0'; if(isset($_POST['grupoRubro'])){ $grupoRubro=$_POST['grupoRubro']; }
    $grupoTipoRecurso='0'; if(isset($_POST['grupoTipoRecurso'])){ $grupoTipoRecurso=$_POST['grupoTipoRecurso']; }
    $grupoGenerica='0'; if(isset($_POST['grupoGenerica'])){ $grupoGenerica=$_POST['grupoGenerica']; }
    $grupoSubgenerica='0'; if(isset($_POST['grupoSubgenerica'])){ $grupoSubgenerica=$_POST['grupoSubgenerica']; }
    $grupoDetaleSubgenerica='0'; if(isset($_POST['grupoDetaleSubgenerica'])){ $grupoDetaleSubgenerica=$_POST['grupoDetaleSubgenerica']; }
    $grupoEspecifica='0'; if(isset($_POST['grupoEspecifica'])){ $grupoEspecifica=$_POST['grupoEspecifica']; }
    $grupoDetalleEspecifica='0'; if(isset($_POST['grupoDetalleEspecifica'])){ $grupoDetalleEspecifica=$_POST['grupoDetalleEspecifica']; }
    /* ************ */
    
    if($ultimoBusqueda!=="MUNICIPALIDAD" && $ultimoBusqueda!=="DEPARTAMENTO" && $ultimoBusqueda!=="PROVINCIA"
       && $ultimoBusqueda!=="ANIO" && $ultimoBusqueda!==""){
        
        $key=new keyValue();
        $key->setKey( cambiarNombreFiltro($ultimoBusqueda) );
        $key->setValue($where);
        
        $listado = array();
        if(isset($_SESSION['lista_key'])){
            $listado = $_SESSION['lista_key'];
        }
        
        $p = validarExiste($listado,$key);
        if($p==0){
            $listado[]=$key;
        }
        
        $_SESSION['lista_key']=$listado;
    }
    
    if($regreso=="1"){ /* borrar ultimo elemento de lista_key */
        if(isset($_SESSION['lista_key'])){
            if($_SESSION['lista_key']!=null){
                
                $listadoTemp=array();
                $tamanio = count($_SESSION['lista_key']);
                $c=1;
                foreach($_SESSION['lista_key'] as $r){
                    if($c<$tamanio){
                        $listadoTemp[]=$r;
                    }
                    $c++;
                }
                
                $_SESSION['lista_key']=$listadoTemp;
            }
        }
    }
    
    if($grupoFuncion==='1'){ ?> <script> $("#btnFuncion").prop('disabled', true); </script> <?php }
    if($grupoCategoria==='1'){ ?> <script> $("#btnCategoriaPre").prop('disabled', true); </script> <?php }
    if($grupoProyecto==='1'){ ?> <script> $("#btnProyecto").prop('disabled', true); </script> <?php }
    if($grupoDivisionFuncional==='1'){ ?> <script> $("#btnDivisionFuncional").prop('disabled', true); </script> <?php }
    if($grupoCategoriaFuncional==='1'){ ?> <script> $("#btnGrupoFuncional").prop('disabled', true); </script> <?php }
    if($grupoFuente==='1'){ ?> <script> $("#btnFuente").prop('disabled', true); </script> <?php }
    if($grupoRubro==='1'){ ?> <script> $("#btnRubro").prop('disabled', true); </script> <?php }
    if($grupoTipoRecurso==='1'){ ?> <script> $("#btnTipoRecurso").prop('disabled', true); </script> <?php }
    if($grupoGenerica==='1'){ ?> <script> $("#btnGenerica").prop('disabled', true); </script> <?php }
    if($grupoSubgenerica==='1'){ ?> <script> $("#btnSubgenerica").prop('disabled', true); </script> <?php }
    if($grupoDetaleSubgenerica==='1'){ ?> <script> $("#btnDetalleSubgenerica").prop('disabled', true); </script> <?php }
    if($grupoEspecifica==='1'){ ?> <script> $("#btnEspecifica").prop('disabled', true); </script> <?php }
    if($grupoDetalleEspecifica==='1'){ ?> <script> $("#btnDetalleEspecifica").prop('disabled', true); </script> <?php }
    
    /* filtros previos */
    $previaFuncion = $_POST['previaFuncion'];    
    $previaCategoriaPresupuestal = $_POST['previaCategoriaPresupuestal'];
    $previaProyecto = $_POST['previaProyecto'];
    $previaFuente = $_POST['previaFuente'];
    $previaDivisionFuncional = $_POST['previaDivisionFuncional'];
    $previaGrupoFuncional = $_POST['previaGrupoFuncional'];
    $previaRubro = $_POST['previaRubro'];
    $previaTipoRecurso = $_POST['previaTipoRecurso'];
    $previaGenerica = $_POST['previaGenerica'];
    $previaSubgenerica = $_POST['previaSubgenerica'];
    $previaDetalleSubgenerica = $_POST['previaDetalleSubgenerica'];
    $previaEspecifica = $_POST['previaEspecifica'];
    $previaDetalleEspecifica = $_POST['previaDetalleEspecifica'];
    /* ************** */
    
    if($ultimoBusqueda==='FUNCION'){ ?> <script> $("#previaTipo").val("FUNCION"); </script>  <script> $("#previaFuncion").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='CATEGORIA_PRESUPUESTAL'){ ?> <script> $("#previaTipo").val("CATEGORIA_PRESUPUESTAL"); </script> <script> $("#previaCategoriaPresupuestal").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='PROYECTO'){ ?>  <script> $("#previaTipo").val("PROYECTO"); </script>  <script> $("#previaProyecto").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='DIVISION_FUNCIONAL'){ ?> <script> $("#previaTipo").val("DIVISION_FUNCIONAL"); </script> <script> $("#previaDivisionFuncional").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='GRUPO_FUNCIONAL'){ ?> <script> $("#previaTipo").val("GRUPO_FUNCIONAL"); </script> <script> $("#previaGrupoFuncional").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='FUENTE'){ ?> <script> $("#previaTipo").val("FUENTE"); </script> <script> $("#previaFuente").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='RUBRO'){ ?> <script> $("#previaTipo").val("RUBRO"); </script> <script> $("#previaRubro").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='TIPO_RECURSO'){ ?> <script> $("#previaTipo").val("TIPO_RECURSO"); </script> <script> $("#previaTipoRecurso").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='GENERICA'){ ?> <script> $("#previaTipo").val("GENERICA"); </script> <script> $("#previaGenerica").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='SUBGENERICA'){ ?> <script> $("#previaTipo").val("SUBGENERICA"); </script> <script> $("#previaSubgenerica").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='DETALLE_SUBGENERICA'){ ?> <script> $("#previaTipo").val("DETALLE_SUBGENERICA"); </script> <script> $("#previaDetalleSubgenerica").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='ESPECIFICA'){ ?> <script> $("#previaTipo").val("ESPECIFICA"); </script> <script> $("#previaEspecifica").val("<?php echo $where ?>"); </script> <?php }
    if($ultimoBusqueda==='DETALLE_ESPECIFICA'){ ?> <script> $("#previaTipo").val("DETALLE_ESPECIFICA"); </script> <script> $("#previaDetalleEspecifica").val("<?php echo $where ?>"); </script> <?php }
    
    /* ultima busqueda */
    if($anio!==''){
        
        /* ultimo cambio 
        $ultimaBusqueda="ANIO";
        $textoCabecera="AÑO";
        */
        $ultimaBusqueda="MUNICIPALIDAD";
        $textoCabecera="MUNICIPALIDAD";
    }
    /*
    if($dpto!=='-1'){
        $ultimaBusqueda="DEPARTAMENTO";
        $textoCabecera="DEPARTAMENTO";
    }
    */
    if($dpto!=='-1'){
        $ultimaBusqueda="MUNICIPALIDAD";
        $textoCabecera="MUNICIPALIDAD";
    }
   
    if($prov!=='-1'){
        $ultimaBusqueda="MUNICIPALIDAD";
        $textoCabecera="MUNICIPALIDAD";
    }
    if($mun!=='-1'){
        $ultimaBusqueda="MUNICIPALIDAD";
        $textoCabecera="MUNICIPALIDAD";
    }
    if($campoActual!==''){
        
        $ultimaBusqueda = $campoActual;
        $textoCabecera = $campoActual;
        
        if($campoActual=='CATEGORIA_PRESUPUESTAL'){
            $textoCabecera="CATEGORÍA PRESUPUESTAL";
        }
        else if($campoActual=='DIVISION_FUNCIONAL'){
            $textoCabecera="DIVISIÓN FUNCIONAL";
        }
        else if($campoActual=='CATEGORIA_FUNCIONAL'){
            $textoCabecera="CATEGORÍA FUNCIONAL";
        }
        else if($campoActual=='GRUPO_FUNCIONAL'){
            $textoCabecera="GRUPO FUNCIONAL";
        }
        else if($campoActual=='TIPO_RECURSO'){
            $textoCabecera="TIPO RECURSO";
        }
        else if($campoActual=='DETALLE_SUBGENERICA'){
            $textoCabecera="DETALLE SUBGENÉRICA";
        }
        else if($campoActual=='GENERICA'){
            $textoCabecera="GENÉRICA";
        }
        else if($campoActual=='SUBGENERICA'){
            $textoCabecera="SUBGENÉRICA";
        }
        else if($campoActual=='ESPECIFICA'){
            $textoCabecera="ESPECÍFICA";
        }
        else if($campoActual=='DETALLE_ESPECIFICA'){
            $textoCabecera="DETALLE ESPECÍFICA";
        }
    }
    /* */
    
    $model=new consultaModel();
    $arreglo = $model->verDatos($anio,$dpto,$prov,$mun,$campoActual,$ultimoBusqueda,$where,$grupoFuncion,$grupoCategoria,
                              $grupoProyecto,$grupoDivisionFuncional,$grupoCategoriaFuncional,$grupoFuente,$grupoRubro,$grupoTipoRecurso,
                              $grupoGenerica,$grupoSubgenerica,$grupoDetaleSubgenerica,$grupoEspecifica,$grupoDetalleEspecifica,
                              $previaFuncion,$previaCategoriaPresupuestal,$previaProyecto,$previaDivisionFuncional,$previaGrupoFuncional,
                              $previaFuente,$previaRubro,$previaTipoRecurso,$previaGenerica,$previaSubgenerica,
                              $previaDetalleSubgenerica,$previaEspecifica,$previaDetalleEspecifica,$muniFiltrada);
    
    $lista = $arreglo[0];
    $query = $arreglo[1];
    
    
    if($lista!=null){
    
        /* hallar totales */
        $totalPia=0;
        $totalPim=0;
        $totalCertificacion=0;
        $totalCompromiso=0;
        $totalAtencion=0;
        $totalDevengado=0;
        $totalGirado=0;

        foreach($lista as $r){
            $totalPia+=$r['PIA'];
            $totalPim+=$r['PIM'];
            $totalCertificacion+=$r['CERTIFICACION'];
            $totalCompromiso+=$r['COMPROMISO'];
            $totalAtencion+=$r['ATENCION'];
            $totalDevengado+=$r['DEVENGADO'];
            $totalGirado+=$r['GIRADO'];
        }
     
?>
    
        <?php foreach($listaKey as $k){ ?>
            <?php 
                echo $k->key." : ".$k->value." <br>";
            ?>
        <?php } ?>
        
        <?php if(isset($_SESSION['lista_key'])){
                foreach($_SESSION['lista_key'] as $kk){
                    if($kk!=null && $kk->value!=""){
                        echo $kk->key." : ".$kk->value." <br>";
                    }    
                }
        } ?>      
    
    <!--
    <div class="wrapper1">
        <div class="div1">
        </div>
    </div>
    <div class="wrapper2">
    <div id="div2">
    -->
        <div class="table-responsive table-responsive-data2">
            <table id="tablaDatos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                    <tr style="background:white!important;border:none!important">
                        <th colspan="3"> <label style="color:black!important"> TOTALES </label> </th>
                        
                        <th> <label style="color:black!important" id="total_PIA"><?php echo number_format($totalPia); ?></label> </th>
                        <th> <label style="color:black!important" id="total_PIM"><?php echo number_format($totalPim); ?></label> </th>
                        <th> </th>
                        <th> <label style="color:black!important" id="total_Certificacion"><?php echo number_format($totalCertificacion); ?></label> </th>
                        <th> <label style="color:black!important" id="total_Compromiso"><?php echo number_format($totalCompromiso); ?></label> </th>
                        <th> <label style="color:black!important" id="total_Atencion"><?php echo number_format($totalAtencion); ?></label> </th>
                        <th> <label style="color:black!important" id="total_Devengado"><?php echo number_format($totalDevengado); ?></label> </th>
                        <th> <label style="color:black!important" id="total_Girado"><?php echo number_format($totalGirado); ?></label> </th>
                        <th> </th>
                    </tr>
                    <tr style="background-color: #002747;">
                        <th style="color:black;font-weight:bold"></th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" align="center">N°</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center"> 
                            <?php echo $textoCabecera ?>
                            <input type="hidden" id="ultimaColumna" style="color:black!important" value="<?php echo $ultimaBusqueda ?>"> 
                        </th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">PIA</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">PIM</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center"> </th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Certificación</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Compromiso Anual</th>           
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Atención de compromiso anual</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Devengado</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Girado</th>
                        <th style="font-weight:bold;color:white;font-size: 16px!important;vertical-align: middle!important" class="text-center">Avance de Ejecución %</th>
                    </tr>
                </thead>
            <tbody>
                        <?php $n=1; foreach($lista as $r){ ?>
                                <tr style="height:auto">
                                    <td><input type="radio" data-name="<?php echo $r['CAMPO']; ?>" name="radioGrupo" value="<?php echo $r['CAMPO']; ?>">

                                    </td>
                          <td class="align-middle text-left"> <?php echo $n; ?> </td>          
                          <td class="align-middle text-left"> <?php echo $r['CAMPO'] ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['PIA']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['PIM']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format( ($r['PIM']*100/$totalPim) ,2 )."%"; ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['CERTIFICACION']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['COMPROMISO']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['ATENCION']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['DEVENGADO']); ?> </td>
                          <td class="align-middle text-right"> <?php echo number_format($r['GIRADO']); ?> </td>
                          <td class="align-middle text-right"> <?php echo $r['AVANCE'] ?> </td> 
                                </tr> 
                        <?php $n++; } ?>
                </tbody>
            </table>
        </div>
    
    <!--
    </div>
    </div>
    -->                                                
        
    <script>
        $(document).ready(function() {
            $('#tablaDatos').DataTable( {
                lengthChange: false,
                dom: 'fBrtip',
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

    <div class="col-md-12" style="margin-top:200px!important">                                                                
        <div class="alert alert-danger" role="alert" style="background:#F76744!important;color:white!important;font-size:18px!important">
            No se encontraron resultados
        </div>
    </div>    

    <?php } ?>
        
<?php    

}

else if( isset($_POST['limpiar']) ){
    unset($_SESSION['lista_key']);
}

else if( isset($_POST['resumen_municipalidad']) ){
    
    $anio = $_POST['anio'];
    $contador=0;
    
    $model=new consultaModel();
    
    $lista = $model->resumenMunicipalidad($anio);
    
    if($lista!=null){
    
        foreach($lista as $r){
         $contador=$contador+1
    ?>
            <div class="col-md-3">
                <div class="row">
                    <a  href="resumen.php?pre=<?php echo $r['PRESUPUESTO'] ?>&anio=<?php echo $anio ?>&muni=<?php echo $r['MUNICIPALIDAD'] ?>" target="_blank">
                        <div class="col-md-12">
                          <div class="thumbnail" style="height:440px!important;background-image: url('../images/Fondo_Card<?php echo $contador?>.jpg');opacity: 0.8;">
                            <div class="caption text-center">
                              <div class="position-relative">
                                <img src="../dom/img/icono-municipalidad.svg" style="width:72px;height:72px;" />
                              </div>
                              <h4 style="color:white;font-weight: bold;font-family:'Zilla Slab',Georgia,'Times New Roman',serif" id="thumbnail-label"><?php echo $r['MUNICIPALIDAD']; ?></h4>
                             </div>
                              <div class="caption text-left" style="color:white;font-weight: bold"> 
                                  <h4><i class="glyphicon glyphicon-file light-red lighter bigger-120"></i>&nbsp;Presupuesto: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($r['PRESUPUESTO']); ?> </h4>
                                  <h4><i class="glyphicon glyphicon glyphicon-list-alt light-red lighter bigger-120"></i>&nbsp;Ejecución: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($r['EJECUCION']); ?></h4>
                            </div>
                            <div class="caption card-footer text-center" style="color:white;font-weight: bold">
                              <ul class="list-inline"> 
                                  <h4> <i class="glyphicon glyphicon-signal light-red lighter bigger-120"></i>&nbsp; Avance: </h4>
                                <li></li>
                                <h2> <?php echo $r['AVANCE']." %"; ?></h2>                               
                                <div class="progress">
                                    <div class="progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $r['AVANCE'] ?>%; background: #D1C01B !important">
                                    </div>
                                </div>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </a>     
                </div>
            </div>
                  
                                                                    
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
        <script>$("#labelDepartamento").html('<?php echo "DEPARTAMENTO: <br>".$datosMuni['DEPARTAMENTO']; ?>');</script>
        <script>$("#labelProvincia").html('<?php echo "PROVINCIA: <br>".$datosMuni['PROVINCIA']; ?>');</script>
        <script>$("#labelDistrito").html('<?php echo "DISTRITO: <br>".$datosMuni['DISTRITO']; ?>');</script>
        <?php
    }
    
    /* indicadores */
    $datosAvance = $model->presupuestoEjecucionAvance($anio, $muni);
    if($datosAvance!=null){
        ?>
        
        <script>$("#labelPresupuesto").html('<?php echo "S/ ".number_format($datosAvance['PRESUPUESTO']); ?>');</script>
        <script>$("#labelEjecucion").html('<?php echo "S/ ".number_format($datosAvance['EJECUCION']); ?>');</script>
        <script>$("#labelAvance").html('<?php echo "Avance Financiero: ".number_format($datosAvance['AVANCE'],2)."%"; ?>');</script>
        
        <?php 
    }
    
    $mayorProyecto = $model->resumenMuniDetalleTop($anio, $muni,"PROYECTO");
   
    if($mayorProyecto!=null){
        $mayorProyecto = $mayorProyecto[0];
        $porMayorPro = number_format( ($mayorProyecto['PRESUPUESTO']*100/$pre), 2)
        ?>
        
        <script>$("#labelInversionPIM").html('<?php echo "<u>Nombre de la Inversión con más PIM:</u> <br> S/".number_format($mayorProyecto['PRESUPUESTO'])." ($porMayorPro% del total) <br>".$mayorProyecto['PROYECTO']." <br>"; ?>');</script>
        
        <?php 
    }
    
    $funcionesLista = $model->resumenMuniTopFuncion($anio, $muni,$datosAvance['PRESUPUESTO']);
    
    if($funcionesLista!=null){
        $cadena = "";
        foreach($funcionesLista as $r){
            
            $arregloPro = $model->proyectosPorMuniFuncionAnio($anio, $muni, $r['FUNCION']);
            $arregloProCantidad = count($arregloPro);
            $cadenaEvaluar = "proyectos";
            if($arregloProCantidad==1){
                $cadenaEvaluar = "proyecto";
            }
            
            $cadena.= "(".number_format( $r['PRESUPUESTO'], 0)."%)  ".$r['FUNCION']." ( $arregloProCantidad $cadenaEvaluar ) <br>";
        }
        ?>
        <script>$("#presupuestoFuncion").html('<?php echo $cadena; ?>');</script>
        <?php
    }
    
    /* listas */
    $listaCategoria = $model->resumenMuniDetalle($anio, $muni,"CATEGORIA_PRESUPUESTAL");
    $listaRubro = $model->resumenMuniDetalle($anio, $muni,"RUBRO");
    
    if($listaRubro!=null){
        $cadena = "";
        foreach($listaRubro as $r){
            $cadena.= "(".number_format( ($r['PRESUPUESTO']*100/$pre), 0)."%)  ".$r['RUBRO']." <br>";
        }
        ?>
        <script>$("#labelRubros").html('<?php echo $cadena; ?>');</script>
        <?php
    }
    
    $listaFuncion = $model->resumenMuniDetalle($anio, $muni,"FUNCION");
    $listaProyecto = $model->resumenMuniDetalle($anio, $muni,"PROYECTO");
    
    $info = calcularNumeroProyectoSupera($listaProyecto,$datosMuni['MONTO']);
   
    $numProyectoSupera = $info[0];
    $presupuestoProyectoSupera = $info[1];
    $presupuestoProyectoSupera = $presupuestoProyectoSupera*100/$pre;
    
    if($listaProyecto!=null){
        ?>
                <script>$("#labelTotalProyecto").html('<?php echo count($listaProyecto)." Total de Proyectos <br>" ?>');</script>
                <?php if($datosMuni['IDMUNICIPALIDAD']!=19){ ?>
                    <script>$("#labelTotalProyecto").html('<?php echo count($listaProyecto)." Total de Proyectos <br>".$numProyectoSupera." proyecto(s) >= S/ ".($datosMuni['MONTO']/1000)." mil"." (".number_format($presupuestoProyectoSupera,2)."% del total)" ; ?>');</script>
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
        
        <script>$("#labelotros").html('<?php echo "Cumplimiento de certificación: ".number_format($cumplimientoCertificacion,2)."%"."<br>"."Cumplimiento de contrato: ".number_format($cumplimientoContrato,2)."%"."<br>"."Cumplimiento de girado: ".number_format($cumplimientoGirado,2)."%"."<br>"; ?>');</script>
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
        
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                  <div class="thumbnail" style="cursor:default;font-family:tahoma!important;background-image: url('../images/Fondo_Card<?php echo $contador?>.jpg');">
                    <div class="caption text-center" style="height: 140px!important">
                            <h5 id="thumbnail-label" style="text-align: justify!important;color:white!important"><?php echo $r[$campoBD]; ?></h5>
                     </div>
                     <div class="caption text-left" style="font-size:14px!important"> 
                      <p style="color:white!important"><i class="glyphicon glyphicon-file light-red lighter bigger-120"></i>
                          &nbsp;Presupuesto: &nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($r['PRESUPUESTO'],0)." ($p %)"; ?> 
                      </p>
                      <p style="color:white!important"><i class="glyphicon glyphicon glyphicon-list-alt light-red lighter bigger-120"></i>&nbsp;&nbsp;Ejecución: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($r['EJECUCION'],0); ?></p>
                    </div>
                    <div class="caption card-footer text-center">
                      <ul class="list-inline" style="color:white!important;font-size:22px!important"> 
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


function validarExiste($listado,$key){
    
    $p=0;
    
    foreach($listado as $r){
        if($r->key == $key->key){
            $p=1;
        }
    }
    
    return $p;
    
}


function cambiarNombreFiltro($busqueda){
    if($busqueda=="FUNCION"){
        return "FUNCIÓN";
    }
    else if($busqueda=="PROYECTO"){
        return "PROYECTO";
    }
    else if($busqueda=="FUENTE"){
        return "FUENTE";
    }
    else if($busqueda=="RUBRO"){
        return "RUBRO";
    }
    else if($busqueda=="CATEGORIA_PRESUPUESTAL"){
        return "CATEGORÍA PRESUPUESTAL";
    }
    else if($busqueda=="DIVISION_FUNCIONAL"){
        return "DIVISIÓN FUNCIONAL";
    }
    else if($busqueda=="GRUPO_FUNCIONAL"){
        return "GRUPO FUNCIONAL";
    }
    else if($busqueda=="TIPO_RECURSO"){
        return "TIPO DE RECURSO";
    }
    else if($busqueda=="GENERICA"){
        return "GENÉRICA";
    }
    else if($busqueda=="SUBGENERICA"){
        return "SUBGENÉRICA";
    }
    else if($busqueda=="DETALLE_SUBGENERICA"){
        return "DETALLE SUBGENÉRICA";
    }
    else if($busqueda=="ESPECIFICA"){
        return "ESPECÍFICA";
    }
    else if($busqueda=="DETALLE_ESPECIFICA"){
        return "DETALLE ESPECÍFICA";
    }
    else{
        return "";
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