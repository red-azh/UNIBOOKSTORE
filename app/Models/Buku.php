<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerbit;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected  $fillable = [
        'kode', 'kategori', 'nama_buku', 'harga', 'stok','penerbit'
    ];
    public function pnb()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit', 'id');
    }
}
