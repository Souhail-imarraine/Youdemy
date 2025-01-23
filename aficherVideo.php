
<?php 
require_once 'config/database.php';
require_once 'classes/cours.php';

$database = new Database();
$pdo = $database->getConnection();
$cours = new Cours($pdo);

if(isset($_GET['id_cours'])){
    $courseInfo = $cours->getCourseEnrolById(intval($_GET['id_cours']));
    // var_dump($courseInfo);
    // die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($courseInfo['titre'] ?? 'Course Video') ?> - YouDEMY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .video-container {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        .video-container:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <?php require_once './component/header.php'; ?>

    <main class="min-h-screen pt-16">
        <!-- Course Header -->
        <div class="bg-gradient-to-r from-[#00BFB3] to-[#FF6B38] text-white py-12">
            <div class="container mx-auto px-4">
                <nav class="mb-4 flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="courses.php" class="text-white hover:text-gray-200">
                                <i class="fas fa-home mr-2"></i>Courses
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-gray-300 mx-2"></i>
                                <span class="text-gray-200"><?= htmlspecialchars($courseInfo['titre'] ?? '') ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-4xl font-bold mb-4"><?= htmlspecialchars($courseInfo['titre'] ?? '') ?></h1>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <i class="fas fa-user-tie mr-2"></i>
                        <span class="text-lg"><?= htmlspecialchars($courseInfo['enseignant_nom'] ?? '') ?></span>
                    </div>
                    <?php if(isset($courseInfo['categorie'])): ?>
                        <div class="flex items-center">
                            <i class="fas fa-folder mr-2"></i>
                            <span class="text-lg"><?= htmlspecialchars($courseInfo['categorie']) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Video Content -->
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-5xl mx-auto">
                <!-- Video Player -->
                <div class="video-container bg-white rounded-xl overflow-hidden mb-8">
                    <div class="aspect-w-16 aspect-h-9 bg-black">
                        <?php if($courseInfo['type'] == 'Video'): ?>
                        <video 
                            src="Enseignant/<?= htmlspecialchars($courseInfo['contenu_video'] ?? '') ?>" 
                            controls
                            class="w-full h-full object-contain"
                            poster="Enseignant/<?= htmlspecialchars($courseInfo['image'] ?? '') ?>"
                        >
                            Your browser does not support the video tag.
                        </video>
                        <?php elseif($courseInfo['type'] == 'Document'): ?>
                            <div class="w-full h-full">
                                <iframe 
                                    src="Enseignant/<?= htmlspecialchars($courseInfo['contenu_document'] ?? '') ?>" 
                                    width="100%" 
                                    height="600px" 
                                    class="w-full border-0"
                                    style="min-height: 600px;"
                                >
                                    <p>Your browser does not support iframes. Please <a href="Enseignant/<?= htmlspecialchars($courseInfo['contenu_document'] ?? '') ?>">download the document</a> to view it.</p>
                                </iframe>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                            <?= htmlspecialchars($courseInfo['titre'] ?? '') ?>
                        </h2>
                        <?php if(isset($courseInfo['description'])): ?>
                            <p class="text-gray-600 leading-relaxed">
                                <?= htmlspecialchars($courseInfo['description']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-full bg-[#00BFB3] bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-clock text-[#00BFB3] text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Duration</h3>
                                <p class="text-lg font-semibold text-gray-900">2h 30min</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-full bg-[#FF6B38] bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-book text-[#FF6B38] text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Category</h3>
                                <p class="text-lg font-semibold text-gray-900">
                                    <?= htmlspecialchars($courseInfo['categorie'] ?? 'General') ?>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-full bg-[#00BFB3] bg-opacity-10 flex items-center justify-center">
                                <i class="fas fa-users text-[#00BFB3] text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Enrolled</h3>
                                <p class="text-lg font-semibold text-gray-900">24 Students</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once './component/footer.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('video');
        if (video) {
            video.addEventListener('loadedmetadata', function() {
                video.classList.add('opacity-100');
                video.classList.remove('opacity-0');
            });
        }
    });
    </script>
</body>
</html>