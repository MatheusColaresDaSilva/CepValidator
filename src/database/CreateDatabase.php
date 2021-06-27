<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Create database
    $sql = "CREATE DATABASE validadorCep";
      if ($conn->query($sql) === TRUE) {
        
        print "<script>alert('Database created with sucess');</script>";
        print "<script>location.href='index.php';</script>";
      } 
      else {
        
        echo "It wasn't possible to create the Database: " . $conn->error;
      }

    $conn->close();

?>