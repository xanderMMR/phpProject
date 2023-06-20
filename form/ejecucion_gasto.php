<!DOCTYPE html>
<html>

<head>
    <title>Ejecución del gasto</title>
    <link rel="stylesheet" href="../dom/css/ejecucion_gasto.css">

</head>

<body>
    <section class="ftco-section fondo-row-table">

        <div class="row row-table">

            <div class="col-md-12">
                <center>
                    <label style="font-size:30px;color:#002747"><b>EJECUCIÓN DEL GASTO</b></label>
                </center>
            </div>


            <div class="col-md-12">
                <div class="col-md-12">
                    <a href="../src/controller/consulta.php?reporte">
                        <button class="btn btn-success btn-descarga">Descargar base de datos completa</button>
                    </a>
                </div>
            </div>
            
            <div class="row" style="margin-top:2%">

                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-xs-6 ">
                    <label class="nombreFiltro">Año</label>
                    <br>
                    <select class="form-select nombreFiltro" id="controlAnio" style="font-size:15px!important">
                        <?php for ($i = 2015; $i <= date('Y'); $i++) { ?>
                            <option <?php if (date('Y') == $i) {
                                echo "selected";
                            } ?>><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <script>
                              // $("#controlAnio option").eq(1).before($("<option></option>").val("2015,2016,2017,2018").text("2015 - 2018"));
                              // $("#controlAnio option").eq(6).before($("<option></option>").val("2019,2020,2021").text("2019 - 2021"));
                    </script>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                    <label class="nombreFiltro">&nbsp;</label>
                    <select id="controlTipo" class="form-select nombreFiltro" style="font-size:15px!important">
                        <option value="1">Sólo Proyectos</option>
                        <option value="2">Proyectos Priorizados</option>
                        <!--<option value="3">Actividades/Proyectos</option>-->
                    </select>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                    <br>
                    <button class="btn btn-success btn-filtro"
                        style="width:150px;margin-top:12px;height:48px;background:#002747!important;border-color:#002747!important"
                        id="btnResultado">Ver resultado</button>
                    &nbsp;&nbsp;
                    <button class="btn btn-success btn-filtro"
                        style="width:150px;margin-top:12px;height:48px;background: rgba(255,0,38,0.89)!important;border:none"
                        id="borrarFiltro">Borrar filtros</button>
                </div>
                
            </div>    

            <div class="row" style="margin-top: 3%">
                    <br>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6">
                        <div class="panel panel-info">
                            <div class="panel-heading panelHeading" style="background:#002747!important;"><label
                                    class="nombreFiltro" style="color:white!important">¿Quién gasta?</label></div>
                            <div class="panel-body row">
    
                                <div class="col-md-12">
                                    <label class="nombreFiltro">Departamento</label>
                                    <select class="form-select nombreFiltro" id="controlDpto"
                                        style="font-size:15px!important">
                                        <option value="-1">TODOS</option>
                                        <?php if (isset($_SESSION['cboDpto'])) { ?>
                                            <?php foreach ($_SESSION['cboDpto'] as $r) { ?>
                                                <option value="<?php echo $r['DEPARTAMENTO'] ?>"><?php echo $r['DEPARTAMENTO'] ?>
                                                </option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="nombreFiltro">Provincia</label>
                                    <select class="form-select nombreFiltro" id="controlProv"
                                        style="font-size:15px!important">
                                        <option value="-1">TODOS</option>
                                    </select>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-12">
                                    <label class="nombreFiltro">Municipalidad</label>
                                    <select class="form-select nombreFiltro" id="controlMuni"
                                        style="font-size:15px!important">
                                        <option value="-1">TODOS</option>
                                    </select>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6" id="divBloque1">
                        <div class="panel panel-info">
                            <div class="panel-heading panelHeading" style="background:#002747!important;">
                                <center>
                                    <label class="nombreFiltro" style="color:white!important">¿En qué gasta?</label>
                                </center>
                            </div>
                            <div class="panel-body row">
    
                                <div class="col-md-12 text-center">
                                    <button id="btnFuncion" class="btn btn-secondary">Función</button>
                                    <center>
                                        <span class="label label-danger" id="lbFuncion"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnCategoriaPresupuestal" class="btn btn-secondary">Categoría
                                        Presupuestal</button>
                                    <center>
                                        <span class="label label-danger" id="lbCategoriaPresupuestal"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnProyecto" class="btn btn-secondary">Proyecto</button>
                                    <center>
                                        <span class="label label-danger" id="lbProyecto"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnDivisionFuncional" class="btn btn-secondary">División Funcional</button>
                                    <center>
                                        <span class="label label-danger" id="lbDivisionFuncional"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnGrupoFuncional" class="btn btn-secondary">Grupo Funcional</button>
                                    <center>
                                        <span class="label label-danger" id="lbGrupoFuncional"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" id="divBloque2">
                        <div class="panel panel-info">
                            <div class="panel-heading panelHeading" style="background:#002747!important;">
                                <center>
                                    <label class="nombreFiltro" style="color:white!important">¿Con qué se financian los
                                        gastos?</label>
                                </center>
                            </div>
                            <div class="panel-body row">
    
                                <div class="col-md-12 text-center">
                                    <button id="btnFuente" class="btn btn-secondary">Fuente</button>
                                    <center>
                                        <span class="label label-danger" id="lbFuente"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnRubro" class="btn btn-secondary">Rubro</button>
                                    <center>
                                        <span class="label label-danger" id="lbRubro"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center" id="divTipoRecurso">
                                    <button id="btnTipoRecurso" class="btn btn-secondary">Tipo de Recurso</button>
                                    <center>
                                        <span class="label label-danger" id="lbTipoRecurso"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6" id="divBloque3">
                        <div class="panel panel-info">
                            <div class="panel-heading panelHeading" style="background:#002747!important;">
                                <center>
                                    <label class="nombreFiltro" style="color:white!important">¿Cómo se estructura el
                                        gasto?</label>
                                </center>
                            </div>
                            <div class="panel-body row">
    
                                <div class="col-md-12 text-center">
                                    <button id="btnGenerica" class="btn btn-secondary">Genérica</button>
                                    <center>
                                        <span class="label label-danger" id="lbGenerica"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnSubgenerica" class="btn btn-secondary">Sub-genérica</button>
                                    <center>
                                        <span class="label label-danger" id="lbSubgenerica"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnDetalleSubgenerica" class="btn btn-secondary">Detalle
                                        sub-genérica</button>
                                    <center>
                                        <span class="label label-danger" id="lbDetalleSubgenerica"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnEspecifica" class="btn btn-secondary">Específica</button>
                                    <center>
                                        <span class="label label-danger" id="lbEspecifica"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
                                <div class="col-md-12 text-center">
                                    <button id="btnDetalleEspecifica" class="btn btn-secondary">Detalle de
                                        específica</button>
                                    <center>
                                        <span class="label label-danger" id="lbDetalleEspecifica"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                                <div class="col-md-12 text-center">&nbsp;</div>
    
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6" id="divBloque4">
                        <div class="panel panel-info">
                            <div class="panel-heading panelHeading" style="background:#002747!important;">
                                <center>
                                    <label class="nombreFiltro" style="color:white!important">¿Cuándo se hizo el
                                        gasto?</label>
                                </center>
                            </div>
                            <div class="panel-body row">
                                <div class="col-md-12 text-center">
                                    <button id="btnMes" class="btn btn-secondary">Mes</button>
                                    <center>
                                        <span class="label label-danger" id="lbMes"
                                            style="display:none;cursor:pointer;width:20px;margin-top:10px">X</span>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
 
            </div>




            <div class="row col-md-12" id="divDatos">
            </div>


            <div class="row" style="padding:20px!important">
            </div>


            <!-- HIDDEN -->
            <input type="hidden" style="color:black!important" id="muniFiltrada">
            <!-- --------->


    </section>
</body>

</html>