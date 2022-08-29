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

.btna{
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
    background-color: blueviolet;
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
<a type="button"  href="" style='padding-top:10px;' class="btna btn btn-success">Galeria</a>
<br><br>
<a type="button"  href="" style='padding-top:10px;' class="btna btn btn-success">Configuración</a>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a type="button"  href="" style='padding-top:10px;' class="btna btn btn-success">Salir</a>
  </div>


  <!-- CONTENIDO -->
  <div class="der">
    pacientes.php 404
  </div>
</div>


  </body>
</html>