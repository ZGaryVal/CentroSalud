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

    <title>Hello, world!</title>
  </head>
<style>

  body{
      background-color:rgb(211, 211, 211);
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
        padding: 10px;
        background-color: #16705A;
        border-radius: 2px;
        text-align: center;
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

<!-- PAGINA -->
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
    <a type="button"  href="" style='padding-top:10px;' class="btn btn-success">Configuraci??n</a>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <a type="button"  href="" style='padding-top:10px;' class="btn btn-success">Salir</a>
  </div>
  <!-- derecha Contendio-->
  <div class="der">
    <!-- NOmbre del paciente -->
      
      <div class="cards">
        <div class="container mx-auto mt-4">
          <div class="row">
            <?php
              //$id_paciente = $_GET["t"];
              $sql = 'SELECT img.titulo, img.link, categoria_enfermedad.descripcion FROM imagen img INNER JOIN categoria_enfermedad ON categoria_enfermedad.id_categoria = img.id_categoria;';
              $obj = pg_query($con,$sql);
              $i = 0;
              while ($fila = pg_fetch_array($obj)){
              $i++;
            ?>
            <!-- Dentro de while -->
              
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?=$fila[1]?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cateogoria: <u><?=$fila[2]?></u> </h5>                            
                            </div>
                        </div>
                    </div>    
            <?php
            }
            ?>
          </div>
        </div>
      </div>
  </div>
</div>
  </body>
</html>