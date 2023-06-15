<?php 
if(!isset($_SESSION))session_start();
if(!isset($_SESSION['acceso_usuario'])){ header("location: acceso.php"); }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejecución del gasto</title>
        <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
        
        <!-- Agregado de Template -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/animate.css">
    
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="../css/flaticon.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
        
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <!-- FIN DATA TABLE-->
        
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        
        
        
        
        
        <script type="text/javascript" src="../dom/js/js1.10.js"></script>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
        
        <style>
            
            body{
                background:#eeeeee;      
            }
            
            #panelPrincipal{
                width: 90%!important;
                margin: 0 auto;
            }
            
            .panelTitulo{
                background: white!important;
            }
            
            .tituloCentral{
                margin-top: 20px;
                margin-bottom: 20px;
                font-size: 22px;
            }
            
            .controlFiltro{
                background: #FDFDFD;
            }
            
            .nombreFiltro{
                font-weight: bold;
                color:black;
                font-size: 18px;
            }
            
            select{
                height: 30px!important;
                font-size: 10px!important;
            }
            
            .panelHeading{
                font-size: 11px !important;
                font-weight: normal;
            }
            
            
            .botonFiltrado{
                font-size: 10px;
                font-weight: bold;
                color:black;
                border-radius: 10px !important;
                background: #1DB2EC !important;
                border-color: #1DB2EC !important;
            }
            
            .botonFiltro{
                font-size: 10px;
                font-weight: bold;
                color:black;
                width:140px !important;
                margin-right: 12px !important;
                border-radius: 10px !important;
                background: #1DB2EC !important;
                border-color: #1DB2EC !important;
            }
            
            .botonVer{
                font-size: 11px;
            }
            
            .tablaResultado{
                font-size:10px !important;
            }
            
            .cabeceraTabla{
                font-size:12px !important;
            } 
            
            table { 
                border-style: solid; 
                border-top-width: 1px; 
                border-right-width: 1px; 
                border-bottom-width: 1px; 
                border-left-width: 1px
            }
            
            table>thead>tr>th{
                 border-bottom: 1px solid black !important;
            }
            
            table>thead>tr>th{
                 border-bottom: 1px solid black !important;
                 border-top: 1px solid black !important;
            }
            
            table > tbody > tr > td {
               vertical-align: middle;
            }
            
            .borrarFiltro{
                font-size: 11px;
                text-decoration: underline;
                cursor: pointer;
            }
            
            .botonExcel{
                font-size: 11px;
            }
            
            .botonSalir{
                font-size: 11px !important;
                width:100px !important;
            }
            
            .watermark {
                opacity: 0.8; 
                color: #00407d;
                z-index: 1000000;
              }
            
              .botonExcelDescarga{
                  height: 48px !important;
              }  
              
              .wrapper1, .wrapper2{width: 100%; overflow-x: scroll; overflow-y:hidden;}
              .wrapper1{height: 20px;margin-bottom: 20px; }
              .wrapper2{height: auto; }
              .div1 {width:160%; height: 20px; }
              .div2 {width:200%; overflow: auto;}
              
        </style>
        
        <style>
            
             .thumbnail {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
                transition: 0.3s;
                min-width: 100%;
                border-radius: 5px;
                font-size: 11px;
              }

              .thumbnail-description {
                min-height: 40px;
              }

              .thumbnail:hover {
                cursor: pointer;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 1);
              }
            
        </style>
        
        <script>
             function contar(){
                 var contar=0;
                 
                 if(document.getElementById("tablaDatos")!==null){
                     var divCont = document.getElementById("tablaDatos");
                       var checks  = divCont.getElementsByTagName('input');
                       for(i=0;i<checks.length; i++)
                       {
                           if(checks[i].checked === true){
                           contar++;    
                           }
                       }
                 }
                 
                 if(contar===0){
                     return false;
                 }
                 else{
                     return true;
                 }
             }
            
             function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('tablaDatos');
                var wb = XLSX.utils.table_to_book(elt, { sheet: "Resultados" });
                return dl ?
                  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                  XLSX.writeFile(wb, fn || ('consultas.' + (type || 'xlsx')));
             }
             
             function validarCadena(campo){
                 
                 if( campo==='FUNCION' ) return true;
                 else if( campo==='CATEGORIA_PRESUPUESTAL' ) return true;
                 else if( campo==='PROYECTO' ) return true;
                 else if( campo==='DIVISION_FUNCIONAL' ) return true;
                 else if( campo==='GRUPO_FUNCIONAL' ) return true;
                 else if( campo==='FUENTE' ) return true;
                 else if( campo==='RUBRO' ) return true;
                 else if( campo==='TIPO_RECURSO' ) return true;
                 else if( campo==='GENERICA' ) return true;
                 else if( campo==='SUBGENERICA' ) return true;
                 else if( campo==='DETALLE_SUBGENERICA' ) return true;
                 else if( campo==='ESPECIFICA' ) return true;
                 else if( campo==='DETALLE_ESPECIFICA' ) return true;
                 else return false;
             }
             
             function verDatos(campoActual,grupoFuncion,grupoCategoria,grupoProyecto,grupoDivisionFuncional,grupoCategoriaFuncional,
                               grupoFuente,grupoRubro,grupoTipoRecurso,grupoGenerica,grupoSubgenerica,grupoDetaleSubgenerica,
                               grupoEspecifica,grupoDetalleEspecifica,regreso,previaFun){
        
                var tipoFiltro = $("#controlTipo").val();
        
                if(tipoFiltro==="1"){ /* SOLO PROYECTOS */
                        
                        var radioSel=''; 
                        var ultimaBusqueda="";

                        if(document.getElementById("tablaDatos")!==null){
                            radioSel = $("input[name='radioGrupo']:checked").data('name');
                            if(regreso==="1"){
                                ultimaBusqueda = $("#previaTipo").val();
                                radioSel = previaFun;
                            }
                            else{
                                ultimaBusqueda = $("#ultimaColumna").val();
                                
                                /* si radio seleccionado es una muni */
                                if(ultimaBusqueda==="MUNICIPALIDAD"){
                                    $("#muniFiltrada").val(radioSel);
                                }
                            }

                        }

                        if( regreso==='0' && contar()===false && document.getElementById("tablaDatos")!==null && validarCadena(campoActual) ){
                            alert("Marcar una opción");
                        }
                        else{

                            /* zona resultados */
                            $("#divDatos").load( "../src/controller/consulta.php", 
                              { 
                                 resultado:'1',
                                 anio: $("#controlAnio").val(),
                                 dpto: $("#controlDpto").val(),
                                 prov: $("#controlProv").val(),
                                 mun: $("#controlMuni").val(),
                                 campoActual: campoActual,       /* campo mostrar en la tabla */
                                 ultimoBusqueda: ultimaBusqueda,         /* ultima busqueda */
                                 where: radioSel,  /* radiobutton seleccionado  */
                                 grupoFuncion: grupoFuncion,     /* agrupado por - FUNCION */
                                 grupoCategoria: grupoCategoria,  /* agrupado por - CATEGORIA */
                                 grupoProyecto: grupoProyecto,  /* agrupado por - PROYECTO */
                                 grupoDivisionFuncional: grupoDivisionFuncional,  /* agrupado por - DIVISON FUNCIONAL */
                                 grupoCategoriaFuncional: grupoCategoriaFuncional,  /* agrupado por - CATEGORIA FUNCIONAL */
                                 grupoFuente: grupoFuente,  /* agrupado por - FUENTE */
                                 grupoRubro: grupoRubro,  /* agrupado por - RUBRO */
                                 grupoTipoRecurso: grupoTipoRecurso,  /* agrupado por - TIPO RECURSO */
                                 grupoGenerica: grupoGenerica, /* agrupado por - GENERICA */
                                 grupoSubgenerica: grupoSubgenerica, /* agrupado por - SUBGENERICA */
                                 grupoDetaleSubgenerica: grupoDetaleSubgenerica, /* agrupado por - DETALLE SUBGENERICA */
                                 grupoEspecifica: grupoEspecifica, /* agrupado por - ESPECIFICA */
                                 grupoDetalleEspecifica: grupoDetalleEspecifica, /* agrupado por - DETALLE ESPECIFICA */
                                 previaFuncion: $("#previaFuncion").val(),     /* previo filtro por FUNCION */
                                 previaCategoriaPresupuestal: $("#previaCategoriaPresupuestal").val(),
                                 previaProyecto: $("#previaProyecto").val(),
                                 previaDivisionFuncional: $("#previaDivisionFuncional").val(),
                                 previaGrupoFuncional:  $("#previaGrupoFuncional").val(),
                                 previaFuente: $("#previaFuente").val(),
                                 previaRubro: $("#previaRubro").val(),
                                 previaTipoRecurso: $("#previaTipoRecurso").val(),
                                 previaGenerica: $("#previaGenerica").val(),
                                 previaSubgenerica: $("#previaSubgenerica").val(),
                                 previaDetalleSubgenerica: $("#previaDetalleSubgenerica").val(),
                                 previaEspecifica: $("#previaEspecifica").val(),
                                 previaDetalleEspecifica: $("#previaDetalleEspecifica").val(),
                                 regreso: regreso,
                                 muniFiltrada: $("#muniFiltrada").val()
                              } 
                            );


                            /* zona resumen municipalidad */
                            $("#zonaCard").load( "../src/controller/consulta.php", 
                              {
                                resumen_municipalidad:'1',
                                anio: $("#controlAnio").val()
                              } 
                            );
                            /* *** */

                            ocultarTodosRegresar();

                            if(regreso==="0"){

                                if(campoActual==="FUNCION"){
                                    $("#lbFuncion").show();
                                }
                                if(campoActual==="CATEGORIA_PRESUPUESTAL"){
                                    $("#lbCategoriaPre").show();
                                }
                                if(campoActual==="PROYECTO"){
                                    $("#lbProyecto").show();
                                }
                                if(campoActual==="DIVISION_FUNCIONAL"){
                                    $("#lbDivisionFuncional").show();
                                }
                                if(campoActual==="GRUPO_FUNCIONAL"){
                                    $("#lbGrupoFuncional").show();
                                }
                                if(campoActual==="FUENTE"){
                                    $("#lbFuente").show();
                                }
                                if(campoActual==="RUBRO"){
                                    $("#lbRubro").show();
                                }
                                if(campoActual==="TIPO_RECURSO"){
                                    $("#lbTipoRecurso").show();
                                }
                                if(campoActual==="GENERICA"){
                                    $("#lbGenerica").show();
                                }
                                if(campoActual==="SUBGENERICA"){
                                    $("#lbSubgenerica").show();
                                }
                                if(campoActual==="DETALLE_SUBGENERICA"){
                                    $("#lbDetalleSubgenerica").show();
                                }
                                if(campoActual==="ESPECIFICA"){
                                    $("#lbEspecifica").show();
                                }
                                if(campoActual==="DETALLE_ESPECIFICA"){
                                    $("#lbDetalleEspecifica").show();
                                }

                            }
                        }  
                        
                }
                else{ /* PROYECTOS PRIORIZADOS */
                
                        $("#divDatos").load( "../src/controller/consulta.php", 
                          { 
                             resultado_proyecto:'1',
                             anio: $("#controlAnio").val(),
                             dpto: $("#controlDpto").val(),
                             prov: $("#controlProv").val(),
                             mun: $("#controlMuni").val()
                          } 
                        );
                }
                
                  
            }
            
            function ocultarTodosRegresar(){
                    $("#lbFuncion").hide();
                    $("#lbCategoriaPre").hide();
                    $("#lbProyecto").hide();
                    $("#lbDivisionFuncional").hide();
                    $("#lbGrupoFuncional").hide();
                    $("#lbFuente").hide();
                    $("#lbRubro").hide();
                    $("#lbTipoRecurso").hide();
                    $("#lbGenerica").hide();
                    $("#lbSubgenerica").hide();
                    $("#lbDetalleSubgenerica").hide();
                    $("#lbEspecifica").hide();
                    $("#lbDetalleEspecifica").hide();
            }
            
            function mostrarTodosRegresar(){
                    $("#lbFuncion").show();
                    $("#lbCategoriaPre").show();
                    $("#lbProyecto").show();
                    $("#lbDivisionFuncional").show();
                    $("#lbGrupoFuncional").show();
                    $("#lbFuente").show();
                    $("#lbRubro").show();
                    $("#lbTipoRecurso").show();
                    $("#lbGenerica").show();
                    $("#lbSubgenerica").show();
                    $("#lbDetalleSubgenerica").show();
                    $("#lbEspecifica").show();
                    $("#lbDetalleEspecifica").show();
            }
            
            
            
            function regresar(name){
                
                var previa = $("#previaTipo").val();
               
                /* ultimo filtro */
                if( previa==="" || 
                    (
                        (previa==="FUNCION" && name==="btnFuncion") ||
                        (previa==="CATEGORIA_PRESUPUESTAL" && name==="btnCategoriaPre") ||
                        (previa==="PROYECTO" && name==="btnProyecto") ||
                        (previa==="DIVISION_FUNCIONAL" && name==="btnDivisionFuncional") ||
                        (previa==="GRUPO_FUNCIONAL" && name==="btnGrupoFuncional") ||
                        (previa==="FUENTE" && name==="btnFuente") ||
                        (previa==="RUBRO" && name==="btnRubro") ||
                        (previa==="TIPO_RECURSO" && name==="btnTipoRecurso") ||
                        (previa==="GENERICA" && name==="btnGenerica") ||
                        (previa==="SUBGENERICA" && name==="btnSubgenerica") ||
                        (previa==="DETALLE_SUBGENERICA" && name==="btnDetalleSubgenerica") ||
                        (previa==="ESPECIFICA" && name==="btnEspecifica") ||
                        (previa==="DETALLE_ESPECIFICA" && name==="btnDetalleEspecifica")
                    )
                  ){
                    $("#muniFiltrada").val("");
                    verDatos('','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
                    ocultarTodosRegresar();
                }
                else{
                    
                    if(previa==="FUNCION"){
                        verDatos('FUNCION','1','0','0','0','0','0','0','0','0','0','0','0','0','1',$("#previaFuncion").val());
                    }
                    else if(previa==="CATEGORIA_PRESUPUESTAL"){
                        verDatos('CATEGORIA_PRESUPUESTAL','0','1','0','0','0','0','0','0','0','0','0','0','0','1',$("#previaCategoriaPresupuestal").val());
                    }
                    else if(previa==="PROYECTO"){
                        verDatos('PROYECTO','0','0','1','0','0','0','0','0','0','0','0','0','0','1',$("#previaProyecto").val());
                    }
                    else if(previa==="DIVISION_FUNCIONAL"){
                        verDatos('DIVISION_FUNCIONAL','0','0','0','1','0','0','0','0','0','0','0','0','0','1',$("#previaDivisionFuncional").val());
                    }
                    else if(previa==="GRUPO_FUNCIONAL"){
                        verDatos('GRUPO_FUNCIONAL','0','0','0','0','1','0','0','0','0','0','0','0','0','1',$("#previaGrupoFuncional").val());
                    }
                    else if(previa==="FUENTE"){
                        verDatos('FUENTE','0','0','0','0','0','1','0','0','0','0','0','0','0','1',$("#previaFuente").val());
                    }
                    else if(previa==="RUBRO"){
                        verDatos('RUBRO','0','0','0','0','0','0','1','0','0','0','0','0','0','1',$("#previaRubro").val());
                    }
                    else if(previa==="TIPO_RECURSO"){
                        verDatos('TIPO_RECURSO','0','0','0','0','0','0','0','1','0','0','0','0','0','1',$("#previaTipoRecurso").val());
                    }
                    else if(previa==="GENERICA"){
                        verDatos('GENERICA','0','0','0','0','0','0','0','0','1','0','0','0','0','1',$("#previaGenerica").val());
                    }
                    else if(previa==="SUBGENERICA"){
                        verDatos('SUBGENERICA','0','0','0','0','0','0','0','0','0','1','0','0','0','1',$("#previaSubgenerica").val());
                    }
                    else if(previa==="DETALLE_SUBGENERICA"){
                        verDatos('DETALLE_SUBGENERICA','0','0','0','0','0','0','0','0','0','0','1','0','0','1',$("#previaDetalleSubgenerica").val());
                    }
                    else if(previa==="ESPECIFICA"){
                        verDatos('ESPECIFICA','0','0','0','0','0','0','0','0','0','0','0','1','0','1',$("#previaEspecifica").val());
                    }
                    else if(previa==="DETALLE_ESPECIFICA"){
                        verDatos('DETALLE_ESPECIFICA','0','0','0','0','0','0','0','0','0','0','0','0','1','1',$("#previaDetalleEspecifica").val());
                    }
                
                }
                
                document.getElementById(name).disabled=false;
            }
            
            
            $(document).ready(function() {
                
                $("#borrarFiltro").click(function(){
                    
                    var tipoFiltro = $("#controlTipo").val();
                    
                    if(tipoFiltro==="2"){
                        
                        $("#controlDpto").val("-1");
                        $("#controlProv").val("-1");
                        $("#controlMuni").val("-1");

                        $("#controlMuni").load( "../src/controller/consulta.php", 
                            {  muni: 'muni',
                               prov: '-1',
                               dpto: '-1'
                            } 
                        );

                        $("#controlProv").load( "../src/controller/consulta.php", 
                            { provincia: 'provincia',
                              departamento: '-1'
                          } 
                        );
                    
                        verDatos('','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
                    }
                    else{
                        
                            $("#btnFuncion").prop('disabled', false); 
                            $("#btnCategoriaPre").prop('disabled', false); 
                            $("#btnProyecto").prop('disabled', false); 
                            $("#btnDivisionFuncional").prop('disabled', false); 
                            $("#btnGrupoFuncional").prop('disabled', false); 
                            $("#btnFuente").prop('disabled', false); 
                            $("#btnRubro").prop('disabled', false); 
                            $("#btnTipoRecurso").prop('disabled', false); 
                            $("#btnGenerica").prop('disabled', false); 
                            $("#btnSubgenerica").prop('disabled', false); 
                            $("#btnDetalleSubgenerica").prop('disabled', false); 
                            $("#btnEspecifica").prop('disabled', false); 
                            $("#btnDetalleEspecifica").prop('disabled', false); 

                            $("#previaFuncion").val(""); 
                            $("#previaCategoriaPresupuestal").val(""); 
                            $("#previaProyecto").val(""); 
                            $("#previaDivisionFuncional").val(""); 
                            $("#previaGrupoFuncional").val(""); 
                            $("#previaFuente").val("");
                            $("#previaRubro").val(""); 
                            $("#previaTipoRecurso").val("");
                            $("#previaGenerica").val(""); 
                            $("#previaSubgenerica").val(""); 
                            $("#previaDetalleSubgenerica").val(""); 
                            $("#previaEspecifica").val(""); 
                            $("#previaDetalleEspecifica").val("");

                            $("#divDatos").load( "../src/controller/consulta.php", 
                              {'limpiar':'1'} 
                            );

                            /* zona resumen municipalidad */
                            $("#zonaCard").load( "../src/controller/consulta.php", 
                              {
                                resumen_municipalidad:'1',
                                anio: '-1'
                              } 
                            );
                            /* *** */
                            
                            $("#muniFiltrada").val("");
                            
                            verDatos('','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
                        
                    }
                    
                   
                });
                
                $("#btnResultado").click(function(){

                    verDatos('','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
                });


                $("#btnFuncion").click(function(){
                    verDatos('FUNCION','1','0','0','0','0','0','0','0','0','0','0','0','0','0','');
                });


                $("#btnCategoriaPre").click(function(){
                    verDatos('CATEGORIA_PRESUPUESTAL','0','1','0','0','0','0','0','0','0','0','0','0','0','0','');
                });
                
                $("#btnProyecto").click(function(){
                    verDatos('PROYECTO','0','0','1','0','0','0','0','0','0','0','0','0','0','0','');
                });
                
                $("#btnDivisionFuncional").click(function(){
                    verDatos('DIVISION_FUNCIONAL','0','0','0','1','0','0','0','0','0','0','0','0','0','0','');
                });
                
                $("#btnGrupoFuncional").click(function(){
                    verDatos('GRUPO_FUNCIONAL','0','0','0','0','1','0','0','0','0','0','0','0','0','0','');
                });
                
                $("#btnFuente").click(function(){
                    verDatos('FUENTE','0','0','0','0','0','1','0','0','0','0','0','0','0','0','');
                });
                
                $("#btnRubro").click(function(){
                    verDatos('RUBRO','0','0','0','0','0','0','1','0','0','0','0','0','0','0','');
                });
                
                $("#btnTipoRecurso").click(function(){
                    verDatos('TIPO_RECURSO','0','0','0','0','0','0','0','1','0','0','0','0','0','0','');
                });
                
                $("#btnGenerica").click(function(){
                    verDatos('GENERICA','0','0','0','0','0','0','0','0','1','0','0','0','0','0','');
                });
                
                $("#btnSubgenerica").click(function(){
                    verDatos('SUBGENERICA','0','0','0','0','0','0','0','0','0','1','0','0','0','0','');
                });
                
                $("#btnDetalleSubgenerica").click(function(){
                    verDatos('DETALLE_SUBGENERICA','0','0','0','0','0','0','0','0','0','0','1','0','0','0','');
                });
                
                $("#btnEspecifica").click(function(){
                    verDatos('ESPECIFICA','0','0','0','0','0','0','0','0','0','0','0','1','0','0','');
                });
                
                $("#btnDetalleEspecifica").click(function(){
                    verDatos('DETALLE_ESPECIFICA','0','0','0','0','0','0','0','0','0','0','0','0','1','0','');
                });
                
                
                
                
            });
            
             
        </script>
        
    </head>
    <body>
        
        
        <?php include_once 'cabecera.php'; ?>
        
 
        
        
        
        <section class="ftco-section testimony-section img" style="background-image: url(../images/selva.jpg);">
                                <div class="overlay"></div>
                                <div class="container">
                                    
                                    
                                    
                                    
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
                                            <span class="subheading">Detalle Presupuesto</span>
                                            <h2 class="mb-2">Municipalidades</h2>
                                        </div>
                                    </div>
                                    <div class="row ftco-animate">
                                        <div class="col-md-12">


<!--                                            <div class="carousel-testimony owl-carousel ftco-owl" id="divDatos">-->
                                            <div>
                                                        <div class="text">
                                                             <div class="d-flex align-items-center">
                                                                <div class="pl-3">
<!--                                                                    <div id="divDatos">
                                                                        
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>
        
        
        
        
        
        <section class="ftco-section">
      <div class="row">
                                  <div class="col-md-6">
                            
                            <div class="col-md-3">
                                <label class="nombreFiltro">Año</label>
                                <select class="form-control nombreFiltro" id="controlAnio" style="font-size:15px!important">
                                    <?php for($i=2015;$i<=date('Y');$i++){ ?>
                                        <option <?php if(date('Y')==$i){echo "selected";}?>><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <script>
                                    // $("#controlAnio option").eq(1).before($("<option></option>").val("2015,2016,2017,2018").text("2015 - 2018"));
                                    // $("#controlAnio option").eq(6).before($("<option></option>").val("2019,2020,2021").text("2019 - 2021"));
                                </script>
                            </div>
                            <div class="col-md-3">
                                <label class="nombreFiltro">&nbsp;</label>
                                <select id="controlTipo" class="form-control nombreFiltro"style="font-size:15px!important">
                                    <option value="1">Sólo Proyectos</option>
                                    <option value="2">Proyectos Priorizados</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3">
                                <br>
                                <button class="btn btn-warning" style="width:150px;margin-top:12px;height:48px;background:#002747!important;border-color:#002747!important" id="btnResultado">Ver resultado</button>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <button class="btn btn-success" style="width:150px;margin-top:12px;height:48px;background: rgba(255,0,38,0.89)!important;border:none" id="borrarFiltro">Borrar filtros</button>
                            </div>
                                
                            <div class="col-md-12">&nbsp;</div>    
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading panelHeading" style="background:#002747!important;"><label class="nombreFiltro" style="color:white!important">¿Quién gasta?</label></div>
                                    <div class="panel-body row">

                                        <div class="col-md-4">
                                            <label class="nombreFiltro">Departamento</label>
                                            <select class="form-control nombreFiltro" id="controlDpto" style="font-size:15px!important">    
                                                <option value="-1">TODOS</option>
                                                <?php if(isset($_SESSION['cboDpto'])){ ?>
                                                <?php foreach($_SESSION['cboDpto'] as $r){ ?>
                                                    <option value="<?php echo $r['DEPARTAMENTO'] ?>"><?php echo $r['DEPARTAMENTO'] ?></option>
                                                <?php }}?>
                                            </select>    
                                        </div>

                                        <div class="col-md-4">
                                            <label class="nombreFiltro">Provincia</label>
                                            <select class="form-control nombreFiltro" id="controlProv" style="font-size:15px!important">    
                                                <option value="-1">TODOS</option>
                                            </select>    
                                        </div>

                                        <div class="col-md-4">
                                            <label class="nombreFiltro">Municipalidad</label>
                                            <select class="form-control nombreFiltro" id="controlMuni" style="font-size:15px!important">    
                                                <option value="-1">TODOS</option>
                                            </select>    
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="divBloque1">
                                <div class="panel panel-info">
                                    <div class="panel-heading panelHeading" style="background:#002747!important;">
                                        <center>
                                            <label class="nombreFiltro" style="color:white!important">¿En qué gasta?</label>
                                        </center>
                                    </div>
                                    <div class="panel-body row">

                                        <div class="col-md-12 text-center">
                                            <button id="btnFuncion" class="btn btn-secondary">Función</button> 
                                            <span class="label label-danger" id="lbFuncion" onclick="regresar('btnFuncion')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnCategoriaPre" class="btn btn-secondary">Categoría Presupuestal</button>  
                                            <span class="label label-danger" id="lbCategoriaPre" onclick="regresar('btnCategoriaPre')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnProyecto" class="btn btn-secondary">Proyecto</button>    
                                            <span class="label label-danger" id="lbProyecto" onclick="regresar('btnProyecto')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnDivisionFuncional" class="btn btn-secondary">División Funcional</button> 
                                            <span class="label label-danger" id="lbDivisionFuncional" onclick="regresar('btnDivisionFuncional')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnGrupoFuncional" class="btn btn-secondary">Grupo Funcional</button>  
                                            <span class="label label-danger" id="lbGrupoFuncional" onclick="regresar('btnGrupoFuncional')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="divBloque2">
                                <div class="panel panel-info">
                                    <div class="panel-heading panelHeading" style="background:#002747!important;">
                                        <center>
                                        <label class="nombreFiltro" style="color:white!important">¿Con qué se financian los gastos?</label>
                                        </center> 
                                    </div>
                                    <div class="panel-body row">

                                        <div class="col-md-12 text-center">
                                            <button id="btnFuente" class="btn btn-secondary">Fuente</button> 
                                            <span class="label label-danger" id="lbFuente" onclick="regresar('btnFuente')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnRubro" class="btn btn-secondary">Rubro</button>    
                                            <span class="label label-danger" id="lbRubro" onclick="regresar('btnRubro')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnTipoRecurso" class="btn btn-secondary">Tipo de recurso</button> 
                                            <span class="label label-danger" id="lbTipoRecurso" onclick="regresar('btnTipoRecurso')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="divBloque3">
                                <div class="panel panel-info">
                                    <div class="panel-heading panelHeading" style="background:#002747!important;">
                                        <center>
                                        <label class="nombreFiltro" style="color:white!important">¿Cómo se estructura el gasto?</label>
                                        </center>
                                    </div>
                                    <div class="panel-body row">

                                        <div class="col-md-12 text-center">
                                            <button id="btnGenerica" class="btn btn-secondary">Genérica</button> 
                                            <span class="label label-danger" id="lbGenerica" onclick="regresar('btnGenerica')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnSubgenerica" class="btn btn-secondary">Sub-genérica</button>  
                                            <span class="label label-danger" id="lbSubgenerica" onclick="regresar('btnSubgenerica')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnDetalleSubgenerica" class="btn btn-secondary">Detalle de sub-genérica</button>   
                                            <span class="label label-danger" id="lbDetalleSubgenerica" onclick="regresar('btnDetalleSubgenerica')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnEspecifica" class="btn btn-secondary">Específica</button>   
                                            <span class="label label-danger" id="lbEspecifica" onclick="regresar('btnEspecifica')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                        <div class="col-md-12 text-center">&nbsp;</div>
                                        <div class="col-md-12 text-center">
                                            <button id="btnDetalleEspecifica" class="btn btn-secondary">Detalle de específica</button>  
                                            <span class="label label-danger" id="lbDetalleEspecifica" onclick="regresar('btnDetalleEspecifica')" style="display:none;cursor:pointer">X</span>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            
                          </div>
<div class="row col-md-6 d-flex" id="divDatos">
<!--   <div class="row col-md-6 d-flex"> -->
    <!-- DATA TABLE -->
                                
                                
                                <!-- END DATA TABLE -->
    
</div>

     
           </div>
            <div class="row" style="padding:20px!important">
                            
                            <input type="hidden" style="color:black!important" id="previaTipo">
                            <input type="hidden" style="color:black!important" id="previaFuncion">
                            <input type="hidden" style="color:black!important" id="previaCategoriaPresupuestal">
                            <input type="hidden" style="color:black!important" id="previaProyecto">
                            <input type="hidden" style="color:black!important" id="previaDivisionFuncional">
                            <input type="hidden" style="color:black!important" id="previaGrupoFuncional">
                            <input type="hidden" style="color:black!important" id="previaFuente">
                            <input type="hidden" style="color:black!important" id="previaRubro">
                            <input type="hidden" style="color:black!important" id="previaTipoRecurso">
                            <input type="hidden" style="color:black!important" id="previaGenerica">
                            <input type="hidden" style="color:black!important" id="previaSubgenerica">
                            <input type="hidden" style="color:black!important" id="previaDetalleSubgenerica">
                            <input type="hidden" style="color:black!important" id="previaEspecifica">
                            <input type="hidden" style="color:black!important" id="previaDetalleEspecifica">
                            <input type="hidden" style="color:black!important" id="muniFiltrada">
                           
                            
                    </div>
       </section>
        
        <footer class="ftco-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">Marco<span>Logico.com</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">My Accounts</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Account</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Register</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Log In</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>My Order</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Quick Link</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>New User</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Help Center</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Report Spam</a></li>
                <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Faq's</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-md-12">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by <a href="https://colorlib.com" target="_blank">Marco Lógico</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
      	</div>
      </div>
    </footer>
        
    <script>
    
        $("#zonaCard").load( "../src/controller/consulta.php", 
                      {
                        resumen_municipalidad:'1',
                        anio: '<?php echo date('Y'); ?>'
                      } 
                    );
        
    </script>    
        
    </body>
    <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  
        
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
-->
<script src="../js/jquery.dataTables.min2.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

</html>
