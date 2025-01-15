<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-[#f0f7f7]">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-2xl shadow-lg">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-teal-800">Create an account</h2>
            </div>

            <!-- Form -->
            <form class="mt-8 space-y-6">
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                            <input id="first-name" name="first-name" type="text" required
                                class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                placeholder="First name">
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <input id="last-name" name="last-name" type="text" required
                                class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                placeholder="Last name">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email" name="email" type="email" required
                            class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                            placeholder="Enter your email">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="mt-1 w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                            placeholder="Create a password">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Select your role</label>
                        <div class="flex gap-4 justify-center">
                            <div
                                class="flex-1 flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer max-w-[240px]">
                                <input id="student" name="role" type="radio" value="student"
                                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300">
                                <label for="student" class="ml-3 flex flex-col cursor-pointer">
                                    <span class="block text-sm font-medium text-gray-900">Student</span>
                                    <span class="block text-sm text-gray-500">Take courses and learn new skills</span>
                                </label>
                            </div>

                            <div class="flex-1 flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer max-w-[240px]">
                                <input id="assignment" name="role" type="radio" value="assignment"
                                    class="h-4 w-4 text-teal-600 focus:ring-teal-500 border-gray-300">
                                <label for="assignment" class="ml-3 flex flex-col cursor-pointer">
                                    <span class="block text-sm font-medium text-gray-900">Assignment</span>
                                    <span class="block text-sm text-gray-500">Create courses and teach students</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">
                        Already have an account?
                        <a href="signin.php" class="font-medium text-orange-500 hover:text-orange-600">Sign in</a>
                    </p>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    Create account
                </button>
            </form>
        </div>
    </div>
</body>

</html>