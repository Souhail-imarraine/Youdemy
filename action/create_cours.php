<?php
require_once '../config/database.php';
require_once '../classes/cours.php';
require_once '../classes/cours_video.php';

session_start();

if (empty($_SESSION) || $_SESSION['is_login'] !== true || $_SESSION['role'] !== 'Enseignant') {
    header('Location: ../signin.php?error=unauthorized');
    exit();
}
$database = new Database();
$pdo = $database->getConnection();

$enseignant_id = $_SESSION['id'];

if (!$enseignant_id) {
    die("Error: enseignant_id is missing. Please ensure you are logged in.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['creat_cours'])) {
    // var_dump($_POST);
    // die();
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $category_id = htmlspecialchars($_POST['category']);
    // exit();
    $tags = $_POST['tags'];
    $imageCouverture = $_FILES['imageCouverture'] ;
    $contenu_video = $_FILES['contenu_video'];

    // Validate inputs
    $errors = [];
    if (!$titre) $errors[] = "Title is required.";
    if (!$description) $errors[] = "Description is required.";
    if (!$category_id) $errors[] = "Category is required.";
    if (!$imageCouverture || $imageCouverture['error'] !== UPLOAD_ERR_OK) $errors[] = "Cover image is required.";
    if (!$contenu_video || $contenu_video['error'] !== UPLOAD_ERR_OK) $errors[] = "Video content is required.";
    if (!is_array($tags) || empty($tags)) $errors[] = "Tags must be a non-empty array.";

    if (!empty($errors)) {
        die(implode("<br>", $errors));
    }

    function uploadFile($file, $uploadDir) {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $fileName = preg_replace('/[^a-zA-Z0-9-_\.]/', '_', basename($file['name']));
        $filePath = $uploadDir . $fileName;
        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            throw new Exception("Error: Failed to upload {$file['name']}.");
        }
        return $filePath;
    }

    try {
        $imagePath = uploadFile($imageCouverture, 'uploads/images/');
        $videoPath = uploadFile($contenu_video, 'uploads/videos/');
        $videoCours = new VideoCours($pdo, $titre, $description, $enseignant_id, $category_id, $tags, $imagePath, $videoPath);
        $videoCours->createCourse();

        echo "Course created successfully!";
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}