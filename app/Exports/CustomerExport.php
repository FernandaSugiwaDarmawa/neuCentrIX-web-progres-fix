<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExport implements FromView
{
    public function view(): View
    {
        if (auth()->user()->role === 'super_user') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('site_id', auth()->user()->site_id)->get();
        }

        return view('table', [
            'customers' => $customers
        ]);
    }
}

