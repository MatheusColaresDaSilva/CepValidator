<?php

$dbc = mysqli_connect('localhost','root','','validadorcep');

$sql = "CREATE TABLE IF NOT EXISTS cidade (
           ci_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
           ci_nome varchar(50) NOT NULL,
           ci_cep INT(6) NOT NULL
           )";

        if(mysqli_query($dbc, $sql)){
           
        print "<script>alert('Table Cidade created with sucess');</script>";
        print "<script>location.href='index.php';</script>";
          
        } else{
            echo "Error: $sql " . mysqli_error($dbc);

        }

?>