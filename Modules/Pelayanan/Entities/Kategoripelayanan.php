<?php

namespace Modules\Pelayanan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategoripelayanan extends Model
{
    use HasFactory;

    protected $table = 'kategoripelayanan';
    protected $fillable = ['id_kategorpel', 'nama_kategoripel', 'jenis_kategoripel'];
    public $timestamps = false;
    
    protected static function newFactory()
    {
        return \Modules\Pelayanan\Database\factories\KategoripelayananFactory::new();
    }
}
