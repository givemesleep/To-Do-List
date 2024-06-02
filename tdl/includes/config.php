<?php 

$username="postgres";
$pswd="1234";
$server_host="localhost";
$dbname="dbtdl";
$port="5432";
$dsn="pgsql:host={$server_host}; port={$port}; dbname={$dbname}";
try{
$conn = new PDO($dsn, $username, $pswd);
if($conn){
    // echo "Connected";
}
}
catch(PDOException $e){
    echo $e->getMessage();
}



?>