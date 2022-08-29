<?php 
function conexion(){
	$host = "host=localhost";
	$port = "port=5432";
	$dbname = "dbname=BD_CentroSalud_LyT";
	$user = "user=postgres";
	$password = "password=ZomberGary123";

	$db = pg_connect("$host $port $dbname $user $password");

	return $db;
}
