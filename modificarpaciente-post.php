<?php
include 'config\conexion.php';
$con = conexion();

$idp=$_POST["idp"];
$nombre = $_POST["nombre"];
$apellido_pat = $_POST["apellido_pat"];
$apellido_mat = $_POST["apellido_mat"];
$ci = $_POST["ci"];
$feccre = $_POST["feccre"];
$numtelf = $_POST["numtelf"];
$genero = $_POST["genero"];

if($nombre=='' || $apellido_pat=='' || $apellido_mat=='' || $ci=='' || $feccre=='' || $numtelf=='' || $genero==''){
    header ("location:modificarpaciente-error.php?t=".$idp);
    return;
}

switch ($genero) {
    case '1':
        $genero='M';
        break;
    case '2':
        $genero='F';
        break;
    default:
        $genero='';
        break;
}

$sql = "UPDATE public.pacientes
        SET ci_paciente='$ci', nombre_paciente='$nombre', apellido_pat_paciente='$apellido_pat',
            apellido_mat_paciente='$apellido_mat', fecha_nacimiento='$feccre',
            genero='$genero', num_referencia='$numtelf'
        WHERE id_paciente='$idp';";

//echo $sql;

pg_query($con,$sql);

//header ("location:modificarpaciente.php?t=".$idp);

header ("location:index-notice-mod.php");
?>