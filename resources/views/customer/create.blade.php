<!-- resources/views/customer/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Customer</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Tambah Data Customer</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            @php
                $fields = [
                    'label_rack' => 'LABEL RACK',
                    'no_fisik_rack' => 'NO FISIK RACK',
                    'kota' => 'Kota',
                    'lokasi' => 'Lokasi',
                    'nama_customer' => 'Nama Customer',
                    'jumlah_layanan' => 'Jumlah Layanan',
                    'jenis_layanan' => 'Jenis Layanan',
                    'sales_channel' => 'Sales Channel',
                    'status_bisnis' => 'Status Bisnis',
                    'status_layanan' => 'Status Layanan',
                    'no_order' => 'No Order',
                    'dokumen_pendukung' => 'Dokumen Pendukung',
                    'tanggal_aktivasi' => 'Tanggal Aktivasi',
                    'power_source' => 'Power Source',
                    'power_rack' => 'Power Rack',
                    'connectivity' => 'Connectivity',
                    'nama_switch_otb' => 'Nama Switch/OTB',
                    'vlan' => 'VLAN',
                    'port' => 'Port',
                    'others' => 'Others',
                    'am_telkom' => 'AM Telkom',
                ];
            @endphp

            @foreach($fields as $name => $label)
                <div>
                    <label for="{{ $name }}" class="block font-semibold text-gray-700 mb-1">
                        {{ $label }}
                    </label>
                    <input 
                        type="{{ $name === 'tanggal_aktivasi' ? 'date' : 'text' }}" 
                        name="{{ $name }}" 
                        id="{{ $name }}" 
                        value="{{ old($name) }}" 
                        class="w-full rounded border border-gray-400 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 p-2"
                    >
                </div>
            @endforeach

            <div class="col-span-1 md:col-span-2 flex justify-between mt-4">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Kembali</a>
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
