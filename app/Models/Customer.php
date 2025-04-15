<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'label_rack', 'no_fisik_rack', 'kota', 'lokasi', 'nama_customer',
        'jumlah_layanan', 'jenis_layanan', 'sales_channel', 'status_bisnis', 'status_layanan',
        'no_order', 'dokumen_pendukung', 'tanggal_aktivasi', 'power_source', 'power_rack',
        'connectivity', 'nama_switch_otb', 'vlan', 'port', 'others', 'am_telkom', 'site_id'
    ];
}
