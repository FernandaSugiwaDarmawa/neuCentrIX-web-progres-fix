<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nonaktif-row {
            background-color: #f8d7da !important;
        }
        .nonaktif-row:hover {
            background-color: #f8d7da !important;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <div class="w-full bg-red-600 shadow-md flex justify-between items-center py-4 px-6 fixed top-0 left-0 right-0 z-50">
        <h1 class="text-xl font-bold text-white">Portal Pelanggan Manivest</h1>

        <!-- Dropdown Profil -->
        <div class="relative ml-auto">
            <button id="profileButton" class="text-white text-sm font-semibold focus:outline-none">
                {{ Auth::user()->name }} ▼
            </button>
            <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
                <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="w-full max-w-7xl mx-auto px-4 mt-32">
        <div class="bg-white p-6 shadow-lg rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Data Customer</h2>
                <div class="flex gap-4">
                    @if(Auth::user()->role !== 'viewer')
                        <a href="{{ route('customer.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tambah Data</a>
                    @endif
                    <a href="{{ route('customer.export') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Export Excel</a>
                </div>
            </div>

            @if(Auth::user()->role == 'super_user')
                <div class="mb-6 flex gap-4">
                    <a href="{{ route('manage-users') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Manage Users</a>
                    <a href="{{ route('create-user') }}" class="px-4 py-2 bg-sky-600 text-white rounded hover:bg-purple-700">Create User</a>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-auto">
                <table class="min-w-full text-sm text-left border border-gray-300">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">LABEL RACK</th>
                            <th class="px-4 py-2">NO FISIK RACK</th>
                            <th class="px-4 py-2">Kota</th>
                            <th class="px-4 py-2">Lokasi</th>
                            <th class="px-4 py-2">Nama Customer</th>
                            <th class="px-4 py-2">Jumlah Layanan</th>
                            <th class="px-4 py-2">Jenis Layanan</th>
                            <th class="px-4 py-2">Sales Channel</th>
                            <th class="px-4 py-2">Status Bisnis</th>
                            <th class="px-4 py-2">Status Layanan</th>
                            <th class="px-4 py-2">No Order</th>
                            <th class="px-4 py-2">Dokumen Pendukung</th>
                            <th class="px-4 py-2">Tanggal Aktivasi</th>
                            <th class="px-4 py-2">Power Source</th>
                            <th class="px-4 py-2">Power Rack</th>
                            <th class="px-4 py-2">Connectivity</th>
                            <th class="px-4 py-2">Nama Switch/OTB</th>
                            <th class="px-4 py-2">VLAN</th>
                            <th class="px-4 py-2">Port</th>
                            <th class="px-4 py-2">AM Telkom</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Nonaktif Sejak</th>
                            <th class="px-4 py-2">Others</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $index => $customer)
                        <tr class="border-b {{ $customer->status == 'nonaktif' ? 'nonaktif-row' : 'hover:bg-gray-50' }}">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $customer->label_rack }}</td>
                            <td class="px-4 py-2">{{ $customer->no_fisik_rack }}</td>
                            <td class="px-4 py-2">{{ $customer->kota }}</td>
                            <td class="px-4 py-2">{{ $customer->lokasi }}</td>
                            <td class="px-4 py-2">{{ $customer->nama_customer }}</td>
                            <td class="px-4 py-2">{{ $customer->jumlah_layanan }}</td>
                            <td class="px-4 py-2">{{ $customer->jenis_layanan }}</td>
                            <td class="px-4 py-2">{{ $customer->sales_channel }}</td>
                            <td class="px-4 py-2">{{ $customer->status_bisnis }}</td>
                            <td class="px-4 py-2">{{ $customer->status_layanan }}</td>
                            <td class="px-4 py-2">{{ $customer->no_order }}</td>
                            <td class="px-4 py-2">{{ $customer->dokumen_pendukung }}</td>
                            <td class="px-4 py-2">{{ $customer->tanggal_aktivasi }}</td>
                            <td class="px-4 py-2">{{ $customer->power_source }}</td>
                            <td class="px-4 py-2">{{ $customer->power_rack }}</td>
                            <td class="px-4 py-2">{{ $customer->connectivity }}</td>
                            <td class="px-4 py-2">{{ $customer->nama_switch_otb }}</td>
                            <td class="px-4 py-2">{{ $customer->vlan }}</td>
                            <td class="px-4 py-2">{{ $customer->port }}</td>
                            <td class="px-4 py-2">{{ $customer->am_telkom }}</td>
                            <td class="px-4 py-2">{{ $customer->status }}</td>
                            <td class="px-4 py-2">{{ $customer->nonaktif_sejak ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $customer->Others }}</td>
                            <td class="px-4 py-2 space-x-2">
                                @if(Auth::user()->role !== 'viewer')
                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                    </form>

                                    @if ($customer->status != 'nonaktif')
                                    <form action="{{ route('customer.deactivate', $customer->id) }}" method="POST" onsubmit="return confirm('Nonaktifkan customer ini?')" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Nonaktif</button>
                                    </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Dropdown Toggle Script -->
    <script>
        document.getElementById('profileButton').addEventListener('click', function () {
            document.getElementById('profileMenu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
