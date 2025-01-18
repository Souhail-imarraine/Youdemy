<?php
require_once './config/database.php';
require_once './classes/cours.php';
require_once './classes/utilisateur.php';

$database = new Database();
$pdo = $database->getConnection();

$cours = new Cours($pdo);
$getAllCourses = $cours->selectAllCourses();

// Assuming Utilisateur is a class that contains the search method
$utilisateur = new Utilisateur($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ValueSearching'])) {
    $searchTerm = trim($_GET['ValueSearching']);
    $resultSerching = $utilisateur->SerchingCourses($searchTerm);
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
                <button class="px-6 py-2 text-teal-800 font-medium"><a href="signin.php">LOG IN</a></button>
                <button class="px-6 py-2 bg-teal-800 text-white rounded-md font-medium"><a href="signup.php">SIGN UP</a></button>
            </div>
        </div>
    </nav>