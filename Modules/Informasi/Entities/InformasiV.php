<?php

namespace Modules\Informasi\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiV extends Model
{
    use HasFactory;

    protected $table = 'informasi_v';
    protected $primaryKey = 'informasi_id';
    protected $fillable = ['informasi_id','judul', 'isi', 'kategori_id', 'nama_kategori', 'foto', 'tgl_post'];
    
    protected static function newFactory()
    {
        return \Modules\Informasi\Database\factories\InformasiFactory::new();

       
    }
}
