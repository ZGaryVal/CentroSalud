<?php
include 'config\conexion.php';
$con = conexion();

$nombre = $_POST["nombre"];
$apellido_pat = $_POST["apellido_pat"];
$apellido_mat = $_POST["apellido_mat"];
$ci = $_POST["ci"];
$feccre = $_POST["feccre"];
$numtelf = $_POST["numtelf"];
$genero = $_POST["genero"];

if($nombre=='' || $apellido_pat=='' || $apellido_mat=='' || $ci=='' || $feccre=='' || $numtelf=='' || $genero==''){
    header ("location:error.php");
}

switch ($genero) {
    case '1':
        $genero='M';
        break;
    case '2':
        $genero='F';
        break;
    case '2':
        $genero='';
        break;
}

$sql = "
    INSERT INTO public.pacientes(
     ci_paciente, nombre_paciente, apellido_pat_paciente, apellido_mat_paciente, fecha_nacimiento, genero, num_referencia)
	VALUES ('$ci', '$nombre', '$apellido_pat', '$apellido_mat', '$feccre', '$genero', '$numtelf');
    ";

/*
$sql="INSERT INTO pacientes(
	ci_paciente, nombre_paciente, apellido_pat_paciente, apellido_mat_paciente, fecha_nacimiento, genero, num_referencia)
	VALUES ('1000007', 'Fernan', 'Cortez', 'Gonzales', '2000-01-07', 'M', 66045854);";

echo $sql;
*/
pg_query($con,$sql);
header ("location:index-notice.php");

?>