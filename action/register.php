<?php
require_once 'config/database.php';
require_once 'classes/utilisateur.php';

$database = new Database();
$pdo = $database->getConnection();
$utilisateur = new Utilisateur($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['CreateAcount'])){
    $name = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = $_POST['role'];
    $register = $utilisateur->register($name, $email, $password, $role);
    if($register && $role == 'Etudiant'){
        // header('Location: students/interface.php');
        header('Location: signin.php');
    }elseif($register && $role == 'Enseignant') {
        // header('Location: Enseignant/dashboardTeatcher.php');
        header('Location: signin.php');
    }else{
        $errors = $utilisateur->getErrors();
        exit();
    }
}
