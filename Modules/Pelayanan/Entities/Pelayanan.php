<?php

namespace Modules\Pelayanan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';
    protected $primaryKey = 'id_pelayanan';
    protected $fillable = ['nama_pelayanan','id_kategoripel','id_dokter','image','keterangan'];
    public $timestamps = false;
    
    protected static function newFactory()
    {
        return \Modules\Pelayanan\Database\factories\PelayananFactory::new();
    }
}
