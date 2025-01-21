<?php
require_once '../config/database.php';
require_once '../classes/cours.php';

$database = new Database();
$pdo = $database->getConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSupprimer'])){
    $cours_id = $_POST['cours_id'];
    $cours = new Cours($pdo);

    $deleteCours = $cours->deleteCours($cours_id);
    if($deleteCours) {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=true');
    }else {
        echo 'no deleted';
    }
}
?>