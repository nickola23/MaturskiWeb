<?php
    //sql to create table
    $sql = "CREATE TABLE reci (
      ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      Engleski VARCHAR(50) NOT NULL,
      Srpski VARCHAR(50) NOT NULL,
      Opis VARCHAR(1024) NOT NULL
  )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Tabela je kreirana";
    } else {
      echo "Greska pri kreiranju tabele utisak: " . $conn->error;
    }
?>