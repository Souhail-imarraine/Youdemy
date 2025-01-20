<?php
require_once 'config/database.php';
require_once 'classes/utilisateur.php';

$database = new Database();
$pdo = $database->getConnection();
$utilisateur = new Utilisateur($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    $signin = $utilisateur->login($email, $password);

    if ($signin && $_SESSION['role'] == 'Etudiant') {
        header('Location: students/interface.php');
        exit();
    } elseif ($signin && $_SESSION['role'] == 'Enseignant') {
        header('Location: Enseignant/dashboardTeatcher.php');
        exit();
    } elseif($signin && $_SESSION['role'] == 'Administrateur') {
        header('Location: administrateur/index.php');
        exit();
    } else {
        $errors = $utilisateur->getErrors();
    }
}
