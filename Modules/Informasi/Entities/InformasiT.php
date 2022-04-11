<?php

namespace Modules\Informasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiT extends Model
{
    use HasFactory;

    protected $table = 'informasi';
    protected $primaryKey = 'informasi_id';
    protected $fillable = ['judul', 'isi', 'kategori_id','image','tgl_post','status'];
    public $timestamps = false;
    
    protected static function kategoriInformasi()
    {
        return $this->hasMany('Modules\Informasi\Entities\KategoriInformasi','kategori_id');
    }
}
