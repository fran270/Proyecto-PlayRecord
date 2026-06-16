<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="../img/agregarUsuario.png" type="image/x-icon">
  <?php
  include 'barra.php';
  ?>
</head>

<body>
  <style>
    body {
      background-color: rgb(128, 186, 215);
    }

    #imagen {
      padding: 5%;
      margin-left: 20%;
      margin-top: 3%;
      width: 60%;
    }

    h2 {
      text-align: center;
    }
  </style>


  <h2>Administración de usuarios</h2>

  <img src="./img/imagen1.avif" id="imagen">


  <?php

  include 'footer.php';

  ?>

</body>

</html>