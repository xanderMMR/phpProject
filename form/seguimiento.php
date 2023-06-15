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
        <title>Seguimiento</title>
        <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
        <meta name="google" content="notranslate">
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
        
        
        <script type="text/javascript" src="../dom/js/js1.12.js"></script>
        
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
                width:150px !important;
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
              
              .textoAdd{
                  color: #684432;
              }
              
              .modal-lg {
                    width: 1200px!important;
              }
              
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
        
        $(document).ready(function() {
        
            
            $("#btnFuncion").click(function(){
                filtrar(1);
            });
            $("#btnProyecto").click(function(){
                filtrar(2);
            });
            $("#btnFuente").click(function(){
                filtrar(3);
            });
            $("#btnRubro").click(function(){
                filtrar(4);
            });
            
        
        
            function filtrar(tipoVista){
                
                /* ** tabla existe ** */
                if(document.getElementById("tablaDatos")!==null){
                    
                    var radioSel = $("input[name='radioGrupo']:checked").data('name');
                    var radioNum = $("input[name='radioGrupo']:checked").data('num');
                    
                    if(radioSel !== undefined){
                   
                        /* hallar cabecera */
                        
                        /* *************** */
                       
                        $("#divDatos").load( "../src/controller/seguimiento.php", 
                        {
                            resultado:'1',
                            anio: $("#controlAnio").val(),
                            dpto: $("#controlDpto").val(),
                            prov: $("#controlProv").val(),
                            mun: $("#controlMuni").val(),  
                            muniFiltrada: $("#muniFiltrada").val(),
                            radioSel: radioSel,
                            tipoVista: tipoVista,
                            ultimaColumna: $("#ultimaColumna").val(),
                            quitar:"",
                            t_costo: $("#costo_"+radioNum).val(),
                            t_ejecucionA: $("#ejecucionA_"+radioNum).val(),
                            t_ejecucionB: $("#ejecucionB_"+radioNum).val(),
                            t_pia: $("#pia_"+radioNum).val(),
                            t_pim: $("#pim_"+radioNum).val(),
                            t_devengado: $("#devengado_"+radioNum).val(),
                            t_ejecucionTotal: $("#ejecucionTotal_"+radioNum).val(),
                            t_avanceTotal: $("#avanceTotal_"+radioNum).val()
                            
                        });
                     
                    }
                    else{
                        alert("Marcar una opción");
                    }
                }
                
            }
        
        
            
            $("#borrarFiltro").click(function(){
                
                $("#divDatos").load( "../src/controller/seguimiento.php", 
                {
                    borrarFiltro:'1',
                });
                
            });
            
            
            $("#btnResultado").click(function(){
                
                $("#divDatos").load( "../src/controller/seguimiento.php", 
                {
                    resultado:'1',
                    anio: $("#controlAnio").val(),
                    dpto: $("#controlDpto").val(),
                    prov: $("#controlProv").val(),
                    mun: $("#controlMuni").val(),  
                    muniFiltrada: $("#muniFiltrada").val(),
                    radioSel: "",
                    tipoVista: "",
                    ultimaColumna: "",
                    quitar:""
                });
                
            });
            
            
            $("#lbFuncion").click(function(){
                regresarFiltro("FUNCION");
            });
            $("#lbProyecto").click(function(){
                regresarFiltro("PROYECTO");
            });
            $("#lbFuente").click(function(){
                regresarFiltro("FUENTE");
            });
            $("#lbRubro").click(function(){
                regresarFiltro("RUBRO");
            });
            
            
            function regresarFiltro(filtro){
             
                $("#divDatos").load( "../src/controller/seguimiento.php", 
                {
                    resultado:'1',
                    anio: $("#controlAnio").val(),
                    dpto: $("#controlDpto").val(),
                    prov: $("#controlProv").val(),
                    mun: $("#controlMuni").val(),  
                    muniFiltrada: $("#muniFiltrada").val(),
                    radioSel: "",
                    tipoVista: "",
                    ultimaColumna: $("#ultimaColumna").val(),
                    quitar: filtro
                });
                        
            }
        
        });
        
        function mostrarInfo(id){
        
            var cadena = $("#hp_"+id).val();
            var proyecto = $("#hp_proyecto_"+id).val();
            
            
            $("#divSituacion").load( "../src/controller/seguimiento.php", 
                {
                    situacion_inversion:'1',
                    proyecto: proyecto
                });
            
            $("#divHistorico").load( "../src/controller/seguimiento.php", 
                {
                    historico_devengado:'1',
                    proyecto: proyecto
                });
            
            
            var datos = cadena.split(";;;");
            
            for(var i=1;i<=39;i++){
                
                var nombre = "#span_"+i;
                
                if(nombre==="#span_2"){
                    $("#href_2").attr("href",datos[i-1]);
                    $("#href_2").text(datos[i-1]);
                }
                else if(nombre==="#span_14"){
                    $("#href_14").attr("href",datos[i-1]);
                    $("#href_14").text(datos[i-1]);
                }
                else if(nombre==="#span_15"){
                    $("#href_15").attr("href",datos[i-1]);
                    $("#href_15").text(datos[i-1]);
                }
                else if(nombre==="#span_20"){
                    $("#href_20").attr("href",datos[i-1]);
                    $("#href_20").text(datos[i-1]);
                }
                else if(nombre==="#span_23"){
                    $("#href_23").attr("href",datos[i-1]);
                    $("#href_23").text(datos[i-1]);
                }
                else if(nombre==="#span_24"){
                    $("#href_24").attr("href",datos[i-1]);
                    $("#href_24").text(datos[i-1]);
                }
                else if(nombre==="#span_26"){
                    $("#href_26").attr("href",datos[i-1]);
                    $("#href_26").text(datos[i-1]);
                }
                else if(nombre==="#span_27"){
                    $("#href_27").attr("href",datos[i-1]);
                    $("#href_27").text(datos[i-1]);
                }
                else if(nombre==="#span_31"){
                    $("#href_31").attr("href",datos[i-1]);
                    $("#href_31").text(datos[i-1]);
                }
                
                $(nombre).html( datos[i-1] );
            }
            
        }
        
        </script>
        
        
    </head>
    <body>
        
        
        <?php include_once 'cabecera.php'; ?>
     
       
        
        <section class="ftco-section">
      <div class="row">
                  
          <div class="col-md-12">
              
              <div class="col-md-12">
                    <center>
                      <label style="font-size:30px;color:#002747"><b>SEGUIMIENTO</b></label>
                    </center>
             </div>
              
              <div class="col-md-12">
                  <a href="../src/controller/seguimiento.php?reporte">
                    <button type="button" class="btn btn-success">Descargar base de datos completa</button>
                  </a>  
                    <br><br><br>
                    
              </div>
          </div>
          
          <div class="col-md-12">
                            
                <div class="col-md-2">
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
                <!--
                <div class="col-md-3">
                    <label class="nombreFiltro">&nbsp;</label>
                    <select id="controlTipo" class="form-control nombreFiltro"style="font-size:15px!important">
                        <option value="1">Sólo Proyectos</option>
                        <option value="2">Proyectos Priorizados</option>
                    </select>
                </div>
                -->
                <div class="col-md-2 text-center">
                    <br>
                    <button class="btn btn-warning" style="width:150px;margin-top:12px;height:48px;background:#002747!important;border-color:#002747!important" id="btnResultado">Ver resultado</button>
                </div>
                <div class="col-md-2 text-center">
                    <br>
                    <button class="btn btn-success" style="width:150px;margin-top:12px;height:48px;background: rgba(255,0,38,0.89)!important;border: none" id="borrarFiltro">Borrar filtros</button>
                </div>

                <div class="col-md-12">&nbsp;</div>    

                <div class="col-md-7">
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

                <div class="col-md-2" id="divBloque1">
                    <div class="panel panel-info">
                        <div class="panel-heading panelHeading" style="background:#002747!important;">
                            <center>
                                <label class="nombreFiltro" style="color:white!important">¿En qué se gasta?</label>
                            </center>
                        </div>
                        <div class="panel-body row">

                            <div class="col-md-12 text-center">
                                <button id="btnFuncion" class="btn btn-secondary">Función</button> 
                                <center>
                                <span class="label label-danger" id="lbFuncion" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12">&nbsp;</div> 
                            <div class="col-md-12 text-center">
                                <button id="btnProyecto" class="btn btn-secondary">Proyecto</button>    
                                <center>
                                <span class="label label-danger" id="lbProyecto" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3" id="divBloque2">
                    <div class="panel panel-info">
                        <div class="panel-heading panelHeading" style="background:#002747!important;">
                            <center>
                            <label class="nombreFiltro" style="color:white!important">¿Con qué se financian los gastos?</label>
                            </center> 
                        </div>
                        <div class="panel-body row">

                            <div class="col-md-12 text-center">
                                <button id="btnFuente" class="btn btn-secondary">Fuente</button> 
                                <center>
                                <span class="label label-danger" id="lbFuente" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnRubro" class="btn btn-secondary">Rubro</button>  
                                <center>
                                <span class="label label-danger" id="lbRubro" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          
          
            <div class="row col-md-12" id="divDatos">

            </div>
          
     
            </div>
            <div class="row" style="padding:20px!important">
                            
            </div>
            
            
            
            <!-- HIDDEN -->
            <input type="hidden" style="color:black!important" id="muniFiltrada">
            <!-- --------->
            
            
            <!-- POPUP -->
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document" style='width:1200px!important'>
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> <b><label style="font-size:16px!important"> SSI - Sistema de Seguimiento de Inversiones </label></b> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                   
                          <div class="row">
                          <div class='col-md-12'>    
                            
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#31708f!important;color:white!important">DATOS DE LA FASE DE FORMULACIÓN Y EVALUACIÓN</div>
                                    <div class="panel-body">

                                          <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Situación</label>
                                            <div class="col-sm-2 text-left">
                                                <span id='span_3'></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Link Formato N° 07-A</label>
                                            <div class="col-sm-2 text-left">
                                                <a id='href_14' target="_blank"></a>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha de viabilidad/aprobación</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_4'></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Costo de inversión viable/aprobado (S/)</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_5'></span>
                                            </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Beneficiarios (Habitantes)</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_6'></span>
                                            </div>
                                          </div>

                                    </div>
                                  </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#31708f!important;color:white!important">DATOS DE LA FASE DE EJECUCIÓN</div>
                                    <div class="panel-body">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">¿Tiene expediente técnico o documento equivalente?</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_7'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Link</label>
                                            <div class="col-sm-2 text-left">
                                                <a id='href_15' target="_blank"></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">¿Tiene registro de seguimiento?</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_8'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Link Formato N° 12B</label>
                                            <div class="col-sm-2 text-left">
                                                <a target="_blank" id='href_26'></a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Registro de cierre</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_9'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha de inicio de ejecución</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_10'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha de fin de ejecución</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_11'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Costo de inversión actualizado (S/)</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_12'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Costo de inversión total (S/)</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_13'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Link Formato N° 8A</label>
                                            <div class="col-sm-2 text-left">
                                                <a target="_blank" id='href_27'></a>
                                            </div>
                                        </div>

                                    </div>    
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#31708f!important;color:white!important">INFORMACIÓN FINANCIERA (S/)</div>
                                    <div class="panel-body">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Costo inversión total</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_16'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha del primer devengado</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_17'></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha del último devengado</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_18'></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                              
                              <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#31708f!important;color:white!important">HISTÓRICO DE DEVENGADO POR ESPECÍFICA (S/.)</div>
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12  text-left" id="divHistorico">

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background:#31708f!important;color:white!important">FORMATO 12B</div>
                                    <div class="panel-body">

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Fecha última modificación</label>
                                            <div class="col-sm-8  text-left">
                                                <span id='span_19'></span>
                                            </div>
                                        </div>
                                        

                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background:#B00000!important;color:white!important">Ejecución de la inversión</div>
                                            <div class="panel-body">

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Fecha de inicio de la ejecución física</label>
                                                    <div class="col-sm-8  text-left">
                                                        <span id='span_28'></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Fecha de culminación de la ejecución física</label>
                                                    <div class="col-sm-8  text-left">
                                                        <span id='span_29'></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Fecha de declaración</label>
                                                    <div class="col-sm-8  text-left">
                                                        <span id='span_30'></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Link Detalle de avance</label>
                                                    <div class="col-sm-8  text-left">
                                                        <a target="_blank" id='href_31'></a>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="background:#AF7070;color:white!important">Información del avance de la inversión</div>
                                                    <div class="panel-body">

                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">% Avance de la ejecución de la inversión</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_21'></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">% Avance físico de la inversión</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_22'></span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="background:#AF7070;color:white!important">Situación</div>
                                                    <div class="panel-body">

                                                        <div class="form-group row">
                                                            <div class="col-sm-12  text-left">
                                                                <span id='span_32'></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12  text-left" id="divSituacion">
                                                             
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="background:#AF7070;color:white!important">Problemática - Riesgo en la fase de ejecución</div>
                                                    <div class="panel-body">

                                                        <div class="form-group row">
                                                            <div class="col-sm-12  text-left">
                                                                <span id='span_33'></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background:#B00000!important;color:white!important">Ejecución Financiera</div>
                                            <div class="panel-body">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="background:#AF7070;color:white!important">Avance financiero acumulado de la inversión</div>
                                                    <div class="panel-body">

                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Costo actualizado</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_34'></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Devengado acumulado</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_35'></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Primer devengado</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_36'></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Último devengado</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_38'></span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" style="background:#AF7070;color:white!important">Avance financiero de la inversión</div>
                                                    <div class="panel-body">

                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label">Programación financiera actualizada</label>
                                                            <div class="col-sm-8  text-left">
                                                                <span id='span_37'></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="background:#B00000!important;color:white!important">Contrataciones</div>
                                            <div class="panel-body">

                                               <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Consultorías de obra</label>
                                                    <div class="col-sm-8  text-left">
                                                        <span id='span_25'></span>
                                                    </div>
                                                </div>
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Obras</label>
                                                    <div class="col-sm-8  text-left">
                                                        <span id='span_39'></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                              
                          </div>   
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            
                <!--
            
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> <b><label style="font-size:16px!important"> Información adicional del Proyecto </label></b> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                   
                          <div class="row">
                          <div class='col-md-12'>    
                              
                              <div class="col-md-12">
                                  <span class="textoAdd">¿Se encuentra programado en el PMI?</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_1"></span>
                              </div>   
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Consulta de Cartera PMI (Banco de Inversiones)</span>
                                  <br>
                                  <a id='href_2' href="" target='_blank'></a>
                              </div>  
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <u><b>DATOS DE LA FASE DE FORMULACIÓN Y EVALUACIÓN</b></u>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  <span class="textoAdd">Situación</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_3"></span>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha de viabilidad/aprobación</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_4"></span>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Costo de inversión viable/aprobado (S/)</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_5"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Beneficiarios (Habitantes)</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_6"></span>
                              </div>  
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <u><b>DATOS DE LA FASE EJECUCIÓN</b></u>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  <span class="textoAdd">¿Tiene expediente técnico o documento equivalente?</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_7"></span>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">¿Tiene registro de seguimiento?</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_8"></span>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Link Formato 12-B</span>
                                  <br>
                                  <a id='href_26' href="" target='_blank'></a>
                              </div>  
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Registro de cierre</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_9"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha de inicio de la ejecución</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_10"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha de fin de la ejecución</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_11"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Costo de inversión actualizado (S/)</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_12"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Costo de inversión total (S/)</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_13"></span>
                              </div> 
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Formato 07-A</span>
                                  <br>
                                  <a id='href_14' href="" target='_blank'></a>
                              </div> 
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Datos generales del proyecto o inversión</span>
                                  <br>
                                  <a id='href_15' href="" target='_blank'></a>
                              </div> 
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Formato 08-A</span>
                                  <br>
                                  <a id='href_27' href="" target='_blank'></a>
                              </div> 
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <u><b>INFORMACIÓN FINANCIERA</b></u>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Costo de inversión total (S/)</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_16"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha del primer devengado</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_17"></span>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha del último devengado</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_18"></span>
                              </div> 
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <u><b>FORMATO 12-B</b></u>
                              </div> 
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">Fecha última modificacion</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_19"></span>
                              </div>
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Información del avance de la inversión</span>
                                  <br>
                                  <a id='href_20' href="" target='_blank'></a>
                              </div> 
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <u><b>ESTIMACIÓN DEL AVANCE DE LA INVERSIÓN</b></u>
                              </div>
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">% Avance de la Ejecución de la inversión</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_21"></span>
                              </div>
                              <div class="col-md-12">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span class="textoAdd">% Avance Físico de la inversión</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_22"></span>
                              </div>
                              <div class="col-md-12">
                                  <br>
                              </div> 
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Procedimientos de Selección</span>
                                  <br>
                                  <a id='href_23' href="" target='_blank'></a>
                              </div>
                              <div class="col-md-12">
                                  <span class="textoAdd">Link Ejecución Contractual</span>
                                  <br>
                                  <a id='href_24' href="" target='_blank'></a>
                              </div>
                              <div class="col-md-12">
                                  <span class="textoAdd">Consultorías de obra</span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span id="span_25"></span>
                              </div>
                          </div>    
                          </div>
                              
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            
                -->
            <!-- -->
            
            
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
    
       // $("#zonaCard").load( "../src/controller/consulta.php", 
       //               {
       //                 resumen_municipalidad:'1',
       //                 anio: '<?php //echo date('Y'); ?>'
       //               } 
       //             );
        
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
