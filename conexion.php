<?php
session_start();

function connection(){
  $db_host='localhost';
  $db_name='ProyectoID';
  $db_user='root';
  $db_password='5a77851f6274c1c276ddc27bf27ab7d9d191eeaf3055a914';
  
  try{
    $db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
    return $db;
  }catch(PDOException $e){
    echo"Error: ".$e->getMessage();
    die();
  }
}