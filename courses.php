<?php 
require_once './component/header.php';
        // echo "<pre>";
        // var_dump($getMyEnrollments);
        // echo "</pre>";


?>


<div class="container mx-auto px-6 py-12">
    <div class="flex items-center justify-center mb-8">
        <h2 class="text-4xl font-bold text-[#FF6B38] relative">
            my courses
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
        <?php if(isset($_SESSION['is_login'])): ?>
        <?php foreach($getMyEnrollments as $Enrollments): ?>
        <div class="bg-white rounded-xl overflow-hidden shadow-lg">
            <div class="bg-[#00BFB3] p-8 flex items-center justify-center">
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
                <p class="text-sm text-gray-500"><?= $Enrollments['date_inscription'];?></p>
                <h3 class="text-xl font-bold text-teal-700 mt-2"><?= $Enrollments['titre'];?></h3>
                <p class="text-sm text-gray-600 mt-2"><?= $Enrollments['description'];?></p>
                <div class="flex items-center justify-between mt-4">
                    <a href="aficherVideo.php?id_cours=<?= $Enrollments['id'];?>" class="px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-300">watch Now</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>



<?php 
require_once './component/footer.php';
?>