<div class="container myCourses p-6 hidden">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Mes Cours</h1>
                <p class="text-gray-500">Gérez vos cours et leurs inscriptions</p>
            </div>
            <div class="mt-4 md:mt-0">
                <button class="px-6 py-3 bg-teal-700 text-white rounded-lg hover:bg-teal-800 flex items-center"
                    id="ajouterCourse">
                    <i class="fas fa-plus mr-2"></i>
                    Nouveau cours
                </button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between space-y-4 md:space-y-0">
                <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                    <!-- Search -->
                    <div class="relative w-full md:w-64">
                        <input type="text" placeholder="Rechercher un cours..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <!-- <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500">
                        <option value="">Tous les statuts</option>
                        <option value="published">Publié</option>
                        <option value="draft">Brouillon</option>
                        <option value="review">En révision</option>
                    </select> -->
                </div>

                <!-- Export Button -->
                <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Exporter
                </button>
            </div>
        </div>

        <!-- Courses Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cours
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Inscriptions
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Course Row 1 -->
                    <?php foreach($AfichageCourses as $affCours): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-200 rounded-lg flex-shrink-0">
                                    <img src="<?= $affCours['Image_couverture'];?>" alt=""
                                        class="w-full h-full rounded-lg object-cover">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900"><?= $affCours['titre'];?></div>
                                    <div class="text-sm text-gray-500"><?= $affCours['description'];?></div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm text-gray-900">128 étudiants</div>
                                <button class="ml-2 text-teal-600 hover:text-teal-800" title="Voir les inscriptions">
                                    <i class="fas fa-users"></i>
                                </button>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-3">
                            <a href="../ajouterCourse.php?id_cours=<?= $affCours['id'] ?>"
                                class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="../action/supprimerCours.php?id_cours=<?= $affCours['id'] ?>"
                                class="text-red-400 hover:text-red-300">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Affichage de 1 à 10 sur 25 cours
                    </div>
                    <nav class="flex items-center space-x-2">
                        <button class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="px-4 py-2 rounded-lg border border-gray-200 bg-teal-50 text-teal-700 font-medium">1</button>
                        <button
                            class="px-4 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                        <button
                            class="px-4 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">3</button>
                        <button class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center" id="deleteModal">
        <div class="bg-white rounded-lg p-6 max-w-sm mx-auto">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Confirmer la suppression</h3>
            <p class="text-gray-500 mb-6">Êtes-vous sûr de vouloir supprimer ce cours ? Cette action est irréversible.
            </p>
            <div class="flex justify-end space-x-4">
                <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Annuler
                </button>
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</div>