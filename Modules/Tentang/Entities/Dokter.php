<?php

namespace Modules\Tentang\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    protected $fillable = ['nama_dokter','alamat','no_hp','kategori_dokter','image', 'status', 'facebook', 'instagram', 'twitter','kelurahan','kecamatan','kabupaten'];
    public $timestamps = false;

    protected static function newFactory()
    {
        return \Modules\Tentang\Database\factories\DokterFactory::new();
    }
}
