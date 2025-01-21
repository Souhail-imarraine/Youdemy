<?php
require_once './config/database.php';
require_once './classes/cours.php';
require_once './classes/utilisateur.php';
require_once './classes/etudiant.php';
session_start();

$database = new Database();
$pdo = $database->getConnection();

$cours = new Cours($pdo);
$getAllCourses = $cours->selectAllCourses();

$utilisateur = new Utilisateur($pdo);
$etudient = new Etudiant($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ValueSearching'])) {
    $searchTerm = trim($_GET['ValueSearching']);
    $resultSerching = $utilisateur->SerchingCourses($searchTerm);
}

if(isset($_SESSION['is_login'])){
    $student_id = $_SESSION['id'];
    $getMyEnrollments = $etudient->getMyEnrollments($student_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enrole'])) {
    $cours_id = $_POST['cours_id'];

    if(isset($_SESSION['is_login']) || $_SESSION['role'] == 'Etudiant'){
        $enrollement = $etudient->enrollCourse($student_id, $cours_id);
        if($enrollement){
            header('location: index.php');
        }
    }else{
        header('location: signin.php');
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-[#f0f7f7]">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-teal-600 rounded-lg"></div>
                <span class="ml-2 text-xl font-semibold text-teal-800">YouDemy</span>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php" class="text-orange-500 font-medium">Home</a>
                <a href="courses.php" class="text-gray-600">Courses</a>
                <a href="#" class="text-gray-600">About Us</a>
            </div>
            <div class="flex items-center space-x-4">
                <?php if(!isset($_SESSION['is_login'])): ?>
                    <button class="px-6 py-2 text-teal-800 font-medium"><a href="signin.php">LOG IN</a></button>
                    <button class="px-6 py-2 bg-teal-800 text-white rounded-md font-medium"><a href="signup.php">SIGN UP</a></button>
                <?php else: ?>
                    <span class="text-teal-800">Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></span>
                    <button class="px-6 py-2 bg-red-600 text-white rounded-md font-medium">
                        <a href="logout.php">Logout</a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </nav>