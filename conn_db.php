<?php

  $servername = "localhost";
  $username = "adriano";
  $password = "root";
  $dbname = "Boolean_hotle";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn -> connect_error) {

    var_dump('error connecting db');
    var_dump($conn);
    die();
  }

 ?>
