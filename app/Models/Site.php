<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['nama_site']; // Sesuaikan dengan kolom yang ada di tabel sites

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
