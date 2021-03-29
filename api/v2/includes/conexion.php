<?php
function buscar_archivo1($path_file,&$val){
 $val=(file_exists($path_file))?1:0;
}
$path_file = '../../admin/scfg.php';
buscar_archivo1($path_file,$val);
if($val==1){
    include '../../admin/scfg.php';
    $path_root_sql = sql_opc('config','path_root','ID',1);
    $page_url_sql  = sql_opc('config','page_url','ID',1);
}else{
    include 'scfg.php';
}

//CONEXION MYSQLI
function conexion(){
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB); //conexión ala base de datos por medio de misqli poo
    if($mysqli->connect_errno > 0){ //si retorna algun error
        return("Imposible conectarse con la base de datos [" . $mysqli->connect_error . "]"); //se muestra el error
    }else{ //si no retorna el error
        $mysqli->query("SET NAMES 'utf8'"); //codifica las consultas a utf-8
        return $mysqli; //retorna la conexión a la base de datos mysql
    }
}
$mysqli=conexion();

//CONEXION PDO
function connect(){
    try {
        $mysqli = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DB.";charset=utf8mb4", DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $mysqli;
    } catch (PDOException $exception) {
        exit($exception->getMessage());
    }
}
$conec=connect();

include 'lib.php';
include 'functions.php';
?>