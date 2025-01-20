<?php 
$tag = new Tag($pdo);
$afficherAllTags = $tag->getAllTags();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnDelete'])){
    $tags_id = $_POST['Tags_id'];
    $deleteTag = $tag->deleteTag($tags_id);
    if($deleteTag){
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
?>
<main class="flex-1 p-4 md:p-8 mt-16 md:ml-64 transition-all duration-300 container tags overflow-y-auto h-screen">
    <div class="max-w-7xl mx-auto h-full">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Gestion des Tags</h1>
            <p class="text-gray-500 mt-1">Gérez et organisez tous les tags de la plateforme</p>
        </div>

        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <h2 class="text-lg font-semibold text-gray-900">Liste des Tags</h2>
                        <span class="px-3 py-1 text-sm text-purple-600 bg-purple-50 rounded-full" id="tagCount">0
                            Total</span>
                    </div>
                    <div class="flex space-x-3">
                        <div class="relative">
                            <input type="text" id="searchTag" placeholder="Rechercher un tag..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button id="addTagBtn"
                            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            <i class="fas fa-plus mr-2"></i>Ajouter
                        </button>
                    </div>
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
                        <form id="tagForm" class="mt-4">
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
                                <button type="submit"
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
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <?= $afficherAll['id'];?>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <?= $afficherAll['nom'];?>
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <form action="" method="post">
                                        <button class="text-purple-600 hover:text-purple-900" title="Voir les cours">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" name="btnDelete"
                                            title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                            <input name="Tags_id" type="text" value="<?= $afficherAll['id'];?>"
                                                class="hidden">
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