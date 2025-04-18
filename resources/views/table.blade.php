
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>LABEL RACK</th>
            <th>NO FISIK RACK</th>
            <th>Kota</th>
            <th>Lokasi</th>
            <th>Nama Customer</th>
            <th>Jumlah Layanan</th>
            <th>Jenis Layanan</th>
            <th>Sales Channel</th>
            <th>Status Bisnis</th>
            <th>Status Layanan</th>
            <th>No Order</th>
            <th>Dokumen Pendukung</th>
            <th>Tanggal Aktivasi</th>
            <th>Power Source</th>
            <th>Power Rack</th>
            <th>Connectivity</th>
            <th>Nama Switch/OTB</th>
            <th>VLAN</th>
            <th>Port</th>
            <th>AM Telkom</th>
            <th>Status</th>
            <th>Nonaktif Sejak</th>
            <th>Others</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $customer->label_rack }}</td>
                <td>{{ $customer->no_fisik_rack }}</td>
                <td>{{ $customer->kota }}</td>
                <td>{{ $customer->lokasi }}</td>
                <td>{{ $customer->nama_customer }}</td>
                <td>{{ $customer->jumlah_layanan }}</td>
                <td>{{ $customer->jenis_layanan }}</td>
                <td>{{ $customer->sales_channel }}</td>
                <td>{{ $customer->status_bisnis }}</td>
                <td>{{ $customer->status_layanan }}</td>
                <td>{{ $customer->no_order }}</td>
                <td>{{ $customer->dokumen_pendukung }}</td>
                <td>{{ $customer->tanggal_aktivasi }}</td>
                <td>{{ $customer->power_source }}</td>
                <td>{{ $customer->power_rack }}</td>
                <td>{{ $customer->connectivity }}</td>
                <td>{{ $customer->nama_switch_otb }}</td>
                <td>{{ $customer->vlan }}</td>
                <td>{{ $customer->port }}</td>
                <td>{{ $customer->am_telkom }}</td>
                <td>{{ $customer->status }}</td>
                <td>{{ $customer->nonaktif_sejak ?? '-' }}</td>
                <td>{{ $customer->Others }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
