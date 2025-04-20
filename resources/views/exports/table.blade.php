<table class="min-w-full text-sm text-left border border-gray-300">
    <thead>
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
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $index => $customer)
            <tr>
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
                <td class="px-4 py-2">{{ $customer->nonaktif_sejak }}</td>
                <td class="px-4 py-2">{{ $customer->others }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
