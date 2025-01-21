<?php

require_once '../config/database.php';
require_once '../classes/cours.php';
require_once '../classes/cours_video.php';
require_once '../classes/cours_document.php';

session_start();

// Check if user is logged in and has the 'Enseignant' role
if (empty($_SESSION) || $_SESSION['is_login'] !== true || $_SESSION['role'] !== 'Enseignant') {
    header('Location: ../signin.php?error=unauthorized');
    exit();
}

$database = new Database();
$pdo = $database->getConnection();
$enseignant_id = $_SESSION['id'];

if (!$enseignant_id) {
    die("Error: enseignant_id is missing.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['creat_cours'])) {
  
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $category_id = htmlspecialchars($_POST['category']);
    $tags = $_POST['tags'] ;
    $type = $_POST['type'];

    // image de couverture **************************
    $imageCouverture = $_FILES['imageCouverture'];
    $errors = [];

    if (!$titre){
        $errors[] = "Title is required.";
    }elseif(!$description) {
        $errors[] = "Description is required.";
    }elseif(!$category_id) {
        $errors[] = "Category is required.";
    }elseif(!$type) {
        $errors[] = "Type is required.";
    }

    if (!$imageCouverture || $imageCouverture['error'] !== UPLOAD_ERR_OK){
        $errors[] = "Cover image is required.";
    }

    if ($type === 'Video' && (!isset($_FILES['contenu_video']) || $_FILES['contenu_video']['error'] !== UPLOAD_ERR_OK)) {
        $errors[] = "Video content is required.";
    } elseif ($type === 'Document' && (!isset($_FILES['contenu_document']) || $_FILES['contenu_document']['error'] !== UPLOAD_ERR_OK)) {
        $errors[] = "Document content is required.";
    }

    if (!is_array($tags) || empty($tags)) $errors[] = "Tags must be a non-empty array.";

    if (!empty($errors)) {
        die(implode("<br>", $errors));
    }
    
    // Function to handle file uploads
    function uploadFile($file, $uploadDir) {
        $fileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', basename($file['name']));
        $filePath = $uploadDir . $fileName;
        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            $errors[] = "Error: Failed to upload {$file['name']}.";
        }
        return $filePath;
    }

    try {
        $imagePath = uploadFile($imageCouverture, 'uploads/images/');
        if ($type === 'Video') {
            $videoPath = uploadFile($_FILES['contenu_video'], 'uploads/videos/');
            $course = new VideoCours($pdo, $titre, $description, $enseignant_id, $category_id, $tags, $imagePath, $videoPath);
        } elseif ($type === 'Document') {
            $documentPath = uploadFile($_FILES['contenu_document'], 'uploads/documents/');
            $course = new CoursDocument($pdo, $titre, $description, $enseignant_id, $category_id, $tags, $imagePath, $documentPath);
        }

        $course->createCourse();
        echo "Course created successfully!";
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}