<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'LABEL RACK', 'NO FISIK RACK', 'Kota', 'Lokasi', 'Nama Customer',
            'Jumlah Layanan', 'Jenis Layanan', 'Sales Channel', 'Status Bisnis',
            'Status Layanan', 'No Order', 'Dokumen Pendukung', 'Tanggal Aktivasi',
            'Power Source', 'Power Rack', 'Connectivity', 'Nama Switch/OTB', 'VLAN', 'Port',
            'Others', 'AM Telkom', 'Status'
        ];
    }
    public function collection()
    {
        if (auth()->user()->role === 'super_user') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('site_id', auth()->user()->site_id)->get();
        }

        return $customers;
    }
}
