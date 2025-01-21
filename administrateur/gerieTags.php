<?php 
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

            <div id="tagModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Ajouter un tag</h3>
                            <button id="closeModal" class="text-gray-400 hover:text-gray-500">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form id="tagForm" method="post" class="mt-4">
                            <input type="hidden" id="tagId">
                            <div class="mb-4">
                                <label for="tagName" class="block text-sm font-medium text-gray-700">Nom du tag</label>
                                <input type="text" id="tagName" name="tagName" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div class="flex justify-end space-x-3">
                                <button type="button" id="cancelBtn"
                                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    Annuler
                                </button>
                                <button type="submit" name="btnAjouterTag"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom du Tag
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="tagTableBody">
                        <?php foreach($afficherAllTags as $afficherAll): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= $afficherAll['id'];?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= $afficherAll['nom'];?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <button class="text-purple-600 hover:text-purple-900" title="Voir les cours">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="Tags_id" value="<?= $afficherAll['id'] ?>">
                                        <button type="submit" name="btnDelete" class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const addTagBtn = document.getElementById('addTagBtn');
        const tagModal = document.getElementById('tagModal');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        const openModal = () => {
            tagModal.classList.remove('hidden');
        };

        const closeModalFunc = () => {
            tagModal.classList.add('hidden');
        };

        addTagBtn.addEventListener('click', openModal);
        closeModal.addEventListener('click', closeModalFunc);
        cancelBtn.addEventListener('click', closeModalFunc);

        tagModal.addEventListener('click', (event) => {
            if (event.target === tagModal) {
                closeModalFunc();
            }
        });
    });
    </script>
</main>
