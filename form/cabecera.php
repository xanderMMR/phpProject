<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../dom/css/cabecera.css">
    <link rel="stylesheet" href="../dom/css/global.css">
</head>

<body>
    <nav class="navbar nv-header" style="margin:0px">
        <div class="container">
            <button class="navbar-toggler toggler-button btn-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item nav-ejec">
                        <a class="nav-link font-link" href="consulta.php">EJECUCIÓN DEL GASTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-link" href="seguimiento.php">SEGUIMIENTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-link" href="transferencia.php">TRANSFERENCIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-link" href="ingreso.php">INGRESOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-link" href="proyectos.php">PROYECTOS</a>
                    </li>
                    <div>

                    </div>
                </ul>
            </div>
            <!-- <label class="font-time">
                <?php date_default_timezone_set('America/Lima'); ?>
                Fecha:
                <?php echo date('d/m/Y') ?>
            </label> -->
            <div class="reg">
                <form method="POST" action="salir.php">
                    <button class="btn  botonSalir">
                        <b>CERRAR SESIÓN</b>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<div class="hero-wrap" style="background-image: url('../images/juas.jpg');height: 450px!important"
    data-stellar-background-ratio="0.5">

    <div class=""></div>
    <div style="color:white!important;margin-left:20px;font-size:15px;font-weight:bold">
        <br><br><br><br>
        La información ha sido recogida de los aplicativos desarrollados por el Ministerio de Economía y Finanzas
        <br>
        y con información actualizada al:
        <?php

        $fecha_actual = date("d-m-Y");
        echo date("d-m-Y", strtotime($fecha_actual . "- 2 days"));

        //echo $_SESSION['fecha_update']; 
        ?>
        <br><br>
        - Consulta Amigable
        <br>
        - Consulta de Ejecución del Gasto
        <br>
        - Consulta de Seguimiento de ejecución de Proyectos de Inversión
        <br>
        - Sistema de Seguimiento de Inversiones
        <br>
        - Consulta de Transferencias a los Gobiernos Nacional, Regional, Local y EPS
        <br>
        - Consulta Amigable de Ingresos Presupuesto y Ejecución de Ingresos

    </div>
</div>