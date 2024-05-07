<?php
    //sql to create table
    $sql = "CREATE TABLE utisak (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    komentar VARCHAR(500) NOT NULL,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Tabela je kreirana";
    } else {
      echo "Greska pri kreiranju tabele utisak: " . $conn->error;
    }
?>