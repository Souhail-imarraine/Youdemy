<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy - Online Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body>
    <div class="min-h-screen bg-gray-50">
        <div class="flex">
            <aside class="hidden md:block w-64 bg-white shadow-sm h-screen fixed top-16">
                <nav class="mt-5 px-2">
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-teal-50 text-teal-700">
                        <i class="fas fa-th-large mr-3 text-teal-700"></i>
                        Tableau de bord
                    </a>

                    <!-- My Courses -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-graduation-cap mr-3 text-gray-500"></i>
                        Mes cours
                    </a>

                    <!-- Catalog -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-book-open mr-3 text-gray-500"></i>
                        Catalogue
                    </a>

                    <!-- Schedule -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-calendar-alt mr-3 text-gray-500"></i>
                        Planning
                    </a>

                    <!-- Certificates -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-award mr-3 text-gray-500"></i>
                        Certificats
                    </a>

                    <!-- Forum -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-comments mr-3 text-gray-500"></i>
                        Forum
                    </a>

                    <!-- Settings -->
                    <a href="#"
                        class="group flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 mt-1">
                        <i class="fas fa-cog mr-3 text-gray-500"></i>
                        Paramètres
                    </a>
                </nav>

                <!-- Learning Progress -->
                <div class="px-4 mt-8">
                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-chart-line mr-2"></i>Progression
                    </h3>
                    <div class="mt-2 px-3">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Progression globale</span>
                            <span>68%</span>
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full">
                            <div class="h-full w-[68%] bg-teal-600 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64 p-8 mt-16">
                <!-- Welcome Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Bonjour, Thomas 👋</h1>
                            <p class="text-gray-600 mt-1">Prêt à continuer votre apprentissage ?</p>
                        </div>
                        <button class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Explorer les cours
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <!-- Courses Enrolled -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-book-reader text-xl text-teal-600"></i>
                            </div>
                            <span class="text-sm text-teal-500">
                                <i class="fas fa-arrow-up mr-1"></i>+2 ce mois
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">8</h3>
                        <p class="text-gray-600">Cours suivis</p>
                    </div>

                    <!-- Hours Spent -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-xl text-teal-600"></i>
                            </div>
                            <span class="text-sm text-teal-500">
                                <i class="fas fa-arrow-up mr-1"></i>+5h ce mois
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">32h</h3>
                        <p class="text-gray-600">Temps d'apprentissage</p>
                    </div>

                    <!-- Certificates -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-award text-xl text-teal-600"></i>
                            </div>
                            <span class="text-sm text-teal-500">
                                <i class="fas fa-arrow-up mr-1"></i>+1 ce mois
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">3</h3>
                        <p class="text-gray-600">Certificats obtenus</p>
                    </div>

                    <!-- Points -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-xl text-teal-600"></i>
                            </div>
                            <span class="text-sm text-teal-500">
                                <i class="fas fa-arrow-up mr-1"></i>+150 ce mois
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">850</h3>
                        <p class="text-gray-600">Points gagnés</p>
                    </div>
                </div>

                <!-- Continue Learning Section -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        <i class="fas fa-laptop-code mr-2"></i>Continuer l'apprentissage
                    </h2>
                    <!-- ... rest of the learning section ... -->
                </div>

                <!-- Calendar Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        <i class="fas fa-calendar-alt mr-2"></i>Planning de la semaine
                    </h2>
                    <!-- ... calendar content ... -->
                </div>

                <!-- Recent Activities -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">
                        <i class="fas fa-history mr-2"></i>Activités récentes
                    </h2>
                    <div class="space-y-4">
                        <!-- Activity Items -->
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-teal-600"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm text-gray-900">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    Leçon complétée: Introduction à React
                                </p>
                                <p class="text-xs text-gray-500">
                                    <i class="fas fa-clock mr-2"></i>
                                    Il y a 2 heures
                                </p>
                            </div>
                        </div>
                        <!-- ... more activity items ... -->
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>