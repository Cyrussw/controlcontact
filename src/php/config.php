<?php

require("./src/classes/actions.php");

$host = "localhost";
$username = "root";
$password = "";
$database = "controlcontact";
$dsn = "mysql:host=$host;dbname=$database";

try {
    $pdo = new PDO($dsn, $username, $password);
    $actions = new actions($pdo);
} catch (PDOException $e) {
    $system_error_message = $e->getMessage();
    //die("Sistem şuanda bakım modunda.");
}

?>