<?php 
if(!isset($_SESSION))session_start();
$movil=0;
if(isset($_GET['movil'])){
    $movil=1;
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
        <title>Consulta Amigable</title>
        <link rel="stylesheet" href="../dom/css/notificacion.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script type="text/javascript" src="../dom/js/js1.12.js"></script>
        <link rel="stylesheet" href="../dom/css/login-css.css">
        
    </head>
    <body>

        <div id="divlogin" style="display:none"></div>
       
        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div id="bg-image" class="col-md-12 col-xl-6 d-none d-md-flex"></div>


                <!-- The content half -->
                <div class="col-md-12 col-xl-6 bg-light panelLogin">
                    <div class="container-login">

                        <!-- Demo content-->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-xl-7 mx-auto">
                                    <h3 class="display-4">Acceso a consultas</h3>
                                    <p class="text-design mb-4">Por favor ingrese sus credenciales</p>
                                    
                                    <?php if(isset($_GET['movil'])){ ?>
                                    <form method="POST" action="./../src/controller/login.php?movil=1">
                                    
                                    <?php }else{?>
                                    <form method="POST" action="./../src/controller/login.php">
                                    <?php }?>
                                    
                                    
                                        <input type='hidden' name='movil' value='<?php echo $movil ?>'>
                                        <div class="form-group mb-3">
                                            <input autocomplete="off" id="inputEmail" name="correo" type="email" placeholder="Correo electrónico" autofocus="" class="input-form form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="inputPassword" name="clave" type="password" placeholder="Clave" class="input-form form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        </div>
                                        <!--
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                            <label for="customCheck1" class="custom-control-label">Remember password</label>
                                        </div>
                                        -->
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm buttonLogin">Ingresar</button>
                                        <!--<div class="text-center d-flex justify-content-between mt-4">
                                            <p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted"> 
                                            <u>Boostrapious</u></a>
                                            </p>
                                        </div>-->
                                        
                                        <?php if(isset($_SESSION['msj_login'])){ ?>
                                        <div class="alert alert-danger" role="alert">
                                            Credenciales incorrectas
                                        </div>
                                        <?php }?>
                                        <?php unset($_SESSION['msj_login']); ?>
                                        
                                        
                                        <div class="col-md-12">
                                            <label class="labelRegistro"><a data-toggle="modal" data-target="#loginModal">Regístrate aquí</a></label>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labelRegistro"><a data-toggle="modal" data-target="#loginRecuperar">Recuperar contraseña</a></label>
                                        </div>
                                        

                                    </form>
                                </div>
                                
                            </div>
                        </div><!-- End -->

                    </div>
                </div><!-- End -->

                
                <div class="notification">
                    <span class="icon">
                        <i class=""></i>
                    </span>
                    <span class="text"></span>
                    <span class="close"><i class="fa fa-close"></i></span>
                </div>

                <section class="buttons" style="display:none">
                    <button id="info">Info</button>
                    <button id="warn">Warning</button>
                    <button id="error">Fatal</button>
                    <button id="errorLogin">Fatal</button>
               </section>
                
            </div>
        </div>



        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        
                        <button type="button" id="cerrarModal" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-left tituloLogin">
                            <h5 class="h5titulo"> Crear cuenta de usuario </h5>
                            <hr class="lineaLogin" color="green">
                        </div>
                        <div class="d-flex flex-column text-center panelRegistro">
                            
                            <div class="col-md-12">&nbsp;</div>
                            <div class="form-group">
                                <input maxlength="50" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="nombre" placeholder="Nombre" onkeypress="return letra(event)">
                                <label class="obligatorio" id="l_nombre"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="50" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="paterno" placeholder="Apellido Paterno" onkeypress="return letra(event)">
                                <label class="obligatorio" id="l_paterno"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="50" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="materno" placeholder="Apellido Materno" onkeypress="return letra(event)">
                                <label class="obligatorio" id="l_materno"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="8" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="dni" placeholder="DNI" onkeypress="return numero(event)">
                                <label class="obligatorio" id="l_dni"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="15" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="telefono" placeholder="Teléfono" onkeypress="return numero(event)">
                                <label class="obligatorio" id="l_telefono"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="100" onpaste="return false" autocomplete="off" type="text" class="form-control inputAcceso" id="correo" placeholder="Correo electrónico" onkeypress="return alfanum(event)">
                                <label class="obligatorio" id="l_correo"></label>
                            </div>
                            <div class="form-group">
                                <input maxlength="50" onpaste="return false" autocomplete="off" type="password" class="form-control inputAcceso" id="clave" placeholder="Clave">
                                <label class="obligatorio" id="l_clave"></label>
                            </div>
                            <div class="form-group">
                                <select class="form-control inputAcceso" id="municipalidad">
                                    <option value="-1">Seleccione una municipalidad</option>
                                    <option value="-2">OTRO</option>
                                </select>
                                <label class="obligatorio" id="l_muni"></label>
                            </div>
                            <div class="form-group" id="divOtro" style="display:none">
                                <input maxlength="100" onpaste="return false" autocomplete="off" type="text" class="form-control" id="otro" placeholder="Ingresar nombre" onkeypress="return letra(event)">
                                <label class="obligatorio" id="l_otro"></label>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <button type="button" id="buttonRegister" class="btn btn-info btn-block btn-round inputAcceso">Registrarme</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="loginRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        
                        <button type="button" id="cerrarModal" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-left tituloLogin">
                            <h5 class="h5titulo"> Recuperar mi contraseña </h5>
                            <hr class="lineaLogin" color="green">
                        </div>
                        <div class="d-flex flex-column text-center panelRegistro">
                            
                            <div class="col-md-12">&nbsp;</div>
                            <div class="form-group">
                                <input maxlength="50" onpaste="return false" autocomplete="off" type="text" class="form-control inputRecuperar" id="correoRegistrado" placeholder="Ingrese su correo electrónico registrado" onkeypress="return alfanum(event)">
                                <label class="obligatorio" id="l_correoRegistrado"></label>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <button type="button" id="buttonRecuperar" class="btn btn-info btn-block btn-round inputAcceso">Recuperar</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       
        
        <script type="text/javascript" src="../dom/js/notificacion.js"></script>

        <script>
        
            $("#municipalidad").load( "../src/controller/login.php", 
                { listaMuni: 'registro'
                } 
            );
        
        </script>
        
    </body>
</html>
