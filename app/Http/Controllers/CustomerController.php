<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;

class CustomerController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'super_user') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('site_id', auth()->user()->site_id)->get();
        }

        return view('dashboard', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label_rack' => 'required',
            'no_fisik_rack' => 'required',
            'kota' => 'required',
            'lokasi' => 'required',
            'nama_customer' => 'required',
            'jumlah_layanan' => 'required',
            'jenis_layanan' => 'required',
            'sales_channel' => 'required',
            'status_bisnis' => 'required',
            'status_layanan' => 'required',
            'no_order' => 'required',
            'dokumen_pendukung' => 'required',
            'tanggal_aktivasi' => 'required|date',
            'power_source' => 'required',
            'power_rack' => 'required',
            'connectivity' => 'required',
            'nama_switch_otb' => 'required',
            'vlan' => 'required',
            'port' => 'required',
            'others' => 'nullable',
            'am_telkom' => 'required',
        ]);

        $validated['site_id'] = auth()->user()->site_id;
        $validated['status'] = 'aktif';
        Customer::create($validated);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function nonaktifkan($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->status === 'nonaktif') {
            return back()->with('warning', 'Pelanggan sudah dalam status nonaktif.');
        }

        $customer->status = 'nonaktif';
        $customer->nonaktif_sejak = now();
        $customer->save();

        return back()->with('success', 'Pelanggan berhasil dinonaktifkan.');
    }

    public function deactivate($id)
    {
        return $this->nonaktifkan($id);
    }

    public function export()
    {
        return Excel::download(new CustomerExport, 'Customer.xlsx');
    }

    public function hapusOtomatisNonaktif()
    {
        $deleted = Customer::where('status', 'nonaktif')
            ->where('nonaktif_sejak', '<', now()->subYear())
            ->delete();

        return back()->with('success', "$deleted pelanggan nonaktif lebih dari 1 tahun telah dihapus.");
    }
}
