<?php

namespace Modules\Tentang\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentang';
    protected $primaryKey = 'id_tentang';
    protected $fillable = ['tentang','keterangan','id_tentang_kat','image','tgl_add'];
    public $timestamps = false;
    
    public function tentangKat()
    {
        return $this->hasMany('Modules\Tentang\Entities\TentangKat','id_tentang_kat');
    }
}

