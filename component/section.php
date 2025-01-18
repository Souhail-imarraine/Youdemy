<div class="container mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2">
            <span class="px-4 py-2 bg-white rounded-full text-sm font-medium">Never stop learning</span>
            <h1 class="text-5xl font-bold text-teal-800 mt-6 leading-tight">
                Grow up your skills by online courses with YouDemy
            </h1>
            <div class="mt-8 flex items-center space-x-6">
                <button class="px-6 py-3 bg-orange-500 text-white rounded-md font-medium">
                    EXPLORE PATH
                </button>
                <div class="flex items-center">
                    <div class="flex -space-x-2">
                        <div class="w-10 h-10 rounded-full bg-gray-300 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-gray-400 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-gray-500 border-2 border-white"></div>
                    </div>
                    <div class="ml-4">
                        <div class="text-yellow-400">★★★★★</div>
                        <p class="text-sm text-gray-600">(120+ Reviews)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 mt-12 md:mt-0 relative">
            <div class="w-full h-96 rounded-lg relative overflow-hidden">
                <img src="protfolio-img04.jpg" alt="Hero Image"
                    class="w-full h-full object-cover object-center absolute inset-0 transition-transform duration-300 hover:scale-105">
            </div>
            <div class="absolute top-1/4 left-0 bg-white p-4 rounded-lg shadow-lg flex items-center">
                <div class="bg-blue-100 p-2 rounded-lg mr-3 w-12 h-12"></div>
                <div>
                    <div class="font-bold text-xl">250k</div>
                    <div class="text-sm text-gray-600">Assisted Student</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-12">
    <div class="flex items-center justify-center mb-8">
        <h2 class="text-4xl font-bold text-[#FF6B38] relative">
            All Courses
        </h2>
    </div>

    <div class="flex flex-col items-center mb-12 space-y-6">
        <div class="flex flex-wrap gap-4 justify-center">
            <button class="px-6 py-2 bg-teal-700 text-white rounded-full">All Programme</button>
            <button class="px-6 py-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">UI/UX
                Design</button>
            <button class="px-6 py-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">Program
                Design</button>
            <button class="px-6 py-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">Program
                Design</button>
            <button class="px-6 py-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">Program
                Design</button>
        </div>

        <div class="w-full max-w-2xl relative">
            <input type="text" placeholder="Search for courses..."
                class="w-full px-6 py-3 pl-12 bg-white border border-gray-200 rounded-full focus:outline-none focus:border-teal-700 focus:ring-1 focus:ring-teal-700">
            <div class="w-5 h-5 bg-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 rounded-full"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach($getAllCourses as $cours): ?>
        <div class="bg-white rounded-xl overflow-hidden shadow-lg">
            <div
                class="p-8 flex items-center justify-center bg-[url('Enseignant/<?php echo $cours['Image_couverture']; ?>')] bg-cover bg-center">
                <div class="w-32 h-32 bg-white/20 rounded-lg"></div>
            </div>
            
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-500 border-2 border-white"></div>
                    </div>
                    <span class="ml-2 text-sm text-gray-600">+ 40 students</span>
                </div>
                <p class="text-sm text-gray-500"><?php echo $cours['date_creation'];?></p>
                <h3 class="text-xl font-bold text-teal-700 mt-2"><?php echo $cours['titre'];?></h3>
                <p class="text-sm text-gray-600 mt-2"><?php echo $cours['description'];?></p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <span class="text-[#FF6B38] font-bold">$380</span>
                        <span class="text-gray-400 line-through ml-2">$500</span>
                    </div>
                    <button class="px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800">Enroll
                        Now</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="flex justify-center items-center space-x-2 mt-12">
        <button
            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 hover:border-teal-700 hover:text-teal-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button class="w-10 h-10 flex items-center justify-center rounded-full bg-teal-700 text-white">
            1
        </button>

        <button
            class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-600 hover:text-teal-700 transition-colors">
            2
        </button>

        <button
            class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-600 hover:text-teal-700 transition-colors">
            3
        </button>

        <span class="text-gray-500">...</span>

        <button
            class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-600 hover:text-teal-700 transition-colors">
            8
        </button>

        <button
            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 hover:border-teal-700 hover:text-teal-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>