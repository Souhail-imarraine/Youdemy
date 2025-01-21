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

    if($role == 'Enseignant'){
        $status = 'pending';
    }elseif($role == 'Etudiant'){
        $status = 'Active';
    }else {
        $status = 'Active';
    }
    $register = $utilisateur->register($name, $email, $password, $role, $status);
    if($register){
        header('Location: signin.php');
    }else{
        $errors = $utilisateur->getErrors();
    }
}
