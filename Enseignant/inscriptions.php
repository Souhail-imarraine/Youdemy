            <div class="container inscription hidden p-6" id="enrollments">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-800 mb-2">Gestion des Inscriptions</h1>
                        <p class="text-gray-500">Gérez les étudiants inscrits à vos cours</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                        <div class="flex flex-col md:flex-row md:items-center justify-between space-y-4 md:space-y-0">
                            <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                                <div class="relative w-full md:w-64">
                                    <input type="text" placeholder="Rechercher un étudiant..."
                                        class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500">
                                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <select
                                    class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500">
                                    <option value="">Tous les cours</option>
                                    <option value="web">Développement Web</option>
                                    <option value="mobile">Développement Mobile</option>
                                    <option value="data">Science des Données</option>
                                </select>
                            </div>
                            <button
                                class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center">
                                <i class="fas fa-download mr-2"></i>
                                Exporter
                            </button>
                        </div>
                    </div>

                    <!-- Students Table -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Étudiant
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cours
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date d'inscription
                                    </th>
                                    <th
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full flex-shrink-0">
                                                <img src="student1.jpg" alt="" class="w-full h-full rounded-full">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Jean Dupont</div>
                                                <div class="text-sm text-gray-500">jean.dupont@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Développement Web Avancé</div>
                                        <div class="text-xs text-gray-500">Frontend</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">15 Mars 2024</div>
                                        <div class="text-xs text-gray-500">14:30</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-teal-600 hover:text-teal-900 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Student Row 2 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-full flex-shrink-0">
                                                <img src="student2.jpg" alt="" class="w-full h-full rounded-full">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Marie Martin</div>
                                                <div class="text-sm text-gray-500">marie.martin@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">React Avancé</div>
                                        <div class="text-xs text-gray-500">JavaScript</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">14 Mars 2024</div>
                                        <div class="text-xs text-gray-500">09:15</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-teal-600 hover:text-teal-900 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    Affichage de 1 à 10 sur 100 étudiants
                                </div>
                                <nav class="flex items-center space-x-2">
                                    <button
                                        class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button
                                        class="px-4 py-2 rounded-lg border border-gray-200 bg-teal-50 text-teal-700 font-medium">1</button>
                                    <button
                                        class="px-4 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">2</button>
                                    <button
                                        class="px-4 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">3</button>
                                    <button
                                        class="p-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>