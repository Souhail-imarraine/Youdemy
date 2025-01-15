<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-[#f0f7f7]">
    <div class="min-h-screen flex">
        <div class="w-64 bg-teal-800 text-white">
            <!-- Logo -->
            <div class="p-4 flex items-center space-x-2">
                <div class="w-10 h-10 bg-white/20 rounded-lg"></div>
                <span class="text-xl font-semibold">YouDemy</span>
            </div>

            <!-- Navigation -->
            <nav class="mt-8">
                <div class="px-4 mb-3 text-sm text-gray-400 uppercase">Gestion des cours</div>

                <!-- Dashboard -->
                <a href="#" id="btnTablebord" class="flex items-center px-4 py-3 bg-teal-700 text-white">
                    <div class="w-5 h-5 rounded mr-3 flex items-center justify-center">
                        <i class="fas fa-gauge-high"></i>
                    </div>
                    Tableau de bord
                </a>

                <!-- My Courses -->
                <a href="#" id="myCourses" class="flex items-center px-4 py-3 text-gray-300 hover:bg-teal-700">
                    <div class="w-5 h-5 rounded mr-3 flex items-center justify-center">
                        <i class="fas fa-book-open"></i>
                    </div>
                    Mes cours
                </a>

                <!-- Enrollments -->
                <a href="#" id="inscription" class="flex items-center px-4 py-3 text-gray-300 hover:bg-teal-700">
                    <div class="w-5 h-5 rounded mr-3 flex items-center justify-center">
                        <i class="fas fa-users"></i>
                    </div>
                    Inscriptions
                </a>

                <!-- Statistics -->
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-teal-700">
                    <div class="w-5 h-5 rounded mr-3 flex items-center justify-center">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    Statistiques
                </a>
            </nav>
        </div>

        <div class="flex-1">
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700">
                            <div class="w-6 h-6 bg-gray-400 rounded">
                            </div>
                        </button>
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..."
                                class="w-64 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 bg-gray-400 rounded"></div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button class="relative text-gray-500 hover:text-gray-700">
                            <div class="w-6 h-6 bg-gray-100 rounded">
                                <i class="fa-solid fa-bell fa-lg" style="color:rgb(0, 255, 140);"></i>
                            </div>
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">
                                3
                            </span>

                        </button>

                        <!-- Profile Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <div
                                    class="w-10 h-10 bg-teal-700 rounded-full flex items-center justify-center text-white font-semibold">
                                    JD
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-medium text-gray-700">John Doe</p>
                                    <p class="text-xs text-gray-500">Enseignant</p>
                                </div>
                                <div class="w-5 h-5 bg-gray-400 rounded"></div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div
                                class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 Btnprofil">
                                    <div class="w-5 h-5 bg-gray-400 rounded mr-3"></div>
                                    Mon Profil
                                </a>
                                <hr class="my-2">
                                <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50">
                                    <div class="w-5 h-5 bg-red-400 rounded mr-3"></div>
                                    Déconnexion
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container dashboard p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-500">Total des cours</h3>
                            <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 bg-teal-500 rounded"></div>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">12</p>
                        <p class="text-sm text-green-500 mt-2">+2 ce mois</p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-users text-xl text-teal-600"></i>
                            </div>
                            <span class="text-sm text-green-500">+12% ce mois</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">1,234</h3>
                        <p class="text-gray-500">Étudiants inscrits</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-500">Taux de complétion</h3>
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <div class="w-5 h-5 bg-green-500 rounded"></div>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800">78%</p>
                        <p class="text-sm text-green-500 mt-2">+5% ce mois</p>
                    </div>
                </div>
                <!-- Course Management and Statistics -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Course List -->
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Mes cours récents</h2>
                            <button class="text-orange-500 hover:text-orange-600" id="VoirMesCourses">Voir tout</button>
                        </div>

                        <div class="space-y-4">
                            <!-- Course Item -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center flex-1">
                                    <div class="w-12 h-12 bg-gray-200 rounded-lg mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-800">Développement Web</h3>
                                        <p class="text-sm text-gray-500">32 étudiants • HTML, CSS, JavaScript</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 text-teal-700 hover:bg-teal-50 rounded">Modifier</button>
                                    <button class="px-3 py-1 text-red-600 hover:bg-red-50 rounded">Supprimer</button>
                                </div>
                            </div>

                            <!-- Additional Course Items -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center flex-1">
                                    <div class="w-12 h-12 bg-gray-200 rounded-lg mr-4"></div>
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-800">React Avancé</h3>
                                        <p class="text-sm text-gray-500">28 étudiants • React, Redux</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 text-teal-700 hover:bg-teal-50 rounded">Modifier</button>
                                    <button class="px-3 py-1 text-red-600 hover:bg-red-50 rounded">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Inscriptions récentes</h2>
                            <button class="text-orange-500 hover:text-orange-600" id="VoirPlusInscription">Voir tout</button>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-4"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Jean Dupont</p>
                                    <p class="text-sm text-gray-500">Inscrit à "Développement Web"</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                <div class="w-10 h-10 bg-gray-300 rounded-full mr-4"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Marie Martin</p>
                                    <p class="text-sm text-gray-500">Inscrite à "React Avancé"</p>
                                    <p class="text-xs text-gray-400 mt-1">Il y a 5 heures</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Section -->
            <?php require_once 'profil.php'; ?>
            <!-- Course Creation Page -->
            <?php require_once 'ajouterCourse.php' ?>
            <!-- My Courses Page -->
            <?php require_once 'Courses.php' ?>
            <!-- inscription -->
            <?php require_once 'inscriptions.php' ?>
        </div>
        <script>
        // Select buttons
        let Btnprofil = document.querySelector('.Btnprofil');
        let btnajouterCourses = document.querySelector('#ajouterCourse');
        let btnTablebord = document.querySelector('#btnTablebord');
        let btnInscription = document.querySelector('#inscription');
        let btnMesCours = document.querySelector('#myCourses');
        let VoirPlusMesCourses = document.querySelector('#VoirMesCourses');
        let VoirPlusInscription = document.querySelector('#VoirPlusInscription');

        let containers = document.querySelectorAll('.container');
        let containerProfil = document.querySelector('.container.profil');
        let createCourseContainer = document.querySelector('.container.courses');
        let containerDash = document.querySelector('.container.dashboard');
        let containerInscription = document.querySelector('.container.inscription');
        let containerMyCourses = document.querySelector('.container.myCourses');


        function hideAllContainers() {
            containers.forEach(container => {
                container.classList.add('hidden');
            });
        }

        Btnprofil.addEventListener('click', () => {
            hideAllContainers();
            containerProfil.classList.remove('hidden');
        });

        btnajouterCourses.addEventListener('click', () => {
            hideAllContainers();
            createCourseContainer.classList.remove('hidden');
        });

        btnTablebord.addEventListener('click', () => {
            hideAllContainers();
            containerDash.classList.remove('hidden');
        });

        btnInscription.addEventListener('click', ()=> {
            hideAllContainers();
            containerInscription.classList.remove('hidden');
        });

        btnMesCours.addEventListener('click', ()=> {
            hideAllContainers();
            containerMyCourses.classList.remove('hidden');
        });

        VoirPlusMesCourses.addEventListener('click', ()=> {
            hideAllContainers();
            containerMyCourses.classList.remove('hidden');
        });
        VoirPlusInscription.addEventListener('click', ()=> {
            hideAllContainers();
            containerInscription.classList.remove('hidden');
        });
        </script>
</body>

</html>