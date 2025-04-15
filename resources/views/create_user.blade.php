<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengguna</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="py-6 px-4 bg-red-600 shadow-md flex justify-between items-center">
        <h1 class="text-xl font-bold text-white">Portal Pelanggan Mainvest</h1>
        <a href="/dashboard" class="text-white text-sm font-semibold hover:underline">Dashboard</a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Buat Pengguna</h2>

                    <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex flex-col space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan nama">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan email">
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                                <input type="password" name="password" id="password" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan kata sandi">
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Konfirmasi kata sandi">
                                @error('password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            @if(auth()->user()->role === 'super_user')
                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700">Pilih Role</label>
                                    <select name="role" id="role" required class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" onchange="toggleSiteDropdown()">
                                    <option value="site">User</option>
                                        <option value="super_user">Super User</option>
                                    </select>
                                    @error('role')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div id="site-wrapper">
                                    <label for="site_id" class="block text-sm font-medium text-gray-700">Pilih Site</label>
                                    <select name="site_id" id="site_id" class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        @foreach(\App\Models\Site::all() as $site)
                                            <option value="{{ $site->id }}">{{ $site->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('site_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div>
                                <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    Buat Pengguna
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSiteDropdown() {
            const role = document.getElementById('role')?.value;
            const siteWrapper = document.getElementById('site-wrapper');
            if (role === 'super_user') {
                siteWrapper.style.display = 'none';
            } else {
                siteWrapper.style.display = 'block';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            toggleSiteDropdown();
        });
    </script>
</body>
</html>
