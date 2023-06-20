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
    <title>Ejecución del gasto</title>
    <meta http-equiv="content-type" content="text/plain; charset=UTF-8" />
    <meta name="google" content="notranslate">
    <!-- Agregado de Template -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- FIN DATA TABLE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="../dom/js/js1.12.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <style>
        body {
            background: #eeeeee;
        }

        #panelPrincipal {
            width: 90% !important;
            margin: 0 auto;
        }

        .panelTitulo {
            background: white !important;
        }

        .tituloCentral {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .controlFiltro {
            background: #FDFDFD;
        }

        .nombreFiltro {
            font-weight: bold;
            color: black;
            font-size: 18px;
        }

        select {
            height: 30px !important;
            font-size: 10px !important;
        }

        .panelHeading {
            font-size: 11px !important;
            font-weight: normal;
        }


        .botonFiltrado {
            font-size: 10px;
            font-weight: bold;
            color: black;
            border-radius: 10px !important;
            background: #1DB2EC !important;
            border-color: #1DB2EC !important;
        }

        .botonFiltro {
            font-size: 10px;
            font-weight: bold;
            color: black;
            width: 140px !important;
            margin-right: 12px !important;
            border-radius: 10px !important;
            background: #1DB2EC !important;
            border-color: #1DB2EC !important;
        }

        .botonVer {
            font-size: 11px;
        }

        .tablaResultado {
            font-size: 10px !important;
        }

        .cabeceraTabla {
            font-size: 12px !important;
        }

        table {
            border-style: solid;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px
        }

        table>thead>tr>th {
            border-bottom: 1px solid black !important;
        }

        table>thead>tr>th {
            border-bottom: 1px solid black !important;
            border-top: 1px solid black !important;
        }

        table>tbody>tr>td {
            vertical-align: middle;
        }

        .borrarFiltro {
            font-size: 11px;
            text-decoration: underline;
            cursor: pointer;
        }

        .botonExcel {
            font-size: 11px;
        }

        .botonSalir {
            font-size: 11px !important;
            width: 150px !important;
        }

        .watermark {
            opacity: 0.8;
            color: #00407d;
            z-index: 1000000;
        }

        .botonExcelDescarga {
            height: 48px !important;
        }

        .wrapper1,
        .wrapper2 {
            width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
        }

        .wrapper1 {
            height: 20px;
            margin-bottom: 20px;
        }

        .wrapper2 {
            height: auto;
        }

        .div1 {
            width: 160%;
            height: 20px;
        }

        .div2 {
            width: 200%;
            overflow: auto;
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

        $(document).ready(function () {


            $("#btnFuncion").click(function () {
                filtrar(1);
            });
            $("#btnCategoriaPresupuestal").click(function () {
                filtrar(2);
            });
            $("#btnProyecto").click(function () {
                filtrar(3);
            });
            $("#btnDivisionFuncional").click(function () {
                filtrar(4);
            });
            $("#btnGrupoFuncional").click(function () {
                filtrar(5);
            });
            $("#btnFuente").click(function () {
                filtrar(6);
            });
            $("#btnRubro").click(function () {
                filtrar(7);
            });
            $("#btnTipoRecurso").click(function () {
                filtrar(8);
            });
            $("#btnGenerica").click(function () {
                filtrar(9);
            });
            $("#btnSubgenerica").click(function () {
                filtrar(10);
            });
            $("#btnDetalleSubgenerica").click(function () {
                filtrar(11);
            });
            $("#btnEspecifica").click(function () {
                filtrar(12);
            });
            $("#btnDetalleEspecifica").click(function () {
                filtrar(13);
            });
            $("#btnMes").click(function () {
                filtrar(14);
            });




            function filtrar(tipoVista) {


                /* ** tabla existe ** */
                if (document.getElementById("tablaDatos") !== null) {

                    var radioSel = $("input[name='radioGrupo']:checked").data('name');
                    var radioNum = $("input[name='radioGrupo']:checked").data('num');

                    if (radioSel !== undefined) {

                        var tipoFiltro = $("#controlTipo").val();

                        if (tipoFiltro === "1") { /* solo proyecto */

                            $("#divDatos").load("../src/controller/consulta.php",
                                {
                                    resultado: '1',
                                    anio: $("#controlAnio").val(),
                                    dpto: $("#controlDpto").val(),
                                    prov: $("#controlProv").val(),
                                    mun: $("#controlMuni").val(),
                                    muniFiltrada: $("#muniFiltrada").val(),
                                    radioSel: radioSel,
                                    tipoVista: tipoVista,
                                    ultimaColumna: $("#ultimaColumna").val(),
                                    quitar: "",
                                    t_pia: $("#pia_" + radioNum).val(),
                                    t_pim: $("#pim_" + radioNum).val(),
                                    t_certificacion: $("#certificacion_" + radioNum).val(),
                                    t_compromiso: $("#compromiso_" + radioNum).val(),
                                    t_atencion: $("#atencion_" + radioNum).val(),
                                    t_devengado: $("#devengado_" + radioNum).val(),
                                    t_girado: $("#girado_" + radioNum).val(),
                                    t_avance: $("#avance_" + radioNum).val()
                                });

                            /* zona resumen municipalidad */
                            $("#zonaCard").load("../src/controller/consulta.php",
                                {
                                    resumen_municipalidad: '1',
                                    anio: $("#controlAnio").val()
                                }
                            );
                            /* *** */
                        }
                        else { /* actividad/proyecto */

                            $("#divDatos").load("../src/controller/consulta.php",
                                {
                                    resultado_actividad: '1',
                                    anio: $("#controlAnio").val(),
                                    dpto: $("#controlDpto").val(),
                                    prov: $("#controlProv").val(),
                                    mun: $("#controlMuni").val(),
                                    muniFiltrada: $("#muniFiltrada").val(),
                                    radioSel: radioSel,
                                    tipoVista: tipoVista,
                                    ultimaColumna: $("#ultimaColumna").val(),
                                    quitar: "",
                                    t_pia: $("#pia_" + radioNum).val(),
                                    t_pim: $("#pim_" + radioNum).val(),
                                    t_certificacion: $("#certificacion_" + radioNum).val(),
                                    t_compromiso: $("#compromiso_" + radioNum).val(),
                                    t_atencion: $("#atencion_" + radioNum).val(),
                                    t_devengado: $("#devengado_" + radioNum).val(),
                                    t_girado: $("#girado_" + radioNum).val(),
                                    t_avance: $("#avance_" + radioNum).val()
                                }
                            );
                        }

                    }
                    else {
                        alert("Marcar una opción");
                    }
                }
            }



            $("#borrarFiltro").click(function () {

                $("#divDatos").load("../src/controller/consulta.php",
                    {
                        borrarFiltro: '1',
                    });

            });


            $("#btnResultado").click(function () {

                var tipoFiltro = $("#controlTipo").val();

                if (tipoFiltro === "1") { /* SOLO PROYECTOS */


                    $("#divDatos").load("../src/controller/consulta.php",
                        {
                            resultado: '1',
                            anio: $("#controlAnio").val(),
                            dpto: $("#controlDpto").val(),
                            prov: $("#controlProv").val(),
                            mun: $("#controlMuni").val(),
                            muniFiltrada: $("#muniFiltrada").val(),
                            radioSel: "",
                            tipoVista: "",
                            ultimaColumna: "",
                            quitar: ""
                        });

                    /* zona resumen municipalidad */
                    $("#zonaCard").load("../src/controller/consulta.php",
                        {
                            resumen_municipalidad: '1',
                            anio: $("#controlAnio").val()
                        }
                    );
                    /* *** */
                }
                else if (tipoFiltro === "3") {

                    /* ACTIVIDADES/PROYECTOS */
                    $("#divDatos").load("../src/controller/consulta.php",
                        {
                            resultado_actividad: '1',
                            anio: $("#controlAnio").val(),
                            dpto: $("#controlDpto").val(),
                            prov: $("#controlProv").val(),
                            mun: $("#controlMuni").val(),
                            muniFiltrada: $("#muniFiltrada").val(),
                            radioSel: "",
                            tipoVista: "",
                            ultimaColumna: "",
                            quitar: ""
                        }
                    );

                    /* limpiar zona card */
                    $("#zonaCard").load("../src/controller/consulta.php",
                        {
                            resumen_municipalidad: '1',
                            anio: '1900'
                        }
                    );

                }
                else {

                    /* PROYECTOS PRIORIZADOS */
                    $("#divDatos").load("../src/controller/consulta.php",
                        {
                            resultado_proyecto: '1',
                            anio: $("#controlAnio").val(),
                            dpto: $("#controlDpto").val(),
                            prov: $("#controlProv").val(),
                            mun: $("#controlMuni").val()
                        }
                    );

                    /* limpiar zona card */
                    $("#zonaCard").load("../src/controller/consulta.php",
                        {
                            resumen_municipalidad: '1',
                            anio: '1900'
                        }
                    );

                }

            });


            $("#lbFuncion").click(function () {
                regresarFiltro("FUNCION");
            });
            $("#lbCategoriaPresupuestal").click(function () {
                regresarFiltro("CATEGORIA_PRESUPUESTAL");
            });
            $("#lbProyecto").click(function () {
                regresarFiltro("PROYECTO");
            });
            $("#lbDivisionFuncional").click(function () {
                regresarFiltro("DIVISION_FUNCIONAL");
            });
            $("#lbGrupoFuncional").click(function () {
                regresarFiltro("GRUPO_FUNCIONAL");
            });
            $("#lbFuente").click(function () {
                regresarFiltro("FUENTE");
            });
            $("#lbRubro").click(function () {
                regresarFiltro("RUBRO");
            });
            $("#lbTipoRecurso").click(function () {
                regresarFiltro("TIPO_RECURSO");
            });
            $("#lbGenerica").click(function () {
                regresarFiltro("GENERICA");
            });
            $("#lbSubgenerica").click(function () {
                regresarFiltro("SUBGENERICA");
            });
            $("#lbDetalleSubgenerica").click(function () {
                regresarFiltro("DETALLE_SUBGENERICA");
            });
            $("#lbEspecifica").click(function () {
                regresarFiltro("ESPECIFICA");
            });
            $("#lbDetalleEspecifica").click(function () {
                regresarFiltro("DETALLE_ESPECIFICA");
            });
            $("#lbMes").click(function () {
                regresarFiltro("MES");
            });



            function regresarFiltro(filtro) {


                var tipoFiltro = $("#controlTipo").val();

                if (tipoFiltro === "1") { /* solo proyecto */

                    $("#divDatos").load("../src/controller/consulta.php",
                        {
                            resultado: '1',
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

                    /* zona resumen municipalidad */
                    $("#zonaCard").load("../src/controller/consulta.php",
                        {
                            resumen_municipalidad: '1',
                            anio: $("#controlAnio").val()
                        }
                    );
                    /* *** */
                }
                else { /* actividad/proyecto */

                    $("#divDatos").load("../src/controller/consulta.php",
                        {
                            resultado_actividad: '1',
                            anio: $("#controlAnio").val(),
                            dpto: $("#controlDpto").val(),
                            prov: $("#controlProv").val(),
                            mun: $("#controlMuni").val(),
                            muniFiltrada: $("#muniFiltrada").val(),
                            radioSel: "",
                            tipoVista: "",
                            ultimaColumna: $("#ultimaColumna").val(),
                            quitar: filtro
                        }
                    );
                }

            }

        });


    </script>

</head>

<body>

    <header>
        <?php include_once 'cabecera.php'; ?>
    </header>

    <section class="ftco-section">
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-12 d-flex" id="zonaCard">

                </div>
            </div>
        </div>
    </section>


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


    <section>
    <?php include_once 'ejecucion_gasto.php'; ?>
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
                                <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
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

                        <p class="mb-0" style="color: rgba(255,255,255,.5);">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved by <a
                                href="https://colorlib.com" target="_blank">Marco Lógico</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>

        $("#zonaCard").load("../src/controller/consulta.php",
            {
                resumen_municipalidad: '1',
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