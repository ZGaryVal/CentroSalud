<?php
include 'config\conexion.php';
$con = conexion();

$id = $_GET["t"];
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
    font-family: 'Trebuchet MS';
}

/*  Botones del menu*/

.btn{
  background-color: #26BD97;
    width: 100%;
    height: 50px;
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

/* Botones de cards */
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

  /* Para botones de cards */

.izq2{
    float: left;
    width: 50%;
  }
  .der2{
    float: right;
    width: 50%; 
  }

/* table */

table {
    font-family: 'Trebuchet MS';
    border-collapse: collapse;
    width: 100%;
  }
  
  td, th {
    border: 1px solid #256B57;
    text-align: left;
    padding: 8px;
  }
  
  tr:nth-child(even) {
    background-color: #40B896;
  }

  /* Cards */

  .title{
    font-size: 40px;
        font-family: 'Trebuchet MS';
        color: white;
        -webkit-text-stroke: 2px black;
    }
    :root {
      --gradient: linear-gradient(to left top, #219630 10%, #0b7923 90%) !important;
    }
    
    
    .card {
      background: rgb(90, 90, 90);
      border: 3px solid #418b16;
      color: rgba(250, 250, 250, 0.8);
      margin-bottom: 2rem;
    }

    .text-white {
      color: aliceblue;
    }

    /* Ficha medica */
    .name{
        border-bottom: solid rgb(70, 189, 96);
      }
      .image{
        padding: 2px;
        background-color: rgb(133, 59, 59);
        border-color: #d1d1d1;
        width: 100%;height: 100%;
      
      }

      .izq3{
    float: left;
    width: 40%;
  }
  .der3{
    float: right;
    width: 60%; 
  }
  .der4{
    float: right;
    width: 2%; 
  }
  .diagnostico{
        background-color: rgb(255, 252, 247);
        color:black;
        padding:10px; 
      }


      /* Form de registro */
      .forms{
        background-color:rgb(149, 202, 144);
        color: black;
        padding:10px;
        border-width: 4px;
        border-style: solid;
        border-image: linear-gradient(to right, rgb(70, 189, 96), rgb(103, 109, 105)) 1;
      }
      .errorcard{
        padding:10px;
        background-color:red;
        color:white;
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

<div class="pagina">
  <!-- izquierda Menu lateral -->
  <div class="izq">
    <br><br>
    <a type="button"  href="index.php" style='padding-top:10px;' class="btn btn-success">Pacientes</a>
    <br><br>
    <a type="button"  href="listar.php" style='padding-top:10px;' class="btn btn-success">Registros medicos</a>
    <br><br>
    <a type="button"  href="galeria.php" style='padding-top:10px;' class="btna btn btn-success">Galeria</a>
    <br><br>
    <a type="button"  href="" style='padding-top:10px;' class="btn btn-success">Configuración</a>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <a type="button"  href="" style='padding-top:10px;' class="btn btn-success">Salir</a>
  </div>
  <!-- derecha Contendio-->
  <div class="der">
      <div class="container">
        <!-- Card de información-->
        <br><br><br>
        <div class="errorcard">
            ERROR: Debe ingresar todos los campos
        </div>
        <div class="forms">
            <div class="name">
                <a href="index.php" class='der4'><button type="button" class=" btn-danger">X</button></a>     
                <h3 class='title'>Modificar paciente</h3>         
            </div>
            <br><br>
            <?php
            $sql = "SELECT * FROM pacientes WHERE id_paciente = '$id';";
            $obj = pg_query($con,$sql);
            $fila = pg_fetch_array($obj);
            
            $ci = $fila[1];
            $nombre = $fila[2];
            $apellido_pat = $fila[3];
            $apellido_mat = $fila[4];
            $feccre = $fila[5];
            $numtelf = $fila[7];
            $genero = $fila[6];

            switch ($genero) {
              case 'M':
                  $genero='Hombre';
                  break;
              case 'F':
                  $genero='Mujer';
                  break;
              case '3':
                  $genero='Otro';
                  break;
          }
            ?>
        <form class='row' autocomplete="off" action="modificarpaciente-post.php" method="post">
        <div class="col-md-4">
              <label class="form-label">Nombre/s</label>
              <input type="text" name="nombre" value="<?=$nombre?>" class="form-control">
              <input type="hidden" name="idp" value="<?=$id?>">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido paterno</label>
              <input type="text" name="apellido_pat" value="<?=$apellido_pat?>" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido materno (opcional)</label>
              <input type="text" name="apellido_mat" class="form-control" value="<?=$apellido_mat?>">
            </div>
            <div class="col-md-3">
                <br><br>
              <label class="form-label">CI / Nit</label>
              <input type="number" name="ci" class="form-control" value="<?=$ci?>">
            </div>
            <div class="col-md-2">
              <br><br>
              <label class="form-label">Fecha de nacimiento</label><br>
              <input type="date" name="feccre" value="<?=$feccre?>"/>
            </div>
            <div class="col-md-3">
                <br><br>
              <label class="form-label">Telf. de referencia</label>
              <input type="number" name="numtelf" class="form-control" value="<?=$numtelf?>">
            </div>
            <div class="col-md-3">
                <br><br>
              <label class="form-label">Género</label>
              <br>
              <select class="form-select" name="genero"  aria-label="Default select example">
                <option name="resct" value="0"><?=$genero?></option>
                <?php
                switch ($genero) {
                  case 'Hombre':
                    ?>
                    <option name="mujer" value="2">Mujer</option>
                    <option name="otro" value="3">Otro</option>
                    <?php
                    break;
                  case 'Mujer':
                    ?>
                    <option name="hombre" value="1">Hombre</option>
                    <option name="otro" value="3">Otro</option>
                    <?php
                    break;
                  case 'Otro':
                    ?>
                    <option name="hombre" value="1">Hombre</option>
                    <option name="mujer" value="2">Mujer</option>
                    <?php
                    break;
                }
                ?>
            </select>
            </div>
            <div class="col-md-12">
              <br><br>
              <button class="btn btn-dark form-control" style='color:white;'>MODIFICAR</button>
            </div>
        </form>
        </div>
      </div>
  </div>
</div>

  </body>
</html>