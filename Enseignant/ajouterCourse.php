
<div class="container courses hidden p-6">
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
                            <p class="text-sm text-gray-400 mt-1">PNG, JPG jusqu'à 5MB</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vidéo promotionnelle</label>
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
                <button type="button"
                    class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                    Enregistrer comme brouillon
                </button>
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
</script>