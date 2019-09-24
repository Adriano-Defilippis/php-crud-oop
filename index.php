<?php
  include "popo.php";
  include "conn_db.php";
  include "query.php";



  $res = $conn -> query($get_all_pagamenti);

  $pagamenti = [];

  if ($res && $res -> num_rows > 0) {

    while ($row = $res -> fetch_assoc()) {

      $pagamenti[] = new Pagamento($row);
    }

  }


  $res = $conn -> query($get_all_config);

  $configurazioni = [];

  if ($res && $res -> num_rows > 0) {

    while ($row = $res -> fetch_assoc()) {

      $configurazioni[] = new Configurazione ($row);
    }

  }

  echo "--------------------------------------<br>";
  echo "Tabella Pagamenti";
  echo "<br>--------------------------------------<br>";
  for ($i=0; $i < sizeof($pagamenti); $i++) {

    $pagamento = $pagamenti[$i];

    echo $pagamento;

  }


  echo "<br>--------------------------------------<br>";
  echo "Tabella Configurazioni";
  echo "<br>--------------------------------------<br>";


  for ($i=0; $i < sizeof($configurazioni); $i++) {

    $configurazione = $configurazioni[$i];

    echo $configurazione;

  }

  echo "<br>--------------------------------------------------------------------<br>";
  echo "Minimo, massimo e somma  dei soli prezzi";
  echo "<br>--------------------------------------------------------------------<br>";

  $min = $pagamenti[0];
  $max = $pagamenti[0];
  $sum = 0;

  for ($i=0; $i < sizeof($pagamenti) ; $i++) {
    $element = $pagamenti[$i];
    
    $sum += $element -> getPrice();

    if ($min -> getPrice() > $element -> getPrice()) {

      $min = $element;
    }
    if ($max -> getPrice() < $element -> getPrice()){

      $max = $element;
    }
  }

  echo "Minimo:<br>"
       . $min . "<br>"
       . "Massimo:<br>"
       . $max . "<br>"
       . "Somma di tutti i prezzi:<br>"
       . $sum;

 ?>
