<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['acceso_usuario'])) {
    header("location: acceso.php");
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
    <meta http-equiv="content-type" content="text/plain; charset=UTF-8" />
    <meta name="google" content="notranslate">
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="../dom/js/js1.12.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>

    <style>
        body {
            background: #eeeeee;
        }

        .botonSalir {
            font-size: 2em;
        }

        .header-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            flex-direction: row;
        }


        @media (min-width: 1200px) {
            .botonSalir {
                font-size: 1em;
            }
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

        .thumbnail-description {}

        .thumbnail:hover {
            cursor: pointer;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 1);
        }



        .divdatosmontos {

            background: #00AB60;
            border-radius: 20px;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            text-align: center;
            height: 100%;

        }



        .divpresupuesto {
            background: #2784D3;

            height: 100%;

            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            border-radius: 10px;



        }

        .divinicialinversion {
            background: #02C2A2;
            height: 100%;

            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            border-radius: 10px;

        }

        .divejecucion {
            background: #D7D90B;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            border-radius: 10px;
            height: 100%;


        }

        .divTotalProyecto {
            background: #E09DE1;
            padding: 10px;
            border-radius: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            height: 100%;



        }

        .divavancefinanciero {
            background: #FF2C1B;

            height: 100%;

            padding: 10px;
            font-family: 'Cabin',
                Helvetica,
                Arial,
                Lucida,
                sans-serif;
            font-weight: bold;
            border-radius: 20px;
            display: inline-block;
        }

        .divinversionpim {
            background: #5ECFF8;
            height: 100%;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            border-radius: 10px;


        }

        .divpresupuestofuncion {

            background: #9D6AE9;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            height: 100%;

            border-radius: 10px;
        }

        .divotros {

            background: #af8c84;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;

            border-radius: 10px;
            height: 100%;


        }

        .divrubros {
            background: #FFAF50;
            height: 100%;

            padding: 10px;
            border-radius: 10px;
            font-family: 'Cabin',
                Helvetica,
                Arial,
                Lucida,
                sans-serif;
            font-weight: bold;



        }

        .divTituloResumen {
            font-family: 'Alata', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            color: white;
            height: 100%;

        }

        p {
            color: black !important;
        }

        .testimony-section {
            display: inline-block;
            border: 1px solid black;
            width: 100%;
            height: auto;
            background-image: url(../images/selva.jpg);
            opacity: 0.9;
        }

        .btn-lineaTiempo {
            text-align: right;
        }

        .divanio {
            background: #39658E !important;
            border-radius: 20px;
            width: 40%;
            height: auto;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-weight: bold;
            color: white !important;
            font-size: 4em;
            margin-bottom: 5%
        }

        .divubigeo {
            background: rgb(2, 0, 36);
            background: linear-gradient(rgba(93, 247, 96, 1) 0%, rgba(0, 255, 166, 1) 100%);
            border-radius: 20px;
            padding: 10px;
            font-family: 'Cabin', Helvetica, Arial, Lucida, sans-serif;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .detalle-section {
            margin-left: 10%;
            margin-right: 10%;

        }

        .detalle-imagen {
            height: 300px;
        }

        .header-caption {
            height: 50% !important
        }

        .divTituloResumen {
            font-size: 3em;
            margin-bottom: 5%;
            margin-top: 2%;
        }

        .content-body {
            font-size: 2.5em;
        }

        .margin-div {
            margin-bottom: 5%;
            max-height: 100% !important;
        }

        .first-section {
            margin-left: 10%;
            margin-right: 10%
        }

        .btn-lineaTiempo {
            margin-bottom: 3%;
        }

        @media (min-width: 200px) and (max-width: 1023px) {
            .container {
                min-width: 100%;

            }

            .string-municipalidad {
                font-size: 5em;
            }

            .col-md-4 {
                width: 600px;
            }

            .card-content {
                width: 80%;
                margin-bottom: 3%;
            }

            .detalle-section {
                display: flex;
                justify-content: center;
            }

            .detalle-imagen {
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;


            }

            .detalle-imagen {
                height: auto;
            }

            .header-caption {
                height: auto !important
            }

            .header-label {
                font-size: 3em;
            }

            .body-caption {
                font-size: 2.8em;
            }

            .footer-caption {
                font-size: 2.8em;
            }

            .content-body {
                font-size: 3em;
            }

            .row-cabecera {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .btn-descarga {
                font-size: 1.5em;
            }
        }

        @media (min-width: 1024px) {
            .container {
                min-width: 100%;

            }

            .card-content {
                width: 100%;
            }

            .body-caption {
                font-size: 1.5em;
            }

            .footer-caption {
                font-size: 1.5em;
            }

        }
    </style>


</head>

<body>

    <div class="wrap" style='background: #f2f2f2!important;'>
        <div class="container">
            <div class="row header-row">

                <div class="reg">
                    <form method="POST" action="salir.php">
                        <button class="btn btn-white botonSalir">Cerrar Sesión</button>
                    </form>
                    <!--<p class="mb-0"><a href="#" class="mr-2">Sign Up</a></p>-->
                </div>

                <div class="reg">
                    <button onclick="history.back();" class="btn btn-danger botonSalir">Regresar</button>
                </div>



            </div>
        </div>
    </div>

    <section class="ftco-section testimony-section img">
        <div class="overlay">

        </div>

        <div class="container">
            <div class="row first-section">
                <div class="col-md-12 text-center heading-section heading-section-white ftco-animate">
                    <div class="col-md-12">
                        <div id='divLineaTiempo' class="btn-lineaTiempo">
                            <a id='hrefLink' target="_blank" href='#'>
                                <button class='btn btn-success btn-descarga'
                                    style='border-radius:10px;border:none;color:white!important;background:rgba(255,0,38,0.89)!important'>
                                    <i class="fa fa-download" aria-hidden="true"></i> Descargar línea de tiempo
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <center>
                                <div class="divanio">Año
                                    <?php echo $_GET['anio']; ?>
                                </div>
                            </center>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="row row-cabecera">
                            <div class="col-lg-4 col-md-6">
                                <div class="divubigeo">
                                    <p id="labelDepartamento"></p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="divubigeo">
                                    <p id="labelProvincia"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="divubigeo">
                                    <p id="labelDistrito"></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h2 class="mb-2 string-municipalidad" style="font-family:calibri;">
                        <?php echo $_GET['muni']; ?>
                    </h2>
                    <div class="row content-body">
                        <div class="col-lg-6 margin-div">
                            <div class="divpresupuesto">
                                <p id="labelPresupuesto"></p>
                                <p> Presupuesto Actualizado de Inversiones (PIM)</p>
                            </div>
                        </div>
                        <div class="col-lg-6 margin-div">
                            <div class="divejecucion">
                                <p id="labelEjecucion"></p>
                                <p> Ejecución de inversiones (Devengado)</p>
                            </div>
                        </div>
                        <div class="col-lg-6 margin-div">
                            <div class="divTotalProyecto">
                                <p id="labelTotalProyecto"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 margin-div">
                            <div class="divinicialinversion">
                                <p id="labelInicialInversion"></p>
                                <p> Presupuesto Inicial de Inversiones (PIA)</p>
                            </div>
                        </div>
                        <div class="col-lg-12 margin-div">
                            <div class="divavancefinanciero">
                                <p id="labelAvance" style="color:white!important"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 margin-div">
                            <div class="divinversionpim">
                                <p id="labelInversionPIM"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 margin-div">
                            <div class="divrubros">
                                <p style="color:black!important;font-size:22px!important"><u>Presupuesto por
                                        Rubro</u></p>
                                <p id="labelRubros" style="color:black!important"></p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 margin-div">
                            <div class="divpresupuestofuncion">
                                <p style="color:black!important;font-size:22px!important">Presupuesto por Función
                                </p>
                                <p id="presupuestoFuncion" style="color:white!important"></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 margin-div">
                            <div class="divotros">
                                <p id="labelotros" style="color:white!important"></p>
                            </div>
                        </div>
                        <div class="col-lg-12 margin-div">
                            <div class="divdatosmontos">
                                <p id="labelDatosMontos"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <section class="ftco-section" style="background:#001424!important">
        <div class="detalle-section">
            <div class="row" id="resultado"></div>
        </div>
    </section>

    <script>
        $("#resultado").load("../src/controller/consulta.php", {
            muni_resumen: '1',
            anio_detalle: '<?php echo $_GET['anio']; ?>',
            muni_detalle: '<?php echo $_GET['muni']; ?>',
            pre: '<?php echo $_GET['pre'] ?>',
            mes: '<?php echo $_GET['mes'] ?>'
        });
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
</script>
<script src="../js/google-map.js"></script>
<script src="../js/main.js"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

</html>