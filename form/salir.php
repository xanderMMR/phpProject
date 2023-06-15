<?php
if(!isset($_SESSION))session_start();

session_unset();
unset($_SESSION['acceso_usuario']);
session_destroy();
header("location: acceso.php");

