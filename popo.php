<?php

  class Pagamento {

    private $id;
    private $status;
    private $price;

    public function __construct($row){

      $this -> setId($row['id']);
      $this -> setStatus($row['status']);
      $this -> setPrice($row['price']);
    }

    public function getId(){
      return $this -> id;
    }

    public function setId($id){
       $this -> id = $id;
    }

    public function getStatus(){
      return $this -> status;
    }

    public function setStatus($status){
      $this -> status = $status;
    }

    public function getPrice(){
      return $this -> price;
    }

    public function setPrice($price){
      $this -> price = $price;
    }

    public function __toString(){

      return $this -> getId() . ", "
           . $this -> getStatus() . ", "
           . $this -> getPrice() . "<br>";
    }
  }

  class Configurazione extends Pagamento {

    private $title;
    private $description;

    public function __construct($row){
      parent :: __construct($row);

      $this -> setTitle($row["title"]);
      $this -> setDescription($row["description"]);
    }


    public function getTitle(){

      return $this -> title;
    }

    public function setTitle($title){

      $this -> title = $title;
    }

    public function getDescription(){

      return $this -> description;
    }

    public function setDescription($description){

      $this -> description = $description;
    }

    public function __toString(){

        return $this -> getId() . ") "
               . $this -> getTitle() . ", "
               . $this -> getDescription() . "<br>";
    }
  }

 ?>
