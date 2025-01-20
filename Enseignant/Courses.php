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
                            <a href="edit.php?id_cours=<?= $affCours['id'] ?>" class="text-blue-600 hover:text-blue-900" id="edit">
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



<div class="container courses hidden p-6" id="editContainer">
    <div class="mx-auto bg-white rounded-xl shadow-sm">
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

        <form class="p-6 space-y-8" method="POST" enctype="multipart/form-data">
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b border-gray-200">
                    Informations de base
                </h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre du cours*</label>
                    <input type="text" name="titre"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white"
                        placeholder="Ex: Développement Web Avancé">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description
                        détaillée*
                    </label>
                    <textarea name="description"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white"
                        rows="6"
                        placeholder="Décrivez en détail le contenu et les objectifs de votre cours..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie*</label>
                        <select name="category"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white">
                            <option value="">Sélectionnez une catégorie</option>
                            <?php foreach($getAllCategorie as $cat): ?>
                            <option value="<?php echo  $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Tags</label>
                    <div id="tags-container" class="flex flex-wrap gap-3">
                        <?php foreach($tagname as $tag): ?>
                        <label for="tag-<?php echo $tag['nom']; ?>"
                            class="tag cursor-pointer px-4 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-700 border border-gray-200 transition">
                            <?php echo $tag['nom']; ?>
                            <input type="checkbox" id="tag-<?php echo $tag['nom']; ?>" name="tags[]"
                                value="<?php echo $tag['id']; ?>" class="hidden">
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">types</label>
                        <select id="typeSelect" name="type"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:bg-white">
                            <option value="">...</option>
                            <option value="Video">Video</option>
                            <option value="Document">Document</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-800 pb-2 border-b border-gray-200">
                    Média du cours
                </h2>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image de couverture*</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Glissez-déposez une image ici ou</p>
                            <input type="file" name="imageCouverture"
                                class="text-teal-600 font-medium hover:text-teal-700 mt-4"
                                accept="image/png, image/jpeg">
                            <p class="text-sm text-gray-400 mt-1">PNG, JPG jusqu'à 1MB</p>
                        </div>
                    </div>
                </div>

                <div class="hidden" id="document_container">
                <label class="block text-sm font-medium text-gray-700 mb-2">Document*</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Glissez-déposez une image ici ou</p>
                            <input type="file" name="contenu_document"
                                class="text-teal-600 font-medium hover:text-teal-700 mt-4"
                                accept="image/png, image/jpeg">
                            <p class="text-sm text-gray-400 mt-1">pdf, docs jusqu'à 5MB</p>
                        </div>
                    </div>
                </div>

                <div class="hidden" id="video_container">
                    <label class=" blok text-sm font-medium text-gray-700 mb-2">Vidéo promotionnelle</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8">
                        <div class="text-center"> <i class="fas fa-film text-4xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Ajoutez une vidéo de présentation de votre cours</p> <input
                                type="file" name="contenu_video" class="text-teal-600 font-medium hover:text-teal-700"
                                accept="video/mp4">
                            <p class="text-sm text-gray-400 mt-1">MP4 jusqu'à 100MB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end space-x-4 pt-6">
                <button type="submit" name="creat_cours"
                    class="px-6 py-2.5 bg-teal-700 text-white rounded-lg hover:bg-teal-800 flex items-center">
                    <i class="fas fa-check mr-2"></i>
                    Publier le cours
                </button>
            </div>
        </form>
    </div>
</div>
<script>
const tagsContainer = document.getElementById("tags-container");
const tags = tagsContainer.querySelectorAll(".tag input[type='checkbox']");

tags.forEach(tag => {
    tag.addEventListener("change", () => {
        const label = tag.parentElement;
        if (tag.checked) {
            label.classList.remove("bg-gray-100", "text-gray-700");
            label.classList.add("bg-teal-500", "text-white");
        } else {
            label.classList.remove("bg-teal-500", "text-white");
            label.classList.add("bg-gray-100", "text-gray-700");
        }
    });
});

let typeSelect = document.querySelector('#typeSelect');
let documentContainer = document.querySelector('#document_container');
let videoContainer = document.querySelector('#video_container');

typeSelect.addEventListener('change', function() {
    videoContainer.classList.add('hidden');
    documentContainer.classList.add('hidden');

    if (this.value === 'Video') {
        videoContainer.classList.remove('hidden');
    } else if (this.value === 'Document') {
        documentContainer.classList.remove('hidden');
    }
});

let btnedit = document.getElementById('#edit');
let containerEdit = document.getElementById('#editContainer');
btnedit.addEventListener('click', ()=> {
    containerEdit.classList.remove('hidden');

    
})

</script>