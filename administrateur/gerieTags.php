<?php 
require_once('../config/database.php');
require_once('../classes/tags.php');

$database = new Database();
$pdo = $database->getConnection();

function handleTagOperations($pdo) {
    $tag = new Tag($pdo);
    $afficherAllTags = $tag->getAllTags();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['btnDelete'])){
            $tags_id = $_POST['Tags_id'];
            return $tag->deleteTag($tags_id);
        }
        
        if(isset($_POST['btnAjouterTag'])){
            $tagName = $_POST['tagName'];
            return $tag->createTag($tagName);
        }
    }
    return $afficherAllTags;
}

$afficherAllTags = handleTagOperations($pdo);

?>
<main class="flex-1 p-4 md:p-8 mt-16 md:ml-64 transition-all duration-300 container tags overflow-y-auto h-screen">
    <div class="max-w-7xl mx-auto h-full">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Gestion des Tags</h1>
            <p class="text-gray-500 mt-1">Gérez et organisez tous les tags de la plateforme</p>
            <?php if(isset($_GET['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">Tag created successfully!</span>
                </div>
            <?php elseif(isset($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">Failed to create tag.</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-lg font-semibold text-gray-900">Liste des Tags</h2>
                    </div>
                    <button type="button" onclick="openModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un Tag
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du Tag</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php if (!empty($afficherAllTags)): ?>
                            <?php foreach ($afficherAllTags as $tag): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($tag['id']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($tag['nom']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form method="POST" class="inline-block">
                                            <input type="hidden" name="Tags_id" value="<?php echo $tag['id']; ?>">
                                            <button type="submit" name="btnDelete" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No tags found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for adding new tag -->
    <div id="addTagModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Add New Tag</h3>
                <form method="POST" class="mt-4">
                    <div class="mb-4">
                        <label for="tagName" class="block text-sm font-medium text-gray-700">Tag Name</label>
                        <input type="text" name="tagName" id="tagName" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md">Cancel</button>
                        <button type="submit" name="btnAjouterTag" class="px-4 py-2 text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 rounded-md">Add Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('addTagModal');
        window.openModal = () => {
            modal.classList.remove('hidden');
        }
        window.closeModal = () => {
            modal.classList.add('hidden');
        }
    });
    </script>
</main>