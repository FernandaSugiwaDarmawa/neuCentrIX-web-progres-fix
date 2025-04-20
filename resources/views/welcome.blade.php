<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center h-screen">
    
    <!-- Navbar -->
    <div class="w-full bg-red-600 shadow-md py-4 fixed top-0 left-0 right-0">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-center">
            <h1 class="text-xl sm:text-2xl font-bold text-white text-center">Portal Pelanggan Manivest</h1>
        </div>
    </div>

    <!-- Welcome Content -->
    <div class="w-full max-w-4xl mt-28"> <!-- Memberikan margin top untuk menghindari navbar -->
        <div class="bg-white p-16 shadow-lg rounded-lg text-center">
            <h2 class="text-4xl font-bold text-gray-800">Selamat Datang di Data Manivest Customer</h2>
            <p class="mt-4 text-gray-600 text-lg">Sistem informasi untuk mengelola data pelanggan dengan mudah dan efisien.</p>
            
            <div class="mt-8 flex justify-center space-x-6">
                <a href="{{ route('login') }}" class="px-8 py-4 bg-blue-600 text-white rounded-lg text-xl hover:bg-blue-700 transition">Masuk</a>
            </div>
        </div>
    </div>
</body>
</html>
