<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if (auth()->user()->role === 'super_user') {
            $customers = Customer::all();
        } else {
            $customers = Customer::where('site_id', auth()->user()->site_id)->get();
        }

        $filename = 'customers.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = [
            'LABEL RACK', 'NO FISIK RACK', 'Kota', 'Lokasi', 'Nama Customer',
            'Jumlah Layanan', 'Jenis Layanan', 'Sales Channel', 'Status Bisnis',
            'Status Layanan', 'No Order', 'Dokumen Pendukung', 'Tanggal Aktivasi',
            'Power Source', 'Power Rack', 'Connectivity', 'Nama Switch/OTB', 'VLAN', 'Port',
            'Others', 'AM Telkom', 'Status'
        ];

        $callback = function () use ($customers, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($customers as $cust) {
                $row = [
                    $cust->label_rack,
                    $cust->no_fisik_rack,
                    $cust->kota,
                    $cust->lokasi,
                    $cust->nama_customer,
                    $cust->jumlah_layanan,
                    $cust->jenis_layanan,
                    $cust->sales_channel,
                    $cust->status_bisnis,
                    $cust->status_layanan,
                    $cust->no_order,
                    $cust->dokumen_pendukung,
                    $cust->tanggal_aktivasi,
                    $cust->power_source,
                    $cust->power_rack,
                    $cust->connectivity,
                    $cust->ip,
                    $cust->vlan,
                    $cust->port,
                    $cust->others,
                    $cust->am_telkom,
                    $cust->status === 'nonaktif' ? 'NONAKTIF' : 'AKTIF'
                ];

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function hapusOtomatisNonaktif()
    {
        $deleted = Customer::where('status', 'nonaktif')
            ->where('nonaktif_sejak', '<', now()->subYear())
            ->delete();

        return back()->with('success', "$deleted pelanggan nonaktif lebih dari 1 tahun telah dihapus.");
    }
}
