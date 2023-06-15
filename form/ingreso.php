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
        <title>Ingresos</title>
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
        
            
            $("#btnFuente").click(function(){
                filtrar(1);
            });
            $("#btnRubro").click(function(){
                filtrar(2);
            });
            $("#btnTipoRecurso").click(function(){
                filtrar(3);
            });
            $("#btnGenerica").click(function(){
                filtrar(4);
            });
            $("#btnSubgenerica").click(function(){
                filtrar(5);
            });
            $("#btnDetalleSubgenerica").click(function(){
                filtrar(6);
            });
            $("#btnEspecifica").click(function(){
                filtrar(7);
            });
            $("#btnDetalleEspecifica").click(function(){
                filtrar(8);
            });
            $("#btnMes").click(function(){
                filtrar(9);
            });
            $("#btnTrimestre").click(function(){
                filtrar(10);
            });
            
            
        
            function filtrar(tipoVista){
                
                /* ** tabla existe ** */
                if(document.getElementById("tablaDatos")!==null){
                    
                    var radioSel = $("input[name='radioGrupo']:checked").data('name');
                    var radioNum = $("input[name='radioGrupo']:checked").data('num');
                    
                    if(radioSel !== undefined){
                     
                        /* hallar cabecera */
                        
                        /* *************** */
                        
                        $("#divDatos").load( "../src/controller/ingreso.php", 
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
                            t_pia: $("#pia_"+radioNum).val(),
                            t_pim: $("#pim_"+radioNum).val(),
                            t_recaudado: $("#recaudado_"+radioNum).val()
                        });
                     
                    }
                    else{
                        alert("Marcar una opción");
                    }
                }
                
            }
        
        
            
            $("#borrarFiltro").click(function(){
                
                $("#divDatos").load( "../src/controller/ingreso.php", 
                {
                    borrarFiltro:'1',
                });
                
            });
            
            
            $("#btnResultado").click(function(){
                
                $("#divDatos").load( "../src/controller/ingreso.php", 
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
            
            
            $("#lbFuente").click(function(){
                regresarFiltro("FUENTE");
            });
            $("#lbRubro").click(function(){
                regresarFiltro("RUBRO");
            });
            $("#lbTipoRecurso").click(function(){
                regresarFiltro("TIPO_RECURSO");
            });
            $("#lbGenerica").click(function(){
                regresarFiltro("GENERICA");
            });
            $("#lbSubgenerica").click(function(){
                regresarFiltro("SUBGENERICA");
            });
            $("#lbDetalleSubgenerica").click(function(){
                regresarFiltro("DETALLE_SUBGENERICA");
            });
            $("#lbEspecifica").click(function(){
                regresarFiltro("ESPECIFICA");
            });
            $("#lbDetalleEspecifica").click(function(){
                regresarFiltro("DETALLE_ESPECIFICA");
            });
            $("#lbMes").click(function(){
                regresarFiltro("MES");
            });
            $("#lbTrimestre").click(function(){
                regresarFiltro("TRIMESTRE");
            });
            
            
            
            function regresarFiltro(filtro){
             
                $("#divDatos").load( "../src/controller/ingreso.php", 
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
        
        </script>
        
        
    </head>
    <body>
        
        
        <?php include_once 'cabecera.php'; ?>
     
       
        
        <section class="ftco-section">
      <div class="row">
                  
          <div class="col-md-12">
                    <center>
                      <label style="font-size:30px;color:#002747"><b>INGRESOS</b></label>
                    </center>
             </div>
          
          <div class="col-md-12">
              <div class="col-md-12">
                  <a href="../src/controller/ingreso.php?reporte">
                    <button class="btn btn-success">Descargar base de datos completa</button>
                    <br><br><br>
                  </a>
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

                <div class="col-md-6">
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
                                <label class="nombreFiltro" style="color:white!important">¿De qué fuentes proviene la recaudación?</label>
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
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnTipoRecurso" class="btn btn-secondary">Tipo de Recurso</button> 
                                <center>
                                <span class="label label-danger" id="lbTipoRecurso" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2" id="divBloque2">
                    <div class="panel panel-info">
                        <div class="panel-heading panelHeading" style="background:#002747!important;">
                            <center>
                            <label class="nombreFiltro" style="color:white!important">¿Cómo se estructura la recaudación?</label>
                            </center> 
                        </div>
                        <div class="panel-body row">

                            <div class="col-md-12 text-center">
                                <button id="btnGenerica" class="btn btn-secondary">Genérica</button> 
                                <center>
                                <span class="label label-danger" id="lbGenerica" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnSubgenerica" class="btn btn-secondary">Subgenérica</button>  
                                <center>
                                <span class="label label-danger" id="lbSubgenerica" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnDetalleSubgenerica" class="btn btn-secondary">Detalle Subgenérica</button>  
                                <center>
                                <span class="label label-danger" id="lbDetalleSubgenerica" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnEspecifica" class="btn btn-secondary">Específica</button>  
                                <center>
                                <span class="label label-danger" id="lbEspecifica" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnDetalleEspecifica" class="btn btn-secondary">Detalle Específica</button>  
                                <center>
                                <span class="label label-danger" id="lbDetalleEspecifica" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2" id="divBloque3">
                    <div class="panel panel-info">
                        <div class="panel-heading panelHeading" style="background:#002747!important;">
                            <center>
                                <label class="nombreFiltro" style="color:white!important">¿Cuándo se hizo la recaudación?</label>
                            </center>
                        </div>
                        <div class="panel-body row">
                            <!--
                            <div class="col-md-12 text-center">
                                <button id="btnTrimestre" class="btn btn-secondary">Trimestre</button> 
                                <center>
                                <span class="label label-danger" id="lbTrimestre" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                </center>
                            </div>
                            -->
                            <div class="col-md-12 text-center">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button id="btnMes" class="btn btn-secondary">Mes</button> 
                                <center>
                                <span class="label label-danger" id="lbMes" style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
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
