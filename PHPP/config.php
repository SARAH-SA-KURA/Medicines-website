<?php
  $host='localhost';
  $dbname='pharmacy';
  $user='root';
  $passw='';

  try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbname", $user, $passw);
  }catch(PDOException $e) {
    die("Error: ".$e->getMessage());
  }

?>