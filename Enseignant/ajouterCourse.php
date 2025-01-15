<div class="container courses hidden p-6">
    <div class="mx-auto bg-white rounded-xl shadow-sm">
        <!-- Header -->
        <div class="border-b border-gray-200">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <button class="flex items-center text-teal-700 hover:text-teal-800 mr-4" id="backToDashboard">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Retour
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800">Créer un nouveau cours</h1>
                </div>
                <p class="text-gray-500">Remplissez les informations ci-dessous pour créer votre cours</p>
            </div>
        </div>

        <!-- Course Form -->
        <form class="p-6 space-y-8">
            <!-- Basic Information -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b border-gray-200">
                    Informations de base
                </h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre du cours*</label>
                    <input type="text"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white"
                        placeholder="Ex: Développement Web Avancé">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description
                        détaillée*</label>
                    <textarea
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white"
                        rows="6"
                        placeholder="Décrivez en détail le contenu et les objectifs de votre cours..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie*</label>
                        <select
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white">
                            <option value="">Sélectionnez une catégorie</option>
                            <option value="web">Développement Web</option>
                            <option value="mobile">Développement Mobile</option>
                            <option value="data">Science des Données</option>
                            <option value="design">Design</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <div class="flex flex-wrap gap-2 mb-2">
                        <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm flex items-center">
                            JavaScript
                            <button class="ml-2 text-teal-500 hover:text-teal-700">×</button>
                        </span>
                        <span class="px-3 py-1 bg-teal-50 text-teal-700 rounded-full text-sm flex items-center">
                            React
                            <button class="ml-2 text-teal-500 hover:text-teal-700">×</button>
                        </span>
                    </div>
                    <input type="text"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white"
                        placeholder="Ajouter des tags (appuyez sur Entrée pour ajouter)">
                </div>
            </div>

            <!-- Course Media -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b border-gray-200">
                    Média du cours
                </h2>

                <!-- Course Thumbnail -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image de couverture*</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Glissez-déposez une image ici ou</p>
                            <button class="text-teal-600 font-medium hover:text-teal-700">parcourir vos
                                fichiers</button>
                            <p class="text-sm text-gray-400 mt-1">PNG, JPG jusqu'à 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Promotional Video -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vidéo promotionnelle</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8">
                        <div class="text-center">
                            <i class="fas fa-film text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Ajoutez une vidéo de présentation de votre cours</p>
                            <button class="text-teal-600 font-medium hover:text-teal-700">Télécharger une
                                vidéo</button>
                            <p class="text-sm text-gray-400 mt-1">MP4 jusqu'à 100MB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end space-x-4 pt-6">
                <button type="button"
                    class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                    Enregistrer comme brouillon
                </button>
                <button type="submit"
                    class="px-6 py-2.5 bg-teal-700 text-white rounded-lg hover:bg-teal-800 flex items-center">
                    <i class="fas fa-check mr-2"></i>
                    Publier le cours
                </button>
            </div>
        </form>
    </div>
</div>