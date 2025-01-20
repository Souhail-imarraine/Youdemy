<?php
require_once '../config/database.php';
require_once '../classes/Administrateur.php';

$database = new Database();
$pdo = $database->getConnection();

$administrateur = new Administrateur($pdo);

$totalCours = $administrateur->getTotalCours();

$totalEnseignants = $administrateur->getTotalEnseignants();

$getCoursesByCategory = $administrateur->getCoursesByCategory();

$getCourseWithMostStudents = $administrateur->getCourseWithMostStudents();

$getTop3Enseignants = $administrateur->getTop3Enseignants();

$getAllTeachers = $administrateur->getAllTeachers();

$TotalCountTeachers = $administrateur->TotalCountTeachers();

$getAllEtudiant = $administrateur->getAllEtudiant();

print_r($getCoursesByCategory);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
        overflow-x: hidden;
    }

    .transition-sidebar {
        transition: all 0.3s ease-in-out;
    }

    @media (max-width: 768px) {
        .sidebar-mobile {
            transform: translateX(-100%);
        }

        .sidebar-mobile.active {
            transform: translateX(0);
        }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .stat-card {
        transition: transform 0.2s ease-in-out;
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    @media (max-width: 640px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-50">
        <header class="bg-white border-b border-gray-200 fixed w-full top-0 z-50">
            <div class="mx-auto">
                <div class="flex justify-between h-16 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-xl font-semibold text-teal-800">YouDemy</span>
                        </div>
                    </div>
                    <div class="flex-1 flex items-center justify-start px-2 lg:ml-20 lg:justify-start">
                        <div class="w-full lg:max-w-xs">
                            <label for="search" class="sr-only">Rechercher</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input id="search" name="search"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                    placeholder="Rechercher..." type="search">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 relative">
                            <button type="button"
                                class="relative p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                <span class="sr-only">Voir les notifications</span>
                                <i class="fas fa-bell text-xl"></i>
                                <span
                                    class="absolute top-0 right-0 block h-4 w-4 rounded-full bg-red-500 text-xs text-white font-medium flex items-center justify-center">
                                    3
                                </span>
                            </button>
                        </div>

                        <div class="flex-shrink-0 relative">
                            <button type="button"
                                class="relative p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                <span class="sr-only">Voir les messages</span>
                                <i class="fas fa-envelope text-xl"></i>
                                <span
                                    class="absolute top-0 right-0 block h-4 w-4 rounded-full bg-teal-500 text-xs text-white font-medium flex items-center justify-center">
                                    2
                                </span>
                            </button>
                        </div>

                        <div class="flex-shrink-0 relative group ml-4">
                            <div class="relative flex items-center">
                                <button type="button"
                                    class="flex items-center space-x-3 focus:outline-none hover:bg-gray-50 rounded-lg p-2">
                                    <div class="relative">
                                        <img class="h-9 w-9 rounded-full border-2 border-gray-200 object-cover"
                                            src="/images/avatar.jpg" alt="Profile">
                                        <span
                                            class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-400 ring-2 ring-white">
                                        </span>
                                    </div>
                                    <div class="hidden md:block text-left">
                                        <p class="text-sm font-semibold text-gray-800">Thomas Martin</p>
                                        <p class="text-xs text-gray-500">Administrateur</p>
                                    </div>
                                    <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                </button>

                                <div
                                    class="absolute right-0 mt-20 w-64 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block ring-1 ring-black ring-opacity-5">
                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                                        <i class="fas fa-user text-gray-400 w-5 h-5 mr-3"></i>
                                        <span>Mon Profil</span>
                                    </a>

                                    <hr class="my-2 border-gray-200">

                                    <a href="#"
                                        class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                                        <i class="fas fa-sign-out-alt text-red-400 w-5 h-5 mr-3"></i>
                                        <span>Déconnexion</span>
                                    </a>
                                </div>
                            </div>

                            <div
                                class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>Mon profil
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i>Paramètres
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                                </a>
                            </div>
                        </div>

                        <div class="flex items-center md:hidden">
                            <button type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500">
                                <span class="sr-only">Ouvrir le menu</span>
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-teal-700 bg-teal-50">
                        <i class="fas fa-home mr-2"></i>Accueil
                    </a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-book-open mr-2"></i>Cours
                    </a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-users mr-2"></i>Étudiants
                    </a>
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-chart-bar mr-2"></i>Statistiques
                    </a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="/images/avatar.jpg" alt="Profile">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">Thomas Martin</div>
                            <div class="text-sm font-medium text-gray-500">admin@example.com</div>
                        </div>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-user mr-2"></i>Mon profil
                        </a>
                        <a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-cog mr-2"></i>Paramètres
                        </a>
                        <a href="#"
                            class="block px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-gray-50">
                            <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-40 w-64 mt-16 transform transition-transform duration-300 ease-in-out md:translate-x-0 bg-white shadow-sm overflow-y-auto sidebar-mobile">
            <nav class="mt-5 px-2">
                <a href="#" id="btnDashboard"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 sidebar-link">
                    <i class="fas fa-gauge-high mr-3"></i>
                    Tableau de bord
                </a>

                <div class="mt-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider flex items-center">
                        <i class="fas fa-users-cog mr-2"></i>
                        Gestion des utilisateurs
                    </p>
                    <div class="mt-2 space-y-1">
                        <a href="#" id="btnEnseignants"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 sidebar-link">
                            <i class="fas fa-chalkboard-user mr-3 text-gray-400"></i>
                            Enseignants
                            <span
                                class="ml-auto bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full flex items-center">
                                <i class="fas fa-clock mr-1"></i>3
                            </span>
                        </a>
                        <a href="#" id="btnEtudiants"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 sidebar-link">
                            <i class="fas fa-user-graduate mr-3 text-gray-400"></i>
                            Étudiants
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider flex items-center">
                        <i class="fas fa-folder-tree mr-2"></i>
                        Gestion des contenus
                    </p>
                    <div class="mt-2 space-y-1">
                        <a href="#" id="btnCours"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 sidebar-link">
                            <i class="fas fa-book-open-reader mr-3 text-gray-400"></i>
                            Cours
                        </a>
                        <a href="#" id="btnCategories"
                            class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 sidebar-link">
                            <i class="fas fa-sitemap mr-3 text-gray-400"></i>
                            Catégories
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-4 md:p-8 mt-16 md:ml-64 transition-all duration-300 container dashboard">
            <div class="dashboard-grid mb-6">
                <div class="stat-card bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-xl text-teal-600"></i>
                        </div>
                        <span class="text-sm text-teal-500 font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+12%
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">1,234</h3>
                    <p class="text-gray-600 text-sm">Utilisateurs totaux</p>
                </div>

                <div class="stat-card bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-book-open text-xl text-blue-600"></i>
                        </div>
                        <span class="text-sm text-blue-500 font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+8%
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900"><?= $totalCours ?></h3>
                    <p class="text-gray-600 text-sm">Cours TOTAL</p>
                </div>

                <div class="stat-card bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-xl text-purple-600"></i>
                        </div>
                        <span class="text-sm text-purple-500 font-medium">
                            <i class="fas fa-arrow-up mr-1"></i>+5%
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900"><?= $totalEnseignants ?></h3>
                    <p class="text-gray-600 text-sm">Enseignants actifs</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Enseignants en attente</h2>
                        <button class="text-sm text-teal-600 hover:text-teal-700">Voir tout</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <img src="teacher1.jpg" alt="Teacher" class="h-10 w-10 rounded-full">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Marie Dupont</p>
                                    <p class="text-xs text-gray-500">Développement Web</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 bg-teal-600 text-white text-sm rounded-lg hover:bg-teal-700">
                                    <i class="fas fa-check mr-1"></i>Approuver
                                </button>
                                <button class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700">
                                    <i class="fas fa-times mr-1"></i>Refuser
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Cours populaires</h2>
                        <button class="text-sm text-teal-600 hover:text-teal-700">Voir tout</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <img src="../Enseignant/<?= $getCourseWithMostStudents['image_cours']; ?>" alt="Icon" class="w-6 h-6">
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-900">
                                        <?= $getCourseWithMostStudents['titre']; ?></p>
                                    <p class="text-xs text-gray-500">
                                        <?= $getCourseWithMostStudents['total_etudiants']; ?> étudiants</p>
                                </div>
                            </div>
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>4.8
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Top 3 Enseignants</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <?php foreach ($getTop3Enseignants as $enseignant): ?>
                            <div class="flex flex-col p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="h-12 w-12 rounded-full bg-teal-100 flex items-center justify-center">
                                        <i class="fas fa-user text-xl text-teal-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900"><?= $enseignant['enseignant_nom']?></p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-star text-yellow-400"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <div class="flex justify-between items-center text-sm text-gray-500">
                                        <span><i class="fas fa-users mr-1"></i><?= $enseignant['total_etudiants'] ?> étudiants</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once 'cours.php' ?>
        <?php require_once 'etudiants.php' ?>
        <?php require_once 'enseignant.php' ?>
        <?php require_once 'categories.php' ?>
    </div>

    <script>
    // Select all buttons
    const btnDashboard = document.querySelector('#btnDashboard');
    const btnEnseignants = document.querySelector('#btnEnseignants');
    const btnEtudiants = document.querySelector('#btnEtudiants');
    const btnCours = document.querySelector('#btnCours');
    const btnCategories = document.querySelector('#btnCategories');

    let containers = document.querySelectorAll('.container');
    const containerDash = document.querySelector('.container.dashboard');
    const containerEtudiant = document.querySelector('.container.etudiants');
    const containerEnseignant = document.querySelector('.container.enseignant');
    const containerCours = document.querySelector('.container.cours');
    const containerCategories = document.querySelector('.container.categories');

    function hideAllContainers() {
        containers.forEach(container => {
            container.classList.add('hidden');
        });
    }

    function updateSidebarActive(activeElement) {
        // First, remove active class from all links
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.classList.remove('bg-teal-700', 'text-white');
            link.classList.add('text-gray-700', 'hover:bg-gray-50');
            // Reset icon color
            const icon = link.querySelector('i:not(.fa-clock)');
            if (icon) {
                icon.classList.add('text-gray-400');
                icon.classList.remove('text-white');
            }
        });

        // Add active class to clicked link
        if (activeElement) {
            activeElement.classList.remove('text-gray-700', 'hover:bg-gray-50');
            activeElement.classList.add('bg-teal-700', 'text-white');
            // Update icon color
            const icon = activeElement.querySelector('i:not(.fa-clock)');
            if (icon) {
                icon.classList.remove('text-gray-400');
                icon.classList.add('text-white');
            }
        }
    }

    btnDashboard.addEventListener('click', (e) => {
        e.preventDefault();
        hideAllContainers();
        containerDash.classList.remove('hidden');
        updateSidebarActive(btnDashboard);
    });

    btnEtudiants.addEventListener('click', (e) => {
        e.preventDefault();
        hideAllContainers();
        containerEtudiant.classList.remove('hidden');
        updateSidebarActive(btnEtudiants);
    });

    btnEnseignants.addEventListener('click', (e) => {
        e.preventDefault();
        hideAllContainers();
        if (containerEnseignant) {
            containerEnseignant.classList.remove('hidden');
        }
        updateSidebarActive(btnEnseignants);
    });

    btnCours.addEventListener('click', (e) => {
        e.preventDefault();
        hideAllContainers();
        containerCours.classList.remove('hidden');
        updateSidebarActive(btnCours);
    });

    btnCategories.addEventListener('click', (e) => {
        e.preventDefault();
        hideAllContainers();
        containerCategories.classList.remove('hidden');
        updateSidebarActive(btnCategories);
    });

    const menuButton = document.querySelector('[aria-label="Ouvrir le menu"]');
    const sidebar = document.querySelector('#sidebar');

    if (menuButton) {
        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    }

    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768) {
            if (!sidebar.contains(e.target) && !menuButton.contains(e.target)) {
                sidebar.classList.remove('active');
            }
        }
    });

    // Initialize dashboard view
    window.addEventListener('load', () => {
        hideAllContainers();
        containerDash.classList.remove('hidden');
        updateSidebarActive(btnDashboard);
    });
    </script>
</body>

</html>