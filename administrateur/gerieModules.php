<?php
require_once('../config/database.php');
require_once('../classes/Module.php');
require_once('../classes/cours.php');

$database = new Database();
$pdo = $database->getConnection();
$module = new Module($pdo);
$cours = new Cours($pdo);

$course_id = isset($_GET['course_id']) ? (int)$_GET['course_id'] : null;
$courseInfo = null;
$modules = [];

if ($course_id) {
    $courseInfo = $cours->getCourseById($course_id);
    $modules = $module->getModulesByCourse($course_id);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addModule'])) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $ordre = $_POST['ordre'];
        
        if ($module->createModule($course_id, $titre, $description, $ordre)) {
            header("Location: gerieModules.php?course_id=$course_id&success=module_added");
            exit();
        }
    }
    
    if (isset($_POST['addContent'])) {
        $module_id = $_POST['module_id'];
        $titre = $_POST['contentTitle'];
        $type = $_POST['contentType'];
        $url = $_POST['contentUrl'];
        $ordre = $_POST['contentOrdre'];
        
        if ($module->addModuleContent($module_id, $titre, $type, $url, $ordre)) {
            header("Location: gerieModules.php?course_id=$course_id&success=content_added");
            exit();
        }
    }
}
?>

<main class="flex-1 p-4 md:p-8 mt-16 md:ml-64 transition-all duration-300">
    <div class="max-w-7xl mx-auto">
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Gestion des Modules</h1>
                    <?php if ($courseInfo): ?>
                        <p class="text-gray-500 mt-1">Course: <?= htmlspecialchars($courseInfo['titre']) ?></p>
                    <?php endif; ?>
                </div>
                <button onclick="openAddModuleModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700">
                    <i class="fas fa-plus mr-2"></i> Add Module
                </button>
            </div>
        </div>

        <?php if ($courseInfo): ?>
            <div class="space-y-6">
                <?php if (empty($modules)): ?>
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center text-gray-500">
                        No modules available for this course yet.
                    </div>
                <?php else: ?>
                    <?php foreach ($modules as $mod): ?>
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        <?= htmlspecialchars($mod['titre']) ?>
                                    </h3>
                                    <button onclick="openAddContentModal(<?= $mod['id'] ?>)" class="text-teal-600 hover:text-teal-700">
                                        <i class="fas fa-plus"></i> Add Content
                                    </button>
                                </div>
                                <p class="text-gray-600 mb-4"><?= htmlspecialchars($mod['description']) ?></p>
                                
                                <?php 
                                $moduleContents = $module->getModuleContent($mod['id']);
                                if (!empty($moduleContents)):
                                ?>
                                    <div class="mt-4 space-y-3">
                                        <?php foreach ($moduleContents as $content): ?>
                                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                                <div class="flex items-center">
                                                    <i class="fas <?= $content['type'] === 'video' ? 'fa-video' : 'fa-file-alt' ?> text-gray-500 mr-3"></i>
                                                    <span><?= htmlspecialchars($content['titre']) ?></span>
                                                </div>
                                                <a href="<?= htmlspecialchars($content['url']) ?>" target="_blank" class="text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-external-link-alt"></i> View
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <p class="text-yellow-800">Please select a course to manage its modules.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Add Module Modal -->
    <div id="addModuleModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900">Add New Module</h3>
                <form method="POST" class="mt-4">
                    <div class="mb-4">
                        <label for="titre" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="titre" id="titre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="ordre" class="block text-sm font-medium text-gray-700">Order</label>
                        <input type="number" name="ordre" id="ordre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddModuleModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md">Cancel</button>
                        <button type="submit" name="addModule" class="px-4 py-2 text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 rounded-md">Add Module</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Content Modal -->
    <div id="addContentModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900">Add Module Content</h3>
                <form method="POST" class="mt-4">
                    <input type="hidden" name="module_id" id="contentModuleId">
                    <div class="mb-4">
                        <label for="contentTitle" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="contentTitle" id="contentTitle" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="mb-4">
                        <label for="contentType" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="contentType" id="contentType" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                            <option value="video">Video</option>
                            <option value="document">Document</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="contentUrl" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="url" name="contentUrl" id="contentUrl" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="mb-4">
                        <label for="contentOrdre" class="block text-sm font-medium text-gray-700">Order</label>
                        <input type="number" name="contentOrdre" id="contentOrdre" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddContentModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md">Cancel</button>
                        <button type="submit" name="addContent" class="px-4 py-2 text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 rounded-md">Add Content</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function openAddModuleModal() {
        document.getElementById('addModuleModal').classList.remove('hidden');
    }

    function closeAddModuleModal() {
        document.getElementById('addModuleModal').classList.add('hidden');
    }

    function openAddContentModal(moduleId) {
        document.getElementById('contentModuleId').value = moduleId;
        document.getElementById('addContentModal').classList.remove('hidden');
    }

    function closeAddContentModal() {
        document.getElementById('addContentModal').classList.add('hidden');
    }
    </script>
</main>
