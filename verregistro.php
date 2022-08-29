<?php
include 'config\conexion.php';
$con = conexion();
?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

<h2>HTML Table</h2>

<table>
  <thead>
    <tr>
        <th>#</th>
        <th>Nombre paciente</th>
        <th>Diagnostico</th>
        <th>Fecha</th>
        <th>Diagnostico final</th>
        <th>imagen</th>
    </tr>
  </thead>
  <tbody>
    <?php
   $id_registro = $_GET["t"];
   $sql = 'select * from fn_mostrar_detalle_registro('.$id_registro.');';
   $obj = pg_query($con,$sql);
    $i = 0;
    while ($fila = pg_fetch_array($obj)){
       
        $i++;
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$fila[1]?></td>
            <td><?=$fila[4]?></td>
            <td><?=$fila[5]?></td>
            <td><?=$fila[6]?></td>
            <td><img src="<?=$fila[7]?>" alt="Girl in a jacket" width="100" height="100"></td>
        </tr>
        <?php
    }
    ?>
  </tbody>
</table>

</body>
</html>