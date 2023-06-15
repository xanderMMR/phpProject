<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function connect(){

    $file = parse_ini_file('bd.properties');
    
    $host = $file['host'];
    $port = $file['port'];
    $dbname = $file['db'];
    $user = $file['user'];
    $pass = $file['password'];
    
    $con = mysqli_connect($host, $user, $pass, $dbname, $port); 
    mysqli_set_charset($con,'utf8');

    return $con;
}
