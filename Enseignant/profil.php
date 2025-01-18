<div class="container profil hidden p-6">
    <div class="bg-white rounded-xl shadow-sm p-8 mx-auto">
        <div class="flex items-center mb-8">
            <button class="flex items-center text-teal-700 hover:text-teal-800 mr-4" id="backToDashboard">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour
            </button>
            <h2 class="text-2xl font-bold text-gray-800">Mon Profil</h2>
        </div>

        <div class="flex flex-col md:flex-row items-center md:items-start mb-8 pb-8 border-b border-gray-200">
            <div class="relative mb-6 md:mb-0 md:mr-8">
                <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden group relative">
                    <img src="https://via.placeholder.com/128" class="w-full h-full object-cover">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="text-white text-sm">
                            <i class="fas fa-camera mr-2"></i>
                            Modifier
                        </button>
                    </div>
                </div>
            </div>

            <!-- Basic Info -->
            <div class="flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                        <input type="text" value="John"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                        <input type="text" value="Doe"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" value="john.doe@example.com"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all">
                </div>
            </div>
        </div>

        <!-- Professional Info -->
        <div class="space-y-6 mb-8 pb-8 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Informations professionnelles</h3>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                <textarea
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all"
                    rows="4"
                    placeholder="Parlez-nous de vous...">Enseignant passionné avec plus de 5 ans d'expérience...</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Spécialités</label>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">Développement
                        Web</span>
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">JavaScript</span>
                    <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm">React</span>
                    <button
                        class="px-3 py-1 border border-dashed border-teal-500 text-teal-600 rounded-full text-sm hover:bg-teal-50">
                        + Ajouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="space-y-6 mb-8 pb-8 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Sécurité</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe actuel</label>
                    <div class="relative">
                        <input type="password"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
                    <div class="relative">
                        <input type="password"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white transition-all">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Save Button -->
        <div class="mt-8 flex justify-end">
            <button
                class="px-6 py-3 bg-teal-700 text-white rounded-lg hover:bg-teal-800 transition-colors flex items-center">
                <i class="fas fa-save mr-2"></i>
                Sauvegarder les modifications
            </button>
        </div>
    </div>
</div>