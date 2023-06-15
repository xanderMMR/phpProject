    <?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['acceso_usuario'])) {
    header("location: acceso.php");
}
$movil=0;
if(isset($_SESSION['movil'])){
    $movil = $_SESSION['movil'];
}
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
        <title>Resumen</title>
        <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
        <meta name="google" content="notranslate">
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

        <!-- Data Table-->
        <link href="../css/font-face.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="../css/theme.css" rel="stylesheet" media="all">
        <!-- FIN DATA TABLE-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript" src="../dom/js/js1.12.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>

        <style>

            body{
                background:#eeeeee;      
            }

            #panelPrincipal{
                width: 80%!important;
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
                color:#949494;
                font-size: 11px;
            }

            select{
                height: 30px!important;
                font-size: 10px!important;
            }

            .panelHeading{
                font-size: 11px !important;
                font-weight: normal;
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

            .divubigeo{
                background: rgb(2,0,36);
                background: linear-gradient(rgba(93,247,96,1) 0%, rgba(0,255,166,1) 100%);
                border-radius: 20px;
                width: 300px;
                height: 65px;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 16px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            
            .divdatosmontos{
            
                background: #00AB60;
                border-radius: 20px;
                width: 800px;
                height: 150px;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
            }
            
            .divanio{
                background: #39658E!important;
                border-radius: 20px;
                width: 400px;
                height:auto;
                padding: 10px;
                font-family: 'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 43px;
                font-weight: bold;
                margin-bottom: 30px;
                margin-right: 30px;
                color:white!important;
            }
            
            .divpresupuesto{
                background: #2784D3;
                width: 300px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 22px;
                font-weight: bold;
                border-radius:10px;
                margin-bottom: 10px;
                margin-top:20px;
                <?php if($movil==0){ ?>
                    margin-left: -60px;
                <?php } ?>    
            }
            
            .divinicialinversion{
                background: #02C2A2;
                width: 500px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 22px;
                font-weight: bold;
                border-radius:10px;
                margin-bottom: 10px;
                margin-top:20px;
            }
            
            .divejecucion{
                background: #D7D90B;
                width: 300px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 10px;
                border-radius:10px;
                
                <?php if($movil==0){ ?>
                    margin-top:70px;
                <?php } ?>     
            }
            
            .divTotalProyecto{
                background: #E09DE1;
                width: 300px;
                height:auto;
                padding: 10px;
                border-radius:10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:20px;
                <?php if($movil==0){ ?>
                    margin-left: 50px;
                <?php } ?>     
            }
            
            .divavancefinanciero{
                background: #FF2C1B;
                <?php if($movil==0){ ?>
                    width: 700px;
                    font-size: 44px;
                    margin-left: -70px;
                <?php }else{ ?>
                    width: 300px;
                    font-size: 20px;
                    margin-left:-80px;
                <?php }?>
                
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:60px!important;
                border-radius: 20px;
                display: inline-block;   
            }
            
            .divinversionpim{
                background: #5ECFF8;
                width: 300px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 13px;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:20px;
                border-radius:10px;
                <?php if($movil==0){ ?>
                    margin-left: 30px;
                    margin-top: -40px;
                <?php } ?>    
            }
            
            .divpresupuestofuncion{
                
                background: #9D6AE9;
                width: 400px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:20px;
                border-radius:10px;
            }
            
            .divotros{
                
                background: #af8c84;
                width: 650px;
                height:auto;
                padding: 10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:50px;
                border-radius:10px;
                
                <?php if($movil==0){ ?>
                    margin-left: -100px!important;
                <?php } ?>     
            }
            
            .divrubros{
                
                <?php if($movil==0){ ?>
                    width: 500px;
                    font-size: 15px;
                <?php }else{ ?>
                    width: 300px;
                    font-size: 15px;
                <?php }?>
                    
                background: #FFAF50;
                height:auto;
                padding: 10px;
                border-radius:10px;
                font-family:'Cabin',Helvetica,Arial,Lucida,sans-serif;
                font-weight: bold;
                margin-bottom: 10px;
                margin-top:40px;
                <?php if($movil==0){ ?>
                    margin-left: 50px;
                  <?php } ?>   
            }
            
            .divTituloResumen{
                font-family: 'Alata',Helvetica,Arial,Lucida,sans-serif;
                font-size: 40px;
                font-weight: bold;
                color:white;
                margin-bottom: 40px!important;
                margin-top:50px!important;
            }
            
            p{
                color: black!important;
            }
            
        </style>


    </head>
    <body>

        <div class="wrap" style='background: #f2f2f2!important;height: 30px!important'>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        
                        <?php if($movil==0){ ?>
                        <div class="reg">
                            <form method="POST" action="salir.php">
                                <button class="btn btn-sm btn-white botonSalir">Cerrar Sesión</button>
                            </form>
                                    <!--<p class="mb-0"><a href="#" class="mr-2">Sign Up</a></p>-->
                        </div>
                        <?php }else{?>
                        
                        <div class="reg">
                                <button onclick="history.back();" class="btn btn-sm btn-danger botonSalir">Regresar</button>
                        </div>
                        <?php }?>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <section class="ftco-section testimony-section img" style="background-image: url(../images/selva.jpg); opacity: 0.9;height: <?php if($movil==0){ ?> 1500px!important <?php }else{ ?> 2000px!important <?php }?>">
            <div class="overlay"></div>
            
            <div class="container">

                <div class="row justify-content-center mb-5">
                    <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
                        
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <center>
                                    <div class="divanio">Año <?php echo $_GET['anio']; ?></div>
                                </center>
                            </div>  
                            <div class="col-md-12"> 
                                <div id='divLineaTiempo' style='display:none'>
                                <a id='hrefLink' target="_blank" href='#'>
                                    
                                <?php if($movil==0){ ?>    
                                
                                    <button class='btn btn-success' style='margin-top:-270px!important;margin-left:900px!important;border-radius:10px;border:none;color:white!important;background:rgba(255,0,38,0.89)!important'>
                                        <i class="fa fa-download" aria-hidden="true"></i> Descargar línea de tiempo
                                    </button>
                                
                                <?php }else{?>    
                                
                                    <button class='btn btn-success' style='margin-top:-320px!important;border-radius:10px;border:none;color:white!important;background:rgba(255,0,38,0.89)!important'>
                                        <i class="fa fa-download" aria-hidden="true"></i> Descargar línea de tiempo
                                    </button>
                                
                                <?php }?>
                                    
                                </a>    
                                </div>    
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4"> <div class="divubigeo"> <p id="labelDepartamento"></p> </div> </div>
                            <div class="col-md-4"> <div class="divubigeo"> <p id="labelProvincia"></p> </div> </div>
                            <div class="col-md-4"> <div class="divubigeo"> <p id="labelDistrito"></p> </div> </div>
                        </div>
                        
                        <h2 class="mb-2" style="font-family:calibri;"><?php echo $_GET['muni']; ?></h2>
                        
                        <div class="col-md-12">
                            <div class="col-md-4"> <div class="divpresupuesto"> <p id="labelPresupuesto"></p> <p> Presupuesto Actualizado de Inversiones (PIM)</p> </div> </div>
                            <div class="col-md-4"> <div class="divejecucion"> <p id="labelEjecucion"></p> <p> Ejecución de inversiones (Devengado)</p> </div> </div>
                            <div class="col-md-4"> <div class="divTotalProyecto"> <p id="labelTotalProyecto"></p> </div> </div>
                        </div>
                    
                        
                        <div class="col-md-12">
                            <div class="col-md-4"> <div class="divinicialinversion"> <p id="labelInicialInversion"></p> <p> Presupuesto Inicial de Inversiones (PIA)</p> </div> </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="col-md-8"> <div class="divavancefinanciero"> <p id="labelAvance" style="color:white!important"></p> </div> </div>
                            <div class="col-md-4"> <div class="divinversionpim"> <p id="labelInversionPIM"></p> </div> </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="col-md-8"> <div class="divrubros"> <p style="color:black!important;font-size:22px!important"><u>Presupuesto por Rubro</u></p> <p id="labelRubros" style="color:black!important"></p> </div> </div>
                            <div class="col-md-4"> <div class="divpresupuestofuncion"> <p style="color:black!important;font-size:22px!important">Presupuesto por Función</p> <p id="presupuestoFuncion" style="color:white!important"></p> </div> </div>
                            <div class="col-md-4"> <div class="divotros"> <p id="labelotros" style="color:white!important"></p> </div> </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <div class="col-md-1"> </div>
                            <div class="col-md-4"> <div class="divdatosmontos"> <p id="labelDatosMontos"></p> </div> </div>
                            <div class="col-md-1"> </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        
        <section class="ftco-section" style="background:#001424!important">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" id="resultado"></div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>    

        <script>

            $("#resultado").load("../src/controller/consulta.php",
                    {
                        muni_resumen: '1',
                        anio_detalle: '<?php echo $_GET['anio']; ?>',
                        muni_detalle: '<?php echo $_GET['muni']; ?>',
                        pre: '<?php echo $_GET['pre'] ?>',
                        mes: '<?php echo $_GET['mes'] ?>'
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
  
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    
</html>
