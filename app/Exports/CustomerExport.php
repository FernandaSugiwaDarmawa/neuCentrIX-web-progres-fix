<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    public function view(): View
    {
        // Mengambil data sesuai dengan role user
        if (auth()->user()->role === 'viewer') {
            $customers = Customer::all();  // viewer dapat mengakses semua data
        } elseif (auth()->user()->role === 'super_user') {
            $customers = Customer::all();  // super_user dapat mengakses semua data
        } else {
            $customers = Customer::where('site_id', auth()->user()->site_id)->get();  // site_user hanya dapat melihat data berdasarkan site_id
        }

        return view('table', [
            'customers' => $customers
        ]);
    }
}
