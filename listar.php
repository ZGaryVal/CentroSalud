<?php
include 'config\conexion.php';
$con = conexion();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lotes y Servicios</title>
  </head>
  <style>

body{
    background-color:rgb(211, 211, 211);
}

/*  Botones del menu*/

.btna{
  background-color: #26BD97;
    width: 100%;
    height: 50px;
  }

  /* Botones de la tabla */
  .btn-info{
    margin-left:10%;
  background-color: #26BD97;
    width: 80%;
    border-radius: 48px 48px 48px 48px;
-moz-border-radius: 48px 48px 48px 48px;
-webkit-border-radius: 48px 48px 48px 48px;
border: 0px solid #000000;
  }



/* Cabecera de logo y nombre */
.parents {
  display: grid;
grid-template-columns: repeat(6, 1fr);
grid-template-rows: 1fr;
grid-column-gap: 0px;
grid-row-gap: 0px;
}

.divh1 { grid-area: 1 / 1 / 2 / 2; }
.divh2 { 
    grid-area: 1 / 2 / 2 / 7; 
    padding-top:40px;
    padding-left:150px;
    -webkit-text-stroke: 1px white;
    font-size: 300%;
    font-family: 'Trebuchet MS';
  }

.top{
    padding: 10px;
    background-color: #16705A;
  }



/* Menu y Contenido */

.izq{
    float: left;
    width: 20%;
    height: max-content;
    background-color:#3D7063;
  }
  .der{
    float: right;
    width: 80%;
    height: 100%;
    
  }

  /* TABLA */
  table {
        font-family: 'Trebuchet MS';
        border-collapse: collapse;
        width: 100%;
      }
      
      td, th {
        border: 1px solid #126B4C;
        text-align: left;
        padding: 8px;
        background-color: #326B57;
      }
    
    /* texto */
    .title{
        font-size: 50px;
        font-family: 'Trebuchet MS';
        color: white;
        -webkit-text-stroke: 2px #326B57;
    }
/* titulo y busqueda */
    .izq2{
    float: left;
    width: 50%;
  }
  .der2{
    float: right;
    width: 40%;
  }
/* busqueda */
  .izq3{
    float: left;
    width: 70%;
  }
  .der3{
    float: right;
    width: 20%;
  }
</style>
  <body>
    <!-- HEADER -->
      <div class='top'>
        <div class="parents">
          <div class="divh1"> 
          <img src="img/logo.png" alt="Centro de Salud LOTES Y SERVICIOS" height='150px'>
          </div>
          <div class="divh2"> 
            <p>CENTRO DE SALUD LOTES Y SERVICIOS</p>
          </div>
        </div>
      </div>

<!-- Menu LATERAL -->

<div class="pagina">
  <div class="izq">
  <br><br>
  
  <a type="button"  href="index.php" style='padding-top:10px;' class="btna btn btn-success">Pacientes</a>
<br><br>
<a type="button"  href="listar.php" style='padding-top:10px;' class="btna btn btn-success">Registros medicos</a>
<br><br>
<a type="button"  href="galeria.php" style='padding-top:10px;' class="btna btn btn-success">Galeria</a>
<br><br>
<a type="button"  href="" style='padding-top:10px;' class="btna btn btn-success">Configuración</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a type="button"  href="" style='padding-top:10px;' class="btna btn btn-success">Salir</a>
  </div>


  <!-- CONTENIDO -->
  <div class="der">
    <div class="container">
    <br>

    <div class="izq2">
        <!-- TITULO -->
    <p class='title'>Registros medicos</p>
    </div>
    <div class="der2">
        <!-- BARRA DE BUSQUEDA -->
        <div class="izq3">
            <input style='padding-top:10px;margin-top:5px;' class="form-control" type="search" placeholder="Nombre o CI" aria-label="Search">
        </div>
        <div class="der3">
        <button style='margin-top:10px;background-color:white;' class="btn btn-outline-success " type="submit">Buscar</button>
        </div>
    </div>
<br>

    <!-- tabla -->
<table class='table table-success table-striped'>
  <thead>
    <tr>
        <th>#</th>
        <th>Nombre paciente</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Total de citas</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select * from fn_listar_registros_medicos()";
    $obj = pg_query($con,$sql);
    $i = 0;
    while ($fila = pg_fetch_array($obj)){
       
        $i++;
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$fila[1]?></td>
            <td><?=$fila[2]?></td>
            <td><?=$fila[3]?></td>
            <td><?=$fila[4]?></td>
            <td><a type="button" class="btn-info" href="listarpaciente.php?t=<?=$fila[0]?> "><button type="button" class="btn btn-info">Ver historial</button></a></td>
        </tr>
        <?php
    }
    ?>
  </tbody>
</table>
 <!-- fin tabla -->
    </div>

  </div>
</div>


  </body>
</html>