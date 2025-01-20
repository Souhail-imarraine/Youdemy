<main class="flex-1 p-4 md:p-8 mt-16 md:ml-64 transition-all duration-300">
    <div class="container categories hidden">
        <div class="mb-6">
            <div class="bg-white rounded-xl shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                        <div class="flex items-center space-x-4">
                            <h2 class="text-lg font-semibold text-gray-900">Liste des Catégories</h2>
                            <span class="px-3 py-1 text-sm text-purple-600 bg-purple-50 rounded-full">12 Total</span>
                        </div>
                        <div class="flex space-x-3">
                            <div class="relative">
                                <input type="text" placeholder="Rechercher une catégorie..."
                                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                            </div>
                            <button id="openModalBtn" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <i class="fas fa-plus mr-2"></i>Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="categoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Ajouter une catégorie</h3>
                                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="mt-4">
                                <form action="" method="POST" class="space-y-4">
                                    <div>
                                        <label for="categoryName" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                                        <input type="text" name="categoryName" id="categoryName" 
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                    </div>
                                    <div class="flex justify-end space-x-3">
                                        <button type="button" id="cancelBtn"
                                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                            Annuler
                                        </button>
                                        <button type="submit"
                                                class="px-4 py-2 bg-purple-600 text-white rounded-md text-sm font-medium hover:bg-purple-700">
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom categorie
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach($getAllCategories as $categorie): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?= $categorie['id'];?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?= $categorie['name'];?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-3">
                                        <button class="text-purple-600 hover:text-purple-900" title="Voir les cours">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get modal elements
        const modal = document.getElementById('categoryModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        // Open modal
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal functions
        const closeModal = () => {
            modal.classList.add('hidden');
        };

        // Close modal events
        closeModalBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Prevent modal close when clicking inside modal content
        modal.querySelector('.relative').addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>
</main>
