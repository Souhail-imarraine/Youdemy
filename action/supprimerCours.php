<?php
require_once '../config/database.php';
require_once '../classes/cours.php';

$database = new Database();
$pdo = $database->getConnection();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $cours_id = $_GET['id_cours'];
    $cours = new Cours($pdo);

    $deleteCours = $cours->deleteCours($cours_id);
    if($deleteCours) {
        header('location ../Enseignant/dashboardTeatcher.php');
    }else {
        echo 'no deleted';
    }
}
?>