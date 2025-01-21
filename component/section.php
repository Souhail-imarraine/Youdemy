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
            <button class="px-6 py-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">Program
                Design</button>
        </div>

        <form class="w-full max-w-2xl relative" method="get">
            <input type="text" placeholder="Search for courses..." name="ValueSearching"
                class="w-full px-6 py-3 pl-12 bg-white border border-gray-200 rounded-full focus:outline-none focus:border-teal-700 focus:ring-1 focus:ring-teal-700">
            <button type="submit" name="searching"
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-teal-700 text-white px-4 py-2 rounded-full hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500">
                Search
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        $items_per_page = 8;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $items_per_page;
        
        if (isset($_GET['ValueSearching'])) {
            $searchTerm = trim($_GET['ValueSearching']);
            
            $count_query = $pdo->prepare("SELECT COUNT(*) as total FROM cours WHERE titre LIKE :search OR description LIKE :search");
            $count_query->execute([':search' => "%$searchTerm%"]);
            $total_courses = $count_query->fetch(PDO::FETCH_ASSOC)['total'];
            
            $query = "SELECT * FROM cours WHERE titre LIKE :search OR description LIKE :search LIMIT :limit OFFSET :offset";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':search', "%$searchTerm%", PDO::PARAM_STR);
            $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $total_query = $pdo->query("SELECT COUNT(*) as total FROM cours");
            $total_courses = $total_query->fetch(PDO::FETCH_ASSOC)['total'];
            
            $query = "SELECT * FROM cours LIMIT :limit OFFSET :offset";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        $total_pages = ceil($total_courses / $items_per_page);
        ?>

        <?php if (count($courses) > 0): ?>
            <?php foreach ($courses as $course): ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <div
                        class="p-8 flex items-center justify-center bg-[url('Enseignant/<?php echo $course['Image_couverture']; ?>')] bg-cover bg-center">
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
                        <p class="text-sm text-gray-500"><?php echo $course['date_creation'];?></p>
                        <h3 class="text-xl font-bold text-teal-700 mt-2"><?php echo $course['titre'];?></h3>
                        <p class="text-sm text-gray-600 mt-2"><?php echo $course['description'];?></p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center">
                                <span class="text-[#FF6B38] font-bold">$380</span>
                                <span class="text-gray-400 line-through ml-2">$500</span>
                            </div>
                            <form action="" method="post">
                                <button class="px-4 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800" name="enrole">Enroll
                                    Now
                                    <input type="hidden" name="cours_id" value="<?= $course['id']; ?>">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-4 text-center py-8">
                <p class="text-gray-500">No courses found.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination Navigation -->
    <div class="flex justify-center items-center space-x-2 mt-12">
        <?php if($page > 1): ?>
            <a href="?page=<?php echo $page - 1 ?><?php echo isset($_GET['ValueSearching']) ? '&ValueSearching=' . urlencode($_GET['ValueSearching']) : '' ?>" 
               class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 hover:border-teal-700 hover:text-teal-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i ?><?php echo isset($_GET['ValueSearching']) ? '&ValueSearching=' . urlencode($_GET['ValueSearching']) : '' ?>" 
               class="w-10 h-10 flex items-center justify-center rounded-full border <?php echo $i === $page ? 'bg-teal-700 text-white' : 'border-gray-300 hover:border-teal-700 hover:text-teal-700' ?> transition-colors">
                <?php echo $i ?>
            </a>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1 ?><?php echo isset($_GET['ValueSearching']) ? '&ValueSearching=' . urlencode($_GET['ValueSearching']) : '' ?>" 
               class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 hover:border-teal-700 hover:text-teal-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        <?php endif; ?>
    </div>
</div>